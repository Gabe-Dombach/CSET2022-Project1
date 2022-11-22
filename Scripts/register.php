<?php 
session_start();
require "dbFunctions.php";
$db = dbConnect($host, $port, $dbname, $credentials);

if (isset($_POST['submit'])){
    $role = $_POST['roles'];
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $DOB = $_POST['dob'];
    if($role == 'patient'){
        $code = $_POST['famCode'];
        $eCon = $_POST['eContact'];
        $eConName = $_POST['eContactName'];
        $relation = $_POST['relation'];
    }
    if(isset($role)){
        $sql = "INSERT INTO patients
         (fname,lname,email,familycode,econtact,contactrelation,startdate,password)
        VALUES
        ($fName,$lName,$email,$code,$eCon,$eConName,$relation
        ";
    }
}   

require "../Veiws/register.veiw.php"
?>