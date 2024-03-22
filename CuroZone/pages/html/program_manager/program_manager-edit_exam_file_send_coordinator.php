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

    $exam_id = $_GET['exam_id'];
    $batch_id = $_GET['batch_id'];
    $status = $_GET['status'];

    if ($status == '0') {
        $sql = "UPDATE exam_tbl SET send_file_coordinator = '1' WHERE exam_id = '" . $exam_id . "' AND batch_id = '" . $batch_id . "'";
        if (mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Exam file sent to coordinator.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_exam_schedules.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Error occured.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_exam_schedules.php'" type="button">OK</button>
            </div>

    <?php
        }
    }
    elseif($status == '1'){
        $sql = "UPDATE exam_tbl SET send_file_coordinator = '0' WHERE exam_id = '" . $exam_id . "' AND batch_id = '" . $batch_id . "'";
        if (mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Exam dile unsent.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_exam_schedules.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Error occured.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_exam_schedules.php'" type="button">OK</button>
            </div>

    <?php
        }
    }

    ?>
</body>

</html>