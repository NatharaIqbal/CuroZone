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
		<title>Edit Department - CuroZone</title>
		<link rel="icon" type="image/png" href="/images/logo.png">
		<link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<?php
		include('dbconnect.php');
		$department_id = $_GET['department_id'];
		$sql = "UPDATE department_tbl SET name='" . $_POST['departmentnametxt'] . "' WHERE department_id='" . $department_id . "' ";

		if (!mysqli_query($con, $sql)) {
		?>
			<div class="div1-1">
				<img src="/images/error.png" alt="error image">
				<h1 class="error">Ooops!</h1>
				<h4>Department update faild.</h4>
				<button onclick="location.href='program_manager-manage_departments.php'" type="button">OK</button>
			</div>
		<?php
		} else {
		?> <div class="div1-1">
				<img src="/images/check.png" alt="Success image">
				<h1 class="success">Success!</h1>
				<h4>Department updated.</h4>
				<button onclick="location.href='program_manager-manage_departments.php'" type="button">OK</button>
			</div> <?php
				}
					?>
	</body>

	</html>
<?php
} else {
	header("Location: /pages/html/login.html");
}
?>