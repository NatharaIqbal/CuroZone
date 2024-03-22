<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <script>
        console.log('hi');
    </script>
    <?php

    //connect database
    include('dbconnect.php');

    //get member id and password
    $memberid = strtolower(trim($_POST['memberidtxt']));
    $password = strtolower(trim($_POST['passwordtxt']));

    //check database
    $sql = "SELECT * FROM login_tbl WHERE member_id = '" . $memberid . "'";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
    $row = $result->fetch_assoc();
    if ($password == $row['member_password']) {
        if ($row['role'] == "0") {
            $_SESSION['memberid'] = $row['member_id'];
            $_SESSION['role'] = $row['role'];
            header("Location: /pages/html/program_manager/program_manager-dashboard.php");
        } elseif ($row['role'] == "1") {
            $get_department = "SELECT department_id FROM employee_tbl WHERE employee_id = '" . $memberid . "'";
            $result1 = mysqli_query($con, $get_department);
            $row1 = mysqli_fetch_assoc($result1);
            $_SESSION['memberid'] = $row['member_id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['department_id'] = $row1['department_id'];
            header("Location: /pages/html/coordinator/coordinator-dashboard.php");
        } elseif ($row['role'] == "2") {
            $get_department = "SELECT department_id FROM employee_tbl WHERE employee_id = '" . $memberid . "'";
            $result1 = mysqli_query($con, $get_department);
            $row1 = mysqli_fetch_assoc($result1);
            $_SESSION['memberid'] = $row['member_id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['department_id'] = $row1['department_id'];
            header("Location: /pages/html/lecturer/lecturer-dashboard.php");
        } elseif ($row['role'] == "3") {
            $_SESSION['memberid'] = $row['member_id'];
            $_SESSION['role'] = $row['role'];
            $get_batch = "SELECT batch_id FROM student_tbl WHERE student_id = '" . $memberid . "'";
            $result1 = mysqli_query($con, $get_batch);
            $row1 = mysqli_fetch_assoc($result1);
            $_SESSION['batch_id'] = $row1['batch_id'];
            $get_course = "SELECT course_id FROM batch_tbl WHERE batch_id = '" . $row1['batch_id'] . "'";
            $result2 = mysqli_query($con, $get_course);
            $row2 = mysqli_fetch_assoc($result2);
            $_SESSION['course_id'] = $row2['course_id'];
            $get_department = "SELECT department_id FROM course_tbl WHERE course_id = '" . $row2['course_id'] . "'";
            $result3 = mysqli_query($con, $get_department);
            $row3 = mysqli_fetch_assoc($result3);
            $_SESSION['department_id'] = $row3['department_id'];
            header("Location: /pages/html/student/student-dashboard.php");
        }
    } else {
    ?>
        <div class="div1-1">
            <img src="/images/wrong-password.png" alt="error image">
            <h1 class="error">Ooops!</h1>
            <h4>Incorrect username or password.</h4>
            <button onclick="location.href='login.html'" type="button">OK</button>
        </div>
    <?php
    }}else{
        ?>
        <div class="div1-1">
            <img src="/images/wrong-password.png" alt="error image">
            <h1 class="error">Ooops!</h1>
            <h4>Incorrect username or password.</h4>
            <button onclick="location.href='login.html'" type="button">OK</button>
        </div>
    <?php
    }
    ?>
</body>

</html>