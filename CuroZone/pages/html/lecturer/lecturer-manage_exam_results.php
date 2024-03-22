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
        <title>Manage Results - CuroZone</title>
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
                <div class="item"><a class="sub-btn" id="active-item"><i class="fas fa-line-chart"></i>Results
                        <i class="fas fa-angle-right dropdown"></i>
                    </a>
                    <div class="sub-menu">
                        <a href="lecturer-add_assignment_results.php" class="sub-item">Add Assignment Results</a>
                        <a href="lecturer-manage_assignment_results.php" class="sub-item">Manage Assignment Results</a>
                        <a href="lecturer-add_exam_results.php" class="sub-item">Add Exam Results</a>
                        <a id="active-item" class="sub-item">Manage Exam Results</a>
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
        <?php include('dbconnect.php'); ?>
        <div class="mainframe">
            <div class="welcome">
                <h2 style="text-align: center; padding: 5px;">Manage Exam Results</h2>
                <hr style="width: 50%; margin:auto;">
                <hr style="width: 50%; margin:auto;">
                <table class="searchtbl" width="100%">
                    <tbody>
                        <tr>
                            <td style="text-align: right"><label for="textfield3">Course : </label></td>
                            <td style="text-align: left"><select name="courseselect" id="courseselect">
                                    <option value="select" selected disabled>--Select--</option>
                                    <?php
                                    $sql1 = "SELECT * FROM course_tbl WHERE department_id='" . $_SESSION['department_id'] . "'";
                                    $result1 = mysqli_query($con, $sql1);

                                    while ($row1 = $result1->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row1['course_id'] ?>"><?php echo $row1['course_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select></td>

                            <td style="text-align: right"><label for="textfield3">Batch : </label></td>
                            <td style="text-align: left"><select name="batchselect" id="batchselect">
                                </select></td>

                            <td style="text-align: right"><label for="textfield4">Exam ID : </label></td>
                            <td style="text-align: left"><select name="assignmentselect" id="assignmentselect">
                                </select></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="task">
                <div class='noData'>Please select the course and Batch.</div>
            </div>
        </div>
    </body>

    <script>
        $(document).ready(function() {
            $('#courseselect').on('change', function() {
                var course_id = this.value;
                console.log(course_id);
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
            $('#batchselect').on('change', function() {
                var batch_id = this.value;
                console.log(batch_id);
                $.ajax({
                    url: "/pages/html/common/common-get_exam.php",
                    type: "POST",
                    data: {
                        batch_id: batch_id
                    },
                    cache: false,
                    success: function(result) {
                        $('#assignmentselect').html(result);
                    }
                })
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#batchselect').on('change', function() {
                var batch_id = $(this).val();
                var exam_id = 'null';
                console.log(batch_id);
                console.log(exam_id);
                $.ajax({
                    url: "/pages/html/lecturer/lecturer-filter_exam_results.php",
                    type: "POST",
                    data: '&batch_id=' + batch_id + '&exam_id=' + exam_id,
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
            $('#assignmentselect').on('change', function() {
                var batch_id = $('#batchselect').val();
                var exam_id = $(this).val();
                $.ajax({
                    url: "/pages/html/lecturer/lecturer-filter_exam_results.php",
                    type: "POST",
                    data: '&batch_id=' + batch_id + '&exam_id=' + exam_id,
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

    </html>

<?php
} else {
    header("Location: /pages/html/login.html");
}
?>