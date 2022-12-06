<style>

    ul.nav {
    margin:0;
    padding:0;
    list-style:none;
    height:36px; line-height:36px;
    background:#0d7963; /* you can change the backgorund color here. */
    font-family:Arial, Helvetica, sans-serif;
    font-size:13px;
}
ul.nav li {
    border-right:1px solid #189b80; /* you can change the border color matching to your background color */
    float:left;
}
ul.nav a {
    display:block;
    padding:0 28px;
    color:#ccece6;
    text-decoration:none;
}
ul.nav a:hover,
ul.nav li.current a {
    background:#086754;
}
</style>


<?php
if(!isset($_SESSION['level'])){
    echo '<ul class="nav">
    <li><a href="../Scripts/index.php">Home</a></li>
    <li><a href="../Scripts/familyHome.php">Family Home</a></li>
    <li><a href="../Scripts/roster.php">Staff Roster</a></li>
</ul>';

}
else{
if($_SESSION['level'] == '0'){
    echo '<ul class="nav">
    <li><a href="../Scripts/index.php">Home</a></li>
    <li><a href="../Scripts/familyHome.php">Family Home</a></li>
    <li><a href="../Scripts/roster.php">Staff Roster</a></li>
    <li><a href="../Scripts/logOut.php">Log Out</a></li>
</ul>';
}
else if($_SESSION['level'] == '1'){
    echo '<ul class="nav">
    <li><a href="../Scripts/index.php">Home</a></li>
    <li><a href="../Scripts/patientHomeHome.php">Patient Home</a></li>
    <li><a href="../Scripts/roster.php">Staff Roster</a></li>
    <li><a href="../Scripts/logOut.php">Log Out</a></li>
</ul>';
}
else if($_SESSION['level'] == '2'){
    echo '<ul class="nav">
    <li><a href="../Scripts/index.php">Home</a></li>
    <li><a href="../Scripts/patients.php">Patient\'s</a></li>
    <li><a href="../Scripts/caregiverHome.php">Caregiver\'s Home</a></li>
    <li><a href="../Scripts/roster.php">Staff Roster</a></li>
    <li><a href="../Scripts/logOut.php">Log Out</a></li>
</ul>';

}
else if($_SESSION['level'] == '3'){
    echo '<ul class="nav">
    <li><a href="../Scripts/index.php">Home</a></li>
    <li><a href="../Scripts/patients.php">Patient\'s</a></li>
    <li><a href="../Scripts/doctorHome.php">Doctor\'s Home</a></li>
    <li><a href="../Scripts/doctorPatients.php">Doctor\'s Patients</a></li>
    <li><a href="../Scripts/roster.php">Staff Roster</a></li>
    <li><a href="../Scripts/logOut.php">Log Out</a></li>
</ul>';
}
else if($_SESSION['level'] == '4'){
    echo '<ul class="nav">
    <li><a href="../Scripts/index.php">Home</a></li>
    <li><a href="../Scripts/patients.php">Patient\'s</a></li>
    <li><a href="../Scripts/adminReport.php">Admin\'s Report</a></li>
    <li><a href="../Scripts/aditionalInfo.php">Patient Aditional Info</a></li>
    <li><a href="../Scripts/DoctorsApointments.php">Doctor\'s Appointment\'s</a></li>
    <li><a href="../Scripts/role.php">Roles</a></li>
   <li><a href="../Scripts/regcheck.php">Registration Aproval</a></li>
    <li><a href="../Scripts/doctorPatients.php">Doctor\'s Patients</a></li>
    <li><a href="../Scripts/roster.php">Staff Roster</a></li>
    <li><a href="../Scripts/payment.php">Payments</a></li>

    <li><a href="../Scripts/logOut.php">Log Out</a></li>
</ul>';

}}


?>