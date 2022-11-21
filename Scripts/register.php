<?php 
session_start();
require "dbFunctions.php";
$db = dbConnect($host, $port, $dbname, $credentials);

if (isset($_POST['submit'])){

}

require "../Veiws/register.veiw.php"
?>