<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
$_SESSION['memberid'];
$_SESSION['role'];
include('dbconnect.php');
$id = $_GET['id'];
echo "<script>console.log('test 1')</script>";
$sql1 = "DELETE FROM login_tbl WHERE member_id='" . $id . "'";
$sql2 = "DELETE FROM employee_tbl WHERE employee_id='" . $id . "'";

if (!mysqli_query($con, $sql1) && !mysqli_query($con, $sql2)) {
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