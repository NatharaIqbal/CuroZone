<?php
include('dbconnect.php');

$id1 = $_GET['id1'];
$id2 = $_GET['id2'];

$sql = "SELECT 	assignment_file, file_name, file_type FROM submitted_assignment_tbl WHERE student_id = ? AND assignment_id= ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $id1, $id2);
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