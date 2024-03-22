<?php
session_start();
include 'dbconnect.php';
$batch_id =   $_POST['batch_id'];
$assignment_id = $_POST['assignment_id'];


    echo "<script>console.log('test')</script>";
    $sql = "SELECT * FROM assignment_tbl WHERE batch_id = '" . $batch_id . "'";

    echo "<option value='' selected disabled>--Select--</option>";

    if ($result = $con->query($sql)) {
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                if ($batch_id = '') {
                $output .= '<option value="' . $row['assignment_id'] . '">' . $row['assignment_id'] . '</option>';
                }
                else{
                    if ($assignment_id == $row['assignment_id']) {
                    $output .= '<option value="' . $row['assignment_id'] . '" selected>' . $row['assignment_id'] . '</option>';
                    }
                    else{
                        $output .= '<option value="' . $row['assignment_id'] . '">' . $row['assignment_id'] . '</option>';
                    }
                }
            }
            echo $output;
        } else {
        }
    } else {
    }


