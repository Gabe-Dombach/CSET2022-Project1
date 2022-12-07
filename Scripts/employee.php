<?php error_reporting(0);
session_start();
    if(!isset($_SESSION['patid'])){
        $_SESSION['patid'] = "";
    }
    else{$id = $_SESSION['patid'];}
    require("dbFunctions.php");
    if (!isset($_SESSION['user']) || $_SESSION['level'] != '4') {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            if (isset($_SESSION['role'])) {
                unset($_SESSION['role']);
            }
        }
        header("Location:login.php?error=Administrator privelages required to access roles!");
    }
    $db = dbConnect($host, $port, $dbname, $credentials);

    
    $query = pg_query($db, "SELECT empid, fname, lname, role, salary FROM emp");
    if (!$query) {
        echo "An error occurred.\n";
        exit;
    };
    $employees = pg_fetch_all($query);
    $_SESSION['emps'] = $employees;

if (isset($_POST['searchSubmit'])) {
    $id = $_POST['idSearch'];
    $fname = $_POST['fnameSearch'];
    $lname = $_POST['lnameSearch'];
    $role = $_POST['roleSearch'];
    $salary = $_POST['salarySearch'];
    $query = "SELECT empid, fname, lname, role, salary FROM emp";
    $conditionals = "";
    // search through employees
    if ($_POST['idSearch'] != "") {
        $conditionals = "WHERE empid = $id";
    }
    if ($_POST['fnameSearch'] != "") {
        if ($conditionals != "") {
            $conditionals = $conditionals." AND fname = '$fname'";
        } else {
            $conditionals = "WHERE fname = '$fname'";
        }
    }
    if ($_POST['lnameSearch'] != "") {
        if ($conditionals != "") {
            $conditionals = $conditionals." AND lname = "."'$lname'";
        } else {
            $conditionals = "WHERE lname = '$lname'";
        }
    }
    if ($_POST['roleSearch'] != "") {
        if ($conditionals != "") {
            $conditionals = $conditionals." AND role = "."'$role'";
        } else {
            $conditionals = "WHERE role = '$role'";
        }
    }
    if ($_POST['salarySearch'] != "") {
        if ($conditionals != "") {
            $conditionals = $conditionals." AND salary = "."$salary";
        } else {
            $conditionals = "WHERE salary = $salary";
        }    
    }
    if ($conditionals != "") {
        $query = $query . " " . $conditionals;
    }
    $result = pg_query($db, $query);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    };
    $_SESSION['emps'] = pg_fetch_all($result);
}

if (isset($_POST['updateSubmit']) && $_SESSION['Admin']) {
    // query to update salary of emp where id equal input
    $salary = $_POST['salaryInput'];
    $empId = $_POST['empId'];
    $query="UPDATE emp
            SET salary = 
            $salary
            WHERE empid= '$empId'";
    $result = pg_query($db, $query);
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    };
    $_SESSION['emps'] = pg_fetch_all($result);
}


require("../Veiws/employee.view.php")
?>