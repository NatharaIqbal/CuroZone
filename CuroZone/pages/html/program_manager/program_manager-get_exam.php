<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
$_SESSION['memberid'];
$_SESSION['role'];
include 'dbconnect.php';
$batch_id =   $_POST['batch_id'];
$exam_id = $_POST['exam_id'];


    echo "<script>console.log('test')</script>";
    $sql = "SELECT * FROM exam_tbl WHERE batch_id = '" . $batch_id . "'";

    echo "<option value='' selected disabled>--Select--</option>";

    if ($result = $con->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($batch_id = '') {
                $output .= '<option value="' . $row['exam_id'] . '">' . $row['exam_id'] . '</option>';
                }
                else{
                    if ($batch_id == $row['batch_id']) {
                    $output .= '<option value="' . $row['exam_id'] . '" selected>' . $row['exam_id'] . '</option>';
                    }
                    else{
                        $output .= '<option value="' . $row['exam_id'] . '">' . $row['exam_id'] . '</option>';
                    }
                }
            }
            echo $output;
        } else {
        }
    } else {
    }
}
else{
    header("Location: /pages/html/login.html");
}
?>

