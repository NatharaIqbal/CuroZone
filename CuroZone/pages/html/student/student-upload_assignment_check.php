<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['batch_id'], $_SESSION['course_id'], $_SESSION['department_id'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['batch_id'];
    $_SESSION['course_id'];
    $_SESSION['department_id'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment Submissions - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <script>console.log(<?php echo $_POST['moduleid'] ?>)</script>
        <script>console.log(<?php echo $_POST['module'] ?>)</script>
        <script>console.log(<?php echo $_POST['assignmentidtxt'] ?>)</script>
        <script>console.log(<?php echo $_POST['type'] ?>)</script>
        <script>console.log(<?php echo $_POST['duedate'] ?>)</script>
        <?php
        include('dbconnect.php');
        $date = date("Y-m-d");
        $time = time();
        $filename = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];

        $fileData = file_get_contents($_FILES['file']['tmp_name']);

        $sql1 = "SELECT * FROM submitted_assignment_tbl WHERE student_id='" . $_SESSION['memberid'] . "' AND assignment_id='" . $_SESSION['assignment_id'] . "'";
        $result1 = mysqli_query($con, $sql1);
        if (!mysqli_num_rows($result1)) {
            $sql = "INSERT INTO submitted_assignment_tbl VALUES ('" . $_SESSION['memberid'] . "','" . $_SESSION['assignment_id'] . "',?,?,?,'" . $date . "','" . $time . "','','','0','0','0')";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
        ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Assignment submitted.</h4>
                    <button onclick="location.href='student-assignment_submissions.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Assignment submission Failded.</h4>
                    <button onclick="location.href='student-assignment_submissions.php'" type="button">OK</button>
                </div>
            <?php
            }
        } else {
            $sql = "UPDATE submitted_assignment_tbl SET assignment_file=?, file_name=?, file_type=?, date='" . $date . "',time='" . $time . "' WHERE student_id='" . $_SESSION['memberid'] . "' AND assignment_id='" . $_SESSION['assignment_id'] . "'";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $fileData, $filename, $filetype);
            if ($stmt->execute()) {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Assignment submitted.</h4>
                    <button onclick="location.href='student-assignment_submissions.php'" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Assignment submission Failded.</h4>
                    <button onclick="location.href='student-assignment_submissions.php'" type="button">OK</button>
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