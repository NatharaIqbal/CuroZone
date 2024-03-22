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
            <title>Add lecturer | CuroZone</title>
            <link rel="icon" type="image/png" href="/images/logo.png">
            <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
        </head>

        <body>
            <?php

            //connect database
            include('dbconnect.php');
            $employee_id = strtolower(trim($_POST['employeeidtxt']));
            //check database
            $sql = "SELECT * FROM employee_tbl WHERE employee_id = '" . $employee_id . "'";
            $result = mysqli_query($con, $sql);

            if (!mysqli_num_rows($result)) {
                $insert_login_info = "INSERT INTO login_tbl VALUES ('" . $employee_id . "','123456','2')";
                //data insertion - login table
                $result1 = mysqli_query($con, $insert_login_info);
                mysqli_refresh($con, MYSQLI_REFRESH_TABLES);
                //SQL check
                if (!$result1) {
            ?>
                    <div class="div1-1">
                            <img src="/images/error.png" alt="error image">
                            <h1 class="error">Ooops!</h1>
                            <h4>Lecturer Adding Failded.</h4>
                            <button onclick="link()">OK</button>
                        </div>
                    <?php
                } else {

                    $insert_employee = "INSERT INTO employee_tbl VALUES ('" . $employee_id . "','" . $_POST['firstnametxt'] . "','" . $_POST['lastnametxt'] . "','" . $_POST['dobtxt'] . "','" . $_POST['genderselect'] . "','" . $_POST['nictxt'] . "','" . $_POST['phonetxt'] . "','" . $_POST['emailtxt'] . "','','2','" . $_POST['departmentselect'] . "')";
                    $result2  = mysqli_query($con, $insert_employee);
                    if ($result2) {
                    ?>
                        <div class="div1-1">
                            <img src="/images/check.png" alt="Success image">
                            <h1 class="success">Success!</h1>
                            <h4>Lecturer Added.</h4>
                            <button onclick="link()">OK</button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="div1-1">
                            <img src="/images/error.png" alt="error image">
                            <h1 class="error">Ooops!</h1>
                            <h4>Lecturer Adding Failded.</h4>
                            <button onclick="link()">OK</button>
                        </div>
                <?php
                    }
                }
            } else {
                ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Lecturer ID allready exists.</h4>
                    <button onclick="link()">OK</button>
                </div>
            <?php
            }

            ?>
            <script>
                function link() {
                    window.location.href = "program_manager-add_lecturers.php";
                }
            </script>
        </body>

        </html>

    <?php
    } else {
        header("Location: /pages/html/login.html");
    }
    ?>