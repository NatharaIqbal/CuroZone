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
	<title>Graduations - CuroZone</title>
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
			<div class="item"><a id="active-item"><i class="fas fa-graduation-cap"></i>Graduation</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-address-card"></i>Batches
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_batches.php" class="sub-item">Add Batches</a>
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
		<div class="welcome">
			<h2 style="text-align: center; padding: 5px;">Graduations</h2>
			<hr style="width: 50%; margin:auto;">
			<hr style="width: 50%; margin:auto;">
		</div>

		<?php
		include('dbconnect.php');
		$sql = "SELECT * FROM graduation_tbl";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) {
				$graduation_id = $row['graduation_id'];
				$department_id = $row['department_id'];
				$sql1 = "SELECT * FROM graduation_course_btl WHERE graduation_id = '" . $graduation_id . "'";
				$result1 = mysqli_query($con, $sql1);
				$sql2 = "SELECT * FROM department_tbl WHERE department_id = '" . $department_id . "'";
				$result2 = mysqli_query($con, $sql2);
				$row2 = mysqli_fetch_assoc($result2);
		?>
				<div class="graduationScheduleFrame">
					<div class="graduationSchedule">
						<div class="graduationDetails">
							<table width=100% border="0px">
								<tbody>
									<tr>
										<td rowspan="5" width=45% style="border-right: 2px solid rgba(123, 123, 123, 0.272) ;">
											<h2 class='graduationTopic'><?php echo "$row[title]"; ?></h2>
										</td>
										<td width=20% style="text-align:right; font-weight: bold;">Date : </td>

										<td width=35% style="text-align:left;"><?php echo "$row[graduation_date]"; ?>7</td>
									</tr>
									<tr>
										<td style="text-align:right; font-weight: bold;">Time : </td>
										<td style="text-align:left;"><?php echo "$row[start_time]"; ?></td>
									</tr>
									<tr>
										<td style="text-align:right; font-weight: bold;">Location : </td>
										<td style="text-align:left;"><?php echo "$row[location]"; ?></td>
									</tr>
									<tr>
										<td style="text-align:right; font-weight: bold;">Department : </td>
										<td style="text-align:left;"><?php echo "$row2[name]"; ?></td>
									</tr>
									<tr>
										<td style="text-align:right; font-weight: bold;">Courses : </td>
										<td style="text-align:left;"><?php while ($row1 = mysqli_fetch_array($result1)) {
																			$sql2 = "SELECT * FROM course_tbl WHERE course_id = '" . $row1['course_id'] . "'";
																			$result2 = mysqli_query($con, $sql2);
																			while ($row2 = mysqli_fetch_assoc($result2)) {
																				echo "$row2[course_name]<br>";
																			}
																		} ?>
										</td>

									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
		<?php
			}
		}
		?>
	</div>

	<div class="bottom-bar">
		Copyright &copy; 2023 Group A - HDIT33, ICBT Southern Campus. All rights reserved.
	</div>

</body>

</html>

<?php
}
else{
    header("Location: /pages/html/login.html");
}
?>