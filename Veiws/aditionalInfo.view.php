<html lang="en">
<head>

<link rel="stylesheet" href="css/main-display.css" type="text/css">

</head>
<body>
    <?php require "navbar.veiw.php";?>

<form action="../Scripts/aditionalInfo.php" method="POST">
<div class="row">
<p>patient ID</p>  <input type="text" name="patientId" id="patientId" onkeyup="updateIdField()">
    </div>

    <div class="row">
<p>Group</p>  <input type="type" name="group" id="group">
    </div>

    <div class="row">
<p> Admission Date </p>  <input type="date" name="admissionDate" value="<?php echo $patient[0] ?>"id="admissionDate">
    </div>

    <div class="row">
<p>patient name</p>  <input type="text" id="patientName" readonly>
    </div>

    <div class="row">
    <input type="submit" name="submit" value="ok">

    <button onclick="clearFields()"> cancel </button>
</div>
</form> 

<script>
    let idInput = document.getElementById("patientId");
    let groupInput = document.getElementById("group");
    let patientName = document.getElementById("patientName");
    let dateInput = document.getElementById("admissionDate");
    let patients= <?php echo json_encode($patients); ?>;
    function updateIdField() {
        let currPatient = patients.filter( i => i["patientid"] == idInput.value );
        let currPatientName = ""+currPatient[0]["lname"]+", "+currPatient[0]["fname"];
        patientName.value = currPatientName;
    }
    function clearFields() {
        idInput.value = "";
        dateInput.value = "";
        patientName.value = "";
        groupInput.innerHTML = "";
    }
</script>
    
</body>
</html>