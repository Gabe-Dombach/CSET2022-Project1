<html lang="en">
<head>
        <style>
        table, th, td {
            border:1px solid black;
            border-collapse:collapse;
            width: 20vw;
            text-align: center;
            align-items: center;
            align-content: center;

            padding:2vh;

        }
        table{
            margin:1vw;
        }
        </style>
<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
<?php require "navbar.veiw.php";?>
</head>
<body>

<div class="display">
   

<table>
    <tr>
    <th>Role</th>
    <th>Level</th>
    </tr>
    <?php 
    $sql = "SELECT * FROM roles";
    $ret = pg_query($db, $sql);
    if(!$ret){echo pg_last_error($db);exit();}
    $rows = pg_fetch_all($ret);
    foreach($rows as $row){
        echo "<tr><td>".$row['roles']."</td><td>".$row['level']."</td></tr>";
    }
    
    
    ?>
</table>
<form action="../Scripts/role.php" method="POST">
<table>


<tr><td>Role Name</td><td><input name ="roleName" type="text" class="inputS1"></td></tr>
 
<tr>
<td>Level</td>
<td>

    <select name="access_level" class="inputS1" >
        <option value="0"> Level 0</option>
        <option value="1"> Level 1</option>
        <option value="2"> Level 2</option>
        <option value="3"> Level 3</option>
        <option value="4"> Level 4</option>

    </select>
    </td>
    </tr>
    <tr>
    <td><input style="margin-right:5vw;" type="submit" value="Insert Role" name="submit" class="buttonS"></td>
    <td><input type="submit" value = "Cancel" name = "cancel" class="buttonS" ></td> 
    </tr>
</table>
</form>
</body>
</html>