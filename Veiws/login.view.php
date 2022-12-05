<html>

<head>

<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">

</head>
<body>
<div class="display" >
    <form class="login" action="../Scripts/login.php" method="POST">
    
    <div id="loginP">

    <div class="row">
            <p class="space2">email</p> <input type="text" name="email" id="email" class="inputS1">
    </div>

        <div class="row">
            <p class="space1">password</p>  <input type="text" name="password" id="password" class="inputS1">
        </div>

        <div class="row">
       
        <input type = submit name="submit" value="login" class="buttonS"> </input>

        <input type = submit name="cancel" value="cancel" class="buttonS"> </input>

        </div>
      
    </form>
      <h2><?php if( isset($_GET['error'])){
            echo $_GET['error'];
        }; ?></h2>

</div>





</body>
</html>
