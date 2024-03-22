<?php
session_start();
include('dbconnect.php');
if (isset($_POST['request'])) {
    $request = $_POST['request'];

    if ($request != "") {
        if ($_SESSION["role"] == '1') {
            $sql = "SELECT * FROM assignment_tbl WHERE batch_id = '" . $request . "' AND send_coordinator='1'";
        } elseif ($_SESSION["role"] == '2') {
            $sql = "SELECT * FROM assignment_tbl WHERE batch_id = '" . $request . "' AND send_student_and_lecturer='1'";
        }
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count) {
?>
            <table width="100%" align="center" class="coursematerials">
                <thead class="titles">
                    <tr>
                        <th>Batch ID</th>
                        <th>Assignment ID</th>
                        <th>Module ID</th>
                        <th>Type</th>
                        <th>File</th>
                        <th>Added Date</th>
                        <th>Due Date</th>
                        <?php
                        if ($_SESSION["role"] == '1') { ?>
                            <th>Send All</th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['batch_id']; ?></td>
                            <td><?php echo $row['assignment_id']; ?></td>
                            <td><?php echo $row['module_id']; ?></td>
                            <?php $type = $row['type'];
                            if ($type == "0") {
                                echo "<td>Coursework - Individual</td>";
                            } elseif ($type == "1") {
                                echo "<td>Coursework - Group</td>";
                            } elseif ($type == "2") {
                                echo "<td>Presentation</td>";
                            } ?>
                            <td><a href="/pages/html/common/common-download_assignments.php?id1=<?php echo $row['assignment_id'] ?>&id2=<?php echo $row['batch_id'] ?>">Download File</a></td>
                            <td><?php echo $row['added_date']; ?></td>
                            <td><?php echo $row['due_date']; ?></td>
                            <?php
                            if ($_SESSION["role"] == '1') { ?>
                                <td>
                                    <?php $send_all = $row['send_student_and_lecturer'];
                                    if ($send_all == "0") {
                                        echo "<form id='form1' name='form1' method='post' action='coordinator-edit_assignment_schedule_send_all.php?batch_id=$row[batch_id]&assignment_id=$row[assignment_id]&status=$send_all'>"
                                    ?>
                                        <button type="submit" value="<?php echo $row['module_id'] ?>" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                                        </form>
                                    <?php
                                    } elseif ($send_all == "1") {
                                        echo "<form id='form1' name='form1' method='post' action='coordinator-edit_assignment_schedule_send_all.php?batch_id=$row[batch_id]&assignment_id=$row[assignment_id]&status=$send_all'>"
                                    ?>
                                        <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                                        </form>
                                    <?php
                                    } ?>
                                </td>
                            <?php } ?>
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