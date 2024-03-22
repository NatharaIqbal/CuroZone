<?php
session_start();
$_SESSION['memberid'];
$_SESSION['role'];

include('dbconnect.php');

$batch_id = $_POST['batch_id'];

echo "<script>console.log('$batch_id')</script>";

$sql1 = "SELECT * FROM exam_tbl WHERE batch_id = '" . $batch_id . "'";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1)) {
?>
    <table width="100%" align="center" class="coursematerials">
        <thead class="titles">
            <tr>
                <th width="8%">Exam ID</th>
                <th>Batch ID</th>
                <th>Module ID</th>
                <th>Type</th>
                <th>Date</th>
                <th>Location</th>
                <th>File</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th width="8%">Added Date</th>
                <th width="7%">Send Coordinator (schedule)</th>
                <th width="7%">Send Coordinator (file)</th>
                <th width="7%">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row1 = mysqli_fetch_array($result1)) {
            ?>

                <tr>
                    <td><?php echo $row1['exam_id'] ?></td>
                    <td><?php echo $row1['batch_id'] ?></td>
                    <td><?php echo $row1['module_id'] ?></td>
                    <td><?php echo $row1['type'] ?></td>
                    <td><?php echo $row1['date'] ?></td>
                    <td><?php echo $row1['location'] ?></td>
                    <?php
                    if ($row1['examfile'] == '') {
                    ?>
                        <td>-</td>
                    <?php
                    } else {
                    ?>
                        <td><a href="/pages/html/common/common-download_exam.php?id1=<?php echo $row1['exam_id'] ?>&id2=<?php echo $row1['batch_id'] ?>">Download File</a></td>

                    <?php
                    }
                    ?>
                    <td><?php echo $row1['start_time'] ?></td>
                    <td><?php echo $row1['end_time'] ?></td>
                    <td><?php echo $row1['added_time'] ?></td>
                    <td>
                        <?php $send_schedule_coordinator = $row1['send_schedule_coordinator'];
                        if ($send_schedule_coordinator == "0") {
                            echo "<form id='form1' name='form1' method='post' action='program_manager-edit_exam_schedule_send_coordinator.php?batch_id=$row1[batch_id]&exam_id=$row1[exam_id]&status=$send_schedule_coordinator'>"
                        ?>
                            <button type="submit" value="<?php echo $batch_id ?>" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                            </form>
                        <?php
                        } elseif ($send_schedule_coordinator == "1") {
                            echo "<form id='form1' name='form1' method='post' action='program_manager-edit_exam_schedule_send_coordinator.php?batch_id=$row1[batch_id]&exam_id=$row1[exam_id]&status=$send_schedule_coordinator'>"
                        ?>
                            <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                            </form>
                        <?php
                        } ?>
                    </td>
                    <td>
                        <?php $send_file_coordinator = $row1['send_file_coordinator'];
                        if ($send_file_coordinator == "0") {
                            echo "<form id='form1' name='form1' method='post' action='program_manager-edit_exam_file_send_coordinator.php?batch_id=$row1[batch_id]&exam_id=$row1[exam_id]&status=$send_file_coordinator'>"
                        ?>
                            <button type="submit" value="<?php echo $batch_id ?>" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                            </form>
                        <?php
                        } elseif ($send_file_coordinator == "1") {
                            echo "<form id='form1' name='form1' method='post' action='program_manager-edit_exam_file_send_coordinator.php?batch_id=$row1[batch_id]&exam_id=$row1[exam_id]&status=$send_file_coordinator'>"
                        ?>
                            <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                            </form>
                        <?php
                        } ?>
                    </td>
                    <td><button type="button" data-value="<?php echo $row1['exam_id']; ?>" value="<?php echo $row1['batch_id']; ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo "<div class='noData'>Sorry! No records found.</div>";
}
?>

<script>
    $(document).ready(function() {
        $('.confirm_del_btn').click(function(e) {
            e.preventDefault();
            var id1 = $(this).val();
            var id2 = $(this).data("value");
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
                            url: "/pages/html/common/common-exam_delete.php?id1=" + id1 + "&id2=" + id2,
                            success: function(response) {
                                swal("Department deleted!", {
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