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
    $date = $_POST['date'];
    $sql = "SELECT date FROM roster WHERE date = '$date'";
    $ret = pg_query($db, $sql);
    $check = pg_fetch_array($ret);
    if(!$check){
        $cg1 = $_POST['c1'];
        $cg2 = $_POST['c2'];
        $cg3 = $_POST['c3'];
        $cg4 = $_POST['c4'];
        $Supervisor = $_POST['sup'];
        $Doctor = $_POST['doc'];
        $sql = "
        INSERT INTO Roster
        VALUES
        ($Supervisor,$Doctor,$cg1,$cg2,$cg3,$cg4,'$date');
        ";
        $ret = pg_query($db, $sql);
        if(!$ret){
            echo pg_last_error($db);
            exit();
        }
        else{
            echo "Roster Inserted";
        }

    }
    else{echo "This date is already in the database";}

}

require("../Veiws/newRoster.veiw.php");
?>