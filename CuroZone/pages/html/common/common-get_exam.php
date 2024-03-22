<?php
session_start();
include 'dbconnect.php';
$batch_id =   $_POST['batch_id'];
$exam_id = $_POST['exam_id'];

    $sql = "SELECT * FROM exam_tbl WHERE batch_id = '" . $batch_id . "'";

    echo "<option value='' selected disabled>--Select--</option>";

    if ($result = $con->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($course_id = '') {
                $output .= '<option value="' . $row['exam_id'] . '">' . $row['exam_id'] . '</option>';
                }
                else{
                    if ($exam_id == $row['exam_id']) {
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


