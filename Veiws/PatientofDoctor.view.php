<html>

<head>
<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
</head>

<body>
        <?php require "navbar.veiw.php";?>

<form action="../Scripts/PatientofDoctor.php" method="POST">
        <p>Patient ID</p>  <input type="text" name="patientId" id="patientId">
        <input type="submit" name="idSubmit" value="ok">
        <button onclick="clearIdField()"> cancel </button>
</form>
        
<?php 
if (isset($_POST['idSubmit'])) {
        echo '
        <table id="perscriptionTable" class="perscriptionTable">
        <tr>
            <th>Medicine</th>
            <th>Date (YYYY-MM-DD)</th>
            <th>Comment</th>
            <th>Morning, Afternoon, or Night</th>
        </tr>';
        if ($_SESSION['prescriptions']) {
            foreach ($_SESSION['prescriptions'] as $prescription) {
                echo "
            <tr>
                <td>".$prescription['medicine']."</td>
                <td>".$prescription['dateprescribed']."</td>
                <td>".$prescription['timetorecieve']."</td>
                <td>".$prescription['comment']."</td>
            </tr>
            ";
        }
        } else {
        echo "No prescriptions found";
        }
        
        echo '</table>';

        if ($appointmentToday) {
            echo '
                <p> New Prescription </p>
                <form action="../Scripts/PatientofDoctor.php" method="POST">
                <p>Medicine</p> <Input type="text" name="medicineInput" id="medicineInput"></Input>
                <select name="timetorecieveInput" id="timetorecieveInput">
                    <option value="morning">Morning</option>
                    <option value="afternoon">Afternoon</option>
                    <option value="night">Night</option>
                </select>
                <p>Comment</p> <Input type="text" name="commentInput" id="commentInput"></Input>
                        <input type="submit" name="prescriptionSubmit" value="ok">
                        <button onclick="clearPrescriptionField()"> cancel </button>
                </form>
                ';
        }


        }
        
?>

<script>
    let patientIdInput = document.getElementById("patientId");
    function clearIdField() {
        patientIdInput.value = "";
    }

    let commentInput = document.getElementById("commentInput");
    let morningInput = document.getElementById("morningInput");
    let afternoonInput = document.getElementById("afternoonInput");
    let nightInput = document.getElementById("nightInput");
    function clearPrescriptionFields() {
        commentInput.value = "";
        morningInput.value = "";
        afternoonInput.value = "";
        nightInput.value = "";
    }
</script>

</body>

</html>