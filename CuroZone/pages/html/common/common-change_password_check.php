<?php
session_start();

if (isset($_SESSION['memberid'])) {
    $_SESSION['memberid'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include("dbconnect.php");
        $member_id = $_SESSION['memberid'];
        $role = $_SESSION['role'];
        $sql = "SELECT * FROM login_tbl WHERE member_id = '" . $member_id . "'";

        $result = mysqli_query($con, $sql);

        while ($row = $result->fetch_assoc()) {
            $password = $row['member_password'];
        }
        $currentpassword = $_POST['currentpassword'];
        $newpassword1 = $_POST['newpassword1'];
        $newpassword2 = $_POST['newpassword2'];

        if ($currentpassword == $password) {

            if ($newpassword1 == $newpassword2) {

                $sql = "UPDATE login_tbl SET member_password='" . $newpassword1 . "' WHERE member_id='" . $member_id . "'";
                if ($result = $con->query($sql)) {
        ?> <div class="div1-1">
                        <img src="/images/check.png" alt="Success image">
                        <h1 class="success">Success!</h1>
                        <h4>Password changed.</h4>
                        <button onclick="location.href='/pages/html/common/log_out.php'" type="button">OK</button>
                    </div>
                <?php
                }
            } else {
                if ($role == '0') {
                ?>
                    <div class="div1-1">
                        <img src="/images/error.png" alt="error image">
                        <h1 class="error">Ooops!</h1>
                        <h4>Passwords do not match.</h4>
                        <button onclick="location.href='/pages/html/program_manager/program_manager-change_password.php'" type="button">OK</button>
                    </div>
                <?php
                } elseif ($role == '1') {
                ?>
                    <div class="div1-1">
                        <img src="/images/error.png" alt="error image">
                        <h1 class="error">Ooops!</h1>
                        <h4>Passwords do not match.</h4>
                        <button onclick="location.href='/pages/html/coordinator/coordinator-change_password.php'" type="button">OK</button>
                    </div>
                <?php
                } elseif ($role == '2') {
                ?>
                    <div class="div1-1">
                        <img src="/images/error.png" alt="error image">
                        <h1 class="error">Ooops!</h1>
                        <h4>Passwords do not match.</h4>
                        <button onclick="location.href='/pages/html/lecturer/lecturer-change_password.php'" type="button">OK</button>
                    </div>
                <?php
                } elseif ($role == '3') {
                    ?>
                        <div class="div1-1">
                            <img src="/images/error.png" alt="error image">
                            <h1 class="error">Ooops!</h1>
                            <h4>Passwords do not match.</h4>
                            <button onclick="location.href='/pages/html/student/student-change_password.php'" type="button">OK</button>
                        </div>
                    <?php
                    }
            }
        } else {
            if ($role == '0') {
                ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Passwords do not match.</h4>
                    <button onclick="location.href='/pages/html/program_manager/program_manager-change_password.php'" type="button">OK</button>
                </div>
            <?php
            } elseif ($role == '1') {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Passwords do not match.</h4>
                    <button onclick="location.href='/pages/html/coordinator/coordinator-change_password.php'" type="button">OK</button>
                </div>
            <?php
            } elseif ($role == '2') {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Passwords do not match.</h4>
                    <button onclick="location.href='/pages/html/lecturer/lecturer-change_password.php'" type="button">OK</button>
                </div>
        <?php
            } elseif ($role == '3') {
                ?>
                    <div class="div1-1">
                        <img src="/images/error.png" alt="error image">
                        <h1 class="error">Ooops!</h1>
                        <h4>Passwords do not match.</h4>
                        <button onclick="location.href='/pages/html/student/student-change_password.php'" type="button">OK</button>
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