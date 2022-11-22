<?php 
    session_start();
    require "dbFunctions.php";
    if(isset($_POST['submit'])){
        $db = dbConnect($host, $port, $dbname, $credentials);
        $email = $_POST['email'];
        $sql = "select password,role,aproved from emp where email ='$email';";

        $ret = pg_query($db, $sql);
        $rows = pg_fetch_all($ret);

        foreach($rows as $row){
            print_r($row);
            if ($row['password'] == $_POST['password']) {
                if ($row['aproved'] == false) {
                    header("Location login.php?error=4");
                }
                $role = $row['role'];
                $_SESSION['user'] = $email;
                $_SESSION['role'] = $row['role'];

                if ($role == 'admin' || $role = "Supervisor") {
                    header("Location:adminReport.php");
                } else if ($role == 'Doctor') {
                    header("Location:DoctorHeport.php");
                } else if ($role == "Patient") {
                    header("Location:patientHome.php");
                } else if ($role == "Family") {
                    header("Location:familyHome.php");
                } else if ($role == 'Applicant') {
                    header("Location:login.php?error=0");
                } else {header("Location:login.php?error=1");}

    }

}
echo "Incorrect User Name or Password\n";

pg_close($db);


    }



    require "../Veiws/login.view.php";
?>