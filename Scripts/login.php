<?php 
    session_start();
    require "dbFunctions.php";
    $db = dbConnect($host, $port, $dbname, $credentials);

    $sql = "SELECT patientid FROM patients";
    $ret = pg_query($db, $sql);
    $patids = pg_fetch_all($ret);
    foreach ($patids as $patid){
        $date = date("Y-m-d");
        $curid = $patid['patientid'];
        $sql = "SELECT date FROM carechecks WHERE patientid = $curid and date = '$date'";
        $ret = pg_query($db, $sql);
        if(!$ret){ echo pg_last_error($db);exit();}
        $rows = pg_fetch_all($ret);
        if(count($rows)===0){
            $sql = "INSERT INTO carechecks VALUES 
            ($curid,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,'$date')";
            $ret = pg_query($db,$sql);
            if(!$ret){echo pg_last_error($db);exit();}
        }
    }


    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $sql = "select password,role,aproved,empid from emp where email ='$email';";

        $ret = pg_query($db, $sql);
        if(!$ret){
            echo pg_last_error($db);
            exit();
        }
        $rows = pg_fetch_all($ret);

        foreach($rows as $row){
            $id = $row['empid'];

            print_r($row);
            if ($row['password'] == $_POST['password']) {
                if ($row['aproved'] == false) {
                    header("Location login.php?error=4");
                }
                
                $role = $row['role'];
                $sql = "SELECT level from roles WHERE roles = '$role';";
                $ret = pg_query($db, $sql);
                if(!$ret){
                    echo pg_last_error($db);
                    exit();
                }

                $acesss_levels = pg_fetch_all($ret);
                $level = $acesss_levels[0]['level'];
                $_SESSION['level'] = $level;
                $_SESSION['user'] = $email;
                $_SESSION['id'] = $id;
                
                $_SESSION['role'] = $row['role'];
          
                if ($level == '4' ) {
                    header("Location:adminReport.php");
                } 
                else if ($role == 'Doctor') {
                    header("Location:doctorHome.php");
                }
                else if ($role == "Family") {
                    header("Location:familyHome.php");
                }
                else if($role == 'careGiver') {
                    header("Location:caregiverHome.php");
                }
                else {
                    header("Location:login.php?error=No Redirect Found");
                }

    }


$sql = "select * from patients where email ='$email';";

$ret = pg_query($db, $sql);
if(!$ret){
    echo $ret;
}
$rows = pg_fetch_all($ret);
foreach($rows as $row){
    echo $row['password'];
            if ($row['password'] == $_POST['password']) {
                $_SESSION['user'] = $email;
                $_SESSION['id'] = $row['patientid'];
                $_SESSION['role'] = 'Patient';
                header("Location:patientHome.php");}}
echo "Incorrect User Name or Password\n";
pg_close($db);
    }
}
    require "../Veiws/login.view.php";
?>