<?php
    session_start();
    require("dbFunctions.php");
    if(!isset($_SESSION['user'])){
         header("Location:login.php?error=Please login before acsessing payments");
     }
    $patientID = 0;
    $payment = 0;
    $db = dbConnect($host, $port, $dbname, $credentials);
    $curUser = $_SESSION['user'];
    $sql = "SELECT patientid,payments FROM patients WHERE email = '$curUser'";
    $ret = pg_query($db,$sql);
    if (!$ret){
        echo pg_last_error($db);
        exit();
    }
    $rows = pg_fetch_all($ret);
    print_r($rows);
  
        $patientID = $rows[0]['patientid'];
        $payment = $rows[0]['payments'];


require("../Veiws/payment.view.php")
?>