<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    //connect database
    include('dbconnect.php');

    //check database
    $sql = "SELECT * FROM student_tbl WHERE student_id = '$_POST[studentidtxt]'";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
        $insert_login = "INSERT INTO login_tbl VALUES ('" . strtolower(trim($_POST['studentidtxt'])) . "','123456','3')";
        $insert_student = "INSERT INTO student_tbl VALUES ('" . strtolower(trim($_POST['studentidtxt'])) . "','" . $_POST['firstnametxt'] . "','" . $_POST['lastnametxt'] . "','" . $_POST['dobtxt'] . "','" . $_POST['genderselect'] . "','" . $_POST['nictxt'] . "','" . $_POST['phonetxt'] . "','" . $_POST['emailtxt'] . "','','3','" . $_POST['batchselect'] . "')";
        if (mysqli_query($con, $insert_login)) {
            mysqli_refresh($con, MYSQLI_REFRESH_TABLES);
            if (!mysqli_query($con, $insert_student)) {
    ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Student Adding Failded.</h4>
                    <button onclick="location.href='/pages/html/coordinator/coordinator-add_students.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Student Added.</h4>
                    <button onclick="location.href='/pages/html/coordinator/coordinator-add_students.php'" type="button">OK</button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Student Adding Failded.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-add_students.php'" type="button">OK</button>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="div1-1">
            <img src="/images/error.png" alt="error image">
            <h1 class="error">Ooops!</h1>
            <h4>Student ID allready exists.</h4>
            <button onclick="location.href='/pages/html/coordinator/coordinator-add_students.php'" type="button">OK</button>
        </div>
    <?php
    }

    ?>
</body>

</html>