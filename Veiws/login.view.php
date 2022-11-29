<html>

<head>

<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">

</head>
<body>
<div class="display" id="loginP">
    <form class="login" action="../Scripts/login.php" method="POST">
        <div class="row">
            <p>email</p>  <input type="text" name="email" id="email">
        </div>

        <div class="row">
            <p>password</p>  <input type="text" name="password" id="password">
        </div>

        <div class="row">
        <input type = submit name="submit"> ok </input>

        <input type = submit name="cancel"> cancel </input>
      
    </form>
      <h2><?php if( isset($_GET['error'])){
            echo $_GET['error'];
        }; ?></h2>

</div>
</div>




</body>
</html>
