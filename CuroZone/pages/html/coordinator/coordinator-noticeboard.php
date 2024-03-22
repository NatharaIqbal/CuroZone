<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['department_id'])) {
	$_SESSION['memberid'];
	$_SESSION['role'];
	$_SESSION['department_id'];
?>

	<!doctype html>
	<html>

	<head>
		<meta charset="utf-8">
		<title>Manage Noticeboard - CuroZone</title>
		<link rel="icon" type="image/png" href="/images/logo.png">
		<link href="/pages/css/styles3.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
				<div class="item"><a class="sub-btn" id="active-item"><i class="fas fa-code"></i>Noticeboard
						<i class="fas fa-angle-right dropdown"></i>
					</a>
					<div class="sub-menu">
						<a href="coordinator-add_notices.php" class="sub-item">Add Notices</a>
						<a id="active-item" class="sub-item">Noticeboard</a>
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
				<h2 style="text-align: center; padding: 5px;">Manage Noticeboard</h2>
				<hr style="width: 50%; margin:auto;">
				<hr style="width: 50%; margin:auto;">
			</div>
			<?php
			include('dbconnect.php');
			$sql = "SELECT * FROM notice_tbl";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)) {
				while ($row = mysqli_fetch_array($result)) {
			?>
					<div class="noticeboardOuterFrame">
						<div class="noticeboardInnerFrame">
							<table>
								<tbody>
									<tr>
										<td colspan="2" class="subject">
											<h1><?php echo "$row[subject]"; ?></h1>
										</td>
									</tr>
									<?php
									if ($row['notice_file'] != '') {
									?>
										<tr>
											<td colspan="2">
												<a href="/pages/html/common/common-download_notice.php?id=<?php echo $row['notice_id']; ?>">Download File</a>
											</td>
										</tr>
									<?php
									}
									?>
									<tr>
										<td colspan="2" class="description">
											<?php echo "$row[description]"; ?>
										</td>
									</tr>
									<tr>
										<?php
										if ($_SESSION['memberid'] == $row['author_id']) {
										?>
											<td class="to">
												To:
												<br>
												<?php
												if ($row['department_id'] == 'all') {
													echo "All departments";
												} else if ($row['department_id'] != 'all' && $row['course_id'] == '' && $row['batch_id'] == '') {
													echo "Departments of $row[department_id]";
												} else if ($row['department_id'] != 'all' && $row['course_id'] != '' && $row['batch_id'] == '') {
													$sql2 = "SELECT * FROM course_tbl WHERE course_id = '" . $row['course_id'] . "'";
													$result2 = mysqli_query($con, $sql2);
													$row2 = mysqli_fetch_assoc($result2);
													echo "Course: $row2[course_name]";
												} else if ($row['department_id'] != 'all' && $row['course_id'] != '' && $row['batch_id'] != '') {
													echo "Batch: $row[batch_id]";
												}
												?>
											</td>
										<?php
										}
										?>
										<td class="details">
											<?php
											$sql1 = "SELECT * FROM employee_tbl WHERE employee_id='" . $row['author_id'] . "'";
											$result1 = mysqli_query($con, $sql1);
											$row1 = mysqli_fetch_array($result1);
											echo "{$row1['first_name']} {$row1['last_name']}"; ?>
											<br>
											<?php echo "$row[uploaded_date]"; ?>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<button type="button" value="<?php echo $row['notice_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				<?php
				}
			} else {
				?>
				<div class="noData" style="padding: 40px;">No notices to show.</div>
			<?php
			}
			?>

		</div>
		<div class="bottom-bar">
			Copyright &copy; 2023 Group A - HDIT33, ICBT Southern Campus. All rights reserved.
		</div>
	</body>

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
								url: "coordinator-delete_notice.php?id=" + id,
								success: function(response) {
									swal("Notice deleted!", {
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

	</html>

<?php
} else {
	header("Location: /pages/html/login.html");
}
?>