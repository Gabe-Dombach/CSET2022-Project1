<html>
<head>

</head>
<body>
        <?php require "navbar.veiw.php";?>

<form action="../Scripts/patienthome.php" method="POST">
<div class="row">
        <div>
                <p>Patient ID</p>
                <input type="text" name="id" id="id" value="<?php $id ?>" readonly>

                <p>Patient Name</p>
                <input type="text" name="name" id="name" value="<?php echo $name ?>" readonly>
        </div>
</div>

<div class="row">
        <div>
                <p>Date</p>
                <input type="date" name="date" id="date" value="<?php echo $date ?>">
        </div>
</div>

<table id="patientTable" class="patientTable">
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
    echo "
        <tr>";
        if ($appointment == null) {
                echo "<td></td><td></td>";
        } else {
                echo "<td>".$appointment['empname']."</td>
                <td>Yes</td>";
        }
        echo "
            <td>".$carecheck[0]['mornmeds']."</td>
            <td>".$carecheck[0]['noonmeds']."</td>
            <td>".$carecheck[0]['nightmeds']."</td>
            <td>".$carecheck[0]['bfast']."</td>
            <td>".$carecheck[0]['lnch']."</td>
            <td>".$carecheck[0]['dnr']."</td>
        </tr>
        ";
?>
</table>

<input type="submit" name="ubmit" value="ok">
</form>

</body>

</html>