<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
$_SESSION['memberid'];
$_SESSION['role'];
include('dbconnect.php');
$id1 = $_GET['id1'];

echo "<script>console.log('$id1')</script>";

$sql = "DELETE FROM module_tbl WHERE module_id='" . $id1 . "'";

if (!mysqli_query($con, $sql)) {
    $data = [
        'status' => 'Deleted Successfully',
        'status_text' => 'Department data has been deleted successfully',
        'status_icon' => 'success'
    ];
    return $this->response->setJSON($data);
}

}
else{
    header("Location: /pages/html/login.html");
}
?>