<?php
session_start();
if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
?>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Manage Modules - CuroZone</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <link href="/pages/css/styles3.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <?php
    include('dbconnect.php');
    if (isset($_POST['course_id'])) {
        $request = $_POST['course_id'];
        //$tbl = $_POST['tbl'];

        if ($request != "") {
            $sql1 = "SELECT * FROM module_tbl WHERE course_id = '" . $request . "'";
            $result1 = mysqli_query($con, $sql1);
            $count1 = mysqli_num_rows($result1);
            if ($count1) {
    ?>
                <table width="100%" align="center">
                    <thead class="titles">
                        <tr>
                            <th>Course ID</th>
                            <th>Module ID</th>
                            <th>Module Name</th>
                            <th>Semester</th>
                            <th>Lecturer ID</th>
                            <?php
                            if ($_SESSION['role'] == '0') {
                            ?>
                                <th colspan="3" width=20%>Operations</th>
                            <?php
                            } else {
                            ?>
                                <th width=10%>Operations</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $course_id = $row1['course_id'];
                        $module_id = trim($row1['module_id']);
                        $name = $row1['name'];
                        $semester = $row1['semester'];

                        $sql2 = "SELECT * FROM module_lecturer_tbl WHERE module_id = '" . $module_id . "' AND course_id = '" . $request . "'";
                        $result2 = mysqli_query($con, $sql2);


                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row1['course_id']; ?></td>
                                <td><?php echo $row1['module_id']; ?></td>
                                <td><?php echo $row1['name']; ?></td>
                                <td><?php echo $row1['semester']; ?></td>
                                <?php

                                if (mysqli_num_rows($result2)) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                        <td><?php echo $row2['lecturer_id']; ?></td>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <td><?php echo "-"; ?></td>
                                <?php

                                }
                                ?>


                                <?php
                                if ($_SESSION['role'] == '0') {
                                ?>
                                    <td>
                                        <?php echo "<form id='form2' name='form2' method='post' action='program_manager-assign_module.php?course_id=$course_id&module_id=$module_id'>" ?>
                                        <button type="submit" value="<?php echo $module_id ?>" class="assign_btn" name="assignbtn" id="assignbtn">Assign</button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo "<form id='form1' name='form1' method='post' action='program_manager-edit_module.php?course_id=$course_id&module_id=$module_id'>" ?>
                                        <button type="submit" value="<?php echo $module_id ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
                                        </form>
                                    </td>
                                    <td><button type="button" value="<?php echo $module_id; ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
                                <?php
                                } elseif ($_SESSION['role'] == '1') {
                                ?>
                                    <td>
                                        <?php echo "<form id='form2' name='form2' method='post' action='coordinator-assign_module.php?course_id=$course_id&module_id=$module_id'>" ?>
                                        <button type="submit" value="<?php echo $module_id ?>" class="assign_btn" name="assignbtn" id="assignbtn">Assign</button>
                                        </form>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>

                        <?php
                    }
                    if ($_SESSION['role'] == '0') {
                        ?>
                            <tr>
                                <td colspan="7">
                                    <?php echo "<form id='form1' name='form1' method='post' action='program_manager-add_new_module.php?course_id=$course_id'>" ?>
                                    <button type="submit" value="<?php echo trim($course_id); ?>" class="add_module_btn" name="editbtn" id="editbtn">Add Module</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                        ?>
                        </tbody>
                    <?php
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
				var id1 = $(this).val();
                console.log(id1);
				swal({
						title: "Are you sure?",
						text: "Once deleted, you will not be able to recover this data!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
                            console.log("test");
							$.ajax({
								url: "/pages/html/program_manager/program_manager-module_delete.php?id1=" + id1,
								success: function(response) {
									swal("Module deleted!", {
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

<?php
} else {
    header("Location: /pages/html/login.html");
}
?>