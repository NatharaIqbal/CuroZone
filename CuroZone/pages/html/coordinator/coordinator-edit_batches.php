<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'] , $_SESSION['department_id'])) {
$_SESSION['memberid'];
$_SESSION['role'];
$_SESSION['department_id'];
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Edit Batches - CuroZone</title>
	<link rel="icon" type="image/png" href="/images/logo.png">
	<link href="/pages/css/styles3.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>

<div class="topbar">
		<div class="blank"></div>
		<div class="rolenameimg">
			<img src="/images/nameCoordinator.png" alt="">
		</div>
		<div class="profile">
			<div class="profileIcon">
			<img src="../../../images/user.png" alt="" class="profile-menu-btn">
			</div>
			<div class="profiledropdown">
				<a href="coordinator-profile.php" class="sub-item"><i class="fas fa-user"></i>Profile</a>
				<a href="coordinator-settings.php" class="sub-item"><i class="fas fa-cogs"></i>Settings</a>
				<hr>
				<a href="/pages/html/common/log_out.php" class="sub-item" id="logoutbtn"><i class="fas fa-sign-out"></i>Log Out</a>
			</div>
		</div>
	</div>

	<div class="side-bar">
		<header>
			<img src="/images/logo3.png" alt="">
		</header>

		<div class="menu">
			<div class="item"><a href="coordinator-dashboard.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-users"></i>Students
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_students.php" class="sub-item">Add Students</a>
					<a href="coordinator-manage_students.php" class="sub-item">Manage Students</a>
				</div>
			</div>
			<div class="item"><a href="coordinator-graduations.php"><i class="fas fa-graduation-cap"></i>Graduation</a>
			</div>
			<div class="item"><a class="sub-btn" id="active-item"><i class="fas fa-address-card"></i>Batches
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a id="active-item" class="sub-item">Add Batches</a>
					<a href="coordinator-manage_batches.php" class="sub-item">Manage Batches</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-pencil"></i>Exams
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-exam_schedules.php" class="sub-item">Exam Schedules</a>
					<a href="coordinator-manage_exam_admissions.php" class="sub-item">Manage Exam Admissions</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-code"></i>Assignments
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-assignment_schedules.php" class="sub-item">Assignment Schedules</a>
					<a href="coordinator-submitted_assignments.php" class="sub-item">Submitted Assignments</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-calendar"></i>Class Schedules
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_class_schedules.php" class="sub-item">Add Class Schedules</a>
					<a href="coordinator-manage_class_schedules.php" class="sub-item">Manage Class Schedules</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-line-chart"></i>Results
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-assignment_results.php" class="sub-item">Assignment Results</a>
					<a href="coordinator-exam_results.php" class="sub-item">Exam Results</a>
				</div>
			</div>
			<div class="item"><a href="coordinator-course_modules.php"><i class="fas fa-server"></i>Course Modules</a>
			</div>
			<div class="item"><a href="coordinator-course_materials.php"><i class="fas fa-book"></i>Course
					Materials</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-bars"></i>Course Guidlines
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_guidlines.php" class="sub-item">Add Guidlines </a>
					<a href="coordinator-manage_guidlines.php" class="sub-item">Manage Guidlines</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-code"></i>Noticeboard
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_notices.php" class="sub-item">Add Notices</a>
					<a href="coordinator-noticeboard.php" class="sub-item">Noticeboard</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-commenting"></i>Messages
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-message_program_manager.php" class="sub-item">Program Manager</a>
					<a href="coordinator-message_Coordinators.php" class="sub-item">Coordinators</a>
					<a href="coordinator-message_lecturers.php" class="sub-item">Lecturers</a>
					<a href="coordinator-message_students.php" class="sub-item">Students</a>
				</div>
			</div>
			<div class="item"><a href="coordinator-feedbacks.php"><i class="fas fa-rss"></i>Feedbacks</a></div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			$('.sub-btn').click(function() {
				$(this).next('.sub-menu').slideToggle();
				$(this).find('.dropdown').toggleClass('rotate');
			});
		})
	</script>

<div class="mainframe">

<div class="back_btn">
	<a href="coordinator-manage_batches.php"><i class="fas fa-chevron-left"></i> Back</a>
</div>

