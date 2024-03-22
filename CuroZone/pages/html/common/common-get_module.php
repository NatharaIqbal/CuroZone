<?php
session_start();
include 'dbconnect.php';
$course_id =   $_POST['course_id'];
$module_id = $_POST['module_id'];


    //echo "<script>console.log('test')</script>";
    $sql = "SELECT * FROM module_tbl WHERE course_id = '" . $course_id . "'";

   echo "<option value='' selected disabled>--Select--</option>";

    if ($result = $con->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($course_id = '') {
                $output .= '<option value="' . $row['module_id'] . '">' . $row['name'] . '</option>';
                }
                else{
                    if ($course_id == $row['course_id']) {
                    $output .= '<option value="' . $row['module_id'] . '" selected>' . $row['name'] . '</option>';
                    }
                    else{
                        $output .= '<option value="' . $row['module_id'] . '">' . $row['name'] . '</option>';
                    }
                }
            }
            echo $output;
        } else {
        }
    } else {
    }