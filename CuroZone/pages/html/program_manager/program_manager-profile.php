<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
$_SESSION['memberid'];
$_SESSION['role'];
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Profile - CuroZone</title>
	<link rel="icon" type="image/png" href="/images/logo.png">
	<link href="/pages/css/styles3.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

<div class="topbar">
		<div class="blank"></div>
		<div class="rolenameimg">
			<img src="/images/nameProgramManager.png" alt="">
		</div>
		<div class="profile">
			<div class="profileIcon">
				<img src="../../../images/user.png" alt="" class="profile-menu-btn">
			</div>
			<div class="profiledropdown">
				<a id="active-item" class="sub-item"><i class="fas fa-user"></i>Profile</a>
				<a href="program_manager-settings.php" class="sub-item"><i class="fas fa-cogs"></i>Settings</a>
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
			<div class="item"><a href="program_manager-dashboard.php" ><i class="fas fa-desktop"></i>Dashboard</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-users"></i>Students
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_students.php" class="sub-item">Add Students</a>
					<a href="program_manager-manage_students.php" class="sub-item">Manage Students</a>
					<a href="program_manager-view_payment_ststus.php" class="sub-item">View Payment Status</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-user"></i>Coordinators
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_coordinators.php" class="sub-item">Add Coordinators</a>
					<a href="program_manager-manage_coordinators.php" class="sub-item">Manage Coordinators</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-user"></i>Lecturers
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_lecturers.php" class="sub-item">Add Lecturers</a>
					<a href="program_manager-manage_lecturers.php" class="sub-item">Manage Lecturers</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-server"></i>Departments
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_departments.php" class="sub-item">Add Departments</a>
					<a href="program_manager-manage_departments.php" class="sub-item">Manage Departments</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-server"></i>Courses
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_courses.php" class="sub-item">Add Courses</a>
					<a href="program_manager-manage_courses.php" class="sub-item">Manage Courses</a>
					<a href="program_manager-manage_modules.php" class="sub-item">Manage Modules</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-address-card"></i>Batches
				<i class="fas fa-angle-right dropdown"></i>
			</a>
			<div class="sub-menu">
				<a href="program_manager-add_batches.php" class="sub-item">Add Batches</a>
				<a href="program_manager-manage_batches.php" class="sub-item">Manage Batches</a>
			</div>
		</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-code"></i>Assignments
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_assignments.php" class="sub-item">Add Assignments</a>
					<a href="program_manager-manage_assignment_schedules.php" class="sub-item">Manage Assignment Schedules</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-pencil"></i>Exams
				<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_exams.php" class="sub-item">Add Exams</a>
					<a href="program_manager-add_exam_schedules.php" class="sub-item">Add Exam Schedules</a>
					<a href="program_manager-manage_exam_schedules.php" class="sub-item">Manage Exam Schedules</a>
				</div>
			</div>
			<div class="item"><a class="sub-btn"><i class="fas fa-graduation-cap"></i>Graduation
				<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_graduation_schedules.php" class="sub-item">Add Graduation Schedules</a>
					<a href="program_manager-manage_graduation_shedules.php" class="sub-item">Manage Graduation Schedules</a>
				</div>
			</div>
			<div class="item"><a href="program_manager-class_schedules.php"><i class="fas fa-calendar"></i>Class Schedules</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-line-chart"></i>Results
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-assignment_results.php" class="sub-item">Assignment Results</a>
					<a href="program_manager-exam_results.php" class="sub-item">Exam Results</a>
				</div>
			</div>
			<div class="item"><a href="program_manager-noticeboard.php"><i class="fas fa-flag"></i>Noticeboard</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-commenting"></i>Messages
				<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-message_lecturers.php" class="sub-item">Lecturers</a>
					<a href="program_manager-message_coordinators.php" class="sub-item">Coordinators</a>
				</div>
			</div>
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
	$result = mysqli_query( $con, $sql);
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
						if($row['role'] == '0'){
							echo "Program Manager";
						}elseif($row['role'] == '1'){
							echo "Coordinator";
						}elseif($row['role'] == '2'){
							echo "Lecturer";
						} ?></td>
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
}
else{
    header("Location: /pages/html/login.html");
}
?>