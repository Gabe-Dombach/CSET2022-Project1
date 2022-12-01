<html>

<head>

<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>


<body>
    <form name="form" action="../Scripts/register.php" method="POST">
<div class="col">


<div class="row">

<label for="roles"> roles</label>

<select id="roles" name="roles" id="roles">
    <?php //Uses DOM to fill the selection with all current roles
        $sql = "SELECT roles FROM roles;";
        $ret = pg_query($db,$sql);
        $rows = pg_fetch_all($ret);
        foreach($rows as $row){
            echo "<option value=".strval($row['roles']).">".strval($row['roles'])."</option>";
        }
    ?>
</select>

</div>

<div class="row">
<p>First Name</p>  <input name="firstName" type="text">
    </div>

    <div class="row">
<p>Last Name</p>  <input name="lastName" type="text">
    </div>

    <div class="row">
<p>Email ID</p>  <input name="email" type="email">
    </div>

    <div class="row">
<p>Phone</p>  <input name="phone" type="tel">
    </div>

    <div class="row">
<p>Password</p>  <input name="password" type="text">
    </div>
    <div class="row">
<p>DOB</p>  <input name='dob' type="date">
    </div>


    </div>




<div class="col"> 

    <div class="row">
<p class="patientOnly">Family code (for paitent family member) </p>  <input class="patientOnly" name = "famCode" type="text">
    </div>

    <div class="row">
<p class="patientOnly">Emergency contact</p>  <input class="patientOnly" name="eContact" type="tel">
    </div>
        <div class="row">
<p class="patientOnly">Emergency contact Name</p>  <input class="patientOnly" name="eContactName" type="tel">
    </div>

    <div class="row">
<p class="patientOnly">Relation to emergency contact</p>  <input class="patientOnly" name="relation" type="text">
    </div>

    
    <div class="row">
<input name="submit" type="submit"></input>

<button> cancel </button>
</div>

</div>   
</form>

<script src="../Veiws/Resource/JS/register.js"></script>
</body>




</html>