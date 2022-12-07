<?php 
session_start();

echo "<h1>USER: ".$_SESSION['user']."<br/>ROLE: ".$_SESSION['role']."<br/><h1/>";

require "../Veiws/AdminReport.view.php"
?>