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
        header("Location:login.php?error=Administrator privelages required to access aditionalInfo!");
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
    $patientId = $_POST['patientId'];
    //check for value of date
    //update value of date if exists
    if (!empty($_POST['admissionDate'])) {
        $date = $_POST['admissionDate'];
        if (isset($_POST['group'])) {
            $group = $_POST['group'];
            $query="UPDATE patients
            SET (patientgroup, startdate) = 
            ('$group','$date')
            WHERE patientid= '$patientId'";
            $result = pg_query($db, $query);
            if (!$result) {
                echo "An error occurred.\n";
                exit;
            };
        } else {
            $query="UPDATE patients
            SET (startdate) = 
            ('$date')
            WHERE patientid= '$patientId'";
            $result = pg_query($db, $query);
            if (!$result) {
                echo "An error occurred.\n";
                exit;
            };
        }
        
    }
}



require("../Veiws/aditionalInfo.view.php")
?>