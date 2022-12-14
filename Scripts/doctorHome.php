<?php
error_reporting(0); 
session_start();
require("dbFunctions.php");
// if (!isset($_SESSION['user']) || $_SESSION['level'] != '0') {
//     header("Location:login.php?error=Please login before accessing Family");
// }

$db = dbConnect($host, $port, $dbname, $credentials);

if (!isset($_SESSION['DHcurrpatient'])) {
    $_SESSION['DHcurrpatient'] = 0;
} 

$query = pg_query($db, "SELECT * FROM patients");
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
$patients = pg_fetch_all($query);
$currpatient = $patients[$_SESSION['DHcurrpatient']];
$currid = $currpatient['patientid'];

if (isset($_POST['searchAppointments'])) {
    $where = "";
    if ($_POST['appdate'] != null) {
        $temp = $_POST['appdate'];
        $where = $where." AND apointments.date = '$temp'";
    }
    if ($_POST['pcomment'] != null) {
        $temp = $_POST['pcomment'];
        $where = $where." AND prescriptions.comment = '$temp'";
    }
    if ($_POST['time'] != null) {
        $temp = $_POST['time'];
        $where = $where." AND timetorecieve = '$temp'";
    }
    if ($_POST['med'] != null) {
        $temp = $_POST['med'];
        $where = $where." AND medicine = '$temp'";
    }
    $query = pg_query($db, "SELECT apointments.patientid, apointments.date, prescriptions.timetorecieve, prescriptions.comment, prescriptions.medicine
    FROM apointments
    LEFT JOIN prescriptions
    ON apointments.date = prescriptions.dateprescribed
    WHERE apointments.date = prescriptions.dateprescribed AND apointments.patientid = $currid$where");
    $dhreport = pg_fetch_all($query);
} else {
    $query = pg_query($db, "SELECT apointments.patientid, apointments.date, prescriptions.timetorecieve, prescriptions.comment, prescriptions.medicine
    FROM apointments
    LEFT JOIN prescriptions
    ON apointments.date = prescriptions.dateprescribed
    WHERE apointments.date = prescriptions.dateprescribed AND apointments.patientid = $currid");
    $dhreport = pg_fetch_all($query);
}

if (isset($_POST['futureAppointments'])) {
    if (isset($_POST['tilDate'])) {
        $today = date("Y-m-d");
        $future = $_POST['tilDate'];
        $id = $_SESSION['id'];
        $query = pg_query($db, "SELECT patientname, date FROM apointments
        WHERE (date BETWEEN '$today' AND '$future') AND emdid = $id");
        $appList = pg_fetch_all($query);
    } else {
        $appList = false;
    }
}

require("../Veiws/doctorHome.view.php")
?>