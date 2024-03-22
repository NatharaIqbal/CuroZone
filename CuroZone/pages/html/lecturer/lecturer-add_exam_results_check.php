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
        <title>Add Assignment Results - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include('dbconnect.php');

        $sql = "INSERT INTO exam_result_tbl VALUES ('" . $_POST['studentselect'] . "','" . $_POST['assignmentselect'] . "','" . $_POST['markstxt'] . "','0','0')";
        if (!mysqli_query($con, $sql)) {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Exam results Adding Failded.</h4>
                <button onclick="location.href='lecturer-add_exam_results.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Exam results Added.</h4>
                <button onclick="location.href='lecturer-add_exam_results.php'" type="button">OK</button>
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