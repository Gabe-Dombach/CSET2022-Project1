<?php

session_start();
    if(!isset($_SESSION['patid'])){
        $_SESSION['patid'] = "";
    }
    else{$id = $_SESSION['patid'];}

    require("dbFunctions.php");
    if (!isset($_SESSION['user']) || $_SESSION['level'] != '4') {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            if (isset($_SESSION['role'])) {
                unset($_SESSION['role']);
            }
        }
        header("Location:login.php?error=Administrator privelages required to acess roles!");
    }
    $db = dbConnect($host, $port, $dbname, $credentials);

    
    $patientquery = pg_query($db, "SELECT * FROM patients");
    if (!$patientquery) {
        echo "An error occurred.\n";
        exit;
    };
    $patients = pg_fetch_all($patientquery);

if (isset($_POST['submit'])) {
        global $db;
        // Trim doctors/apointments array based on patient id and date
        $patientId = $_POST['patientId'];
        $currdate = $_POST['dateInput'];
        $doctorquery = pg_query($db, "SELECT empname FROM apointments WHERE patientid = $patientId AND date = '$currdate'");
        if (!$doctorquery) {
            echo "An error occurred.\n";
            exit;
        };
    $_SESSION['docs'] = pg_fetch_all($doctorquery);
}



require("../Veiws/DoctorsApointments.view.php")

?>