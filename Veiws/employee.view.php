<html lang="en">
<head>

<link rel="stylesheet" href="css/main-display.css" type="text/css">

</head>
<body>

<table id="employeeTable" class="employeeTable">
    <tr>
        <th>ID</th>
        <th>Name (L, F)</th>
        <th>Role</th>
        <th>Salary</th>
    </tr>
    <?php foreach($_SESSION['emps'] as $employee){
        echo "
        <tr>
            <td>".$employee['empid']."</td>
            <td>".$employee['lname'].", ".$employee['fname']."</td>
            <td>".$employee['role']."</td>
            <td>".$employee['salary']."</td>
        </tr>
        ";
    }?>
</table>

<form action="../Scripts/employee.php" method="POST">
<p>ID</p>  <input type="text" name="idSearch" id="idSearch">
<p>First Name</p>  <input type="text" name="fnameSearch" id="fnameSearch">
<p>Last Name</p>  <input type="text" name="lnameSearch" id="lnameSearch">
<p>Role</p>  <input type="text" name="roleSearch" id="roleSearch">
<p>Salary</p>  <input type="text" name="salarySearch" id="salarySearch">
<input type="submit" name="searchSubmit" value="ok">
<button onclick="clearFields()"> cancel </button>
</form>

<form action="../Scripts/employee.php" method="POST">
<div class="row">
<p>Emp ID</p>  <input type="text" name="empId" id="empId">
    </div>

    <div class="row">
<p>New Salary</p>  <input type="number" name="salaryInput" id="salaryInput">
    </div>

    <div class="row">
    <input type="submit" name="updateSubmit" value="ok">

    <button onclick="clearFields()"> cancel </button>
</div>
</form> 

<script>
    let empInput = document.getElementById("empId");
    let salaryInput = document.getElementById("salaryInput");
    function clearFields() {
        empInput.value = "";
        salaryInput.value = "";
    }
</script>

</body>
</html>