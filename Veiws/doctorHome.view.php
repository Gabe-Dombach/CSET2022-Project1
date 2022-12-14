<html>
 
<head>
<link rel="stylesheet" href="../Veiws/css/main-display.css" type="text/css">
</head>

<body>
<?php require "navbar.veiw.php";?>

<div class="display">

<form action="../Scripts/doctorHome.php" method="POST">
    <table id="searchTable" class="patientTable">
    <tr>
        <th></th>
        <th>Date</th>
        <th>Comment</th>
        <th></th>
        <th>Time to Recieve...</th>
        <th>...Medicine</th>
    </tr>
    <tr>
        <td></td>
        <td><input type="date" name="appdate" id="appdate" class="inputS1"></td>
        <td><input type="text" name="pcomment" id="pcomment" class="inputS1"></td>
        <td></td>
        <td><input type="text" name="time" id="time" class="inputS1"></td>
        <td><input type="text" name="med" id="med" class="inputS1"></td>
    </tr>
    </table>
<table id="patientTable" class="patientTable">
    <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Comment</th>
        <th>Morning Medicine</th>
        <th>Afternoon Medicine</th>
        <th>Night Medicine</th>
    </tr>
    <tr>
        <td></td>
        <td><input type="date" name="date" id="date" class="inputS1"></td>
        <td><input type="text" name="comment" id="comment" class="inputS1"></td>
        <td><input type="text" name="mornmed" id="mornmed" class="inputS1"></td>
        <td><input type="text" name="noonmed" id="noonmed" class="inputS1"></td>
        <td><input type="text" name="nightmed" id="nightmed" class="inputS1"></td>
    </tr>
<?php
if ($dhreport) {
    foreach ($dhreport as $report) {
        echo "
        <tr>
             <td>".$currpatient['lname'].", ".$currpatient['fname']."</td>
             <td>".$report['date']."</td>
             <td>".$report['comment']."</td>
             <td>";
             if ($report['timetorecieve'] = "morning") {
               echo $report['medicine']."</td>
               <td></td>
               <td></td>";
             } elseif ($report['timetorecieve'] = "afternoon") {
               echo "</td>
               <td>".$report['medicine']."</td>
               <td></td>";
             } elseif ($report['timetorecieve'] = "night") {
               echo "</td>
               <td></td>
               <td>".$report['medicine']."</td>";
             } else {
                   echo "</td>
                   <td></td>
                   <td></td>"; 
             }
   
             "</td>
        </tr>
        ";
   }
} else {
    echo "No results";
}
     
?>
</table>
<input type="submit" value="search" name="searchAppointments">
</form>

<form action="../Scripts/doctorHome.php" method="POST">
<p>Til Date:</p>
<input type="date" name="tilDate" id="tilDate" min="<?php date("Y-m-d") ?>" class="inputS1">
<input type="submit" value="search" name="futureAppointments">
</form>

<?php
if ($appList) {
    foreach ($appList as $app) {
        echo '<table id="futureAppTable" class="futureAppTable">
        <tr>
            <th>Patient Name</th>
            <th>Date</th>
        </tr>
        <tr>
             <td>'.$app['patientname']."</td>
             <td>".$app['date']."</td>
        </tr>
        ";
   }
} else {
    echo "No results";
}
?>

</div>



</body>

</html>