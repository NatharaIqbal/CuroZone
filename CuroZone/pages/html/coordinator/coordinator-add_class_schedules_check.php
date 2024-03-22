<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['department_id'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['department_id'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Class Schedule - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include('dbconnect.php');

        $department_id = $_SESSION['department_id'];
        $course_id = $_POST['courseselect'];
        $batch_id = $_POST['batchselect'];
        $module_id = $_POST['moduleselect'];
        $lecturer_id = $_POST['lecturerselect'];
        $location = $_POST['locationtxt'];
        $date = $_POST['datetxt'];
        $start_time = $_POST['starttime'];
        $end_time = $_POST['endtime'];

        $time_period = '0';

        if ($start_time <= '12.00pm' && $end_time <= '12.00pm') {
            $time_period = '1';
        } else {
            $time_period = '2';
        }
        echo "<script>console.log($time_period)</script>";

        $sql1 = "SELECT * FROM class_shedule_tbl WHERE time_period = '" . $time_period . "' AND classdate = '" . $date . "' AND lecturer_id = '" . $lecturer_id . "'";
        $result1 = mysqli_query($con, $sql1);
        $count1 = mysqli_num_rows($result1);
        if ($count1) {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Another session is already added on the given time with the same lecturer.<br> Please try Another time slot.</h4>
                <button onclick="location.href='coordinator-add_class_schedules.php'" type="button">OK</button>
            </div>
            <?php
        } else {
            $sql2 = "INSERT INTO class_shedule_tbl VALUES ('" . $batch_id . "','" . $location . "','" . $time_period . "','" . $date . "','" . $lecturer_id . "','" . $module_id . "','" . $start_time . "','" . $end_time . "','0')";
            if (!mysqli_query($con, $sql2)) {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="success">Ooops!</h1>
                    <h4>Schedule Adding Failded.</h4>
                    <button onclick="location.href='coordinator-add_class_schedules.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Schedule Added.</h4>
                    <button onclick="location.href='coordinator-add_class_schedules.php'" type="button">OK</button>
                </div>
        <?php
            }
        }
        ?>
    </body>

    </html>

<?php
} else {
    header("Location: /pages/html/login.html");
}
?>