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
        <title>Dasboard - CuroZone</title>
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
                    <a id="active-item" class="sub-item"><i class="fas fa-cogs"></i>Settings</a>
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
                <div class="item"><a href="lecturer-students.php"><i class="fas fa-users"></i>Students</a></div>
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
        <?php
		include('dbconnect.php');
		$sql = "SELECT * FROM employee_tbl WHERE employee_id = '" . $_SESSION['memberid'] . "'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		?>
		<div class="mainframe">
		<div class="back_btn">
			<a href="lecturer-settings.php"><i class="fas fa-chevron-left"></i> Back</a>
		</div>
			<div class="welcome">
				<h2 style="text-align: center; padding: 5px;">Update Profile Details</h2>
				<hr style="width: 50%; margin:auto;">
				<hr style="width: 50%; margin:auto;">
				<form id="form1" name="form1" method="post" action="/pages/html/common/common-update_profile_details_check.php">
					<table class="profile" width="80%">
						<tbody>
						<tr>
							<td width="20%" rowspan="11">
								<div class="profileimage">
									<?php
									if ($row['image']) {
										echo "<img class='dp' src='$row[image]' alt=''>";
									} else {
										echo "<img class='dp' src='/images/user.png' alt=''>";
									}
									?>
									<!-- <label>
										<input type="file" id="picture" name="" accept="image/jpeg" style="display: none;">
										<img class="add" src="/images/add.png" alt="">
									</label>
								</div>
								<div class="note">The image format should be <b>JPEG</b><br>and<br>the image size Should be<br><b>lower than 2mb</b></div> -->
							</td>
						</tr>
						<tr>
							<td width="35%" style="text-align: right"><label for="textfield">First Name :</label></td>
							<td width="57%" style="text-align: left"><input type="text" name="firstnametxt" id="firstnametxt" value="<?php echo "$row[first_name]"; ?>"></td>
							<td rowspan="11" style="text-align: center"><input class="update-btn" type="submit" name="submit" id="submit" value="Update"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield6">Last Name :</label></td>
							<td style="text-align: left"><input type="text" name="lastnametxt" id="lastnametxt" value="<?php echo "$row[last_name]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="date2">Date of Birth :</label></td>
							<td style="text-align: left"><input type="date" name="dobtxt" id="dobtxt" value="<?php echo "$row[dob]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="select3">Gender :</label></td>
							<td style="text-align: left"><select name="genderselect" id="genderselect">
									<?php
									if ($row['gender'] == 'male') {
									?>
										<option value="" disabled>Select</option>
										<option value="male" selected>Male</option>
										<option value="female">Female</option>
									<?php
									} else {
									?>
										<option value="" disabled>Select</option>
										<option value="male">Male</option>
										<option value="female" selected>Female</option>
									<?php
									}
									?>

								</select></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield7">NIC :</label></td>
							<td style="text-align: left"><input type="text" name="nictxt" id="nictxt" value="<?php echo "$row[nic]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield8">Phone :</label></td>
							<td style="text-align: left"><input type="text" name="phonetxt" id="phonetxt" value="<?php echo "$row[phone]"; ?>"></td>
						</tr>
						<tr>
							<td style="text-align: right"><label for="textfield9">Email :</label></td>
							<td style="text-align: left"><input type="email" name="emailtxt" id="emailtxt" value="<?php echo "$row[email]"; ?>"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
		<div class="bottom-bar">
			Copyright &copy; 2023 Group A - HDIT33, ICBT Southern Campus. All rights reserved.
		</div>

		<script>
			const uploadField = document.getElementById("picture");

			uploadField.onchange = function() {
				if (this.files[0].size > 2097152) {
					alert("File size is over the limit!");
					this.value = "";
				}
			}
		</script>
	</body>

	</html>

<?php
} else {
	header("Location: /pages/html/login.html");
}
?>