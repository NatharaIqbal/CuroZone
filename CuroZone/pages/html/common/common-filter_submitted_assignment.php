<?php
session_start();
include('dbconnect.php');

$request1 = $_POST['request1'];
$request2 = $_POST['request2'];
echo "<script>console.log('$request1')</script>";
echo "<script>console.log('$request2')</script>";
//$tbl = $_POST['tbl'];

if ($request1 != "" && $request2 == 'null') {
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
                ?>
                        <table width="80%" align="center" class="coursematerials">
                            <thead class="titles">
                                <tr>
                                    <th>Batch ID</th>
                                    <th>Student ID</th>
                                    <th>Assignment ID</th>
                                    <th>Module</th>
                                    <th>File</th>
                                    <th>Send Lecturer</th>
                                </tr>
                            </thead>
                            <?php
                while ($row1 = mysqli_fetch_array($result1)) {
                    $sql2 = "SELECT * FROM assignment_tbl WHERE assignment_id='" . $row1['assignment_id']  . "'";
                    $result2 = mysqli_query($con, $sql2);
                    $count2 = mysqli_num_rows($result2);
                    if ($count2) {


                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['batch_id']; ?></td>
                                        <td><?php echo $row['student_id']; ?></td>
                                        <td><?php echo $row1['assignment_id']; ?></td>
                                        <td><?php echo $row2['module_id']; ?></td>
                                        <td><a href="/pages/html/common/common-download_submitted_assignments.php?id1=<?php echo $row['student_id'] ?>&id2=<?php echo $row1['assignment_id'] ?>">Download File</a></td>
                                        <td>
                                            <?php $send_lecturer = $row1['send_lecturer'];
                                            if ($send_lecturer == "0") {
                                                echo "<form id='form1' name='form1' method='post' action='coordinator-edit_submited_assignment_send_lecturer.php?student_id=$row[student_id]&assignment_id=$row1[assignment_id]&status=$send_lecturer'>"
                                            ?>
                                                <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                                                </form>
                                            <?php
                                            } elseif ($send_lecturer == "1") {
                                                echo "<form id='form1' name='form1' method='post' action='coordinator-edit_submited_assignment_send_lecturer.php?student_id=$row[student_id]&assignment_id=$row1[assignment_id]&status=$send_lecturer'>"
                                            ?>
                                                <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                                                </form>
                                            <?php
                                            } ?>
                                        </td>
                                    </tr>
                                </tbody>
            <?php
                            }
                        }
                    }
                }
            }
        } else {
            echo "<div class='noData'>Sorry! No records Found</div>";
            ?>
            <?php
        }
    } elseif ($request1 != "" && $request2 != '') {
        $get_assignmentid = "SELECT * FROM assignment_tbl WHERE module_id = '" . $request2 . "'";
        $result1 = mysqli_query($con, $get_assignmentid);
        $count1 = mysqli_num_rows($result1);
        if ($count1) {
            while ($row1 = mysqli_fetch_array($result1)) {
                $get_studentid = "SELECT * FROM student_tbl WHERE batch_id = '" . $request1 . "'";
                $result2 = mysqli_query($con, $get_studentid);
                $count2 = mysqli_num_rows($result2);
                if ($count2) {
                                ?>
                            <table width="80%" align="center">
                                <thead class="titles">
                                    <tr>
                                        <th>Batch ID</th>
                                        <th>Student ID</th>
                                        <th>Assignment ID</th>
                                        <th>Module</th>
                                        <th>File</th>
                                        <th>Send Lecturer</th>
                                    </tr>
                                </thead>
                                <?php
                    while ($row2 = mysqli_fetch_array($result2)) {
                        $get_assignmet = "SELECT * FROM submitted_assignment_tbl WHERE student_id = '" . $row2['student_id'] . "' AND assignment_id = '" . $row1['assignment_id'] . "'";
                        $result3 = mysqli_query($con, $get_assignmet);
                        $count3 = mysqli_num_rows($result3);
                        if ($count3) {

                                while ($row3 = mysqli_fetch_array($result3)) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $request1; ?></td>
                                            <td><?php echo $row3['student_id']; ?></td>
                                            <td><?php echo $row3['assignment_id']; ?></td>
                                            <td><?php echo $request2; ?></td>
                                            <td><?php echo $row3['file']; ?></td>
                                            <td>
                                            <?php $send_lecturer = $row3['send_lecturer'];
                                            if ($send_lecturer == "0") {
                                                echo "<form id='form1' name='form1' method='post' action='coordinator-edit_submited_assignment_send_lecturer.php?student_id=$row3[student_id]&assignment_id=$row3[assignment_id]&status=$send_lecturer'>"
                                            ?>
                                                <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                                                </form>
                                            <?php
                                            } elseif ($send_lecturer == "1") {
                                                echo "<form id='form1' name='form1' method='post' action='coordinator-edit_submited_assignment_send_lecturer.php?student_id=$row3[student_id]&assignment_id=$row3[assignment_id]&status=$send_lecturer'>"
                                            ?>
                                                <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                                                </form>
                                            <?php
                                            } ?>
                                        </td>
                                        </tr>
                                    </tbody>
        <?php
                                }
                            } else {
                                //echo "<div class='noData'>Sorry! No records Found</div>";
                            }
                        }
                    } else {
                        echo "<div class='noData'>Sorry! No records Found</div>";
                    }
                }
            } else {
                echo "<div class='noData'>Sorry! No records Found</div>";
            }
        }
        ?>