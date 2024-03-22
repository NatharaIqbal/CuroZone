<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    include('dbconnect.php');
    if ($_SESSION['role'] == '3') {
        $sql = "UPDATE student_tbl SET first_name='" . $_POST['firstnametxt'] . "', last_name='" . $_POST['lastnametxt'] . "', dob='" . $_POST['dobtxt'] . "', phone='" . $_POST['phonetxt'] . "', email='" . $_POST['emailtxt'] . "' WHERE student_id = '" . $_SESSION['memberid'] . "'";
    } else {
        $sql = "UPDATE employee_tbl SET first_name='" . $_POST['firstnametxt'] . "', last_name='" . $_POST['lastnametxt'] . "', dob='" . $_POST['dobtxt'] . "', gender='" . $_POST['genderselect'] . "', nic='" . $_POST['nictxt'] . "', phone='" . $_POST['phonetxt'] . "', email='" . $_POST['emailtxt'] . "' WHERE employee_id = '" . $_SESSION['memberid'] . "'";
    }

    if (mysqli_query($con, $sql)) {
        if ($_SESSION['role'] == '0') {
    ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Profile details updated.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-profile.php'" type="button">OK</button>
            </div>
        <?php
        } elseif ($_SESSION['role'] == '1') {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Profile details updated.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-profile.php'" type="button">OK</button>
            </div>
        <?php
        } else if ($_SESSION['role'] == '2') {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Profile details updated.</h4>
                <button onclick="location.href='/pages/html/lecturer/lecturer-profile.php'" type="button">OK</button>
            </div>
        <?php
        }
        else if ($_SESSION['role'] == '3') {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Profile details updated.</h4>
                    <button onclick="location.href='/pages/html/student/student-profile.php'" type="button">OK</button>
                </div>
            <?php
            }
    } else {
        if ($_SESSION['role'] == '0') {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Profile details update Failded.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-update_profile_details.php'" type="button">OK</button>
            </div>
        <?php
        } elseif ($_SESSION['role'] == '1') {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Profile details update Failded.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-update_profile_details.php'" type="button">OK</button>
            </div>
        <?php
        } else if ($_SESSION['role'] == '2') {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Profile details update Failded.</h4>
                <button onclick="location.href='/pages/html/lecturer/lecturer-update_profile_details.php'" type="button">OK</button>
            </div>
    <?php
        }else if ($_SESSION['role'] == '3') {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Profile details update Failded.</h4>
                    <button onclick="location.href='/pages/html/student/student-update_profile_details.php'" type="button">OK</button>
                </div>
        <?php
            }
    }
    ?>
</body>

</html>