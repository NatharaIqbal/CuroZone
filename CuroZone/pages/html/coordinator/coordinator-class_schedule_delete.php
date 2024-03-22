<?php
include('dbconnect.php');
echo "<script>console.log('test 2')</script>";
$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
$id3 = $_GET['id3'];
$id4 = $_GET['id4'];
$id5 = $_GET['id5'];
echo "<script>console.log('test 1')</script>";
$sql = "DELETE FROM class_shedule_tbl WHERE batch_id='" . $id1 . "' AND classlocation='" . $id2 . "' AND time_period='" . $id3 . "' AND classdate='" . $id4 . "' AND lecturer_id='" . $id5 . "'";

if (!mysqli_query($con, $sql)) {
    $data = [
        'status' => 'Deleted Successfully',
        'status_text' => 'Department data has been deleted successfully',
        'status_icon' => 'success'
    ];
    return $this->response->setJSON($data);
}
else
{

}
?>