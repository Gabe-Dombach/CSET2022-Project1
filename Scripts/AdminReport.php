<?php 
session_start();
require("dbFunctions.php");
 if (!isset($_SESSION['user']) || $_SESSION['level'] != '4') {
     if (isset($_SESSION['user'])) {
         unset($_SESSION['user']);
         if (isset($_SESSION['role'])) {
             unset($_SESSION['role']);
         }
     }
     header("Location:login.php?error=Administrator privlages required to acess roles!");
 }
$db = dbConnect($host, $port, $dbname, $credentials);

$query = pg_query($db, "SELECT * FROM patients");
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
$patients = pg_fetch_all($query);

$reports = [];

if (isset($_POST['ubmit'])) {
    if(isset($_POST['date'])) {
        $date = $_POST['date'];
    } else {
        $date = date("Y-m-d");
    }

    foreach ($patients as $patient) {
        $id = $patient['patientid'];
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

        $patientReport = ['name' => $name, 'docName' => $docName, 'appointment' => $appointment, 'cgName' => $cgName, 'mornmeds' => $carecheck[0]['mornmeds'], 'noonmeds' => $carecheck[0]['noonmeds'], 'nightmeds' => $carecheck[0]['nightmeds'], 'bfast' => $carecheck[0]['bfast'], 'dnr' => $carecheck[0]['dnr'], 'lnch' => $carecheck[0]['lnch']];
        array_push($reports, $patientReport);
    }
} else {
    $date = date("Y-m-d");

    foreach ($patients as $patient) {
        $id = $patient['patientid'];
        $name = $patient['lname'] . ", " . $patient['fname'];
        $group = "cg" . $patient['patientgroup'];
        $query = pg_query($db, "SELECT * FROM roster WHERE date = '$date'");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        }
        ;
        $cg = pg_fetch_all($query);
       
        $cgID = $cg[0][$group];
       
        $query = pg_query($db, "SELECT fname, lname FROM emp WHERE empid = $cgID");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        }
        ;
        $ret = pg_fetch_all($query);
        $cgName = $ret[0]['lname'] . ", " . $ret[0]['fname'];
        $query = pg_query($db, "SELECT * FROM carechecks WHERE patientid = $id AND date = '$date'");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        }
        ;
        $carecheck = pg_fetch_all($query);

        $query = pg_query($db, "SELECT * FROM apointments WHERE patientid = $id AND date = '$date'");
        if (!$query) {
            echo "An error occurred.\n";
            exit;
        }
        ;
        $appointment = pg_fetch_all($query);
        if (!$appointment) {
            $docName = "NA";
            $appointment = "Missing";
        } else {
            $docName = $appointment[0]['empname'];
            $appointment = true;
        }

        $patientReport = ['name' => $name, 'docName' => $docName, 'appointment' => $appointment, 'cgName' => $cgName, 'mornmeds' => $carecheck[0]['mornmeds'], 'noonmeds' => $carecheck[0]['noonmeds'], 'nightmeds' => $carecheck[0]['nightmeds'], 'bfast' => $carecheck[0]['bfast'], 'dnr' => $carecheck[0]['dnr'], 'lnch' => $carecheck[0]['lnch']];
        array_push($reports, $patientReport);
    }
}

require("../Veiws/AdminReport.view.php")
?>