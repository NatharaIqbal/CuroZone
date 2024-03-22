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
        <title>Add Exam Schedules - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        //connect database
        include('dbconnect.php');

        //check database
        $sql = "SELECT * FROM exam_tbl WHERE exam_id = '$_POST[examid]' AND batch_id = '$_POST[batchselect]'";

        $result = mysqli_query($con, $sql);

        if (!mysqli_num_rows($result)) {

            //data insertion - batch table
            $insert_exam = "INSERT INTO exam_tbl VALUES ('" . $_POST['examid'] . "','" . $_POST['batchselect'] . "','" . $_POST['moduleselect'] . "','" . $_POST['typeselect'] . "','" . $_POST['date'] . "','" . $_POST['location'] . "','','','','" . $_POST['starttime'] . "','" . $_POST['endtime'] . "',NOW(),'0','0','0')";

            //SQL check
            if (!mysqli_query($con, $insert_exam)) {
        ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Exam Schedule Adding Failded.</h4>
                    <button onclick="location.href='program_manager-add_exam_schedules.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Exam schedule Added.</h4>
                    <button onclick="location.href='program_manager-add_exam_schedules.php'" type="button">OK</button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Exam schedule of the batch allready exists.</h4>
                <button onclick="location.href='program_manager-add_exam_schedules.php'" type="button">OK</button>
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