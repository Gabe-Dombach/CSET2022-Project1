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
        <form action="../Scripts/payment.php">
            <input type="number" name="id">
            <input type="submit" name
        </form>
    </p>

<p>Total Due</p>  <p><?php print($payment);?></p>

<form action ="../Scripts/payment.php" method ="POST">
<p> New Payment </p> <p><input type='num' name='payment'></input></p>

<input type="submit" name="submitPayment" value =PAY></input>


</form>


<p></p>
</body>
</html>
