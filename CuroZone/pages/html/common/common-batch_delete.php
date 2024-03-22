<?php
include('dbconnect.php');
$id = $_GET['id'];
echo "<script>console.log('test 1')</script>";
$sql = "DELETE FROM batch_tbl WHERE batch_id='" . $id . "'";

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