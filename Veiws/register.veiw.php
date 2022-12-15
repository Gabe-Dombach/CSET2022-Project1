<html>

<head>

<link rel="stylesheet"  type="text/css" href="../Veiws/css/main-display.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>


<body>
<?php require "navbar.veiw.php";?>

<div class="display" >
    <form name="form" action="../Scripts/register.php" method="POST">
    <table>
        <tr>
            <td>Roles</td>
            <td>
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
            </td>
        </tr>
        <tr>
            <td>
                First Name
            </td>
            <td>
                <input name="firstName" type="text" class="inputS1">                 
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input name="lastName" type="text" class="inputS1"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input name="email" type="email" class="inputS1"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input name="phone" type="tel" class="inputS1"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input name="password" type="text" class="inputS1"></td>
        </tr>
        <tr class="patientOnly">
            <td class="patientOnly">Family code (for paitent family member) </td>
            <td class="patientOnly"><input class="patientOnly" name = "famCode" type="text"></td>
        </tr>
        <tr class="patientOnly">
            <td class="patientOnly">Emergency contact</td>  
            <td class="patientOnly"><input class="patientOnly" name="eContact" type="tel"></td>
        </tr>
        <tr class="patientOnly">
            <td class="patientOnly">Emergency contact Name</td>  
            <td class="patientOnly"><input class="patientOnly" name="eContactName" type="tel"></td>
        </tr>
        <tr class="patientOnly">
            <td class="patientOnly">Relation to emergency contact</td> 
            <td class="patientOnly"> <input class="patientOnly" name="relation" type="text"></td>
        </tr>
        <tr class="patientOnly">
            <td class="patientOnly">DOB</td>
            <td class="patientOnly"> <input name='dob' type="date"></td>
        </tr>
        <tr>
        <td><input name="submit" type="submit" ></td>

        <td><button> cancel </button></td>
        </tr>



    </table>





</div>


    <div class="row">

    </div>
    <div class="row">

    </div>


</form>

<script>
    $(document).ready(function () {


});
$('#roles').change(function () {
    let role = $(this).children('option').filter(':selected').text();
    if (role == 'Patient') {
        console.log('block');
        $('.patientOnly').css({ display: 'block' });
    } else {
        console.log('inblock');

        $('.patientOnly').css({ display: 'None' });

    }
});
</script>
</body>




</html>





<?php

#page is not done big ass space in middle ask gabe or jaben about jquery since its still not working

?>