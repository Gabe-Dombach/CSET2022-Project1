<html lang="en">
<head>

<link rel="stylesheet" href="css/main-display.css" type="text/css">

</head>
<body>


<div class="row">
<p>patient ID</p>  <input type="text" id="patientId" onkeyup="updateIdField()">
    </div>

    <div class="row">
<p>Date</p>  <input type="date" id="dateInput" value="<?=date("Y-m-d")?>">
    </div>

    <div class="row">
<p> Doctor </p>  <select name="cars" id="cars">
  
</select>
    </div>

    <div class="row">
<p>patient name</p>  <input type="text" id="patientName" readonly>
    </div>

    <div class="row">
<button> ok </button>

<button> cancel </button>
</div>

<script>
    let idInput = document.getElementById("patientId");
    let dateInput = document.getElementById("dateInput");
    let patientName = document.getElementById("patientName");
    function updateIdField() {
        var patients= <?php echo json_encode($patients); ?>;
        console.log(patients)
        var currPatient = patients.find(({ 0: n }) => n === idInput.value);
        var currPatientName = ""+currPatient[2]+", "+currPatient[1];
        patientName.value = currPatientName;
    }
</script>
    
</body>
</html>