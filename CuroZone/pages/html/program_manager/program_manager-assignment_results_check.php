<?php
if(isset ($_SESSION['memberid'] , $_SESSION['role'])) {
	$_SESSION['memberid'];
	$_SESSION['role'];
include('dbconnect.php');

$department_id = '$_POST[departmentselect]';
$course_id = '$_POST[courseselect]';
$module_id = '$_POST[moduleselect]';
$batch_id = '$_POST[batchselect]';
$student_id = '$_POST[studentselect]';

if ($department_id != '' && $course_id != '' && $module_id = '' && $student_id = '' && $batch_id != '') {
	$sql1 = "SELECT * FROM student_tbl WHERE batch_id = $batch_id";
	$result1 = $con->query($sql1);
	if (!$result1) {
		die("invalid query: " . $con->error);
	}
	while ($row1 = $result1->fetch_assoc()) {
		$sql2 = "SELECT * FROM submitted_assignment_tbl WHERE student_id = $row1[student_id]";
		$result2 = $con->query($sql2);
		if (!$result2) {
			die("invalid query: " . $con->error);
		}
		while ($row2 = $result2->fetch_assoc()) {
			$sql3 = "SELECT * FROM assignment_tbl WHERE assignment_id  = $row2[assignment_id]";
			$result3 = $con->query($sql3);
			if (!$result3) {
				die("invalid query: " . $con->error);
			}
			while ($row3 = $result3->fetch_assoc()) {
				$sql4 = "SELECT * FROM module_tbl WHERE module_id   = $row3[module_id]";
				$result4 = $con->query($sql4);
				if (!$result4) {
					die("invalid query: " . $con->error);
				}
				while ($row4 = $result4->fetch_assoc()) {
?>
					<tr>
						<td><?php echo $row2['student_id'] ?></td>
						<td><?php echo $row1['batch_id'] ?></td>
						<td><?php echo $row3['module_id'] ?></td>
						<td><?php echo $row4['name'] ?></td>
						<td><?php echo $row2['assignment_id'] ?></td>
						<td><?php echo $row2['result'] ?></td>
						<td><?php echo $row2['feedback'] ?></td>
					</tr>
				<?php
				}
			}
		}
	}
} else if ($department_id != '' && $course_id != '' && $batch_id = '' && $student_id = '' && $module_id != '') {
	$sql1 = "SELECT * FROM assignment_tbl WHERE batch_id = $module_id";
	$result1 = $con->query($sql1);
	if (!$result1) {
		die("invalid query: " . $con->error);
	}
	while ($row1 = $result1->fetch_assoc()) {
		$sql2 = "SELECT * FROM submitted_assignment_tbl WHERE student_id = $row1[assignment_id]";
		$result2 = $con->query($sql2);
		if (!$result2) {
			die("invalid query: " . $con->error);
		}
		while ($row2 = $result2->fetch_assoc()) {
			$sql3 = "SELECT * FROM module_tbl WHERE module_id   = $row2[module_id]";
			$result3 = $con->query($sql3);
			if (!$result4) {
				die("invalid query: " . $con->error);
			}
			while ($row3 = $result3->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row2['student_id'] ?></td>
					<td><?php echo $row1['batch_id'] ?></td>
					<td><?php echo $row1['module_id'] ?></td>
					<td><?php echo $row3['name'] ?></td>
					<td><?php echo $row2['assignment_id'] ?></td>
					<td><?php echo $row2['result'] ?></td>
					<td><?php echo $row2['feedback'] ?></td>
				</tr>
			<?php
			}
		}
	}
} else if ($department_id != '' && $course_id != '' && $batch_id = '' && $module_id = '' && $student_id != '') {
	$sql1 = "SELECT * FROM submitted_assignment_tbl WHERE batch_id = $student_id";
	$result1 = $con->query($sql1);
	if (!$result1) {
		die("invalid query: " . $con->error);
	}
	while ($row1 = $result1->fetch_assoc()) {
		$sql2 = "SELECT * FROM assignment_tbl WHERE student_id = $row1[assignment_id]";
		$result2 = $con->query($sql2);
		if (!$result2) {
			die("invalid query: " . $con->error);
		}
		while ($row2 = $result2->fetch_assoc()) {
			$sql3 = "SELECT * FROM module_tbl WHERE module_id   = $row2[module_id]";
			$result3 = $con->query($sql3);
			if (!$result4) {
				die("invalid query: " . $con->error);
			}
			while ($row3 = $result3->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row1['student_id'] ?></td>
					<td><?php echo $row1['batch_id'] ?></td>
					<td><?php echo $row2['module_id'] ?></td>
					<td><?php echo $row3['name'] ?></td>
					<td><?php echo $row1['assignment_id'] ?></td>
					<td><?php echo $row1['result'] ?></td>
					<td><?php echo $row1['feedback'] ?></td>
				</tr>
			<?php
			}
		}
	}
} else if ($department_id = '' && $course_id = '' && $batch_id = '' && $module_id = '' && $student_id != '') {
	$sql1 = "SELECT * FROM submitted_assignment_tbl WHERE batch_id = $student_id";
	$result1 = $con->query($sql1);
	if (!$result1) {
		die("invalid query: " . $con->error);
	}
	while ($row1 = $result1->fetch_assoc()) {
		$sql2 = "SELECT * FROM assignment_tbl WHERE student_id = $row1[assignment_id]";
		$result2 = $con->query($sql2);
		if (!$result2) {
			die("invalid query: " . $con->error);
		}
		while ($row2 = $result2->fetch_assoc()) {
			$sql3 = "SELECT * FROM module_tbl WHERE module_id   = $row2[module_id]";
			$result3 = $con->query($sql3);
			if (!$result4) {
				die("invalid query: " . $con->error);
			}
			while ($row3 = $result3->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row1['student_id'] ?></td>
					<td><?php echo $row1['batch_id'] ?></td>
					<td><?php echo $row2['module_id'] ?></td>
					<td><?php echo $row3['name'] ?></td>
					<td><?php echo $row1['assignment_id'] ?></td>
					<td><?php echo $row1['result'] ?></td>
					<td><?php echo $row1['feedback'] ?></td>
				</tr>
<?php
			}
		}
	}
}
}
else{
    header("Location: /pages/html/login.html");
}
?>