<?php 
    session_start();
    require "dbFunctions.php";
    if(isset($_POST['submit'])){
        $db = dbConnect($host, $port, $dbname, $credentials);
        
        $sql = "SELECT password,role from EMP WHERE email =".$_POST['email'];

        $ret = pg_query($db, $sql);

        while ($row = pg_fetch_row($ret)) {
                if($row[0] == $_POST['password']){
                    $role = $row[1];
                    $_SESSION['user'] = $_POST['email'];
                    $_SESSION['role'] = $row[1];

                    if($role == 'admin' || $role = "Supervisor"){
                        header("Location:adminReport.php");
                    }
                    else if($role == 'Doctor'){
                        header("Location:DoctorHeport.php");
                    }
                    else if($role == "Patient"){
                        header("Location:patientHome.php");
                    }
                    else if($role == "Family"){
                        header("Location:familyHome.php");
                    }
                    else if ($role == 'Applicant'){
                        header("Location:login.php?error=0");
                    }
                    else {header("Location:login.php?error=1");}
                
                }
                header("Location:login.php?error=3");
    }
    echo "Operation done successfully\n";
    pg_close($db);

    }


    require "../Veiws/login.view.php";
?>