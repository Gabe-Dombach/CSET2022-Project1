<?php 
    $host = "host = 127.0.0.1";
    $port = "port = 5432";
    $dbname = "dbname = flask_db";
    $credentials = "user = postgres password=gabe1972";
       $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
      $sql ="
               SELECT * FROM bikestock;
";
      $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }
   print_r(pg_fetch_all($ret));
}
   pg_close($db);
?>