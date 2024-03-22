<?php
session_start();

if (isset($_SESSION['memberid'], $_SESSION['role'])) {
    $_SESSION['memberid'];
    $_SESSION['role'];

    include('dbconnect.php');
    $batch_id = $_POST['request1'];
    $module_id = $_POST['request2'];

    if ($batch_id != '' && $module_id == 'null') {
        $sql1 = "SELECT * FROM exam_tbl WHERE batch_id='" . $batch_id . "'";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1)) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
?>
                <table width="80%" align="center">
                    <thead class="titles">
                        <tr>
                            <th>Batch ID</th>
                            <th>Student ID</th>
                            <th>Exam ID</th>
                            <th>Module ID</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM exam_result_tbl WHERE exam_id='" . $row1['exam_id'] . "' AND  send_all = '1'";
                        $result2 = mysqli_query($con, $sql2);
                        if (mysqli_num_rows($result2)) {

                            while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                                <tr>
                                    <td><?php echo $batch_id; ?></td>
                                    <td><?php echo $row2['student_id']; ?></td>
                                    <td><?php echo $row2['exam_id']; ?></td>
                                    <td><?php echo $row1['module_id']; ?></td>
                                    <td><?php echo $row2['result']; ?></td>
                                </tr>
                    <?php
                            }
                        } else {
                            echo "<div class='noData'>Sorry! No records Found</div>";
                        }
                    }
                } else {
                    echo "<div class='noData'>Sorry! No records Found</div>";
                }
            } elseif ($batch_id != '' && $module_id != 'null') {
                $sql1 = "SELECT * FROM exam_tbl WHERE batch_id='" . $batch_id . "' AND module_id='" . $module_id . "'";
                $result1 = mysqli_query($con, $sql1);
                if (mysqli_num_rows($result1)) {
                    ?>
                    <table width="80%" align="center">
                        <thead class="titles">
                            <tr>
                                <th>Batch ID</th>
                                <th>Student ID</th>
                                <th>exam ID</th>
                                <th>Module ID</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $sql2 = "SELECT * FROM exam_result_tbl WHERE exam_id='" . $row1['exam_id'] . "' AND  send_all = '1'";
                                $result2 = mysqli_query($con, $sql2);
                                if (mysqli_num_rows($result2)) {

                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                        <tr>
                                            <td><?php echo $batch_id; ?></td>
                                            <td><?php echo $row2['student_id']; ?></td>
                                            <td><?php echo $row2['exam_id']; ?></td>
                                            <td><?php echo $row1['module_id']; ?></td>
                                            <td><?php echo $row2['result']; ?></td>
                                        </tr>
                <?php
                                    }
                                } else {
                                    echo "<div class='noData'>Sorry! No records Found</div>";
                                }
                            }
                        } else {
                            echo "<div class='noData'>Sorry! No records Found</div>";
                        }
                    }
                } else {
                    header("Location: /pages/html/login.html");
                }
                ?>
                <script>
                    document.getElementById('assign_btn').addEventListener('click', function() {
                        var id = this.value;
                        Swal.fire({
                            title: 'Feedback',
                            text: id,
                            confirmButtonText: 'OK'
                        });
                    });
                </script>