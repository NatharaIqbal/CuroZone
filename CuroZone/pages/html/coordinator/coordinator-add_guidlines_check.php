<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['department_id'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['department_id'];
    include('dbconnect.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Course Guidlines - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        $sql1 = "SELECT * FROM course_guidlines_btl WHERE course_id='" . $_POST['courseselect'] . "'";
        $result1 = mysqli_query($con, $sql1);
        if (!mysqli_num_rows($result1)) {
            $filename = $_FILES['file']['name'];
            $filetype = $_FILES['file']['type'];
            $fileData = file_get_contents($_FILES['file']['tmp_name']);
            $sql = "INSERT INTO course_guidlines_btl VALUES ('" . $_POST['courseselect'] . "','',?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
        ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Course Guidlines Added.</h4>
                    <button onclick="location.href='coordinator-add_guidlines.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Course Guidlines Adding Failded.</h4>
                    <button onclick="location.href='coordinator-add_guidlines.php'" type="button">OK</button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Course Guidlines allready exists fo the course.</h4>
                <button onclick="location.href='coordinator-add_guidlines.php'" type="button">OK</button>
            </div>
        <?php
        }
        ?>
    </body>

    </html>
<?php

} else {
    header("Location: /pages/html/login.html");
}
?>