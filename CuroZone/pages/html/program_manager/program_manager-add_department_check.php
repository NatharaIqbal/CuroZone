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
        <title>Add Departments - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        //connect database
        include('dbconnect.php');

        //check database
        $sql = "SELECT * FROM department_tbl WHERE department_id = '$_POST[Ddepartmentidtxt]'";

        $result = mysqli_query($con, $sql);

        if (!mysqli_num_rows($result)) {

            //data insertion - department table
            $insert_department = "INSERT INTO department_tbl VALUES ('" . $_POST['Ddepartmentidtxt'] . "','" . $_POST['departmentnametxt'] . "')";

            //SQL check
            if (!mysqli_query($con, $insert_department)) {
        ?>
                <div class="div1-1">
                    <img src="/images/error.png" alt="error image">
                    <h1 class="error">Ooops!</h1>
                    <h4>Departmet Adding Failded.</h4>
                    <button onclick="location.href=''" type="button">OK</button>
                </div>
            <?php
            } else {
            ?>
                <div class="div1-1">
                    <img src="/images/check.png" alt="Success image">
                    <h1 class="success">Success!</h1>
                    <h4>Department Added.</h4>
                    <button onclick="location.href='program_manager-add_departments.php'" type="button">OK</button>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="div1-1">
                <img src="/images/error.png" alt="error image">
                <h1 class="error">Ooops!</h1>
                <h4>Department ID allready exists.</h4>
                <button onclick="location.href='program_manager-add_departments.php'" type="button">OK</button>
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