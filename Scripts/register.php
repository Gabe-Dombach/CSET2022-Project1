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

    if($role == 'patient'){
        $code = $_POST['famCode'];
        $eCon = $_POST['eContact'];
        $eConName = $_POST['eContactName'];
        $relation = $_POST['relation'];
        $sql = "SELECT * FROM patients WHERE email = '$email'";
        $ret = pg_query($db,$sql);
        $check = pg_fetch_all($ret);

        if(!$check){
            $date = date("Y-m-d");
            $sql = "INSERT INTO patients
            (fname,lname,email,familycode,econtact,contactrelation,startdate,password)
            VALUES
            ('$fName','$lName','$email','$code','$eCon','$eConName','$relation','$date','$password')
            ON CONFLICT DO NOTHING;
            ";
            pg_query($db,$sql);
            header("Location:login.php");

        }

        else{
            header("Location:register.php?error=1");

        }
    }

    else{
        $sql = "SELECT * FROM emp WHERE email = '$email'";
        $ret = pg_query($db,$sql);
        $check = pg_fetch_all($ret);
        if(!$check){
        $sql = "INSERT INTO emp(fname,lname,email,role,salary,dob,password,phone,aproved)
        VALUES
        ('$fName','$lName','$email','$role',100000,'$DOB','$password','$phone',FALSE)
        ";
       $ret = pg_query($db, $sql);
       if(!$ret){
       echo $ret;
       }
       else{
         header("Location:login.php");
       }


        }
        else{
            header("Location:register.php?error=1");
        }
        
    }
}   
require "../Veiws/register.veiw.php"
?>