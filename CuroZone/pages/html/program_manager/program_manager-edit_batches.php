<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
$_SESSION['memberid'];
$_SESSION['role'];
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Batch - CuroZone</title>
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
            <div class="item"><a class="sub-btn"><i class="fas fa-user"></i>Lecturers
                    <i class="fas fa-angle-right dropdown"></i>
                </a>
                <div class="sub-menu">
                    <a href="program_manager-add_lecturers.php" class="sub-item">Add Lecturers</a>
                    <a href="program_manager-manage_lecturers.php" class="sub-item">Manage Lecturers</a>
                </div>
            </div>
            <div class="item"><a class="sub-btn" id="active-item"><i class="fas fa-server"></i>Departments
                    <i class="fas fa-angle-right dropdown"></i>
                </a>
                <div class="sub-menu">
                    <a href="program_manager-add_departments.php" class="sub-item">Add Departments</a>
                    <a id="active-item" class="sub-item" href="program_manager-manage_departments.php">Manage Departments</a>
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
            <a href="program_manager-manage_batches.php"><i class="fas fa-chevron-left"></i> Back</a>
        </div>

        <div class="welcome">
            <h2 style="text-align: center; padding: 5px;">Edit Batch</h2>
            <hr style="width: 50%; margin:auto;">
            <hr style="width: 50%; margin:auto;">
        </div>
        <?php
        include('dbconnect.php');
        $batch_id = $_GET['batch_id'];
        //echo "<script>console.log('$batch_id')</script>";
        $sql1 = "SELECT * FROM batch_tbl WHERE batch_id='$batch_id'";


        $result1 = $con->query($sql1);

        if (!$result1) {
            die("invalid query: " . $con->error);
        }

        while ($row1 = $result1->fetch_assoc()) {
            $course_id = $row1['course_id'];
            $batch_id = $row1['batch_id'];
            $started_date = $row1['started_date'];

            $sql2 = "SELECT department_id FROM course_tbl WHERE course_id='$course_id'";

            $result2 = $con->query($sql2);

            if (!$result2) {
                die("invalid query: " . $con->error);
            }

            while ($row2 = $result2->fetch_assoc()) {
                $department_id = $row2['department_id'];
            }
        }
        ?>

        <?php echo "<form id='form1' name='form1' method='post' action='/pages/html/common/common-edit_batch_check.php?batch_id=$batch_id'>" ?>
        <table width="40%" class="filltbl">
            <tbody>
                <tr>
                    <td style="text-align: right"><label for="select4">Department</label></td>
                    <td style="text-align: center">:</td>
                    <td style="text-align: left"><select name="departmentselect" id="departmentselect">
                            <option value="select" disabled>--Select--</option>
                            <?php
                            $sql3 = "SELECT * FROM department_tbl";
                            $result3 = mysqli_query($con, $sql3);

                            while ($row3 = $result3->fetch_assoc()) {
                                $department_id2 = $row3['department_id'];
                                if ($department_id == $department_id2) {
                            ?>
                                    <option value="<?php echo $row3['department_id'] ?>" selected><?php echo $row3['name'] ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $row3['department_id'] ?>"><?php echo $row3['name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td style="text-align: right"><label for="select4">Course</label></td>
                    <td style="text-align: center">:</td>
                    <td style="text-align: left"><select name="courseselect" id="courseselect">
                            <option value="select" selected disabled>--Select--</option>
                            <?php
                            $sql4 = "SELECT * FROM course_tbl WHERE department_id = '" . $department_id . "'";
                            $result4 = mysqli_query($con, $sql4);

                            while ($row4 = $result4->fetch_assoc()) {
                                $course_id2 = $row4['course_id'];
                                if ($course_id == $course_id2) {
                            ?>
                                    <option value="<?php echo $row4['course_id'] ?>" selected><?php echo $row4['course_id'] ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $row4['course_id'] ?>"><?php echo $row4['course_id'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td style="text-align: right"><label for="select4">Batch ID</label></td>
                    <td style="text-align: center">:</td>
                    <td style="text-align: left"><input type="text" name="batchidtxt" id="batchidtxt" value="<?php echo $batch_id; ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: right"><label for="date2">Start Date</label></td>
                    <td style="text-align: center">:</td>
                    <td style="text-align: left"><input type="date" name="datetxt" id="datetxt" value="<?php echo $started_date; ?>"></td>
                </tr>
                <tr>
                    <td class="submit-btn" colspan="3" style="text-align: center"><input type="submit" name="submit" id="submit" value="Update"></td>
                </tr>
            </tbody>
        </table>

        </form>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#departmentselect').on('change', function() {
                var department_id = this.value;
                console.log(department_id);
                $.ajax({
                    url: "program_manager-get_course.php",
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