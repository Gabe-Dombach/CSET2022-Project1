<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
</head>
<body>
<div class="display">


<div class="col">

    <form action="../Scripts/roster.php" method="post">
    <p> date </p><input id="date" type="date" name="date" value=<?php echo date('Y-m-d'); ?>>
    <input type="submit" value="Check_Date" name="submit" class="buttonS">
    </form>
    <div>
        <p>Supervisor</p>
        <p>
            <?php
if (isset($cg1)) {
    $sql = "SELECT fname FROM emp WHERE empid = '$Supervisor'";
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
        exit();
    }
    $rows = pg_fetch_all($ret);
    echo $rows[0]['fname'];
} else {echo "No Date Selected";}
?>
        </p>
    </div>

    <div>
        <p>Doctor</p>
        <p>
            <?php if (isset($cg1)) {
    $sql = "SELECT fname FROM emp WHERE empid = '$Doctor'";
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
        exit();
    }
    $rows = pg_fetch_all($ret);
    echo $rows[0]['fname'];
} else {echo "No Date Selected";}
?>
        </p>
    </div>

    <div>
        <p> Caregiver 1</p>
        <p>
            <?php if (isset($cg1)) {
    $sql = "SELECT fname FROM emp WHERE empid = '$cg1'";
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
        exit();
    }
    $rows = pg_fetch_all($ret);
    echo $rows[0]['fname'];
} else {echo "No Date Selected";}
?>
        </p>
    </div>

    <div>
        <p> Caregiver 2 </p>
        <p>
            <?php if (isset($cg1)) {
    $sql = "SELECT fname FROM emp WHERE empid = '$cg2'";
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
        exit();
    }
    $rows = pg_fetch_all($ret);
    echo $rows[0]['fname'];
} else {echo "No Date Selected";}
?>
        </p>
    </div>

    <div>
        <p> Caregiver 3 </p>
        <p>
            <?php if (isset($cg1)) {
    $sql = "SELECT fname FROM emp WHERE empid = '$cg3'";
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
        exit();
    }
    $rows = pg_fetch_all($ret);
    echo $rows[0]['fname'];
} else {echo "No Date Selected";}
?>
        </p>
    </div>

    <div>
        <p> Caregiver 4 </p>
        <p>
            <?php if (isset($cg1)) {
    $sql = "SELECT fname FROM emp WHERE empid = '$cg4'";
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
        exit();
    }
    $rows = pg_fetch_all($ret);
    echo $rows[0]['fname'];
} else {echo "No Date Selected";}
?>
        </p>
    </div>
    <script src="../Veiws/Resource/JS/roster.js"></script>

    </div>
   
</body>

</html>