<html>
 
<head>

<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">

</head>


<body>

<div class="display">

<form action="../Scripts/newRoster.php" method="POST">
<p>Date</p> <input name="date" type="date" value=<?php echo date('Y-m-d'); ?>></input>

<p>Supervisor</p>  <label for="sup"> </label>
<select name="sup" id="sup"><?php


    $sql = "SELECT fname,empid FROM emp WHERE role = 'Supervisor';";
    $ret = pg_query($db, $sql);
    $rows = pg_fetch_all($ret);
    foreach ($rows as $row) {
    echo "<option value=" . strval($row['empid']) . ">" . strval($row['fname']) . "</option>";
}


?>
</select>
  
<p>Doctor</p>  <label for="doc"> </label>
<select name="doc" id="doc"> 
<?php


$sql = "SELECT fname,empid FROM emp WHERE role = 'Doctor';";
$ret = pg_query($db, $sql);
$rows = pg_fetch_all($ret);
foreach ($rows as $row) {
    echo "<option value=" . strval($row['empid']) . ">" . strval($row['fname']) . "</option>";
}


?>

</select>

<p>Caregiver 1</p>  <label for="c1"> </label>
<select name="c1" id="c1"> 
<?php


$sql = "SELECT fname,empid FROM emp WHERE role = 'careGiver';";
$ret = pg_query($db, $sql);
$rows = pg_fetch_all($ret);
foreach ($rows as $row) {
    echo "<option value=" . strval($row['empid']) . ">" . strval($row['fname']) . "</option>";
}


?>

</select>

<p>Caregiver 2</p>  <label for="c2"> </label>
<select name="c2" id="c2">
    <?php

    

$sql = "SELECT fname,empid FROM emp WHERE role = 'careGiver';";
$ret = pg_query($db, $sql);
$rows = pg_fetch_all($ret);
foreach ($rows as $row) {
    echo "<option value=" . strval($row['empid']) . ">" . strval($row['fname']) . "</option>";
}


?>
</select>

<p>Caregiver 3</p>  <label for="c3"> </label>
<select name="c3" id="c3">
    <?php
    
        $sql = "SELECT fname,empid FROM emp WHERE role = 'careGiver';";
        $ret = pg_query($db, $sql);
        $rows = pg_fetch_all($ret);
        foreach ($rows as $row) {
            echo "<option value=" . strval($row['empid']) . ">" . strval($row['fname']) . "</option>";
        }
        
    ?>
 </select>

<p>Caregiver 4</p>  <label for="c4"> </label>
<select name="c4" id="c4">
    <?php
    
        $sql = "SELECT fname,empid FROM emp WHERE role = 'careGiver';";
        $ret = pg_query($db, $sql);
        $rows = pg_fetch_all($ret);
        foreach ($rows as $row) {
            echo "<option value=" . strval($row['empid']) . ">" . strval($row['fname']) . "</option>";
        }
        
    ?>
</select>

<div class="col">

<input type="submit" name="submit" value="Ok" class="inputS1"></input>

</div>

</form>

  
</div>
</body> 


</html>