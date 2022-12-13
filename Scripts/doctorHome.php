<?php 
session_start();
require("dbFunctions.php");
// if (!isset($_SESSION['user']) || $_SESSION['level'] != '0') {
//     header("Location:login.php?error=Please login before accessing Family");
// }

$db = dbConnect($host, $port, $dbname, $credentials);

if (isset($_POST['ubmit'])) {
    if (isset($_POST['familyCode']) && isset($_POST['patientId'])) {
        $id = $_POST['patientId'];
        $query = pg_query($db, "SELECT * FROM patients WHERE patientid = $id");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        };
        $patient = pg_fetch_all($query);
         $_POST['currPatient'] = $patient[0];
        if ($_POST['familyCode'] != $patient[0]['familycode']) {
            header("Location:familyHome.php?error=Your family code is not correct for the chosen patient");
        }
    } elseif (isset($_POST['familyCode']) xor isset($_POST['patientId'])) {
        header("Location:familyHome.php?error=Please submit a family code and patient ID");
    }


    if(isset($_POST['date'])) {
        $date = $_POST['date'];
    } else {
        $date = date("Y-m-d");
    }
    $patient=$_POST['currPatient'];
        $name = $patient['lname'] . ", " . $patient['fname'];
        $group = "cg".$patient['patientgroup'];
        $query = pg_query($db, "SELECT * FROM roster WHERE date = '$date'");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        };
        $cg = pg_fetch_all($query);
        $cgID = $cg[0][$group];
        $query = pg_query($db, "SELECT fname, lname FROM emp WHERE empid = $cgID");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        };
        $ret = pg_fetch_all($query);
        $cgName = $ret[0]['lname'] . ", " . $ret[0]['fname'];
        $query = pg_query($db, "SELECT * FROM carechecks WHERE patientid = $id AND date = '$date'");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        };
        $carecheck = pg_fetch_all($query);


        $query = pg_query($db, "SELECT * FROM apointments WHERE patientid = $id AND date = '$date'");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        };
        $appointment = pg_fetch_all($query);
        if(!$appointment) {
            $docName = "";
            $appointment = "";
        } else {
            $docName = $appointment[0]['empname'];
            $appointment = true;
        }

        $report = ['name' => $name, 'docName' => $docName, 'appointment' => $appointment, 'cgName' => $cgName, 'mornmeds' => $carecheck[0]['mornmeds'], 'noonmeds' => $carecheck[0]['noonmeds'], 'nightmeds' => $carecheck[0]['nightmeds'], 'bfast' => $carecheck[0]['bfast'], 'dnr' => $carecheck[0]['dnr'], 'lnch' => $carecheck[0]['lnch']];
}

require("../Veiws/familyHome.view.php")
?>