<?php
session_start();
$_SESSION['memberid'];
$_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Assignment Schedules - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    include('dbconnect.php');

    $student_id = $_GET['student_id'];
    $assignment_id = $_GET['assignment_id'];
    $status = $_GET['status'];

    if ($status == '0') {
        $sql = "UPDATE submitted_assignment_tbl SET send_lecturer = '1' WHERE student_id = '" . $student_id . "' AND assignment_id = '" . $assignment_id . "'";
        if (mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Assignmnt sent to lecturer.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-submitted_assignments.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Error occured.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-submitted_assignments.php'" type="button">OK</button>
            </div>

    <?php
        }
    }
    elseif($status == '1'){
        $sql = "UPDATE submitted_assignment_tbl SET send_lecturer = '0' WHERE student_id = '" . $student_id . "' AND assignment_id = '" . $assignment_id . "'";
        if (mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Assignmnt unsent.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-submitted_assignments.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Error occured.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-submitted_assignments.php'" type="button">OK</button>
            </div>

    <?php
        }
    }

    ?>
</body>

</html>