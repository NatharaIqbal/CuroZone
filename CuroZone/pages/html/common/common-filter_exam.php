<?php
session_start();
include('dbconnect.php');
if (isset($_POST['request'])) {
    $request = $_POST['request'];

    if ($request != "") {
        if ($_SESSION["role"] == '1') {
            $sql = "SELECT * FROM exam_tbl WHERE batch_id = '" . $request . "' AND send_schedule_coordinator='1'";
        } elseif ($_SESSION["role"] == '2') {
            $sql = "SELECT * FROM exam_tbl WHERE batch_id = '" . $request . "' AND send_schedule_student_and_lecturer='1'";
        }
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count) {
?>
            <table width="80%" align="center" class="coursematerials">
                <thead class="titles">
                    <tr>
                        <th>Batch ID</th>
                        <th>Exam ID</th>
                        <th>Module ID</th>
                        <th>File</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Locatoin</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <?php
                        if ($_SESSION['role'] == '1') {
                        ?>
                            <th>Send all</th>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['batch_id']; ?></td>
                            <td><?php echo $row['exam_id']; ?></td>
                            <td><?php echo $row['module_id']; ?></td>
                            <?php
                            if ($row['send_file_coordinator'] == '1') {
                            ?>
                                <td><a href="/pages/html/common/common-download_exam.php?id1=<?php echo $row['exam_id'] ?>&id2=<?php echo $row['batch_id'] ?>">Download File</a></td>
                            <?php
                            } else {
                            ?>
                                <td>-</td>
                            <?php
                            }
                            ?>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                            <td><?php echo $row['end_time']; ?></td>
                            <?php
                            if ($_SESSION['role'] == '1') {
                            ?>
                                <td>
                                    <?php
                                    $send_all = $row['send_schedule_student_and_lecturer'];
                                    if ($send_all == '0') {
                                        echo "<form id='form1' name='form1' method='post' action='coordinator-edit_exam_schedule_send_all.php?batch_id=$row[batch_id]&exam_id=$row[exam_id]&status=$send_all'>"
                                    ?>
                                        <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                                        </form>
                                    <?php
                                    } elseif ($send_all == '1') {
                                        echo "<form id='form1' name='form1' method='post' action='coordinator-edit_exam_schedule_send_all.php?batch_id=$row[batch_id]&exam_id=$row[exam_id]&status=$send_all'>"
                                    ?>
                                        <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </td>
                            <?php
                            }
                            ?>
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


    ?>