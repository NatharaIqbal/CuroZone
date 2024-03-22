<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['examidselect'];
    $_SESSION['batchselect'];
    $_SESSION['file'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Exams - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        //connect database
        include('dbconnect.php');

        //data insertion - department table
        $insert_exam_file = "UPDATE exam_tbl SET examfile= '" . $_SESSION['file'] . "' WHERE exam_id = '" . $_SESSION['examidselect'] . "' AND batch_id = '" . $_SESSION['batchselect'] . "'";

        //SQL check
        if (!mysqli_query($con, $insert_exam_file)) {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Exam file updating Failded.</h4>
                <button onclick="location.href='program_manager-add_exams.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Exam file Updated.</h4>
                <button onclick="location.href='program_manager-add_exams.php'" type="button">OK</button>
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