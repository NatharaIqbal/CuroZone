<?php
session_start();
include('dbconnect.php');
echo "<script>console.log('test 1')</script>";
if (isset($_POST['request'])) {
    $request = $_POST['request'];
    //echo "<script>console.log($request)</script>";
    //$tbl = $_POST['tbl'];

    if ($request != "") {
        $sql1 = "SELECT * FROM course_tbl WHERE department_id = '" . $request . "'";
        $result1 = mysqli_query($con, $sql1);
        $count1 = mysqli_num_rows($result1);
        if ($count1) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $sql2 = "SELECT * FROM batch_tbl WHERE course_id = '" . $row1['course_id'] . "'";
                $result2 = mysqli_query($con, $sql2);
                $count2 = mysqli_num_rows($result2);
                if ($count2) {
?>
                    <table width="80%" align="center">
                        <thead class="titles">
                            <tr>
                                <th>Department ID</th>
                                <th>Course ID</th>
                                <th>Batch ID</th>
                                <th>Started date</th>
                            </tr>
                        </thead>
                        <?php


                        while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row1['department_id']; ?></td>
                                    <td><?php echo $row2['course_id']; ?></td>
                                    <td><?php echo $row2['batch_id']; ?></td>
                                    <td><?php echo $row2['started_date']; ?></td>
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
        }
    }


    ?>