<?php
session_start();
include 'dbconnect.php';
$module_id =   $_POST['module_id'];
$lecturer_id = $_POST['lecturer_id'];


echo "<script>console.log('test')</script>";
$sql = "SELECT * FROM module_lecturer_tbl WHERE module_id = '" . $module_id . "'";

echo "<option value='' selected disabled>--Select--</option>";

if ($result = $con->query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $sql1 = "SELECT * FROM employee_tbl WHERE employee_id='" . $row['lecturer_id'] . "'";
            $result1 = mysqli_query($con, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            if ($module_id = '') {
                $output .= '<option value="' . $row['lecturer_id'] . '">' . $row['lecturer_id'] . '</option>';
            } else {
                if ($module_id == $row['module_id']) {
                    $output .= '<option value="' . $row['lecturer_id'] . '" selected>' . $row['lecturer_id'] . '</option>';
                } else {
                    $output .= '<option value="' . $row['lecturer_id'] . '">' . $row1['first_name'] . ' ' . $row1['last_name'] . '</option>';
                }
            }
        }
        echo $output;
    } else {
    }
} else {
}
