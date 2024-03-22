<html>
<?php
session_start();
$_SESSION['ROLE'] = '1';
include('dbconnect.php');
echo "<script>console.log('test 1')</script>";
if (isset($_POST['request'])) {
    $request = $_POST['request'];
    echo "<script>console.log('$request')</script>";
    //$tbl = $_POST['tbl'];

    if ($request) {
        $sql1 = "SELECT * FROM course_tbl WHERE department_id = '" . $request . "'";
        $result1 = mysqli_query($con, $sql1);
        $count1 = mysqli_num_rows($result1);
        if ($count1) {
?>
            <table width="80%" align="center">
                <thead class="titles">
                    <tr>
                        <th>Department ID</th>
                        <th>Course ID</th>
                        <th>Course Nmae</th>
                        <th>Started date</th>
                        <th>Duration<br>(months)</th>
                        <?php
                        if($_SESSION['role'] == '0'){
                            echo "<th colspan='2'>Options</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <?php
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $course_id = $row1['course_id']
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row1['department_id']; ?></td>
                            <td><?php echo $row1['course_id']; ?></td>
                            <td><?php echo $row1['course_name']; ?></td>
                            <td><?php echo $row1['started_date']; ?></td>
                            <td><?php echo $row1['duration']; ?></td>
                            <?php
                        if($_SESSION['role'] == '0'){
                        ?>
                            <td>
                                <?php echo "<form id='form1' name='form1' method='post' action='program_manager-edit_courses.php?course_id=$course_id'>" ?>
                                <button type="submit" value="<?php echo $course_id ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                </form>
                            </td>
                            <td><button type="button" value="<?php echo $course_id ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
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
                                url: "program_manager-course_delete.php?id=" + id,
                                success: function(response) {
                                    swal("Course deleted!", {
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