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
		<title>Add Graduation Schedule - CuroZone</title>
		<link rel="icon" type="image/png" href="/images/logo.png">
		<link href="/pages/css/styles4.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<?php
		include('dbconnect.php');

		$graduation_id = $_POST['graduation_id'];
		$title = $_POST['title'];
		$departmentselect = $_POST['departmentselect'];
		$graduationdate = $_POST['graduationdate'];
		$location = $_POST['location'];
		$starttime = $_POST['starttime'];
		$courses = $_POST['courseselect'];

		$sql1 = "SELECT * FROM graduation_tbl WHERE graduation_id = '" . $graduation_id . "' AND graduation_date = '" . $graduationdate . "' AND start_time = '" . $starttime . "'";

		$result = mysqli_query($con, $sql1);

		if (mysqli_num_rows($result) == 0) {
			$sql2 = "INSERT INTO graduation_tbl VALUES ('" . $graduation_id . "','" . $title . "','" . $departmentselect . "','" . $graduationdate . "','" . $starttime . "','" . $location . "')";

			$result2 = mysqli_query($con, $sql2);
			if ($result2) {
				foreach ($courses as $courselist) {
					$sql3 = "INSERT INTO graduation_course_btl VALUES ('" . $graduation_id . "','" . $courselist . "')";
					$result3 = mysqli_query($con, $sql3);
					if ($result3) {
		?>
						<div class="div1-1">
							<img src="/images/check.png" alt="Success image">
							<h1 class="success">Success!</h1>
							<h4>Graduation Schedule Added.</h4>
							<button onclick="location.href='program_manager-add_graduation_schedules.php'" type="button">OK</button>
						</div>
				<?php
					}
				}
			} else {
				?>
				<div class="div1-1">
					<img src="/images/error.png" alt="error image">
					<h1 class="error">Ooops!</h1>
					<h4>Graduation Schedule Adding Failed.</h4>
					<button onclick="location.href='program_manager-add_graduation_schedules.php'" type="button">OK</button>
				</div>
		<?php
			}
		}
		?>
	</body>

	</html>
<?php
} else {
	header("Location: /pages/html/login.html");
}
?>