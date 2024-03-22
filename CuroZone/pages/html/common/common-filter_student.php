<html>
<?php
session_start();
include('dbconnect.php');

$department_id = $_POST['department_id'];
$course_id = $_POST['course_id'];
$batch_id = $_POST['batch_id'];

echo "<script>console.log('$department_id')</script>";
echo "<script>console.log('$course_id')</script>";
echo "<script>console.log('$batch_id')</script>";

if ($department_id  != '' && $course_id == 'null' && $batch_id == 'null') {
    echo "<script>console.log('department')</script>";
    $sql1 = "SELECT * FROM course_tbl WHERE department_id = '" . $department_id . "'";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) != 0) {
        while ($row1 = mysqli_fetch_array($result1)) {
            $sql2 = "SELECT * FROM batch_tbl WHERE course_id = '" . $row1['course_id'] . "'";
            $result2 = mysqli_query($con, $sql2);
            if (mysqli_num_rows($result2) != 0) {
                while ($row2 = mysqli_fetch_array($result2)) {
                    $sql3 = "SELECT * FROM student_tbl WHERE batch_id = '" . $row2['batch_id'] . "'";
                    $result3 = mysqli_query($con, $sql3);
                    if (mysqli_num_rows($result3) != 0) {
?>
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
                                    <?php
                                    if ($_SESSION['role'] != '2') {
                                    ?>
                                        <th colspan="2">Options</th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <?php
                            while ($row3 = mysqli_fetch_array($result3)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row3['student_id'] ?></td>
                                        <td><?php echo $row3['first_name'] ?></td>
                                        <td><?php echo $row3['last_name'] ?></td>
                                        <td><?php echo $row3['dob'] ?></td>
                                        <td><?php echo $row3['gender'] ?></td>
                                        <td><?php echo $row3['nic'] ?></td>
                                        <td><?php echo $row3['phone'] ?></td>
                                        <td><?php echo $row3['email'] ?></td>
                                        <td><?php echo $row3['batch_id'] ?></td>
                                        <?php
                                        if ($_SESSION['role'] !== '2') {
                                        ?>
                                            <td>
                                                <?php echo "<form id='form1' name='form1' method='post' action='coordinator-edit_students.php?student_id=$row3[student_id]'>" ?>
                                                <button type="submit" value="<?php echo $row3['student_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                                </form>
                                            </td>
                                            <td><button type="button" value="<?php echo $row3['student_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                    <?php
                            }
                        } else {
                            //echo "<div class='noData'>Sorry!<br>No records found.</div>";
                        }
                    }
                } else {
                    //echo "<div class='noData'>Sorry!<br>No records found.</div>";
                }
            }
        } else {
            //echo "<div class='noData'>Sorry!<br>No records found.</div>";
        }
    } elseif ($department_id != '' && $course_id != 'null' && $batch_id == 'null') {
        echo "<script>console.log('course')</script>";
        $sql1 = "SELECT * FROM batch_tbl WHERE course_id = '" . $course_id . "'";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1) != 0) {
            while ($row1 = mysqli_fetch_array($result1)) {
                $sql2 = "SELECT * FROM student_tbl WHERE batch_id = '" . $row1['batch_id'] . "'";
                $result2 = mysqli_query($con, $sql2);
                if (mysqli_num_rows($result2) != 0) {
                    ?>
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
                                <?php
                                if ($_SESSION['role'] != '2') {
                                ?>
                                    <th colspan="2">Options</th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <?php
                        while ($row2 = mysqli_fetch_array($result2)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row2['student_id'] ?></td>
                                    <td><?php echo $row2['first_name'] ?></td>
                                    <td><?php echo $row2['last_name'] ?></td>
                                    <td><?php echo $row2['dob'] ?></td>
                                    <td><?php echo $row2['gender'] ?></td>
                                    <td><?php echo $row2['nic'] ?></td>
                                    <td><?php echo $row2['phone'] ?></td>
                                    <td><?php echo $row2['email'] ?></td>
                                    <td><?php echo $row2['batch_id'] ?></td>
                                    <?php
                                    if ($_SESSION['role'] !== '2') {
                                    ?>
                                        <td>
                                            <?php echo "<form id='form1' name='form1' method='post' action='coordinator-edit_students.php?student_id=$row2[student_id]'>" ?>
                                            <button type="submit" value="<?php echo $row2['student_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                            </form>
                                        </td>
                                        <td><button type="button" value="<?php echo $row2['student_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </tbody>
                <?php
                        }
                    } else {
                        //echo "<div class='noData'>Sorry!<br>No records found.</div>";
                    }
                }
            } else {
                //echo "<div class='noData'>Sorry!<br>No records found.</div>";
            }
        } elseif ($department_id != '' && $course_id != 'null' && $batch_id != 'null') {
            echo "<script>console.log('batch')</script>";
            $sql = "SELECT * FROM student_tbl WHERE batch_id = '" . $batch_id . "'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) != 0) {
                ?>
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
                            <?php
                            if ($_SESSION['role'] != '2') {
                            ?>
                                <th colspan="2">Options</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tbody>
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
                                <?php
                                if ($_SESSION['role'] !== '2') {
                                ?>
                                    <td>
                                        <?php echo "<form id='form1' name='form1' method='post' action='coordinator-edit_students.php?student_id=$row[student_id]'>" ?>
                                        <button type="submit" value="<?php echo $row['student_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                        </form>
                                    </td>
                                    <td><button type="button" value="<?php echo $row['student_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
                                <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                <?php
                    }
                } else {
                    //echo "<div class='noData'>Sorry!<br>No records found.</div>";
                }
            } elseif ($department_id == '') {
                $course_id = '';
                $batch_id = '';
                ?>

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
                            <?php
                            if ($_SESSION['role'] != '2') {
                            ?>
                                <th colspan="2">Options</th>
                            <?php
                            }
                            ?>
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
                                <?php
                                if ($_SESSION['role'] !== '2') {
                                ?>
                                    <td>
                                        <?php echo "<form id='form1' name='form1' method='post' action='coordinator-edit_students.php?student_id=$row[student_id]'>" ?>
                                        <button type="submit" value="<?php echo $row['student_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                        </form>
                                    </td>
                                    <td><button type="button" value="<?php echo $row['student_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
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
                                        url: "program_manager-confirm_delete.php?id=" + id,
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

</html>