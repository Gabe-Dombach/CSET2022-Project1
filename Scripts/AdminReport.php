<?php 
session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] != '4') {
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        if (isset($_SESSION['role'])) {
            unset($_SESSION['role']);
        }
    }
    header("Location:login.php?error=Administrator privlages required to acess roles!");
}

echo "<h1>USER: ".$_SESSION['user']."<br/>ROLE: ".$_SESSION['role']."<br/><h1/>";

require "../Veiws/AdminReport.view.php"
?>