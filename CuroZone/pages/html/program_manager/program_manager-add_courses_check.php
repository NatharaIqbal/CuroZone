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
        <title>Add Course - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <?php
        //connect database
        include('dbconnect.php');

                $sql1 = "INSERT INTO course_tbl VALUES ('" . $_SESSION['course_id'] . "','" . $_SESSION['course_name'] . "','" . $_SESSION['department'] . "','" . $_SESSION['start_date'] . "','" . $_SESSION['duration'] . "')";
                if (mysqli_query($con, $sql1)) {

                    for ($x = 1; $x <= $_SESSION['modulenum']; $x++) {
                        $sql2 = "INSERT INTO module_tbl VALUES ('" . $_POST["moduleidtxt+$x"] . "','" . $_SESSION['course_id'] . "','" . $_POST["modulenametxt+$x"] . "','" . $_POST["semestertxt+$x"] . "')";
                        if (mysqli_query($con, $sql2)) {
        ?>
                            <div class="div1-1">
                                <img src="/images/check.png" alt="Success image">
                                <h1 class="success">Success!</h1>
                                <h4>Course added.</h4>
                                <button onclick="link()">OK</button>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="div1-1">
                                <img src="/images/error.png" alt="error image">
                                <h1 class="error">Ooops!</h1>
                                <h4>Course Adding Failded.</h4>
                                <button onclick="link()">OK</button>
                            </div>
                    <?php
                        }
                    }
                } else {
                    ?>
                    <div class="div1-1">
                        <img src="/images/error.png" alt="error image">
                        <h1 class="error">Ooops!</h1>
                        <h4>Course Adding Failded.</h4>
                        <button onclick="link()">OK</button>
                    </div>
        <?php
                }
        ?>

        <script>
            function link() {
                window.location.href = "program_manager-add_courses.php";
            }
        </script>
    </body>

    </html>

<?php
} else {
    header("Location: /pages/html/login.html");
}
?>