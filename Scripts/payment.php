<?php
    session_start();
    $id = 0;


function dateDiffInDays($date1, $date2)
{
    $diff = strtotime($date2) - strtotime($date1);//function to find the difference between the last payment date and the current date
    return abs(round($diff / 86400));
}

    if(!isset($_SESSION['patid'])){
        $_SESSION['patid'] = "";
    } //makes sure the necessary variables are initialized into session storage
    else{$id = $_SESSION['patid'];}
    require("dbFunctions.php");


    if(!isset($_SESSION['user']) || ($_SESSION['level'] != '4' || $_SESSION['role'] != 'Admin')){ // verify that a user is signed in and that they are an admin
        session_destroy();
        header("Location:login.php?error=Please login before acsessing payments");//redirect to the login page and log out if not an admin
        }
    $patientID = 0;
    $payment = 0;
    $db = dbConnect($host, $port, $dbname, $credentials);//connect to the database using credentials stored in dbFunctions.php

    if(isset($_POST['submitID'])){
        $id = intval($_POST['id']);
        $sql = "SELECT email,payments FROM patients WHERE patientid = $id"; // SQL to fetch patient information for payment processing
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
        if( $_SESSION['patid'] == ""){ // check to make sure a patient is selected to process a payment
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
            unset($_SESSION['patid']); // show error message on webpage and halt php execution if an error occurs in the SQL
            exit();
        }


        else{
            $date = date("Y-m-d");
            $sql = "UPDATE patients SET lastPayment = '$date' WHERE patientid = $id";
            $ret = pg_query($db,$sql);
            if(!$ret){echo pg_last_error($db);exit();}
            unset($_SESSION['patid']);
            echo "PAYMENT SUCCESSFULLY PROCESSED";
        }}


    if(isset($_POST['update'])){
        $sql = "SELECT lastPayment,payments,patientid FROM patients";
        $ret = pg_query($db,$sql);
        if(!$ret){echo pg_last_error($db);exit();}
        $rows= pg_fetch_all($ret);
        foreach($rows as $row){ // iterate through each patient from the patients table
            $lastPayment = $row['lastpayment'];
            $lastPayment = date("Y-m-d",strtotime($row['lastpayment']));

            if($lastPayment != date("Y-m-d")){
            $id = intval($row['patientid']);
            $payments = 10 * intval(dateDiffInDays(date("Y-m-d"),$lastPayment));

            if (dateDiffInDays(date("Y-m-d"),$lastPayment > 31)){ // if more than 31 days have past charge for medications
                
                $sql = "SELECT COUNT(medicine) AS patprescript FROM prescriptions WHERE patientid =$id;
";
                $ret = pg_query($db,$sql);
                if(!$ret){echo pg_last_error($db);exit();}
                $rows = pg_fetch_all($ret);
                $payments += (50 *intval($rows[0]['patprescript']));

            }
            $sql = "UPDATE patients set 
            payments=((SELECT payments FROM patients WHERE patientid=$id)+($payments)) WHERE patientid = $id;"; //sql query to update the patient with new data
            $ret = pg_query($db,$sql);
            if(!$ret){echo pg_last_error($db);exit();}
        }}
    }

require("../Veiws/payment.view.php")
?>