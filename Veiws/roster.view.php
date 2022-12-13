<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
    <style>
        table, th, td {
            border:1px solid black;
            border-collapse:collapse;
            width: 50vw;

            padding:2vh;
            text-align:center;

        }
        table{
            margin:5vw;
        }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
</head>
<body>
<?php require "navbar.veiw.php";?>

<div class="display">


<div class="col">
   

    <form action="../Scripts/roster.php" method="post">
    <p> date </p><input id="date" type="date" name="date" value=<?php echo date('Y-m-d'); ?>>
    <input type="submit" value="Check_Date" name="submit" class="buttonS">
    </form>
    <div>
        <table>
            <tr>
                <th>Supervisor</th>
                <th>Doctor</th>
                <th>Caregiver 1</th>
                <th>Caregiver 2</th>
                <th>Caregiver 3</th>
                <th>Caregiver 4</th>
            </tr>
            <tr>
                <td>
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
                        } 
                        else {echo "";}
                    ?>
        </td>
            <td>
                <?php 
                    if (isset($cg1)) {
                        $sql = "SELECT fname FROM emp WHERE empid = '$Doctor'";
                        $ret = pg_query($db, $sql);
                        if (!$ret) {
                            echo pg_last_error($db);
                            exit();
                        }
                        $rows = pg_fetch_all($ret);
                        echo $rows[0]['fname'];
                } else {echo "";}
                ?>
            </td>
        <td>
            <?php 
                if (isset($cg1)) {
                    $sql = "SELECT fname FROM emp WHERE empid = '$cg1'";
                    $ret = pg_query($db, $sql);
                    if (!$ret) {
                        echo pg_last_error($db);
                        exit();
                    }
                    $rows = pg_fetch_all($ret);
                    echo $rows[0]['fname'];
                } 
                else 
                    {echo "";}
            ?>
        </td>

        <td>
            <?php 
                if (isset($cg1)) {       
                    $sql = "SELECT fname FROM emp WHERE empid = '$cg2'";
                    $ret = pg_query($db, $sql);
                    if (!$ret) {echo pg_last_error($db);exit();}
                    $rows = pg_fetch_all($ret);
                    echo $rows[0]['fname'];
                } 
                else {echo "";}
            ?>
        </td>

         <td>
            <?php 
                if (isset($cg1)) {
                    $sql = "SELECT fname FROM emp WHERE empid = '$cg3'";
                    $ret = pg_query($db, $sql);
                    if (!$ret) {echo pg_last_error($db);exit();}
                    $rows = pg_fetch_all($ret);
                    echo $rows[0]['fname'];
                }               
                else {echo "";}
                ?>
        </td>

        <td>
            <?php 
                if (isset($cg1)) {
                    $sql = "SELECT fname FROM emp WHERE empid = '$cg4'";
                    $ret = pg_query($db, $sql);
                    if (!$ret) {echo pg_last_error($db);exit();}
                    $rows = pg_fetch_all($ret);
                    echo $rows[0]['fname'];
                }
                else {echo "";}
            ?>
        </td>
            </tr>
        </table>

        <?php if(isset($_GET['error'])){echo $_GET['error'];}
                else{echo '';} ?>
    </div>
    <script src="../Veiws/Resource/JS/roster.js"></script>

    </div>
   
</body>

</html>