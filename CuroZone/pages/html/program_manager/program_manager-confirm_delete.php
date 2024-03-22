<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
$_SESSION['memberid'];
$_SESSION['role'];
include('dbconnect.php');
$id = $_GET['id'];
echo "<script>console.log('test 1')</script>";
$sql = "DELETE FROM department_tbl WHERE department_id='" . $id . "'";

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
}
else{
    header("Location: /pages/html/login.html");
}
?>