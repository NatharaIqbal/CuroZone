<?php
session_start();
$_SESSION['memberid'];
$_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Batches - CuroZone</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    //connect database
    include('dbconnect.php');

    //check database
    $sql = "SELECT * FROM batch_tbl WHERE batch_id = '$_POST[batchidtxt]'";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {

        //data insertion - batch table
        $insert_batch = "INSERT INTO batch_tbl VALUES ('" . $_POST['batchidtxt'] . "','" . $_POST['courseselect'] . "','" . $_POST['datetxt'] . "')";

        //SQL check
        if (!mysqli_query($con, $insert_batch)) {
            if ($_SESSION["charactor"] == 'program_manager') {
    ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Departmet Adding Failded.</h4>
                    <button onclick="location.href='/pages/html/program_manager/program_manager-add_batches.php'" type="button">OK</button>
                </div>
            <?php
            } else if ($_SESSION["charactor"] = 'coordinator') {
            ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Departmet Adding Failded.</h4>
                    <button onclick="location.href='/pages/html/coordinator/coordinator-add_batches.php'" type="button">OK</button>
                </div>
            <?php
            }
        } else {
            if ($_SESSION["charactor"] == 'program_manager') {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Batch Added.</h4>
                    <button onclick="location.href='/pages/html/program_manager/program_manager-add_batches.php'" type="button">OK</button>
                </div>
            <?php
            } else if ($_SESSION["charactor"] = 'coordinator') {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Batch Added.</h4>
                    <button onclick="location.href='/pages/html/coordinator/coordinator-add_batches.php'" type="button">OK</button>
                </div>
            <?php
            }
        }
    } else {
        if ($_SESSION["charactor"] == 'program_manager') {
            ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Batch ID allready exists.</h4>
                <button onclick="location.href='/pages/html/program_manager/program_manager-add_batches.php'" type="button">OK</button>
            </div>
        <?php
        } else if ($_SESSION["charactor"] = 'coordinator') {
        ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Batch ID allready exists.</h4>
                <button onclick="location.href='/pages/html/coordinator/coordinator-add_batches.php'" type="button">OK</button>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>
<?php
