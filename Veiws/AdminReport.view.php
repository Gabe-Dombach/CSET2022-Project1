<html>
<head>
<link rel="stylesheet" type="text/css" href="css/navbar.css"/>

<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">

</head>

<body>
<?php require("navbar.veiw.php");?>
<div class="display">

<form action="../Scripts/AdminReport.php" method="POST">
<div class="row">
        <div>
                <p>Date</p>
                <input type="date" name="date" id="date" value="<?php echo $date ?>">
        </div>
</div>

<table id="reportTable" class="reportTable">
    <tr>
        <th>Patient's Name</th>
        <th>Doctor's Name</th>
        <th>Doctor's Appointment</th>
        <th>Caregiver's Name</th>
        <th>Morning Medicine</th>
        <th>Afternoon Medicine</th>
        <th>Night Medicine</th>
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
<?php
foreach ($reports as $report) {
    echo "
        <tr>
        <td>".$report['name']."</td>
        <td>".$report['docName']."</td>
        <td>".$report['appointment']."</td>
        <td>".$report['cgName']."</td>
        ";
        if ($report['mornmeds'] == 't'){
            echo "<td>Taken</td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['noonmeds'] == 't'){
            echo "<td>Taken</td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['nightmeds'] == 't'){
            echo "<td>Taken</td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['bfast'] == 't'){
            echo "<td>Taken</td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['lnch'] == 't'){
            echo "<td>Taken</td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['dnr'] == 't'){
            echo "<td>Taken</td>";
        } else {
            echo "<td> Missing </td>";
        }
}
?>
</table>

<input type="submit" name="ubmit" value="ok" class ="buttonS">
</form>

</div>

</body>

</html>