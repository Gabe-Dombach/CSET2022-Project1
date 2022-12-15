<html lang="en">
<head>

<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">

</head>
<body>
    <?php require "navbar.veiw.php";?>

<div class="display">

<form action="../Scripts/aditionalInfo.php" method="POST">
<div class="row">
<p class="space1">patient ID</p>  <input type="text" name="patientId" id="patientId" onkeyup="updateIdField()" class="inputS1">
    </div>

    <div class="row">
<p class="space2">Group</p>  <input type="type" name="group" id="group" class="inputS1">
    </div>

    <div class="row">
<p class="space1"> Admission Date </p>  <input type="date" name="admissionDate"  id="admissionDate" class="inputS1">
    </div>

    <div class="row">
<p class="space1">patient name</p>  <input type="text" class="inputS1" id="patientName" readonly>
    </div>

    <div class="row">
    <input type="submit" name="submit" value="ok" class="buttonS">

    <button onclick="clearFields()" class="buttonS"> cancel </button>
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
    
</div>
</body>
</html>