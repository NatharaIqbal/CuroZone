<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'] , $_SESSION['department_id'])) {
$_SESSION['memberid'];
$_SESSION['role'];
$_SESSION['department_id'] = 'DEP01';
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Students - CuroZone</title>
	<link rel="icon" type="image/png" href="/images/logo.png">
	<link href="/pages/css/styles3.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

	<div class="topbar">
		<div class="blank"></div>
		<div class="rolenameimg">
			<img src="/images/nameLecturer.png" alt="">
		</div>
		<div class="profile">
			<div class="profileIcon">
				<img src="../../../images/user.png" alt="" class="profile-menu-btn">
			</div>
			<div class="profiledropdown">
				<a href="lecturer-profile.php" class="sub-item"><i class="fas fa-user"></i>Profile</a>
				<a href="lecturer-settings.php" class="sub-item"><i class="fas fa-cogs"></i>Settings</a>
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
			<div class="item"><a href="lecturer-dashboard.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
			<div class="item"><a id="active-item"><i class="fas fa-users"></i>Students</a></div>
			<div class="item"><a href="lecturer-graduations.php"><i class="fas fa-graduation-cap"></i>Graduations</a></div>
			<div class="item"><a href="lecturer-exam_schedules.php"><i class="fas fa-pencil"></i>Exam Schedules</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-code"></i>Assignments
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="lecturer-assignment_schedules.php" class="sub-item">Assignment Schedules</a>
					<a href="lecturer-view_assignments.php" class="sub-item">View Assignments</a>
				</div>
			</div>
			<div class="item"><a href="lecturer-class_schedules.php"><i class="fas fa-calendar"></i>Class Schedules</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-line-chart"></i>Results
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
				<a href="lecturer-add_assignment_results.php" class="sub-item">Add Assignment Results</a>
                        <a href="lecturer-manage_assignment_results.php" class="sub-item">Manage Assignment Results</a>
                        <a href="lecturer-add_exam_results.php" class="sub-item">Add Exam Results</a>
                        <a href="lecturer-manage_exam_results.php" class="sub-item">Manage Exam Results</a>
				</div>
			</div>
			<div class="item"><a href="lecturer-course_modules.php"><i class="fas fa-server"></i>Course Modules</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-line-chart"></i>Course Materials
						<i class="fas fa-angle-right dropdown"></i>
					</a>
					<div class="sub-menu">
						<a href="lecturer-add_course_materials.php" class="sub-item">Add Course Materials</a>
						<a href="lecturer-manage_course_materials.php" class="sub-item">Manage Course Materials</a>
					</div>
				</div>
			<div class="item"><a href="lecturer-course_guidlines.php"><i class="fas fa-bars"></i>Course Guidlines</a></div>
			<div class="item"><a href="lecturer-noticeboard.php"><i class="fas fa-flag"></i>Noticeboard</a></div>
			<div class="item"><a class="sub-btn"><i class="fas fa-commenting"></i>Messages
					<i class="fas fa-angle-right dropdown"></i>
				</a>
				<div class="sub-menu">
					<a href="lecturer-message_admin.php" class="sub-item">Program Manager</a>
					<a href="lecturer-message_coordinators.php" class="sub-item">Coordinators</a>
					<a href="lecturer-message_student.php" class="sub-item">Students</a>
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
						<td style="text-align: center"><label for="select">Course : </label><select name="courseselect" id="courseselect">
                                    <option value="" selected disabled>--Select--</option>
                                    <?php
                                    $sql = "SELECT * FROM course_tbl WHERE department_id = '" . $_SESSION['department_id'] . "'";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value='<?php echo $row['course_id'] ?>'><?php echo $row['course_name'] ?></option>
                                    <?php
                                    }
                                    ?>
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
					</tr>
				</thead>

				<!--all students-->
				<tbody>
					<?php

					$sql1 = "SELECT * FROM student_tbl";
					$result1 = $con->query($sql1);
					while ($row1 = $result1->fetch_assoc()) {
						$sql2 = "SELECT * FROM batch_tbl WHERE batch_id='" . $row1['batch_id'] . "'";
						$result2 = $con->query($sql2);
						while ($row2 = $result2->fetch_assoc()) {
							$sql3 = "SELECT * FROM course_tbl WHERE course_id='" . $row2['course_id'] . "'";
							$result3 = $con->query($sql3);
							while ($row3 = $result3->fetch_assoc()) {
								if ($_SESSION['department_id'] == $row3['department_id']) {
					?>
									<tr>
										<td><?php echo strtoupper($row1['student_id']) ?></td>
										<td><?php echo $row1['first_name'] ?></td>
										<td><?php echo $row1['last_name'] ?></td>
										<td><?php echo $row1['dob'] ?></td>
										<td><?php echo $row1['gender'] ?></td>
										<td><?php echo $row1['nic'] ?></td>
										<td><?php echo $row1['phone'] ?></td>
										<td><?php echo $row1['email'] ?></td>
										<td><?php echo $row1['batch_id'] ?></td>
									</tr>
					<?php
								}
							}
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

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