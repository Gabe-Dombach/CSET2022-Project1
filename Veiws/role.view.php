<html lang="en">
<head>

<link rel="stylesheet" href="css/main-display.css" type="text/css">

</head>
<body>

<form action="../Scripts/role.php" method="POST">
<div class="row">
<p>Role     </p>  <p>     acesses level</p>
    </div>




<div class="row">
<p>New Role</p>  <input name ="roleName" type="text">
    </div>

    <div class="row">
<p>Access level</p>  
    <select name="access_level" id="" >
        <option value="0"> Level 0</option>
        <option value="1"> Level 1</option>
        <option value="2"> Level 2</option>
        <option value="3"> Level 3</option>
        <option value="4"> Level 4</option>

    </select>
    </div>

   



    <div class="row">
<input type="submit" value="Insert Role" name="submit">
</form>
<button> cancel </button>
</div>


    
</body>
</html>