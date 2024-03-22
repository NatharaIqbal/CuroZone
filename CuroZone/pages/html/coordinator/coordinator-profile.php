<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['department_id'])) {
	$_SESSION['memberid'];
	$_SESSION['role'];
	$_SESSION['department_id'];
?>
<script>console.log($_SESSION['memberid'])</script>
	<!doctype html>
	<html>

	<head>
		<meta charset="utf-8">
		<title>Dasboard - CuroZone</title>
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
					<a id="active-item" class="sub-item"><i class="fas fa-user"></i>Profile</a>
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
		<?php
		include('dbconnect.php');
		$sql = "SELECT * FROM employee_tbl WHERE employee_id = '" . $_SESSION['memberid'] . "'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		?>
		<div class="mainframe">
			<div class="welcome">
				<h2 style="text-align: center; padding: 5px;">Profile</h2>
				<hr style="width: 50%; margin:auto;">
				<hr style="width: 50%; margin:auto;">
				<table class="profile" width="70%">
					<tbody>
						<tr>
							<td width="40%" rowspan="11">
								<div class="profileimage">
									<img class="dp" src="/images/user.png" alt="">
								</div>
							</td>
						</tr>
						<tr>
							<td width=30% style="text-align:right; font-weight: bold;">Employee ID :</td>
							<td style="text-align:left;"><?php echo strtoupper($row['employee_id']); ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">Role :</td>
							<td style="text-align:left;">
								<?php
								if ($row['role'] == '0') {
									echo "Program Manager";
								} elseif ($row['role'] == '1') {
									echo "Coordinator";
								} elseif ($row['role'] == '2') {
									echo "Lecturer";
								} ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">Department :</td>
							<?php
							$sql1 = "SELECT * FROM department_tbl WHERE department_id='" . $_SESSION['department_id'] . "'";
							$result1 = mysqli_query($con, $sql1);
							$row1 = mysqli_fetch_assoc($result1);
							?>
							<td style="text-align:left;"><?php echo "$row1[name]"; ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">First Name :</td>
							<td style="text-align:left;"><?php echo "$row[first_name]"; ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">Last Name :</td>
							<td style="text-align:left;"><?php echo "$row[last_name]"; ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">Date of Birth :</td>
							<td style="text-align:left;"><?php echo "$row[dob]"; ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">Gender :</td>
							<td style="text-align:left;"><?php echo "$row[gender]"; ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">NIC :</td>
							<td style="text-align:left;"><?php echo "$row[nic]"; ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">Phone :</td>
							<td style="text-align:left;"><?php echo "$row[phone]"; ?></td>
						</tr>
						<tr>
							<td style="text-align: right; font-weight: bold;">Email :</td>
							<td style="text-align:left;"><?php echo "$row[email]"; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="bottom-bar">
			Copyright &copy; 2023 Group A - HDIT33, ICBT Southern Campus. All rights reserved.
		</div>
	</body>

	</html>

<?php
} else {
	header("Location: /pages/html/login.html");
}
?>