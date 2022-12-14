<?php 
session_start();
if (intval($_SESSION['level']) < 2){
    header("Location:login.php?error= You must be an Employee to view this page");
}
require "dbFunctions.php";
$db = dbConnect($host, $port, $dbname, $credentials);

require "../Veiws/navbar.veiw.php";
require "../Veiws/patients.view.php";
?>