<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'])) {
	$_SESSION['memberid'];
	$_SESSION['role'];
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit Course - CuroZone</title>
		<link rel="icon" type="image/png" href="/images/logo.png">
<link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<?php
		include('dbconnect.php');
		$course_id = $_GET['course_id'];
		$sql1 = "UPDATE course_tbl SET department_id='" . $_POST['departmentselect'] . "', course_id='" . $_POST['courseidtxt'] . "', course_name='" . $_POST['coursenametxt'] . "', started_date='" . $_POST['datetxt'] . "', duration='" . $_POST['durationtxt'] . "' WHERE course_id = '" . $course_id . "'";

		if (mysqli_query($con, $sql1)) {
		?>
			<div class="div1-1">
				<img src="/images/check.png" alt="Success image">
				<h1 class="success">Success!</h1>
				<h4>Course details updated.</h4>
				<button onclick="location.href='program_manager-manage_courses.php'" type="button">OK</button>
			</div>
		<?php
		} else {
		?>
			<div class="div1-1">
				<img src="/images/error.png" alt="error image">
				<h1 class="error">Ooops!</h1>
				<h4>Course update failded.</h4>
				<button onclick="location.href='program_manager-manage_courses.php'" type="button">OK</button>
			</div>
		<?php
		}
		?>
	</body>

	</html>

<?php
} else {
	header("Location: /pages/html/login.html");
}
?>