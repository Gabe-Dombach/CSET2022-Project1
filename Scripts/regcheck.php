<?php
    session_start();
    require("dbFunctions.php");
    if(!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['level'] != '4')){header('Location:login.php?error=Only Admins are permited to acess this page');}
    
    if(isset($_POST['submit'])){
    }
    $db = dbConnect($host, $port, $dbname, $credentials);

    if(isset($_POST['submit'])){
        $sql="select empid,fname FROM emp WHERE aproved = FALSE";
        $ret = pg_query($db,$sql);
        $rows = pg_fetch_all($ret);
        foreach($rows as $row){
        if(isset($_POST[$row['empid']])){
            if("!".$row['empid'] == trim($_POST[$row['empid']]," ")){

                $id = $row['empid'];
                $sql = "DELETE FROM emp WHERE empid = $id";
                $ret = pg_query($db, $sql);
                
                if (!$ret) {
                    echo pg_last_error($db);exit();}       

        }
        else if(trim($_POST[$row['empid']]) == $row['empid']){

            echo $row['empid'];
$id = $row['empid'];
$sql = "UPDATE emp SET aproved = TRUE WHERE empid =$id";
$ret = pg_query($db, $sql);
if (!$ret) {
    echo pg_last_error($db);
    exit();
}



        }
        else{
            echo 'error';
            exit();
        }
        }
    }}
    require("../Veiws/regcheck.view.php");
?>