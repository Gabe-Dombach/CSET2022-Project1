<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{ margin: 0; padding: 0;box-sizing: border-box;
        }
        .display{
            display: flex;
            justify-content: center;
        }
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
    <title>registration Check</title>
</head>
<body>
    <?php require "navbar.veiw.php";?>

<div class="display">

    <form action="../Scripts/regcheck.php" method="POST">
        <table>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Yes</th>
                <th>No</th>
            </tr>
            <?php 
            $sql = "SELECT fname,lname,role,empid FROM emp WHERE aproved = FALSE";
            $ret = pg_query($db,$sql);
            if(!$ret){
                return pg_last_error($db);
                exit();
            }
            $rows = pg_fetch_all($ret);
            if($rows){
            foreach($rows as $row){
                echo "<tr><td>".$row['fname']." ".$row['lname']. "</td><td>".$row['role']."</td><td><input type=radio name=".$row['empid']." value=".$row['empid']."></input></td><td><input type=radio name=".$row['empid']." value=!".$row['empid']."></input></td></tr>";
            }}
            else{echo"<h3>NO USERS TO VERIFY</h3>";}
            
            ?>
        </table>
        <input type="submit" name="submit" value="Submit Users">

        

    </form>

    </div>
</body>
</html>