<?php
session_start();
include 'dbconnect.php';
$course_id =   $_POST['course_id'];
$batch_id = $_POST['batch_id'];


//echo "<script>console.log('test')</script>";
$sql = "SELECT * FROM batch_tbl WHERE course_id = '" . $course_id . "'";

echo "<option value='' selected disabled>--Select--</option>";

if ($result = $con->query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($batch_id == '') {
                $output .= '<option value="' . $row['batch_id'] . '">' . $row['batch_id'] . '</option>';
            } else {
                if ($batch_id == $row['batch_id']) {
                    $output .= '<option value="' . $row['batch_id'] . '" selected>' . $row['batch_id'] . '</option>';
                } else {
                    $output .= '<option value="' . $row['batch_id'] . '">' . $row['batch_id'] . '</option>';
                }
            }
        }
        echo $output;
    } else {
    }
} else {
}
