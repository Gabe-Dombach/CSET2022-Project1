<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration Check</title>
    <link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
</head>
<body>

<div class="display">

    <form action="../Scripts/regcheck.php" method="POST">
        <ul>
            <?php 
            


            

            $sql = "SELECT fname,lname,role,empid FROM emp WHERE aproved = FALSE";
            $ret = pg_query($db,$sql);
            if(!$ret){
                return pg_last_error($db);
                exit();
            }
            $rows = pg_fetch_all($ret);
            foreach($rows as $row){
                echo "<li>".$row['fname']." ".$row['lname']. "Role:".$row['role']."<input type=checkbox name=".$row['empid']." value=".$row['empid']."</input><input type=checkbox name=!".$row['empid']." value=".$row['empid']."</input></li>";
            }

            
            
            ?>
        </ul>


        <input type="submit" name="submit" value="Aprove">

        

    </form>

    </div>
</body>
</html>