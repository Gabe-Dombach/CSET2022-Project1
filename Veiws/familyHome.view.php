<html>
    <?php require "navbar.veiw.php";?>

<body>
<div class="display">

<?php 
if (isset($_GET['error'])) {
    echo $_GET['error'];
}
?>

<form action="../Scripts/familyHome.php" method="POST">
<div class="row">
        <div>
                <p>Family Code</p>
                <input type="text" name="familyCode" id="familyCode">

                <p>Patient ID</p>
                <input type="text" name="patientId" id="patientId">
        </div>    

        <div>
                <p>Date</p>
                <input type="date" name="date" id="date" value="<?php echo $date ?>">
        </div>
</div>
<input type="submit" name="ubmit" value="ok">
</form>

<table id="reportTable" class="reportTable">
    <tr>
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
if (isset($_POST['ubmit'])) {
        echo "
        <tr>
        <td>" . $report['docName'] . "</td>
        <td>" . $report['appointment'] . "</td>
        <td>" . $report['cgName'] . "</td>
        ";
        if ($report['mornmeds'] == 't') {
            echo "<td> Recieved </td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['noonmeds'] == 't') {
            echo "<td> Recieved </td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['nightmeds'] == 't') {
            echo "<td> Recieved </td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['bfast'] == 't') {
            echo "<td> Recieved </td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['lnch'] == 't') {
            echo "<td> Recieved </td>";
        } else {
            echo "<td> Missing </td>";
        }
        if ($report['dnr'] == 't') {
            echo "<td> Recieved </td>";
        } else {
            echo "<td> Missing </td>";
        }
    }
?>
</table>

</div>

</body>

</html>