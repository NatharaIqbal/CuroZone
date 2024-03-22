<?php
session_start();
include 'dbconnect.php';
$batch_id =   $_POST['batch_id'];
$student_id = $_POST['student_id'];


    echo "<script>console.log('test')</script>";
    $sql = "SELECT * FROM student_tbl WHERE batch_id = '" . $batch_id . "'";

    echo "<option value='' selected disabled>--Select--</option>";

    if ($result = $con->query($sql)) {
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                if ($batch_id = '') {
                $output .= '<option value="' . $row['student_id'] . '">' . $row['student_id'] . '</option>';
                }
                else{
                    if ($student_id == $row['student_id']) {
                    $output .= '<option value="' . $row['student_id'] . '" selected>' . $row['student_id'] . '</option>';
                    }
                    else{
                        $output .= '<option value="' . $row['student_id'] . '">' . $row['student_id'] . '</option>';
                    }
                }
            }
            echo $output;
        } else {
        }
    } else {
    }


