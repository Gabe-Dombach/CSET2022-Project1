<?php
    session_start();
    if(!isset($_SESSION['patid'])){
        $_SESSION['patid'] = false;
    }
    require("dbFunctions.php");
    if(!isset($_SESSION['user']) || $_SESSION['user'] != 'Admin'){
         header("Location:login.php?error=Please login before acsessing payments");
     }
    $patientID = 0;
    $payment = 0;
    $db = dbConnect($host, $port, $dbname, $credentials);

    if(isset($_POST['submitID'])){
        $id = intval($_POST['id']);
        $sql = "SELECT email,payments FROM patients WHERE patientid = $id";
        $ret = pg_query($db,$sql);
        if (!$ret){
            echo pg_last_error($db);
            exit();
        }
        $rows = pg_fetch_all($ret);
            $_SESSION['patid'] = $id;
            $patientID = $rows[0]['email'];
            $payment = $rows[0]['payments'];
    }
    if(isset($_POST['submitPayment'])){
        if( $_SESSION['patid'] == false){
            header("Location:payment.php?error=Please Enter a Patient ID");
        }
        $id = $_SESSION['patid'];
        $payAmount = intval($_POST['payment']);
        $sql = "UPDATE patients set 
        payments=((SELECT payments FROM patients WHERE patientid=$id)-($payAmount))
         WHERE patientid = $id";
        $ret = pg_query($db,$sql);
        if(!$ret){
            echo pg_last_error($db);
            unset($_SESSION['patid']);
            exit();
        }
        else{
            unset($_SESSION['patid']);
            echo "PAYMENT SUCCESSFULLY PROCESSED";
        }
    }

require("../Veiws/payment.view.php")
?>