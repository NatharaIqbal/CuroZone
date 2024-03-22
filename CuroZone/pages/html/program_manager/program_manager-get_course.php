<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
$_SESSION['memberid'];
$_SESSION['role'];
?>
<html>
<?php
include 'dbconnect.php';
$depatment_id =   $_POST['department_id'];
$course_id = $_POST['course_id'];


echo "<script>console.log('test')</script>";
$sql = "SELECT * FROM course_tbl WHERE department_id = '" . $depatment_id . "'";

echo "<option value='' selected disabled>--Select--</option>";

if ($result = $con->query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($course_id = '') {
                $output .= '<option value="' . $row['course_id'] . '">' . $row['course_name'] . '</option>';
            } else {
                if ($course_id == $row['course_id']) {
                    $output .= '<option value="' . $row['course_id'] . '" selected>' . $row['course_name'] . '</option>';
                } else {
                    $output .= '<option value="' . $row['course_id'] . '">' . $row['course_name'] . '</option>';
                }
            }
        }
        echo $output;
    } else {
    }
} else {
}
?>

</html>
<?php
}
else{
    header("Location: /pages/html/login.html");
}
?>