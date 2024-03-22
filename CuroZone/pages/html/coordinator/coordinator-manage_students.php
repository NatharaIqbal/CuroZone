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
	<title>Manage Students - CuroZone</title>
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
			<div class="item"><a class="sub-btn" id="active-item"><i class="fas fa-users"></i>Students
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="coordinator-add_students.php" class="sub-item">Add Students</a>
					<a id="active-item" class="sub-item">Manage Students</a>
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
					<a href="coordinator-message_Coordinators.php" class="sub-item">Coordinators/a>
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
			<h2 style="text-align: center; padding: 5px;">Manage Students</h2>
			<hr style="width: 50%; margin:auto;">
			<hr style="width: 50%; margin:auto;">
			<?php
			include('dbconnect.php');
			?>
			<form id="form1" name="form1" method="post">
				<table class="searchtbl">
					<tbody>
						<tr>
							<td style="text-align: center"><label for="select">Department : </label><select name="departmentselect" id="departmentselect">
									<option value="">--Select--</option>
									<?php
									$sql = "SELECT * FROM department_tbl";
									$result = mysqli_query($con, $sql);

									while ($row = $result->fetch_assoc()) {
									?>
										<option value="<?php echo $row['department_id'] ?>"><?php echo $row['name'] ?></option>
									<?php
									}
									?>
								</select></td>
							<td style="text-align: center"><label for="select2">Course : </label><select name="courseselect" id="courseselect">
								</select></td>
							<td style="text-align: center"><label for="select3">Batch : </label><select name="batchselect" id="batchselect">
								</select></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div class="task">
			<table width="100%" align="center">
				<thead class="titles">
					<tr>
						<th style="padding: 10px;">Student ID</th>
						<th>First Name</th>
						<th>Last Nmae</th>
						<th>Date of Birth</th>
						<th>Gender</th>
						<th>NIC</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Batch ID</th>
						<th colspan="2">Options</th>
					</tr>
				</thead>

				<!--all students-->
				<tbody>
					<?php

					$sql = "SELECT * FROM student_tbl";

					$result = $con->query($sql);

					if (!$result) {
						die("invalid query: " . $con->error);
					}

					while ($row = $result->fetch_assoc()) {
					?>
						<tr>
							<td><?php echo $row['student_id'] ?></td>
							<td><?php echo $row['first_name'] ?></td>
							<td><?php echo $row['last_name'] ?></td>
							<td><?php echo $row['dob'] ?></td>
							<td><?php echo $row['gender'] ?></td>
							<td><?php echo $row['nic'] ?></td>
							<td><?php echo $row['phone'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['batch_id'] ?></td>
							<td>
								<?php echo "<form id='form1' name='form1' method='post' action='coordinator-edit_students.php?student_id=$row[student_id]'>" ?>
								<button type="submit" value="<?php echo $row['student_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
								</form>
							</td>
							<td><button type="button" value="<?php echo $row['student_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
						</tr>
					<?php
					}
					?>

					<script>
						$(document).ready(function() {
							$('.confirm_del_btn').click(function(e) {
								e.preventDefault();
								var id = $(this).val();

								swal({
										title: "Are you sure?",
										text: "Once deleted, you will not be able to recover this data!",
										icon: "warning",
										buttons: true,
										dangerMode: true,
									})
									.then((willDelete) => {
										if (willDelete) {
											$.ajax({
												url: "coordinator-student_delete.php?id=" + id,
												success: function(response) {
													swal("Student deleted!", {
														icon: "success",
													}).then((confirmed) => {
														window.location.reload();
													});
												}
											});
										} else {

										}
									});
							});
						});
					</script>
				</tbody>
			</table>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#departmentselect').on('change', function() {
				var department_id = this.value;
				//console.log(department_id);
				$.ajax({
					url: "/pages/html/common/common-get_course.php",
					type: "POST",
					data: {
						department_id: department_id
					},
					cache: false,
					success: function(result) {
						$('#courseselect').html(result);
					}
				})
			})
		})
	</script>

	<script>
		$(document).ready(function() {
			$('#courseselect').on('change', function() {
				var course_id = this.value;
				//console.log(course_id);
				$.ajax({
					url: "/pages/html/common/common-get_batch.php",
					type: "POST",
					data: {
						course_id: course_id
					},
					cache: false,
					success: function(result) {
						$('#batchselect').html(result);
					}
				})
			})
		})
	</script>

	<script>
		$(document).ready(function() {
			$('#departmentselect').on('change', function() {
				var department_id = $(this).val();
				var course_id = 'null';
				var batch_id = 'null';
				//console.log(batch_id);
				$.ajax({
					url: "/pages/html/common/common-filter_student.php",
					type: "POST",
					data: '&department_id=' + department_id + '&course_id=' + course_id + '&batch_id=' + batch_id,
					beforeSend: function() {
						$('.task').html("<span>Working...</span>");
					},
					success: function(data) {
						$(".task").html(data);
					}
				})
			})
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#courseselect').on('change', function() {
				var department_id = $('#departmentselect').val();
				var course_id = $(this).val();
				var batch_id = 'null';
				//console.log(batch_id);
				$.ajax({
					url: "/pages/html/common/common-filter_student.php",
					type: "POST",
					data: '&department_id=' + department_id + '&course_id=' + course_id + '&batch_id=' + batch_id,
					beforeSend: function() {
						$('.task').html("<span>Working...</span>");
					},
					success: function(data) {
						$(".task").html(data);
					}
				})
			})
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#batchselect').on('change', function() {
				var department_id = $('#departmentselect').val();
				var course_id = $('#courseselect').val();
				var batch_id = $(this).val();
				//console.log(batch_id);
				$.ajax({
					url: "/pages/html/common/common-filter_student.php",
					type: "POST",
					data: '&department_id=' + department_id + '&course_id=' + course_id + '&batch_id=' + batch_id,
					beforeSend: function() {
						$('.task').html("<span>Working...</span>");
					},
					success: function(data) {
						$(".task").html(data);
					}
				})
			})
		});
	</script>

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