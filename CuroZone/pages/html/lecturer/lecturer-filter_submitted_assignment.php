<?php
session_start();
include('dbconnect.php');
if (isset($_POST['request'])) {
    $request = $_POST['request'];

    if ($request != "") {
        $sql = "SELECT * FROM module_lecturer_tbl WHERE lecturer_id = '" . $_SESSION['memberid'] . "'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                $sql1 = "SELECT * FROM student_tbl WHERE batch_id = '" . $request . "'";
                $result1 = mysqli_query($con, $sql1);
                $count1 = mysqli_num_rows($result1);
                if ($count1) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $sql2 = "SELECT * FROM assignment_tbl WHERE module_id = '" . $row['module_id'] . "'";
                        $result2 = mysqli_query($con, $sql2);
                        if (mysqli_num_rows($result2)) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $sql3 = "SELECT * FROM submitted_assignment_tbl WHERE student_id = '" . $row1['student_id'] . "' AND assignment_id='" . $row2['assignment_id'] . "' AND send_lecturer='1'";
                                $result3 = mysqli_query($con, $sql3);
                                if (mysqli_num_rows($result3)) {
?>
                                    <table width="90%" align="center" class="coursematerials">
                                        <thead class="titles">
                                            <tr>
                                                <th>Batch ID</th>
                                                <th>Student ID</th>
                                                <th>Assignment ID</th>
                                                <th>Module ID</th>
                                                <th>File</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $request; ?></td>
                                                    <td><?php echo $row1['student_id']; ?></td>
                                                    <td><?php echo $row3['assignment_id']; ?></td>
                                                    <td><?php echo $row['module_id']; ?></td>
                                                    <td><a href="/pages/html/common/common-download_course_materials.php?id1=<?php echo $row1['student_id'] ?>&id2=<?php echo $row3['assignment_id'] ?>">Download File</a></td>
                                                </tr>
                                            </tbody>
                                <?php
                                        }
                                    } else {
                                    }
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
                //echo "<div class='noData'>Sorry! No records Found</div>";
            }
        } else {
            //echo "<div class='noData'>Sorry! No records Found</div>";
        }
    } else {
        //echo "<div class='noData'>Sorry! No records Found</div>";
    }
    ?>