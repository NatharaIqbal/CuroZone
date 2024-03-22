<?php
session_start();
include('dbconnect.php');

$course_id = $_POST['course_id'];

$sql = "SELECT * FROM module_tbl WHERE course_id = '" . $course_id . "'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
?>
    <table width="60%" cellspacing="10">
        <thead class="titles">
            <tr>
                <th>Course ID</th>
                <th>Module ID</th>
                <th>Module Name</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row['course_id']; ?></td>
                    <td><?php echo $row['module_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo "<div class='noData'>Sorry! No records Found</div>";
}
?>