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
    <title>Assignment Results - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    include('dbconnect.php');

    $batch_id = $_GET['batch_id'];
    $classlocation = $_GET['classlocation'];
    $time_period = $_GET['time_period'];
    $classdate  = $_GET['classdate'];
    $lecturer_id = $_GET['lecturer_id'];
    $status = $_GET['status'];

    if ($status == '0') {
        $sql = "UPDATE class_shedule_tbl SET send_all = '1' WHERE batch_id = '" . $batch_id . "' AND classlocation = '" . $classlocation . "' AND time_period = '" . $time_period . "' AND classdate='" . $classdate . "' AND lecturer_id = '" . $lecturer_id . "'";
        if (mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Class schedule sent.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-manage_class_schedules.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Error occured.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-manage_class_schedules.php'" type="button">OK</button>
            </div>

    <?php
        }
    }
    elseif($status == '1'){
        $sql = "UPDATE class_shedule_tbl SET send_all = '0' WHERE batch_id = '" . $batch_id . "' AND classlocation = '" . $classlocation . "' AND time_period = '" . $time_period . "' AND classdate='" . $classdate . "' AND lecturer_id = '" . $lecturer_id . "'";
        if (mysqli_query($con, $sql)) {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Class schedule unsent.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-manage_class_schedules.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Error occured.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-manage_class_schedules.php'" type="button">OK</button>
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