<div class="welcome">
	<h2 style="text-align: center; padding: 5px;">Edit Batch</h2>
	<hr style="width: 50%; margin:auto;">
	<hr style="width: 50%; margin:auto;">
</div>
<?php
include('dbconnect.php');
$batch_id = $_GET['batch_id'];
//echo "<script>console.log('$batch_id')</script>";
$sql1 = "SELECT * FROM batch_tbl WHERE batch_id='$batch_id'";


$result1 = $con->query($sql1);

if (!$result1) {
	die("invalid query: " . $con->error);
}

while ($row1 = $result1->fetch_assoc()) {
	$course_id = $row1['course_id'];
	$batch_id = $row1['batch_id'];
	$started_date = $row1['started_date'];

	$sql2 = "SELECT department_id FROM course_tbl WHERE course_id='$course_id'";

	$result2 = $con->query($sql2);

	if (!$result2) {
		die("invalid query: " . $con->error);
	}

	while ($row2 = $result2->fetch_assoc()) {
		$department_id = $row2['department_id'];
	}
}
?>

<?php echo "<form id='form1' name='form1' method='post' action='/pages/html/common/common-edit_batch_check.php?batch_id=$batch_id'>" ?>
<table width="40%" class="filltbl">
	<tbody>
		<tr>
			<td style="text-align: right"><label for="select4">Department</label></td>
			<td style="text-align: center">:</td>
			<td style="text-align: left"><select name="departmentselect" id="departmentselect">
					<option value="select" disabled>--Select--</option>
					<?php
					$sql3 = "SELECT * FROM department_tbl";
					$result3 = mysqli_query($con, $sql3);

					while ($row3 = $result3->fetch_assoc()) {
						$department_id2 = $row3['department_id'];
						if ($department_id == $department_id2) {
					?>
							<option value="<?php echo $row3['department_id'] ?>" selected><?php echo $row3['name'] ?></option>
						<?php
						} else {
						?>
							<option value="<?php echo $row3['department_id'] ?>"><?php echo $row3['name'] ?></option>
					<?php
						}
					}
					?>
				</select></td>
		</tr>
		<tr>
			<td style="text-align: right"><label for="select4">Course</label></td>
			<td style="text-align: center">:</td>
			<td style="text-align: left"><select name="courseselect" id="courseselect">
					<option value="select" selected disabled>--Select--</option>
					<?php
					$sql4 = "SELECT * FROM course_tbl WHERE department_id = '" . $department_id . "'";
					$result4 = mysqli_query($con, $sql4);

					while ($row4 = $result4->fetch_assoc()) {
						$course_id2 = $row4['course_id'];
						if ($course_id == $course_id2) {
					?>
							<option value="<?php echo $row4['course_id'] ?>" selected><?php echo $row4['course_id'] ?></option>
						<?php
						} else {
						?>
							<option value="<?php echo $row4['course_id'] ?>"><?php echo $row4['course_id'] ?></option>
					<?php
						}
					}
					?>
				</select></td>
		</tr>
		<tr>
			<td style="text-align: right"><label for="select4">Batch ID</label></td>
			<td style="text-align: center">:</td>
			<td style="text-align: left"><input type="text" name="batchidtxt" id="batchidtxt" value="<?php echo $batch_id; ?>"></td>
		</tr>
		<tr>
			<td style="text-align: right"><label for="date2">Start Date</label></td>
			<td style="text-align: center">:</td>
			<td style="text-align: left"><input type="date" name="datetxt" id="datetxt" value="<?php echo $started_date; ?>"></td>
		</tr>
		<tr>
			<td class="submit-btn" colspan="3" style="text-align: center"><input type="submit" name="submit" id="submit" value="Update"></td>
		</tr>
	</tbody>
</table>

</form>
</div>

	<div class="bottom-bar">
		Copyright &copy; 2023 Group A - HDIT33, ICBT Southern Campus. All rights reserved.
	</div>


	<script>
		$(document).ready(function() {
			$('#departmentselect').on('change', function() {
				var department_id = this.value;
				console.log(department_id);
				$.ajax({
					url: "/pages/html/common/common-get_course.php",
					type: "POST",
					data: {
						department_id: department_id,
					},
					cache: false,
					success: function(result) {
						$('#courseselect').html(result);
					}
				})
			})
		})
	</script>
</body>

</html>

<?php
}
else{
    header("Location: /pages/html/login.html");
}
?>