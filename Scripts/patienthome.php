<?php 
// error_reporting(0);

session_start();
    if(!isset($_SESSION['id'])){
        $_SESSION['id'] = "";
    }
    $id = $_SESSION['id'];

    require("dbFunctions.php");

    // if (!isset($_SESSION['user']) || $_SESSION['level'] != '1') {
    //     if (isset($_SESSION['user'])) {
    //         unset($_SESSION['user']);
    //         if (isset($_SESSION['role'])) {
    //             unset($_SESSION['role']);
    //         }
    //     }
    //     header("Location:login.php?error=Patient privelages required to access pageS!");
    // }
    $db = dbConnect($host, $port, $dbname, $credentials);
if (isset($_POST['ubmit'])) {
    if(isset($_POST['date'])) {
        $date = $_POST['date'];
    } else {
        $date = date("Y-m-d");
    }
    $query = pg_query($db, "SELECT * FROM patients WHERE patientid = $id");
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
    $patient = pg_fetch_all($query);
    $name = $patient['lname'] . ", " . $patient['fname'];
    $group = "cg".$patient['group'];

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
        $appointment = null;
    };
} else {
    $date = date("Y-m-d");

    $query = pg_query($db, "SELECT * FROM patients WHERE patientid = $id");
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
    $patient = pg_fetch_all($query);
    $name = $patient[0]['lname'] . ", " . $patient[0]['fname'];
    $group = "cg".$patient[0]['patientgroup'];

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
        $appointment = null;
    };
}

require("../Veiws/patienthome.view.php")

?>