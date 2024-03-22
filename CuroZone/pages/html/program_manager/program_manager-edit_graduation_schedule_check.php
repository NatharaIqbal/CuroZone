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
		<title>Edit Graduation Schedules - CuroZone</title>
		<link rel="icon" type="image/png" href="/images/logo.png">
<link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<?php
		include('dbconnect.php');
		$sql1 = "UPDATE graduation_tbl SET graduation_id='" . $_POST['graduation_id'] . "', title='" . $_POST['title'] . "', department_id='" . $_POST['departmentselect'] . "', graduation_date='" . $_POST['graduationdate'] . "', location='" . $_POST['location'] . "', start_time='" . $_POST['starttime'] . "' WHERE graduation_id = '" . $_SESSION['graduation_id'] . "'";
		if (mysqli_query($con, $sql1)) {
		?>
			<div class="div1-1">
				<img src="/images/check.png" alt="Success image">
				<h1 class="success">Success!</h1>
				<h4>Geaduation Schedule updated.</h4>
				<button onclick="location.href='program_manager-manage_graduation_shedules.php'" type="button">OK</button>
			</div>
		<?php
		} else {
		?>
			<div class="div1-1">
				<img src="/images/error.png" alt="error image">
				<h1 class="error">Ooops!</h1>
				<h4>Geaduation Schedule update failded.</h4>
				<button onclick="location.href='program_manager-edit_graduation_schedule.php'" type="button">OK</button>
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