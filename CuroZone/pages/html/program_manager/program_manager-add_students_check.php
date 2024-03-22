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
        <title>Add Student - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        //connect database
        include('dbconnect.php');

        //check database
        $student_id = strtolower(trim($_POST['studentidtxt']));
        $sql = "SELECT * FROM student_tbl WHERE student_id = '" . $student_id . "'";

        $result = mysqli_query($con, $sql);

        if (!mysqli_num_rows($result)) {
            $insert_login_info = "INSERT INTO login_tbl VALUES ('" . $student_id . "','123456','3')";
            //data insertion - login table
            $result1 = mysqli_query($con, $insert_login_info);
            mysqli_refresh($con, MYSQLI_REFRESH_TABLES);
            if (!$result1) {
        ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Srudent Adding Failded.</h4>
                    <button onclick="location.href='program_manager-add_students.php'" type="button">OK</button>
                </div>
                <?php
            } else {
                $insert_student = "INSERT INTO student_tbl VALUES ('" . $student_id . "','" . $_POST['firstnametxt'] . "','" . $_POST['lastnametxt'] . "','" . $_POST['dobtxt'] . "','" . $_POST['genderselect'] . "','" . $_POST['nictxt'] . "','" . $_POST['phonetxt'] . "','" . $_POST['emailtxt'] . "','','3','" . $_POST['batchselect'] . "')";
                $result2  = mysqli_query($con, $insert_student);
                if ($result2) {
                ?>
                    <div class="div1-1">
                        <img src="/images/check.png" alt="Success image">
                        <h1 class="success">Success!</h1>
                        <h4>Student Added.</h4>
                        <button onclick="location.href='program_manager-add_students.php'" type="button">OK</button>
                    </div>
                <?php
                } else {
                ?>
                    <div class="div1-1">
                        <img src="/images/error.png" alt="error image">
                        <h1 class="error">Ooops!</h1>
                        <h4>Srudent Adding Failded.</h4>
                        <button onclick="location.href='program_manager-add_students.php'" type="button">OK</button>
                    </div>
            <?php
                }
            }
        } else {
            ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Student ID allready exists.</h4>
                <button onclick="location.href='program_manager-add_students.php'" type="button">OK</button>
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