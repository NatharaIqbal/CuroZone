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
        <title>Add Exams - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        //connect database
        include('dbconnect.php');

        // $_SESSION['examidselect'] = $_POST['examidselect'];
        // $_SESSION['batchselect'] = $_POST['batchselect'];
        // $_SESSION['file'] = $_POST['file'];

        //check database
        $sql = "SELECT examfile FROM exam_tbl WHERE exam_id = '" . $_POST['examidselect'] . "' AND batch_id = '" . $_POST['batchselect'] . "'";

        $result = mysqli_query($con, $sql);
        $row = $result->fetch_assoc();
        if ($row['examfile'] == '') {

            $filename = $_FILES['file']['name'];
            $filetype = $_FILES['file']['type'];
            echo "<script>console.log($filename)</script>";
            $fileData = file_get_contents($_FILES['file']['tmp_name']);

            $insert_exam_file = "UPDATE exam_tbl SET examfile=? ,examfile_name=? ,examfile_type=? WHERE exam_id = '" . $_POST['examidselect'] . "' AND batch_id = '" . $_POST['batchselect'] . "'";

            $stmt = $con->prepare($insert_exam_file);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
        ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Exam file Added.</h4>
                    <button onclick="location.href='program_manager-add_exams.php'" type="button">OK</button>
                </div>

            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Exam file Adding Failded.</h4>
                    <button onclick="location.href='program_manager-add_exams.php'" type="button">OK</button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="div1-1">
                <img src="/images/question.png" alt="error image">
                <h1 class="question">Do you?</h1>
                <h4>An exam file allready exists. Do you want to update?</h4>
                <button onclick="location.href='program_manager-update_exams.php'" type="button">YES</button>
                <button onclick="location.href='program_manager-add_exams.php'" type="button">NO</button>
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