<?php 
session_start();


require("dbFunctions.php");
$db = dbConnect($host, $port, $dbname, $credentials);
if (isset($_POST['submit'])){
    $date = $_POST['date'];
    $sql = "SELECT * FROM roster WHERE date = '$date';";
    $ret = pg_query($db, $sql);
    if(!$ret){

    }
    $rows = pg_fetch_all($ret);
    if($rows){

    $cg1 = $rows[0]['cg1'];
    $cg2 = $rows[0]['cg2'];
    $cg3 = $rows[0]['cg3'];
    $cg4 = $rows[0]['cg4'];
    $Supervisor = $rows[0]['supervisor'];
    $Doctor = $rows[0]['doctor'];
    }
    else{header("Location:roster.php?error=No Schedule posted for selected day !!");}
}

require("../Veiws/roster.view.php")
?>