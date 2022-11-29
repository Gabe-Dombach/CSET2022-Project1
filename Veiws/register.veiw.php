<html>

<head>

<link rel="stylesheet" href="css/main-display.css" type="text/css">

</head>


<body>
    <form name="form" action="../Scripts/register.php" method="POST">
<div class="col">


<div class="row">

<label for="roles"> roles</label>

<select name="roles" id="roles">
    <?php //Uses DOM to fill the selection with all current roles
        $sql = "SELECT roles FROM roles;";
        $ret = pg_query($db,$sql);
        $rows = pg_fetch_all($ret);
        foreach($rows as $row){
            echo "<option value=".$row['roles'].">".$row['roles']."</option>";
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



    </div>




<div class="col"> 
    <div class="row">
<p>Date of birth</p>  <input name='dob' type="DATE">
    </div>





    <div class="row">
<p>Family code (for paitent family member) </p>  <input name = "famCode" type="text">
    </div>

    <div class="row">
<p>Emergency contact</p>  <input name="eContact" type="tel">
    </div>
        <div class="row">
<p>Emergency contact Name</p>  <input name="eContactName" type="tel">
    </div>

    <div class="row">
<p>Relation to emergency contact</p>  <input name="relation" type="text">
    </div>

    
    <div class="row">
<input name="submit" type="submit"></input>

<button> cancel </button>
</div>

</div>   
</form>
</body>




</html>