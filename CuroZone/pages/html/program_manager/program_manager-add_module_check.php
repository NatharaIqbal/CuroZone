<?php
session_start();
if (isset($_SESSION['memberid'], $_SESSION['role'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Module - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <?php
        include('dbconnect.php');

        $course_id = $_SESSION['course_id'];
        $module_id = trim($_POST['moduleidtxt']);
        $name = $_POST['modulenametxt'];
        $semester = $_POST['semestertxt'];

        $sql1 = "SELECT * FROM  module_tbl WHERE course_id = '" . $course_id . "' AND module_id = '" . $module_id . "'";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1) >= 0) {
            $sql2 = "INSERT INTO module_tbl VALUES ('" . $module_id . "','" . $course_id . "','" . $name . "','" . $semester . "')";
            $result2 = mysqli_query($con, $sql2);
            if (!$result2) {
        ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Module Adding Failded.</h4>
                    <button onclick="location.href='program_manager-add_new_module.php?course_id=$course_id'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Module Added.</h4>
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