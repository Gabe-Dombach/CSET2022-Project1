<?php
    session_start();
    $id = 0;

function dateDiffInDays($date1, $date2)
{
    $diff = strtotime($date2) - strtotime($date1);

    return abs(round($diff / 86400));
}

    if(!isset($_SESSION['patid'])){
        $_SESSION['patid'] = "";
    }
    else{$id = $_SESSION['patid'];}
    require("dbFunctions.php");
    if(!isset($_SESSION['user']) || $_SESSION['level'] != '4'){
       
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
        if( $_SESSION['patid'] == ""){
            header("Location:payment.php?error=Please Enter a Patient ID");
        }
        $id = $_SESSION['patid'];
        $payAmount = intval($_POST['payment']);
        $sql = "UPDATE patients set 
        payments=((SELECT payments FROM patients WHERE patientid=$id)-($payAmount))
         WHERE patientid = $id;";
        $ret = pg_query($db,$sql);
        if(!$ret){
            echo pg_last_error($db);
            unset($_SESSION['patid']);
            exit();
        }
        else{
            $date = date("Y-m-d");
            $sql = "UPDATE patients SET lastPayment = '$date' WHERE patientid = $id";
            $ret = pg_query($db,$sql);
            if(!$ret){echo pg_last_error($db);exit();}
            unset($_SESSION['patid']);
            echo "PAYMENT SUCCESSFULLY PROCESSED";
        }
    }
    if(isset($_POST['update'])){
        $sql = "SELECT lastPayment,payments,patientid FROM patients";
        $ret = pg_query($db,$sql);
        if(!$ret){echo pg_last_error($db);exit();}
        $rows= pg_fetch_all($ret);
        foreach($rows as $row){
            $lastPayment = $row['lastpayment'];
            echo $lastPayment;
            $lastPayment = date("Y-m-d",strtotime($row['lastpayment']));
            if($lastPayment != date("Y-m-d")){
            $id = intval($row['patientid']);
            $payments = 10 * intval(dateDiffInDays(date("Y-m-d"),$lastPayment));
            if (dateDiffInDays(date("Y-m-d"),$lastPayment > 31)){
                
                $sql = "SELECT COUNT(medicine) AS patprescript FROM prescriptions WHERE patientid =$id;
";
                $ret = pg_query($db,$sql);
                if(!$ret){echo pg_last_error($db);exit();}
                $rows = pg_fetch_all($ret);
                $payments += (50 *intval($rows[0]['patprescript']));

            }
            $sql = "UPDATE patients set 
            payments=((SELECT payments FROM patients WHERE patientid=$id)+($payments))
            WHERE patientid = $id;";
            $ret = pg_query($db,$sql);
            if(!$ret){echo pg_last_error($db);exit();}
        }}
    }

require("../Veiws/payment.view.php")
?>