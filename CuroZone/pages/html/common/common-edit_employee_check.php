<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coordinator Details - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    include('dbconnect.php');

    $sql = "UPDATE employee_tbl SET first_name='" . $_POST['firstnametxt'] . "', last_name='" . $_POST['lastnametxt'] . "', dob='" . $_POST['dobtxt'] . "', gender='" . $_POST['genderselect'] . "', nic='" . $_POST['nictxt'] . "', phone='" . $_POST['phonetxt'] . "', email='" . $_POST['emailtxt'] . "', department_id ='" . $_POST['departmentselect'] . "' WHERE employee_id = '" . $_SESSION['employee_id'] . "'";
    if ($_SESSION['employee_role'] == '1') {
        if (!mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Coordinator details update Failded.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_coordinators.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Coordinator details updated.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_coordinators.php'" type="button">OK</button>
            </div>
        <?php
        }
    } elseif ($_SESSION['employee_role'] == '2') {
        if (!mysqli_query($con, $sql)) {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Lecturer details update Failded.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_lecturers.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Lecturer details updated.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_lecturers.php'" type="button">OK</button>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>