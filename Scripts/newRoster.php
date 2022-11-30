<?php 
session_start();
require("dbFunctions.php");
if(!isset($_SESSION['user']) || ($_SESSION['role'] != 'Admin' && $_SESSION['role'] != 'Supervisor')){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        if(isset($_SESSION['role'])){
            unset($_SESSION['role']);
        }
    }
    header("Location:login.php?error=Administrator privlages required to veiw this page!");
}
$db = dbConnect($host, $port, $dbname, $credentials);

if(isset($_POST['submit'])){
    
}

require("../Veiws/newRoster.veiw.php");
?>