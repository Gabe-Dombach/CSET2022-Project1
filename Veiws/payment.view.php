<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<p> Patient ID </p> 
    <p>
        <form action="../Scripts/payment.php" METHOD="POST">
            <input type="number" name="id" value=
            <?php 
            if (!isset($_SESSION['patid'])) {
                echo"";
                }
            else{
                echo $_SESSION['patid'];}?> 
                REQUIRED>
            <input type="submit" name="submitID">
        </form>
    </p>

<p>Total Due</p>  <p><?=$payment;?></p>

<form action ="../Scripts/payment.php" method ="POST">
<p> New Payment </p> <p><input type='num' name='payment'></input></p>
<input type="submit" name="submitPayment" value =PAY></input>
</form>


<p></p>
</body>
</html>
