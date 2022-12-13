<?php 
    session_start();
    require "dbFunctions.php";
    if(isset($_POST['submit'])){
        $db = dbConnect($host, $port, $dbname, $credentials);
        $email = $_POST['email'];
        $sql = "select password,role,aproved from emp where email ='$email';";

        $ret = pg_query($db, $sql);
        if(!$ret){
            echo pg_last_error($db);
            exit();
        }
        $rows = pg_fetch_all($ret);

        foreach($rows as $row){
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
            $_SESSION['id'] = $row['empid'];
                $_SESSION['role'] = $row['role'];
          
                if ($level == '4' ) {
                    header("Location:adminReport.php");
                } 
                else if ($role == 'Doctor') {
                    header("Location:DoctorHeport.php");
                }
                else if ($role == "Family") {
                    header("Location:familyHome.php");
                }
                else {
                    header("Location:login.php?error=1");
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