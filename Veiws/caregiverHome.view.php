<Html>

<head>

<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">

</head>

<body>
<?php require "navbar.veiw.php";?>

<div class="display">

<form class="login" action="../Scripts/login.php" method="POST">
    
<p> List of Patients duty today </p>
<?php foreach($patients as $patient) {
        echo "".$patient['lname'].", ".$patient['fname'];
}
?>
<form action="../Scripts/caregiverHome.php" method="POST">
        <input type="checkbox" name="patientchecks[]" value="theblorbo" style="display: none;">
        <input type="checkbox" name="patientchecks[]" value="theblorbo2" style="display: none;">
<table id="caregiverTable" class="caregiverTable">
    <tr>
        <th>Name</th>
        <th>Morning Medicine</th>
        <th>Afternoon Medicines</th>
        <th>Night Medicine</th>
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
    <?php
    if ($_SESSION['CGpatients']) {
            foreach ($_SESSION['CGpatients'] as $patient) {
                echo "
            <tr>
                <td>".$patient['lname'].", ".$patient['fname']."</td>
                <td><input type='checkbox' name='patientchecks[]' value='".$patient['patientid']."morningmed'></td>
                <td><input type='checkbox' name='patientchecks[]' value='".$patient['patientid']."afternoonmed'></td>
                <td><input type='checkbox' name='patientchecks[]' value='".$patient['patientid']."nightmed'></td>
                <td><input type='checkbox' name='patientchecks[]' value='".$patient['patientid']."breakfast'></td>
                <td><input type='checkbox' name='patientchecks[]' value='".$patient['patientid']."lunch'></td>
                <td><input type='checkbox' name='patientchecks[]' value='".$patient['patientid']."dinner'></td>
            </tr>
            ";
        }
        } else {
        echo "No patients found";
        }
    ?>
</table>

        <input type="submit" name="cgSubmit" value="ok">
        <button onclick="clearCheckboxes()"> cancel </button>
</form>


<script>
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');
    function clearCheckboxes() {
        for (let checkbox of checkboxes) {
                checkbox.checked = false;
        }
    }
</script>
</body>

</Html>