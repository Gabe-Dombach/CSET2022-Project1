<?php
session_start();
require "dbFunctions.php";
dbStart((dbConnect($host, $port, $dbname, $credentials)));

require "../Veiws/index.view.php"
?>