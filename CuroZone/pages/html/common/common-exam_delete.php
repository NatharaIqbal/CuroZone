<?php
include('dbconnect.php');
$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
echo "<script>console.log('test 1')</script>";
$sql = "DELETE FROM exam_tbl WHERE batch_id='" . $id1 . "' AND exam_id='" . $id2 . "'";

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