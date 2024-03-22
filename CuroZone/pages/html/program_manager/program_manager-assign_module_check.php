<?php
session_start();
if (isset($_SESSION['memberid'], $_SESSION['role'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $course_id = $_SESSION['course_id'];
    $module_id = $_SESSION['module_id'];
    $employee_id = $_POST['lecturerselect'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assign Lecturers - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include('dbconnect.php');
        $sql1 = "SELECT * FROM module_lecturer_tbl WHERE course_id='" . $course_id . "' AND module_id='" . $module_id . "'";
        $result1 = mysqli_query($con, $sql1);
        $count1 = mysqli_num_rows($result1);
        if ($count1) {
            $sql2 = "UPDATE module_lecturer_tbl SET lecturer_id ='" . $employee_id . "' WHERE course_id='" . $course_id . "' AND module_id='" . $module_id . "'";
            $result2 = mysqli_query($con, $sql2);
            if ($result2) {
        ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Lecturer assigned successfully.</h4>
                    <button onclick="location.href='program_manager-manage_modules.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Lecturer assign unsuccessfull.</h4>
                    <button onclick="location.href='program_manager-manage_modules.php'" type="button">OK</button>
                </div>
            <?php
            }
        } else {
            $sql2 = "INSERT INTO module_lecturer_tbl VALUES ('" . $module_id . "','" . $employee_id . "','" . $course_id . "')";
            $result2 = mysqli_query($con, $sql2);
            if ($result2) {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Lecturer assigned successfully.</h4>
                    <button onclick="location.href='program_manager-manage_modules.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Lecturer assign unsuccessfull.</h4>
                    <button onclick="location.href='program_manager-manage_modules.php'" type="button">OK</button>
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