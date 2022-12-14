<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
        table, th, td {
            border:1px solid black;
            border-collapse:collapse;
            width: 20vw;
            text-align: center;
            align-items: center;
            align-content: center;

            padding:2vh;

        }
        table{
            margin:1vw;
        }
        </style>
    <link rel="stylesheet" type="text/css" href="../Veiws/css/main-display.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Emergency Contact</th>
            <th>Emergency Contact Name</th>
            <th>Addmission Date</th>
        </tr>
        <?php 
         $sql = "SELECT * FROM patients";
         $ret = pg_query($db,$sql);
         if(!$ret){echo pg_last_error($db);exit();}
         $rows = pg_fetch_all($ret);
         foreach($rows as $row){
            $currdate = strtotime(date("Y-m-d"));
            $diff = abs($currdate - strtotime(date("Y-m-d",strtotime($row['dob']))));

            $years = floor($diff / (365 * 60 * 60 * 24));

            echo"<tr><td>".$row['patientid']."</td><td>".$row['lname']." ".$row['fname']."</td><td>".$years."</td><td>".$row['econtact']."</td><td>".$row['econtactname']."</td><td>".$row['startdate']."</td></tr>";
         }

        ?>
    </table>
</body>
</html>