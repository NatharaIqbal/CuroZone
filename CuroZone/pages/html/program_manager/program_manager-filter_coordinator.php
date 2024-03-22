<?php
session_start();

if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
$_SESSION['memberid'];
$_SESSION['role'];
?>
<html>
<?php
	include('dbconnect.php');

	$department_id = $_POST['department_id'];
	echo "<script>console.log('$department_id')</script>";

	if ($department_id  != '') {
		//echo "<script>console.log('department')</script>";
		$sql = "SELECT * FROM employee_tbl WHERE department_id = '" . $department_id . "' AND role = '1'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) != 0) {
?>
			<table width="100%" align="center">
				<thead class="titles">
					<tr>
						<th style="padding: 10px;">Student ID</th>
						<th>First Name</th>
						<th>Last Nmae</th>
						<th>Date of Birth</th>
						<th>Gender</th>
						<th>NIC</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Department ID</th>
						<th colspan="2">Options</th>
					</tr>
				</thead>
				<?php
				while ($row = mysqli_fetch_array($result)) {
				?>
					<tbody>
						<tr>
							<td><?php echo $row['employee_id'] ?></td>
							<td><?php echo $row['first_name'] ?></td>
							<td><?php echo $row['last_name'] ?></td>
							<td><?php echo $row['dob'] ?></td>
							<td><?php echo $row['gender'] ?></td>
							<td><?php echo $row['nic'] ?></td>
							<td><?php echo $row['phone'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['department_id'] ?></td>
							<td>
								<?php echo "<form id='form' name='form' method='post' action='coordinator-edit_employee.php?employee_id=$row[employee_id]'>" ?>
								<button type="submit" value="<?php echo $row['employee_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
								</form>
							</td>
							<td><button type="button" value="<?php echo $row['employee_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
						</tr>
					</tbody>
			<?php
				}
			}
		} else {
			?>

			<table width="100%" align="center">
				<thead class="titles">
					<tr>
						<th style="padding: 10px;">Employee ID</th>
						<th>First Name</th>
						<th>Last Nmae</th>
						<th>Date of Birth</th>
						<th>Gender</th>
						<th>NIC</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Department ID</th>
						<th colspan="2">Operations</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$sql = "SELECT * FROM employee_tbl WHERE role='1'";

					$result = $con->query($sql);

					if (!$result) {
						die("invalid query: " . $con->error);
					}

					while ($row = $result->fetch_assoc()) {
					?>
						<tr>
							<td><?php echo $row['employee_id'] ?></td>
							<td><?php echo $row['first_name'] ?></td>
							<td><?php echo $row['last_name'] ?></td>
							<td><?php echo $row['dob'] ?></td>
							<td><?php echo $row['gender'] ?></td>
							<td><?php echo $row['nic'] ?></td>
							<td><?php echo $row['phone'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['department_id'] ?></td>
							<td>
								<?php echo "<form id='form1' name='form1' method='post' action='coordinator-edit_coordinator.php?employee_id=$row[employee_id]'>" ?>
								<button type="submit" value="<?php echo $row['employee_id'] ?>" class="edit_btn" name="editbtn" id="editbtn">Edit</button>
								</form>
							</td>
							<td><button type="button" value="<?php echo $row['employee_id'] ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
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
									url: "program_manager-employee_delete.php?id=" + id,
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

<?php
} else {
	header("Location: /pages/html/login.html");
}
?>