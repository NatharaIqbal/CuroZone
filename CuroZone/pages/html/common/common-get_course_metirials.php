<?php
session_start();
include('dbconnect.php');

$course_id = $_POST['course_id'];
$sql = "SELECT * FROM course_metirials_tbl WHERE course_id='" . $course_id . "'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result)) {
?>
    <table width="60%" cellspacing="10" class="coursematerials">
        <thead class="titles">
            <tr>
                <th>Module ID</th>
                <th>Description</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['module_id']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><a href="/pages/html/common/common-download_course_materials.php?id=<?php echo $row['meaterial_id'] ?>">Download File</a></td>
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