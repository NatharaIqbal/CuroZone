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
        <title>Course Materials - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles3.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                <div class="item"><a id="active-item" class="sub-btn"><i class="fas fa-line-chart"></i>Course Materials
                        <i class="fas fa-angle-right dropdown"></i>
                    </a>
                    <div class="sub-menu">
                        <a href="lecturer-add_course_materials.php" class="sub-item">Add Course Materials</a>
                        <a id="active-item" class="sub-item">Manage Course Materials</a>
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
                <h2 style="text-align: center; padding: 5px;">Manage Course Materials</h2>
                <hr style="width: 50%; margin:auto;">
                <hr style="width: 50%; margin:auto;">
                <?php include('dbconnect.php'); ?>
                <table class="searchtbl">
                    <tbody>
                        <tr>
                            <td style="text-align: center"><label for="select">Course : </label><select name="courseselect" id="courseselect">
                                    <option value="" selected>--Select--</option>
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
                            <td style="text-align: center"><label for="select">Batch : </label><select name="batchselect" id="batchselect">
                                </select></td>
                            <td style="text-align: center"><label for="select">Module : </label><select name="moduleselect" id="moduleselect">
                                </select></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="task">
                <?php
                $sql1 = "SELECT * FROM course_metirials_tbl WHERE author_id='" . $_SESSION['memberid'] . "'";
                $result1 = mysqli_query($con, $sql1);
                
                if (mysqli_num_rows($result1)) {
                ?>
                    <table width="100%" cellspacing="10" class="coursematerials">
                        <thead class="titles">
                                <tr>
                                    <th width=10%>Material ID</th>
                                    <th width=10%>Course ID</th>
                                    <th width=10%>Batch ID</th>
                                    <th width=10%>Module ID</th>
                                    <th width=15%>File</th>
                                    <th>Description</th>
                                    <th width=10%>Operations</th>
                                </tr>
                                <?php
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    echo "<tr>";
                                    echo "<td>$row1[meaterial_id]</td>";
                                    echo "<td>$row1[course_id]</td>";
                                    echo "<td>$row1[batch_id]</td>";
                                    echo "<td>$row1[module_id]</td>";
                                    echo "<td><a href='/pages/html/common/common-download_course_materials.php?id=$row1[meaterial_id]'>Download File</a></td>";
                                    echo "<td>$row1[description]</td>";
                                    echo "<td><button type='button' value=$row1[meaterial_id] class='confirm_del_btn' name='deletebtn' id='deletebtn'>Delete</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                <?php
                } else {
                    echo "<div class='noData'>Sorry! No records found.</div>";
                }
                ?>
            </div>
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
                            course_id: course_id,
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
                $('#courseselect').on('change', function() {
                    var course_id = this.value;
                    //console.log(course_id);
                    $.ajax({
                        url: "/pages/html/common/common-get_module.php",
                        type: "POST",
                        data: {
                            course_id: course_id,
                        },
                        cache: false,
                        success: function(result) {
                            $('#moduleselect').html(result);
                        }
                    })
                })
            })
        </script>

        <script>
            $(document).ready(function() {
                $('#courseselect').on('change', function() {
                    var course_id = $(this).val();
                    var batch_id = 'null';
                    var module_id = 'null';
                    $.ajax({
                        url: "/pages/html/common/common-filter_course_material.php",
                        type: "POST",
                        data: '&course_id=' + course_id + '&batch_id=' + batch_id + '&module_id=' + module_id,
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
                    var course_id = $('#courseselect').val();
                    var batch_id = $(this).val();
                    var module_id = $('#moduleselect').val();
                    $.ajax({
                        url: "/pages/html/common/common-filter_course_material.php",
                        type: "POST",
                        data: '&course_id=' + course_id + '&batch_id=' + batch_id + '&module_id=' + module_id,
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
                $('#moduleselect').on('change', function() {
                    var course_id = $('#courseselect').val();
                    var batch_id = $('#batchselect').val();
                    var module_id = $(this).val();
                    $.ajax({
                        url: "/pages/html/common/common-filter_course_material.php",
                        type: "POST",
                        data: '&course_id=' + course_id + '&batch_id=' + batch_id + '&module_id=' + module_id,
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
                                    url: "lecturer-delete_course_material.php?id=" + id,
                                    success: function(response) {
                                        swal("Course Material deleted!", {
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