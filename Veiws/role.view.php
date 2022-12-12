<html lang="en">
<head>

<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">

</head>
<body>

<div class="display">

<form action="../Scripts/role.php" method="POST">
<div class="row">
<p>Role access level</p>
    </div>




<div class="row">
<p class="space2">New Role</p>  <input name ="roleName" type="text" class="inputS1">
    </div>

    <div class="row">
<p class="space1">Access level</p>  
    <select name="access_level" class="inputS1" >
        <option value="0"> Level 0</option>
        <option value="1"> Level 1</option>
        <option value="2"> Level 2</option>
        <option value="3"> Level 3</option>
        <option value="4"> Level 4</option>

    </select>
    </div>

   



    <div class="row">
<input type="submit" value="Insert Role" name="submit" class="buttonS">
<button class="buttonS"> cancel </button>
</div>
</form>

</div>


   

</body>
</html>