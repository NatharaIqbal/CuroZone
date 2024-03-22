<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'] , $_SESSION['department_id'])) {
$_SESSION['memberid'];
$_SESSION['role'];
$_SESSION['department_id'];

include('dbconnect.php');

$request1 = $_POST['request1'];
$request2 = $_POST['request2'];

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
                while ($row1 = mysqli_fetch_array($result1)) {
                    $assignment_id  = $row1['assignment_id '];
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
                                    <th>Module</th>
                                    <th>Result</th>
                                    <th>Feedback</th>
                                    <th>visibility</th>
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
                                        <td><?php echo $row1['feedback']; ?></td>
                                        <td><?php
                                            if ($row1['send_all'] == '0') {
                                            ?>
                                        <td><button type="button" data-value="<?php echo $row1['assignment_id'] ?>" value="<?php echo $row1['student_id'] ?>" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye" style="color: green;"></i></button></td>
                                    <?php
                                            } else {
                                    ?>
                                        <td><button type="button" data-value="<?php echo $row1['assignment_id'] ?>" value="<?php echo $row1['student_id'] ?>" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye-slash " style="color: red;"></i></button></td>
                                    <?php
                                            }
                                    ?>
                                    </td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                        } else {
                            echo "<div class='noData'>Sorry! No records Found</div>";
                            ?>
            <?php
                        }
                    }
                } else {
                    echo "<div class='noData'>Sorry! No records Found</div>";
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
            $get_studentid = "SELECT * FROM student_tbl WHERE batch_id = '" . $request1 . "'";
            $result2 = mysqli_query($con, $get_studentid);
            $count2 = mysqli_num_rows($result2);
            if ($count2) {
                $get_assignmet = "SELECT * FROM submitted_assignment_tbl WHERE student_id = '" . $row2['student_id'] . "' AND assignment_id = '" . $row1['assignment_id'] . "'";
                $result3 = mysqli_query($con, $get_studentid);
                $count3 = mysqli_num_rows($result3);
                if ($count3) {
            ?>
                    <table width="80%" align="center">
                        <thead class="titles">
                            <tr>
                                <th>Batch ID</th>
                                <th>Student ID</th>
                                <th>Assignment ID</th>
                                <th>Module</th>
                                <th>Result</th>
                                <th>Feedback</th>
                                <th>visibility</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row1 = mysqli_fetch_array($result1)) {
                            while ($row2 = mysqli_fetch_array($result2)) {
                                while ($row3 = mysqli_fetch_array($result3)) {
                        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $request1; ?></td>
                                            <td><?php echo $row3['student_id']; ?></td>
                                            <td><?php echo $row3['assignment_id']; ?></td>
                                            <td><?php echo $request2; ?></td>
                                            <td><?php echo $row3['result']; ?></td>
                                            <td><?php echo $row3['feedback']; ?></td>
                                            <?php
                                            if ($row3['send_all'] == '0') {
                                            ?>
                                                <td><button type="button" data-value="<?php echo $row3['assignment_id'] ?>" value="<?php echo $row3['student_id'] ?>" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye" style="color: green;"></i></button></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td><button type="button" data-value="<?php echo $row3['assignment_id'] ?>" value="<?php echo $row3['student_id'] ?>" class="visibility_btn" name="visibilitybtn" id="visibilitybtn"><i class="fas fa-eye-slash " style="color: red;"></i></button></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
        <?php
                                }
                            }
                        }
                    } else {
                        echo "<div class='noData'>Sorry! No records Found</div>";
                    }
                } else {
                    echo "<div class='noData'>Sorry! No records Found</div>";
                }
            } else {
                echo "<div class='noData'>Sorry! No records Found</div>";
            }
        }
    }
    else{
        header("Location: /pages/html/login.html");
    }
        ?>