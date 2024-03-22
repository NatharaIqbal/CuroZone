<?php
session_start();
if(isset ($_SESSION['memberid'] , $_SESSION['role'] , $_SESSION['department_id'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['department_id'];
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

    $assignment_id = $_GET['assignment_id'];
    $batch_id = $_GET['batch_id'];
    $status = $_GET['status'];

    if ($status == '0') {
        $sql = "UPDATE assignment_tbl SET send_student_and_lecturer = '1' WHERE assignment_id = '" . $assignment_id . "' AND batch_id = '" . $batch_id . "'";
        if (mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Assignment schedule sent to all.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-assignment_schedules.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Error occured.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-assignment_schedules.php'" type="button">OK</button>
            </div>

    <?php
        }
    }
    elseif($status == '1'){
        $sql = "UPDATE assignment_tbl SET send_student_and_lecturer = '0' WHERE assignment_id = '" . $assignment_id . "' AND batch_id = '" . $batch_id . "'";
        if (mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Assignment schedule unsent.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-assignment_schedules.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Error occured.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-assignment_schedules.php'" type="button">OK</button>
            </div>

    <?php
        }
    }

    ?>
</body>

</html>

<?php
}
else{
    header("Location: /pages/html/login.html");
}
?>