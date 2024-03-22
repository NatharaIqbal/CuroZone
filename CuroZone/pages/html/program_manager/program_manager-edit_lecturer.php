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
	<title>Edit Lecturers - CuroZone</title>
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
			<img src="/images/nameProgramManager.png" alt="">
		</div>
		<div class="profile">
			<div class="profileIcon">
				<img src="../../../images/user.png" alt="" class="profile-menu-btn">
			</div>
			<div class="profiledropdown">
				<a href="program_manager-profile.php" class="sub-item"><i class="fas fa-user"></i>Profile</a>
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
			<div class="item"><a href="program_manager-dashboard.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
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
			<div class="item"><a class="sub-btn" id="active-item"><i class="fas fa-user"></i>Lecturers
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="program_manager-add_lecturers.php" class="sub-item">Add Lecturers</a>
					<a id="active-item" class="sub-item">Manage Lecturers</a>
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
			})
		})
	</script>

	<div class="mainframe">
	<div class="back_btn">
            <a href="program_manager-manage_lecturers.php"><i class="fas fa-chevron-left"></i> Back</a>
        </div>
		<div class="welcome">
			<h2 style="text-align: center; padding: 5px;">Edit Lecturer Details</h2>
			<hr style="width: 50%; margin:auto;">
			<hr style="width: 50%; margin:auto;">
			<?php
			include('dbconnect.php');
			$_SESSION['employee_role'] = '2';
			$_SESSION['employee_id'] = $_GET['employee_id'];

			$employee_id = $_GET['employee_id'];

			$sql = "SELECT * FROM employee_tbl WHERE employee_id = '" . $employee_id . "'";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			?>
			<form id="form1" name="form1" method="post" action="/pages/html/common/common-edit_employee_check.php">
				<table width="40%" class="filltbl">
					<tbody>
						<tr>
							<td width="35%" style="text-align: right"><label for="textfield">First Name</label></td>
							<td width="8%" style="text-align: center">:</td>
							<td width="57%" style="text-align: left"><input type="text" name="firstnametxt" id="firstnametxt" value="<?php echo "$row[first_name]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield6">Last Name</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="text" name="lastnametxt" id="lastnametxt" value="<?php echo "$row[last_name]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="date2">Date of Birth</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="date" name="dobtxt" id="dobtxt" value="<?php echo "$row[dob]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="select3">Gender</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><select name="genderselect" id="genderselect">
									<?php
									if ($row['gender'] == 'male') {
									?>
										<option value="Select" disabled>--Select--</option>
										<option value="male" selected>Male</option>
										<option value="female">Female</option>
									<?php
									} else {
									?>
										<option value="Select" disabled>--Select--</option>
										<option value="male">Male</option>
										<option value="female" selected>Female</option>
									<?php
									}
									?>

								</select></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield7">NIC</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="text" name="nictxt" id="nictxt" value="<?php echo "$row[nic]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield8">Phone</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="text" name="phonetxt" id="phonetxt" value="<?php echo "$row[phone]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield9">Email</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><input type="email" name="emailtxt" id="emailtxt" value="<?php echo "$row[email]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="select4">Department</label></td>
							<td style="text-align: center">:</td>
							<td style="text-align: left"><select name="departmentselect" id="departmentselect">
									<option value="" disabled>--Select--</option>
									<?php
									$sql1 = "SELECT * FROM department_tbl";
									$result1 = mysqli_query($con, $sql1);

									while ($row1 = $result1->fetch_assoc()) {
										if ($row1['department_id'] == $row['department_id']) {
									?>
											<option value="<?php echo $row1['department_id'] ?>" selected><?php echo $row1['name'] ?></option>
										<?php
										} else {
										?>
											<option value="<?php echo $row1['department_id'] ?>"><?php echo $row1['name'] ?></option>
									<?php
										}
									}
									?>
								</select></td>
						</tr>
						<tr>
							<td class="submit-btn" colspan="3" style="text-align: center"><input type="submit" name="submit" id="submit" value="Update"></td>
						</tr>
					</tbody>
				</table>
			</form>
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