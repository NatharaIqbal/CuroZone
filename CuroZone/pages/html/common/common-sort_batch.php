<html>

<?php
session_start();
include('dbconnect.php');

$department_id = $_POST['department_id'];
$course_id = $_POST['course_id'];

echo "<script>console.log('$department_id')</script>";
echo "<script>console.log('$course_id')</script>";

if ($department_id  != '' && $course_id == 'null') {
    echo "<script>console.log('department')</script>";
    $sql1 = "SELECT * FROM course_tbl WHERE department_id = '" . $department_id . "'";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) != 0) {
?>
        <table width="80%" align="center">
            <thead class="titles">
                <tr>
                    <th style="padding: 10px;">Department ID</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Batch ID</th>
                    <th>Started Date</th>
                    <th colspan="2" width=10%>Options</th>
                </tr>
            </thead>
            <?php
            while ($row1 = mysqli_fetch_array($result1)) {
                $sql2 = "SELECT * FROM batch_tbl WHERE course_id = '" . $row1['course_id'] . "'";
                $result2 = mysqli_query($con, $sql2);
                if (mysqli_num_rows($result2) != 0) {
                    while ($row2 = mysqli_fetch_array($result2)) {
            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row1['department_id'] ?></td>
                                <td><?php echo $row1['course_id'] ?></td>
                                <td><?php echo $row1['course_name'] ?></td>
                                <td><?php echo $row2['batch_id'] ?></td>
                                <td><?php echo $row2['started_date'] ?></td>
                                <td>
                                    <?php echo "<form id='form1' name='form1' method='post' action='coordinator-edit_students.php?batch_id=$row2[batch_id]'>" ?>
                                    <button type="submit" value="<?php echo $row2['batch_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                    </form>
                                </td>
                                <td><button type="button" value="<?php echo $row2['batch_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
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
    } elseif ($department_id != '' && $course_id != 'null') {
        echo "<script>console.log('course')</script>";
        ?>
        <table width="80%" align="center">
            <thead class="titles">
                <tr>
                    <th style="padding: 10px;">Department ID</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Batch ID</th>
                    <th>Started Date</th>
                    <th colspan="2" width=10%>Options</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM course_tbl WHERE course_id = '" . $course_id . "'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $sql1 = "SELECT * FROM batch_tbl WHERE course_id = '" . $course_id . "'";
            $result1 = mysqli_query($con, $sql1);
            if (mysqli_num_rows($result1) != 0) {
                while ($row1 = mysqli_fetch_array($result1)) {
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $department_id ?></td>
                            <td><?php echo $row['course_id'] ?></td>
                            <td><?php echo $row['course_name'] ?></td>
                            <td><?php echo $row1['batch_id'] ?></td>
                            <td><?php echo $row1['started_date'] ?></td>
                            <td>
                                <?php echo "<form id='form1' name='form1' method='post' action='coordinator-edit_students.php?batch_id=$row1[batch_id]'>" ?>
                                <button type="submit" value="<?php echo $row1['batch_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                </form>
                            </td>
                            <td><button type="button" value="<?php echo $row1['batch_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
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

            <table width="80%" align="center">
                <thead class="titles">
                    <tr>
                        <th style="padding: 10px;">Department ID</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Batch ID</th>
                        <th>Started Date</th>
                        <th colspan="2" width=10%>Options</th>
                    </tr>
                </thead>

                <!--all students-->
                <tbody>
                <tbody>
                    <?php
                    $sql1 = "SELECT * FROM batch_tbl";


                    $result1 = $con->query($sql1);

                    if (!$result1) {
                        die("invalid query: " . $con->error);
                    }

                    while ($row1 = $result1->fetch_assoc()) {
                        $sql2 = "SELECT department_id FROM course_tbl WHERE course_id='" . $row1['course_id'] . "'";
                        $result2 = $con->query($sql2);

                        if (!$result2) {
                            die("invalid query: " . $con->error);
                        }
                    ?>
                        <tr>
                            <?php
                            while ($row2 = $result2->fetch_assoc()) {

                                echo "<td>$row2[department_id]</td>";
                            }
                            ?>
                            <td><?php echo $row1['course_id'] ?></td>
                            <td><?php echo $row1['batch_id'] ?></td>
                            <td><?php echo $row1['started_date'] ?></td>
                            <?php $batch_id = $row1['batch_id'] ?>
                            <td>
                                <?php echo "<form id='form1' name='form1' method='post' action='program_manager-edit_batches.php?batch_id=$batch_id'>" ?>
                                <button type="submit" value="<?php echo $batch_id ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                </form>
                            </td>
                            <td><button type="button" value="<?php echo $batch_id ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
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
                                    url: "/pages/html/common/common-batch_delete.php?id=" + id,
                                    success: function(response) {
                                        swal("Batch deleted!", {
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