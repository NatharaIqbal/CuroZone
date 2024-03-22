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
                    <a id="active-item" class="sub-item"><i class="fas fa-user"></i>Profile</a>
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
                <h2 style="text-align: center; padding: 5px; margin-top:50px;">Assigned Modules</h2>
                <hr style="width: 50%; margin:auto;">
                <hr style="width: 50%; margin:auto;">
                <table class="profile" width="70%">
                    <tr>
                        <th>
                            Module ID
                        </th>
                        <th>
                            Module Name
                        </th>
                    </tr>
                    <?php
                    $sql1 = "SELECT * FROM module_lecturer_tbl WHERE lecturer_id='" . $_SESSION['memberid'] . "'";
                    $result1 = mysqli_query($con, $sql1);
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $sql2 = "SELECT * FROM module_tbl WHERE module_id='" . $row1['module_id'] . "'";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo "<tr>";
                        echo "<td class='lecturermodule'>";
                        echo "$row2[module_id]";
                        echo "</td>";
                        echo "<td class='lecturermodule'>";
                        echo "$row2[name]";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
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