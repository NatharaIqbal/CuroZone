<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['department_id'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['department_id'];

    include('dbconnect.php');
    $request1 = $_POST['request1'];
    $request2 = $_POST['request2'];
    $request3 = $_POST['request3'];

    if ($request1 != '' && $request2 == 'null' && $request3 == 'null') {
        $get_studentid = "SELECT * FROM student_tbl WHERE batch_id = '" . $request1 . "'";
        $result = mysqli_query($con, $get_studentid);
        $count = mysqli_num_rows($result);
        if ($count) {
            while ($row = mysqli_fetch_array($result)) {
                $student_id = $row['student_id'];
                $sql1 = "SELECT * FROM submitted_assignment_tbl WHERE student_id = '" . $student_id . "'";
                $result1 = mysqli_query($con, $sql1);
                $count1 = mysqli_num_rows($result1);
                if ($count1) {
                    while ($row1 = mysqli_fetch_array($result1)) {
                        $assignment_id  = $row1['assignment_id'];
                        $sql2 = "SELECT * FROM assignment_tbl WHERE assignment_id  = '" . $assignment_id  . "'";
                        $result2 = mysqli_query($con, $sql2);
                        $count2 = mysqli_num_rows($result2);
                        if ($count2) {
?>
                            <table width="80%" align="center">
                                <thead class="titles">
                                    <tr>
                                        <th>Batch ID</th>
                                        <th>Student ID</th>
                                        <th>Assignment ID</th>
                                        <th>Module ID</th>
                                        <th>Result</th>
                                        <th>Feedback</th>
                                        <th>Visibility</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['batch_id']; ?></td>
                                            <td><?php echo $row['student_id']; ?></td>
                                            <td><?php echo $row1['assignment_id']; ?></td>
                                            <td><?php echo $row2['module_id']; ?></td>
                                            <td><?php echo $row1['result']; ?></td>
                                            <td><button type="button" value="<?php echo $row1['feedback']; ?>" class="assign_btn" name="assign_btn" id="assign_btn">Show</button></td>
                                            <td>
                                                <?php
                                                if ($row1['send_all'] == '0') {
                                                    echo "<form id='form1' name='form1' method='post' action='coordinator-edit_assignment_result_send_all.php?student_id=$row[student_id]&assignment_id=$row1[assignment_id]&status=$row1[send_all]'>";
                                                ?>
                                                    <button type="submit" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye fa-lg"></i></button>
                                                    </form>
                                                <?php
                                                } else {
                                                    echo "<form id='form1' name='form1' method='post' action='coordinator-edit_assignment_result_send_all.php?student_id=$row[student_id]&assignment_id=$row1[assignment_id]&status=$row1[send_all]'>";
                                                ?>
                                                    <button type="submit" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye-slash fa-lg"></i></button>
                                                    </form>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                            } else {
                                //echo "<div class='noData'>Sorry! No records Found</div>";
                                ?>
                <?php
                            }
                        }
                    } else {
                        //echo "<div class='noData'>Sorry! No records Found</div>";
                    }
                }
            } else {
                echo "<div class='noData'>Sorry! No records Found</div>";
                ?>
                <?php
            }
        } elseif ($request1 != '' && $request2 != 'null' && $request3 == 'null') {
            $sql1 = "SELECT * FROM submitted_assignment_tbl WHERE student_id='" . $request2 . "'";
            $result1 = mysqli_query($con, $sql1);
            if (mysqli_num_rows($result1)) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $sql2 = "SELECT * FROM student_tbl WHERE student_id='" . $request2 . "'";
                    $result2 = mysqli_query($con, $sql2);
                    if (mysqli_num_rows($result2)) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $sql3 = "SELECT * FROM assignment_tbl WHERE assignment_id='" . $row1['assignment_id'] . "'";
                            $result3 = mysqli_query($con, $sql3);
                            if (mysqli_num_rows($result3)) {
                ?>
                                <table width="80%" align="center">
                                    <thead class="titles">
                                        <tr>
                                            <th>Batch ID</th>
                                            <th>Student ID</th>
                                            <th>Assignment ID</th>
                                            <th>Module ID</th>
                                            <th>Result</th>
                                            <th>Feedback</th>
                                            <th>Visibility</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $request1; ?></td>
                                                <td><?php echo $row1['student_id']; ?></td>
                                                <td><?php echo $row1['assignment_id']; ?></td>
                                                <td><?php echo $row3['module_id']; ?></td>
                                                <td><?php echo $row1['result']; ?></td>
                                                <td><button type="button" value="<?php echo $row1['feedback']; ?>" class="assign_btn" name="assign_btn" id="assign_btn">Show</button></td>
                                                <?php
                                                if ($row1['send_all'] == '0') {
                                                    echo "<form id='form1' name='form1' method='post' action='coordinator-edit_assignment_result_send_all.php?student_id=$row1[student_id]&assignment_id=$row1[assignment_id]&status=$row1[send_all]'>";
                                                ?>
                                                    <td><button type="submit" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye fa-lg"></i></button></td>
                                                    </form>
                                                <?php
                                                } else {
                                                    echo "<form id='form1' name='form1' method='post' action='coordinator-edit_assignment_result_send_all.php?student_id=$row1[student_id]&assignment_id=$row1[assignment_id]&status=$row1[send_all]'>";
                                                ?>
                                                    <td><button type="submit" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye-slash fa-lg"></i></button></td>
                                                    </form>
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
                            } else {
                            }
                        }
                    } else {
                    }
                }
            } else {
                echo "<div class='noData'>Sorry! No records Found</div>";
            }
        } elseif ($request1 != '' && $request2 != 'null' && $request3 != 'null') {
            $sql1 = "SELECT * FROM assignment_tbl WHERE module_id='" . $request3 . "'";
            $result1 = mysqli_query($con, $sql1);
            if (mysqli_num_rows($result1)) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $sql2 = "SELECT * FROM submitted_assignment_tbl WHERE assignment_id='" . $row1['assignment_id'] . "' AND student_id='" . $request2 . "'";
                    $result2 = mysqli_query($con, $sql2);
                    if (mysqli_num_rows($result2)) {
                        ?>
                        <table width="80%" align="center">
                            <thead class="titles">
                                <tr>
                                    <th>Batch ID</th>
                                    <th>Student ID</th>
                                    <th>Assignment ID</th>
                                    <th>Module ID</th>
                                    <th>Result</th>
                                    <th>Feedback</th>
                                    <th>Visibility</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $request1; ?></td>
                                        <td><?php echo $row2['student_id']; ?></td>
                                        <td><?php echo $row2['assignment_id']; ?></td>
                                        <td><?php echo $row1['module_id']; ?></td>
                                        <td><?php echo $row2['result']; ?></td>
                                        <td><button type="button" value="<?php echo $row2['feedback']; ?>" class="assign_btn" name="assign_btn" id="assign_btn">Show</button></td>
                                        <?php
                                        if ($row2['send_all'] == '0') {
                                            echo "<form id='form1' name='form1' method='post' action='coordinator-edit_assignment_result_send_all.php?student_id=$row2[student_id]&assignment_id=$row2[assignment_id]&status=$row2[send_all]'>";
                                        ?>
                                            <td><button type="submit" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye fa-lg"></i></button></td>
                                            </form>
                                        <?php
                                        } else {
                                            echo "<form id='form1' name='form1' method='post' action='coordinator-edit_assignment_result_send_all.php?student_id=$row2[student_id]&assignment_id=$row2[assignment_id]&status=$row2[send_all]'>";
                                        ?>
                                            <td><button type="submit" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye-slash fa-lg"></i></button></td>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </tbody>
        <?php
                            }
                        } else {
                            echo "<div class='noData'>Sorry! No records Found</div>";
                        }
                    }
                } else {
                    echo "<div class='noData'>Sorry! No records Found</div>";
                }
            } else {
            }
        } else {
            header("Location: /pages/html/login.html");
        }
        ?>
        <script>
            document.getElementById('assign_btn').addEventListener('click', function() {
                var id = this.value;
                Swal.fire({
                    title: 'Feedback',
                    text: id,
                    confirmButtonText: 'OK'
                });
            });
        </script>