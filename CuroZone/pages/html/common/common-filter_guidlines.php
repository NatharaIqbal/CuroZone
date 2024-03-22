<?php
session_start();
include('dbconnect.php');

$course_id = $_POST['request'];

$sql = "SELECT * FROM course_guidlines_btl WHERE course_id = '$course_id'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) != 0) {
?>
    <table width="50%" cellspacing="10" class="coursematerials">
        <thead class="titles">
            <tr>
                <th width="80%">Guidlines</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                <td><a href="/pages/html/common/common-download_course_guidlines.php?id=<?php echo $row['guidline_id'] ?>">Download Guidline File</a></td>
                    <td><button type="button" value="<?php echo $course_id ?>" class="confirm_del_btn" name="deletebtn" id="deletebtn">Delete</button></td>
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
                                        url: "/pages/html/common/common-guidline_delete.php?id=" + id,
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