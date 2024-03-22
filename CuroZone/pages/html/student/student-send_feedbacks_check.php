<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['batch_id'], $_SESSION['course_id'], $_SESSION['department_id'])){
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['batch_id'];
    $_SESSION['course_id'];
    $_SESSION['department_id'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Send Feedback - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <?php
        include('dbconnect.php');

        $date = date('Y-m-d');

        $subject = $_POST['subjecttxt'];
        $discription = $_POST['discriptiontxt'];

        $sql = "INSERT INTO feedback_tbl VALUES ('','" . $_SESSION['memberid'] . "','" . $_SESSION['department_id'] . "','" . $subject . "','" . $discription . "','" . $date . "')";
        if (!mysqli_query($con, $sql)) {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Feedback sending Failded.</h4>
                <button onclick="location.href='student-send_feedbacks.php'" type="button">OK</button>
            </div>
        <?php
        } else {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Feedback sent.</h4>
                <button onclick="location.href='student-send_feedbacks.php'" type="button">OK</button>
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