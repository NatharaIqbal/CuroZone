<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Batch - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    include('dbconnect.php');
    echo "<script>console.log('" . $_SESSION['role'] . "')</script>";
    $sql = "UPDATE batch_tbl SET batch_id='" . $_POST['batchidtxt'] . "', course_id='" . $_POST['courseselect'] . "', started_date='" . $_POST['datetxt'] . "' WHERE batch_id = '" . $_POST['batchidtxt'] . "'";

    if (!mysqli_query($con, $sql)) {
        if ($_SESSION['role'] == '0') {
    ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Batch update Failded.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_batches.php'" type="button">OK</button>
            </div>
        <?php
        } else if ($_SESSION['role'] == '1') {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Batch update Failded.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-manage_batches.php'" type="button">OK</button>
            </div>
        <?php
        }
    } else {
        if ($_SESSION['role'] == '0') {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Batch updated.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-manage_batches.php'" type="button">OK</button>
            </div>
        <?php
        } else if ($_SESSION['role'] == '1') {
        ?>
            <div class="div1-1">
                <img src="/images/check.png" alt="Success image">
                <h1 class="success">Success!</h1>
                <h4>Batch updated.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-manage_batches.php'" type="button">OK</button>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>
<?php
