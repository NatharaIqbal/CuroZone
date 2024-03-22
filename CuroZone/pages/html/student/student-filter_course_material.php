<html>
<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'], $_SESSION['batch_id'], $_SESSION['course_id'], $_SESSION['department_id'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];
    $_SESSION['batch_id'];
    $_SESSION['course_id'];
    $_SESSION['department_id'];

    include('dbconnect.php');


    $module_id = $_POST['module_id'];


    if ($module_id != '') {
        $sql1 = "SELECT * FROM course_metirials_tbl WHERE batch_id='" . $_SESSION['batch_id'] . "' AND module_id='" . $module_id . "'";
        $result1 = mysqli_query($con, $sql1);

        if (mysqli_num_rows($result1)) {
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
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                        <tr>
                            <td><?php echo $row1['module_id']; ?></td>
                            <td><?php echo $row1['description']; ?></td>
                            <td><a href="/pages/html/common/common-download_course_materials.php?id=<?php echo $row1['meaterial_id'] ?>">Download File</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
    } else {
        echo "<div class='noData'>Sorry! No records found.</div>";
    }
} elseif ($module_id == '') {
    $sql1 = "SELECT * FROM course_metirials_tbl WHERE batch_id = '" . $_SESSION['batch_id'] . "''";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result1)) {
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
                while ($row1 = mysqli_fetch_assoc($result1)) {
                ?>
                    <tr>
                        <td><?php echo $row1['module_id']; ?></td>
                        <td><?php echo $row1['description']; ?></td>
                        <td><a href="/pages/html/common/common-download_course_materials.php?id=<?php echo $row1['meaterial_id'] ?>">Download File</a></td>
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
} else {
    header("Location: /pages/html/login.html");
}
?>

</html>