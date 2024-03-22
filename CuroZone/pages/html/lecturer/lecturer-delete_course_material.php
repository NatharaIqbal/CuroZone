<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'] , $_SESSION['department_id'])) {
$_SESSION['memberid'];
$_SESSION['role'];
$_SESSION['department_id'];

include('dbconnect.php');
$id = $_GET['id'];
echo "<script>console.log('test 1')</script>";
$sql = "DELETE FROM course_metirials_tbl WHERE meaterial_id='" . $id . "'";

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