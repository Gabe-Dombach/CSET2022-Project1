<?php 
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
    $sql = "SELECT * FROM patients WHERE email = '$email';";
    $ret = pg_query($db, $sql);
    $check = pg_fetch_all($ret);
    $sql = "SELECT * FROM emp WHERE email = '$email';";
    $ret = pg_query($db, $sql);
    $check2 = pg_query($db,$sql);
    if(!$check && !$check2){

    if($role == 'Patient'){
        $code = $_POST['famCode'];
        $eCon = $_POST['eContact'];
        $eConName = $_POST['eContactName'];
        $relation = $_POST['relation'];
            $date = date("Y-m-d");
            $sql = "INSERT INTO patients
            (fname,lname,email,familycode,payments,econtact,econtactname,contactrelation,startdate,password)
            VALUES
            ('$fName','$lName','$email','$code',0,'$eCon','$eConName','$relation','$date','$password');
            ";

            $ret = pg_query($db, $sql);
            if (!$ret) {
                echo $ret;
            } else {
                header("Location:login.php");
            }
        }

        else{
            header("Location:register.php?error=1");

        }
    
    if(isset($role)){
        $sql = "SELECT * FROM patients WHERE email = $email";
        $ret = pg_query($db,$sql);
        $check = pg_fetch_all($ret);
        if(!$check){
            $date = date("Y-m-d");
        $sql = "INSERT INTO patients
         (fname,lname,email,familycode,econtact,contactrelation,startdate,password)
        VALUES
        ($fName,$lName,$email,$code,$eCon,$eConName,$relation,$date,$password)
        ON CONFLICT DO NOTHING;
        ";
        }
    }
}   
else{
    echo"User Already Exists";
}}

        

        
require "../Veiws/register.veiw.php"
?>