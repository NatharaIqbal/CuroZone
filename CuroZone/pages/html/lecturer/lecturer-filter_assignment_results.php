<?php
session_start();
include('dbconnect.php');

$batch_id = $_POST['batch_id'];
$assignment_id = $_POST['assignment_id'];

if ($batch_id != '' && $assignment_id == 'null') {
    $sql1 = "SELECT * FROM module_lecturer_tbl WHERE lecturer_id = '" . $_SESSION['memberid'] . "'";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1)) {
        while ($row1 = mysqli_fetch_array($result1)) {
            $sql2 = "SELECT * FROM assignment_tbl WHERE module_id = '" . $row1['module_id'] . "' AND batch_id = '" . $batch_id . "'";
            $result2 = mysqli_query($con, $sql2);
            if (mysqli_num_rows($result2)) {
                while ($row2 = mysqli_fetch_array($result2)) {
                    $sql3 = "SELECT * FROM submitted_assignment_tbl WHERE assignment_id = '" . $row2['assignment_id'] . "'";
                    $result3 = mysqli_query($con, $sql3);
                    if (mysqli_num_rows($result3)) {
?>
                        <table width="100%" align="center">
                            <thead class="titles">
                                <tr>
                                    <th>Batch ID</th>
                                    <th>Student ID</th>
                                    <th>Module ID</th>
                                    <th>Assignment ID</th>
                                    <th>Results</th>
                                    <th>Feedback</th>
                                    <th>Send Coordinator</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row3 = mysqli_fetch_array($result3)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $batch_id; ?></td>
                                        <td><?php echo $row3['student_id']; ?></td>
                                        <td><?php echo $row2['module_id']; ?></td>
                                        <td><?php echo $row3['assignment_id']; ?></td>
                                        <td><?php echo $row3['result']; ?></td>
                                        <td><button type="button" value="<?php echo $row3['feedback']; ?>" class="assign_btn" name="assign_btn" id="assign_btn">Show</button></td>
                                        <td width="8%">
                                        <?php
                                        $send_coordinator = $row3['send_coordinator'];
                                        if ($row3['send_coordinator'] == '0') {
                                            echo "<form id='form1' name='form1' method='post' action='lecturer-edit_assignment_results_send_coordinator.php?student_id=$row3[student_id]&assignment_id=$row3[assignment_id]&status=$send_coordinator'>"
                                        ?>
                                            <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                                            </form>
                                        <?php
                                        } elseif ($row3['send_coordinator'] == '1') {
                                            echo "<form id='form1' name='form1' method='post' action='lecturer-edit_assignment_results_send_coordinator.php?student_id=$row3[student_id]&assignment_id=$row3[assignment_id]&status=$send_coordinator'>"
                                        ?>
                                            <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                        </td>
                                    </tr>
                                </tbody>
    <?php
                            }
                        }
                    }
                }
            }
        }
    } elseif ($batch_id != '' && $assignment_id != 'null') {
        $sql1 = "SELECT * FROM module_lecturer_tbl WHERE lecturer_id = '" . $_SESSION['memberid'] . "'";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1)) {
        while ($row1 = mysqli_fetch_array($result1)) {
            $sql2 = "SELECT * FROM assignment_tbl WHERE module_id = '" . $row1['module_id'] . "' AND batch_id = '" . $batch_id . "' AND assignment_id = '" . $assignment_id . "'";
            $result2 = mysqli_query($con, $sql2);
            if (mysqli_num_rows($result2)) {
                while ($row2 = mysqli_fetch_array($result2)) {
                    $sql3 = "SELECT * FROM submitted_assignment_tbl WHERE assignment_id = '" . $row2['assignment_id'] . "'";
                    $result3 = mysqli_query($con, $sql3);
                    if (mysqli_num_rows($result3)) {
?>
                        <table width="100%" align="center">
                            <thead class="titles">
                                <tr>
                                    <th>Batch ID</th>
                                    <th>Student ID</th>
                                    <th>Module ID</th>
                                    <th>Assignment ID</th>
                                    <th>Results</th>
                                    <th>Feedback</th>
                                    <th>Send Coordinator</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row3 = mysqli_fetch_array($result3)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $batch_id; ?></td>
                                        <td><?php echo $row3['student_id']; ?></td>
                                        <td><?php echo $row2['module_id']; ?></td>
                                        <td><?php echo $row3['assignment_id']; ?></td>
                                        <td><?php echo $row3['result']; ?></td>
                                        <td><button type="button" value="<?php echo $row3['feedback']; ?>" class="assign_btn" name="assign_btn" id="assign_btn">Show</button></td>
                                        <td width="8%">
                                        <?php
                                        $send_coordinator = $row3['send_coordinator'];
                                        if ($row3['send_coordinator'] == '0') {
                                            echo "<form id='form1' name='form1' method='post' action='lecturer-edit_assignment_results_send_coordinator.php?student_id=$row3[student_id]&assignment_id=$row3[assignment_id]&status=$send_coordinator'>"
                                        ?>
                                            <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                                            </form>
                                        <?php
                                        } elseif ($row3['send_coordinator'] == '1') {
                                            echo "<form id='form1' name='form1' method='post' action='lecturer-edit_assignment_results_send_coordinator.php?student_id=$row3[student_id]&assignment_id=$row3[assignment_id]&status=$send_coordinator'>"
                                        ?>
                                            <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                        </td>
                                    </tr>
                                </tbody>
    <?php
                            }
                        }
                    }
                }
            }
        }
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