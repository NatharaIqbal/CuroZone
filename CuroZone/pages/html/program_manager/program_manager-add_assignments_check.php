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
        <title>Add Assignments - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        //connect database
        include('dbconnect.php');
        $date = date('Y-m-d');
        //check database
        $sql = "SELECT * FROM assignment_tbl WHERE assignment_id = '$_POST[assignmentid]' AND batch_id = '$_POST[batchselect]'";

        $result = mysqli_query($con, $sql);

        if (!mysqli_num_rows($result)) {
            $filename = $_FILES['file']['name'];
            $filetype = $_FILES['file']['type'];

            $fileData = file_get_contents($_FILES['file']['tmp_name']);

            $insert_assignment = "INSERT INTO assignment_tbl VALUES ('" . $_POST['assignmentid'] . "','" . $_POST['batchselect'] . "','" . $_POST['moduleselect'] . "','" . $_POST['typeselect'] . "','" . $date . "','" . $_POST['duedate'] . "',?,?,?,'0','0')";
            $stmt = $con->prepare($insert_assignment);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
        ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Assingment Added.</h4>
                    <button onclick="location.href='program_manager-add_assignments.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?><div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Assingment Adding Failded.</h4>
                    <button onclick="location.href='program_manager-add_assignments.php'" type="button">OK</button>
                </div>

            <?php
            }
        } else {
            ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Assignment of the batch allready exists.</h4>
                <button onclick="location.href='program_manager-add_assignments.php'" type="button">OK</button>
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