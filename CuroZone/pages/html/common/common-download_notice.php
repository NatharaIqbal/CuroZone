<?php
include('dbconnect.php');

$id = $_GET['id'];

$sql = "SELECT notice_file, file_name, file_type FROM notice_tbl WHERE notice_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->bind_result($file, $file_name, $file_type);

if ($stmt->fetch()) {
    header("Content-type: $file_type"); // Use the correct variable $file_type
    header("Content-Disposition: attachment; filename=$file_name"); // Use the correct variable $file_name
    echo $file; // Use the correct variable $file
} else {
    echo "File not found.";
}

$stmt->close();
?>