<?php
    session_start();
    // if(!isset($_SESSION['patid'])){
    //     $_SESSION['patid'] = "";
    // }
    // else{$id = $_SESSION['patid'];}
    require("dbFunctions.php");
    // if(!isset($_SESSION['user']) || $_SESSION['role'] != 'Admin'){
    //      header("Location:login.php?error=Please login before accessing appointments");
    // }
    $db = dbConnect($host, $port, $dbname, $credentials);

    
    $patients = pg_query($db, "SELECT * FROM patients");
    if (!$patients) {
        echo "An error occurred.\n";
        exit;
    };


require("../Veiws/DoctorApointment.view.php")
?>