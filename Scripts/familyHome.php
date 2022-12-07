<?php 
session_start();
require("dbFunctions.php");
if (!isset($_SESSION['user']) || $_SESSION['level'] != '0') {
    header("Location:login.php?error=Please login before accessing Family");
}

$db = dbConnect($host, $port, $dbname, $credentials);

require("../Veiws/familyHome.view.php");
?>