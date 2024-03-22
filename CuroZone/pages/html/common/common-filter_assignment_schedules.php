<?php
session_start();
$_SESSION['memberid'];
$_SESSION['role'];

include('dbconnect.php');

$batch_id = $_POST['batch_id'];

echo "<script>console.log('$batch_id')</script>";

$sql1 = "SELECT * FROM assignment_tbl WHERE batch_id = '" . $batch_id . "'";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1)) {
?>
        <table width="100%" align="center" class="coursematerials">
            <thead class="titles">
                <tr>
                    <th width="8%">Assignment ID</th>
                    <th>Batch ID</th>
                    <th>Module ID</th>
                    <th>Type</th>
                    <th>Added Date</th>
                    <th>Due Date</th>
                    <th>File</th>
                    <th width="7%">Send Coordinator</th>
                    <th width="7%">Options</th>
                </tr>
            </thead>
            <?php
            while ($row1 = mysqli_fetch_array($result1)) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row1['assignment_id'] ?></td>
                        <td><?php echo $row1['batch_id'] ?></td>
                        <td><?php echo $row1['module_id'] ?></td>
                        <?php $type = $row1['type'];
                        if ($type == "0") {
                            echo "<td>Coursework - Individual</td>";
                        } elseif ($type == "1") {
                            echo "<td>Coursework - Group</td>";
                        } elseif ($type == "2") {
                            echo "<td>Presentation</td>";
                        } ?>
                        <td><?php echo $row1['added_date'] ?></td>
                        <td><?php echo $row1['due_date'] ?></td>
                        <td><a href="/pages/html/common/common-download_assignments.php?id1=<?php echo $row1['assignment_id'] ?>&id2=<?php echo $row1['batch_id'] ?>">Download File</a></td>
                        <td>
                        <?php $send_coordinator = $row1['send_coordinator'];
                        if ($send_coordinator == "0") {
                            echo "<form id='form1' name='form1' method='post' action='program_manager-edit_assignment_schedule_send_coordinator.php?batch_id=$row1[batch_id]&assignment_id=$row1[assignment_id]&status=$send_coordinator'>"
                            ?>
                            <button type="submit" value="<?php echo $batch_id ?>" class="assign_btn" name="assign_btn" id="assign_btn">Send</button>
                            </form>
                            <?php
                        } elseif ($send_coordinator == "1") {
                            echo "<form id='form1' name='form1' method='post' action='program_manager-edit_assignment_schedule_send_coordinator.php?batch_id=$row1[batch_id]&assignment_id=$row1[assignment_id]&status=$send_coordinator'>"
                            ?>
                            <button type="submit" class="assign_btn" name="assign_btn" id="assign_btn">Unsend</button>
                            </form>
                            <?php
                        } ?>
                        </td>
                        <td><button type="button" data-value="<?php echo $row1['assignment_id']; ?>" value="<?php echo $row1['batch_id']; ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
                    </tr>
                </tbody>
    <?php
            }
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
                                url: "/pages/html/common/common-assignment_delete.php?id1=" + id1 + "&id2=" + id2,
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