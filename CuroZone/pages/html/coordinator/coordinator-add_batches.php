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
	<title>Add Batches - CuroZone</title>
	<link rel="icon" type="image/png" href="/images/logo.png">
	<link href="/pages/css/styles3.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
					<a href="coordinator-view_assignments.php" class="sub-item">View Assignments</a>
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
		<div class="welcome">
			<h2 style="text-align: center; padding: 5px;">Add Batches</h2>
			<hr style="width: 50%; margin:auto;">
			<hr style="width: 50%; margin:auto;">
		</div>
		<?php
		include('dbconnect.php');
		$_SESSION["charactor"] = "coordinator";
		?>
		<form id="form1" name="form1" method="post" action="/pages/html/common/common-add_batches_check.php">
			<table width="40%" class="filltbl">
				<tbody>

					<tr>
						<td style="text-align: right"><label for="select4">Course</label></td>
						<td style="text-align: center">:</td>
						<td style="text-align: left"><select name="courseselect" id="courseselect" required>
						<option value="select" selected disabled>--Select--</option>
										<?php
										$sql1 = "SELECT * FROM course_tbl WHERE department_id='" . $_SESSION['department_id'] . "'";
										$result1 = mysqli_query($con, $sql1);

										while ($row1 = $result1->fetch_assoc()) {
										?>
											<option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name'] ?></option>
										<?php
										}
										?>
							</select></td>
					</tr>
					<tr>
						<td style="text-align: right"><label for="select4">Batch ID</label></td>
						<td style="text-align: center">:</td>
						<td style="text-align: left"><input type="text" name="batchidtxt" id="batchidtxt" required></td>
					</tr>
					<tr>
						<td style="text-align: right"><label for="date2">Start Date</label></td>
						<td style="text-align: center">:</td>
						<td style="text-align: left"><input type="date" name="datetxt" id="datetxt" required></td>
					</tr>
					<tr>
						<td class="submit-btn" colspan="3" style="text-align: center"><input type="submit" name="submit" id="submit" value="Submit"></td>
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