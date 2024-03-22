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
        <title>Add Notices - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include('dbconnect.php');

        $date = date('Y-m-d');
        if ($_FILES['file'] != '') {
            $filename = $_FILES['file']['name'];
            $filetype = $_FILES['file']['type'];

            $fileData = file_get_contents($_FILES['file']['tmp_name']);
        }

        

        if ($_POST['departmentselect'] == 'all') {
            $sql = "INSERT INTO notice_tbl VALUES ('','" . $_POST['departmentselect'] . "','','','" . $_POST['subjecttxt'] . "','" . $_POST['textarea'] . "',?,?,?,'" . $_SESSION['memberid'] . "','" . $date . "')";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
        ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Notice Added.</h4>
                    <button onclick="location.href='coordinator-noticeboard.php'" type="button">OK</button>
                </div>

            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Notice Adding Failded.</h4>
                    <button onclick="location.href='coordinator-add_notices.php'" type="button">OK</button>
                </div>
            <?php
            }
        } elseif ($_POST['departmentselect'] != '' && $_POST['courseselect'] == '') {
            $sql = "INSERT INTO notice_tbl VALUES ('','" . $_POST['departmentselect'] . "','','','" . $_POST['subjecttxt'] . "','" . $_POST['textarea'] . "',?,?,?,'" . $_SESSION['memberid'] . "','" . $date . "')";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Notice Added.</h4>
                    <button onclick="location.href='coordinator-noticeboard.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Notice Adding Failded.</h4>
                    <button onclick="location.href='coordinator-add_notices.php'" type="button">OK</button>
                </div>
            <?php
            }
        } elseif ($_POST['departmentselect'] != '' && $_POST['courseselect'] != '' && $_POST['batchselect'] == '') {
            $sql = "INSERT INTO notice_tbl VALUES ('','" . $_POST['departmentselect'] . "','" . $_POST['courseselect'] . "','','" . $_POST['subjecttxt'] . "','" . $_POST['textarea'] . "',?,?,?,'" . $_SESSION['memberid'] . "','" . $date . "')";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Notice Added.</h4>
                    <button onclick="location.href='coordinator-noticeboard.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Notice Adding Failded.</h4>
                    <button onclick="location.href='coordinator-add_notices.php'" type="button">OK</button>
                </div>
            <?php
            }
        } elseif ($_POST['departmentselect'] != '' && $_POST['courseselect'] != '' && $_POST['batchselect'] != '') {
            $sql = "INSERT INTO notice_tbl VALUES ('','" . $_POST['departmentselect'] . "','" . $_POST['courseselect'] . "','" . $_POST['batchselect'] . "','" . $_POST['subjecttxt'] . "','" . $_POST['textarea'] . "',?,?,?,'" . $_SESSION['memberid'] . "','" . $date . "')";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Notice Added.</h4>
                    <button onclick="location.href='coordinator-noticeboard.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Notice Adding Failded.</h4>
                    <button onclick="location.href='coordinator-add_notices.php'" type="button">OK</button>
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