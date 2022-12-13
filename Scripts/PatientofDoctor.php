<?php 
error_reporting(0);

session_start();
    if(!isset($_SESSION['patid'])){
        $_SESSION['patid'] = "";
    }
    else{$id = $_SESSION['patid'];}

    require("dbFunctions.php");

    if (!isset($_SESSION['user']) || $_SESSION['level'] != '3') {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            if (isset($_SESSION['role'])) {
                unset($_SESSION['role']);
            }
        }
        header("Location:login.php?error=Doctor privelages required to acess roles!");
    }
    $db = dbConnect($host, $port, $dbname, $credentials);

if (isset($_POST['idSubmit'])) {
    global $db;
    if (!isset($_POST['prescriptionSubmit'])) {
        $patientId = $_POST['patientId'];
        $_SESSION['PoDpatientId'] = $patientId;
    }
    $query = pg_query($db, "SELECT * FROM prescriptions WHERE patientid = $patientId");
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
    $result = pg_fetch_all($query);
    $_SESSION['prescriptions'] = $result;
        
    // Checking if appointment today
    $currDate = date("Y-m-d");
    $appointmentToday = false;
    $query = pg_query($db, "SELECT * FROM apointments WHERE patientid = $patientId AND date = '$currDate'");
    
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
    $result = pg_fetch_all($query);
    if (!$result) {
        $appointmentToday = true;
    }
}

if (isset($_POST['prescriptionSubmit'])) {
    $patientId = $_SESSION['PoDpatientId'];
    $empid = $_SESSION['empid'];
    $medicine = $_POST['medicineInput'];
    $timetorecieve = $_POST['timetorecieveInput'];
    $date = date("Y-m-d");
    $comment = $_POST['commentInput'];
    // echo $patientId . $empid . $medicine . $timetorecieve . $date . $comment;
    echo "INSERT INTO prescriptions
    (empid,patientid,medicine,timetorecieve,dateprescribed,comment)
    VALUES
    ($empid,$patientId,'$medicine','$timetorecieve','$date','$comment')";
    $query = pg_query($db, "INSERT INTO prescriptions
    (empid,patientid,medicine,timetorecieve,dateprescribed,comment)
    VALUES
    ($empid,$patientId,'$medicine','$timetorecieve','$date','$comment')");
}



require("../Veiws/PatientofDoctor.view.php")

?>