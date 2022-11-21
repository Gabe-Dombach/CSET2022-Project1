<?php 
    $host = "host = 127.0.0.1";
    $port = "port = 5432";
    $dbname = "dbname = ElderCareSystem";
    $credentials = "user = postgres password=gabe1972";
    function dbConnect($host, $port, $dbname, $credentials){
        return pg_connect("$host $port $dbname $credentials"); #Connect to the database using user input credentials
    }
    function dbStart($db){ #Create the tables in database if they dont already exist
        
        $sql = " 
        CREATE TABLE IF NOT EXISTS EMP
        (empID BIGSERIAL PRIMARY KEY,fName VARCHAR(50),lName VARCHAR(50),email VARCHAR(50),role VARCHAR(50),salary BIGINT,DOB DATE,password VARCHAR(30),phone VARCHAR(15));
        
        CREATE TABLE IF NOT EXISTS patients
        (patientID BIGSERIAL PRIMARY KEY,fName VARCHAR(50),lName VARCHAR(50),email VARCHAR(50),payments INT, familyCode VARCHAR(50),eContact VARCHAR(15),eContactName VARCHAR(50), contactRelation VARCHAR(50),patientGroup INT,startDate DATE);

        CREATE TABLE IF NOT EXISTS apointments
        (PatientID BIGINT,emdID BIGINT,date TIMESTAMP,empName VARCHAR(50),patientName VARCHAR(50));

        CREATE TABLE IF NOT EXISTS roles
        (roles VARCHAR(50),level INT);

        INSERT INTO roles 
        VALUES
        ('Admin',5),
        ('Supervisor',4),
        ('Doctor',3),
        ('careGiver',2),
        ('Patient',1),
        ('Family',0);

        CREATE TABLE IF NOT EXISTS Roster
        (Supervisor BIGINT,Doctor BIGINT,CG1 BIGINT,CG2 BIGINT,CG3 BIGINT,CG4 BIGINT,date DATE);
        
        CREATE TABLE IF NOT EXISTS careChecks
        (patientID INT,mornMeds BOOLEAN,	NoonMeds BOOLEAN,	NightMeds BOOLEAN,	bfast BOOLEAN,	lnch BOOLEAN,	dnr BOOLEAN, date DATE);

        CREATE TABLE IF NOT EXISTS prescriptions
        (empID INT,	PatientID INT,	Medicine VARCHAR(50),	timeToRecieve VARCHAR(50));
        ";
    $ret = pg_query($db,$sql);
    if(!$ret){
        echo pg_last_error($db);
    }
    else{
        Echo "TABLES CREATED SUCCESSFULLY\n";
    }
    pg_close($db);
    }


?>