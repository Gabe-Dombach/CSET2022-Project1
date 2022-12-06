<html lang="en">
<head>
    <?php require "navbar.veiw.php";?>

<link rel="stylesheet" href="css/main-display.css" type="text/css">

</head>
<body>

<form action="../Scripts/DoctorsApointments.php" method="POST">
<div class="row">

<p>patient ID</p>  <input type="text" name="patientId" id="patientId" onkeyup="updateIdField()"> 
    </div>

    <div class="row">
<p>Date</p>  <input type="date" name="dateInput"  id="dateInput" value="<?=date("Y-m-d")?>">" onchange="changed()"">
    </div>

    <div class="row">
<p> Doctor </p>  <select name="doctors" id="doctors">
 
 <option value="_"></option>
    <?php foreach($_SESSION['docs'] as $doctor){
        echo "<option value=".$doctor['empname'].">".$doctor['empname']."</option>";
    }?>
  

</select>
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
    let dateInput = document.getElementById("dateInput");
    let patientName = document.getElementById("patientName");

  let doctorsList = document.getElementById("doctors");
    let patients= <?php echo json_encode($patients); ?>;

    console.log(idInput.value)
    console.log(dateInput.value)
    console.log(doctorsList.innerHTML)
    
    function updateIdField() {
    
     let currPatient = patients.filter( i => i["patientid"] == idInput.value );
        console.log(currPatient)
        let currPatientName = ""+currPatient[0]["lname"]+", "+currPatient[0]["fname"];
        patientName.value = currPatientName;
        
    }
     function clearFields() {
        idInput.value = "";
        dateInput.value = "";
        patientName.value = "";
        doctorsList.innerHTML = "";
    }

</script>
    
</body>
</html>