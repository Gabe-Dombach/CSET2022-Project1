<?php 
// error_reporting(0);

session_start();
    if(!isset($_SESSION['patid'])){
        $_SESSION['patid'] = [];
    }
    else{$id = $_SESSION['patid'];}

    if(!isset($_POST['patientchecks'])){
    $_POST['patientchecks'] = "";
    }

    require("dbFunctions.php");
// !isset($_SESSION['user'])
    if ($_SESSION['level'] != '2') {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            if (isset($_SESSION['role'])) {
                unset($_SESSION['role']);
            }
        }
        header("Location:login.php?error=Caregiver privelages required to access page!");
    }
    $db = dbConnect($host, $port, $dbname, $credentials);

    $cgid = $_SESSION['empid'];
    $currDate = date("Y-m-d");
    $query = pg_query($db, "SELECT * FROM roster WHERE date = '$currDate'");
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
    $todaysRoster = pg_fetch_all($query);

    if ($todaysRoster[0]['cg1'] === $cgid) {
    $group = 1;
    } elseif ($todaysRoster[0]['cg2'] === $cgid) {
        $group = 2;
    } elseif ($todaysRoster[0]['cg3'] === $cgid) {
        $group = 3;
    } elseif ($todaysRoster[0]['cg4'] === $cgid) {
        $group = 4;
    } else {
    $group = 0;
    }
    
    $query = pg_query($db, "SELECT * FROM patients WHERE patientgroup = '$group'");
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
    $patients = pg_fetch_all($query);
    $_SESSION['CGpatients'] = $patients;

if (isset($_POST['cgSubmit'])) {
    var_dump($_POST['patientchecks']);
    foreach ($_SESSION['CGpatients'] as $patient) {
        $patientId = $patient['patientid'];
        $mornmeds = in_array($patientId . 'morningmed', $_POST['patientchecks']) ? TRUE : 'f';
        $noonmeds = in_array($patientId . 'afternoonmed', $_POST['patientchecks']) ? TRUE : 'f';
        $nightmeds = in_array($patientId . 'nightmed', $_POST['patientchecks']) ? TRUE : 'f';
        $bfast = in_array($patientId . 'breakfast', $_POST['patientchecks']) ? TRUE : 'f';
        $lnch = in_array($patientId . 'lunch', $_POST['patientchecks']) ? TRUE : 'f';
        $dnr = in_array($patientId . 'dinner', $_POST['patientchecks']) ? TRUE : 'f';
        $query = "SELECT * FROM carechecks WHERE patientid = $patientId AND date = '$currDate'";
        $result = pg_query($db, $query);
        $isCheckedQuestionMarkSymbol = pg_fetch_all($result);
        if(!$isCheckedQuestionMarkSymbol) {
            $query = "INSERT INTO carechecks
            (patientid, mornmeds, noonmeds, nightmeds, bfast, lnch, dnr, date)
            VALUES
            ($patientId, '$mornmeds', '$noonmeds', '$nightmeds', '$bfast', '$lnch', '$dnr','$currDate')";
            echo $query;
            $result = pg_query($db, $query);
        } else {
            $query = "UPDATE carechecks SET (mornmeds, noonmeds, nightmeds, bfast, lnch, dnr) = ('$mornmeds', '$noonmeds', '$nightmeds', '$bfast', '$lnch', '$dnr')
            WHERE patientid = $patientId AND date = $currDate";
        }
    }
}

require("../Veiws/caregiverHome.view.php");

?>