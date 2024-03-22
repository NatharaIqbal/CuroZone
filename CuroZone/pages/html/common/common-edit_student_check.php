<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php
    include('dbconnect.php');

    $sql = "UPDATE student_tbl SET first_name='" . $_POST['firstnametxt'] . "', last_name='" . $_POST['lastnametxt'] . "', dob='" . $_POST['dobtxt'] . "', gender='" . $_POST['genderselect'] . "', nic='" . $_POST['nictxt'] . "', phone='" . $_POST['phonetxt'] . "', email='" . $_POST['emailtxt'] . "',  batch_id ='" . $_POST['batchselect'] . "'";


    if ($_SESSION['role'] == '0') {
        if (!mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Student details update failed.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_students.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Student details updated.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_students.php'" type="button">OK</button>
            </div>
        <?php
        }
    } elseif ($_SESSION['role'] == '1') {
        if (!mysqli_query($con, $sql)) {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Student details update failed.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-manage_students.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Student details updated.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-manage_students.php'" type="button">OK</button>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>