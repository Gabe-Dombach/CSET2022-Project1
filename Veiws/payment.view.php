<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
</head>
<body>
    <?php require "navbar.veiw.php";?>

<div class="display">

<div class="col">

<p> Patient ID </p> 
        <form action="../Scripts/payment.php" METHOD="POST">
            <input type="number" name="id" value=
            <?php 
            /*
            if (!isset($_SESSION['patid'])) {
                echo"";
                }
            else{
                echo $_SESSION['patid'];}
                */
                ?> 
                REQUIRED>
        </form>
        <form action="../Scripts/payment.php" METHOD="POST">
            <input type='submit' name = "update" value="update" class="inputS1">
        </form>
        <form action="../Scripts/payment.php" METHOD="POST">
            <input type='submit' name = "update" value="update">
        </form>
    </p>

<p>Total Due</p>  <p><?php /*  =$payment;  */?></p>

<form action ="../Scripts/payment.php" method ="POST">
<p> New Payment </p> <p><input type='num' name='payment'></input></p>

<input type="submit" name="submitPayment" value =PAY class="inputS1" style="margin-left:35%"></input>

</form>

</div>


<p></p>
</body>
</html>
