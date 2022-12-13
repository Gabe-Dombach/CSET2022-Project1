<?php 
session_start();
require "dbFunctions.php";
$db = dbConnect($host, $port, $dbname, $credentials);

if (!isset($_SESSION['user']) || $_SESSION['level'] != '4') {
    session_destroy();
    header("Location:login.php?error=Administrator privlages required to acess roles!");
}

if(isset($_POST['submit'])){
    $role = $_POST['roleName'];
    $level = intval($_POST['access_level']);
    $sql = "SELECT * FROM roles WHERE roles = '$role';";
    $ret = pg_query($db, $sql);
    $check = pg_fetch_all($ret);
    if(!$check){

    $sql = "INSERT INTO roles
            VALUES
            ('$role',$level);";

    $ret = pg_query($db, $sql);
    if(!$ret){
        echo pg_last_error($db);
        exit();
    }
    echo "Role: $role added successfully";
}
else{
    echo "Error: Role: $role already exists";
}
}
require("../Veiws/role.view.php");
?>