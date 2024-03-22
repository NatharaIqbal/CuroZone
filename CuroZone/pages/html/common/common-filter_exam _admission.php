<?php
session_start();
include('dbconnect.php');
echo "<script>console.log('test 1')</script>";
if (isset($_POST['request'])) {
    $request = $_POST['request'];
    echo "<script>console.log($request)</script>";
    //$tbl = $_POST['tbl'];

    if ($request != "") {
        $sql = "SELECT * FROM exam_tbl WHERE batch_id = '" . $request . "'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count) {
?>
            <table width="80%" align="center">
                <thead class="titles">
                    <tr>
                        <th>Batch ID</th>
                        <th>Exam ID</th>
                        <th>Module ID</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Locatoin</th>
                        <th>Start time</th>
                        <th>End time</th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['batch_id']; ?></td>
                            <td><?php echo $row['exam_id']; ?></td>
                            <td><?php echo $row['module_id']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                            <td><?php echo $row['end_time']; ?></td>
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