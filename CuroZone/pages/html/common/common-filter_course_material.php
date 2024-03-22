<html>
<?php
session_start();
include('dbconnect.php');

$course_id = $_POST['course_id'];
$batch_id = $_POST['batch_id'];
$module_id = $_POST['module_id'];

echo "<script>console.log('$course_id')</script>";
echo "<script>console.log('$batch_id')</script>";
echo "<script>console.log('$module_id')</script>";

if ($course_id  != '' && $batch_id == 'null' && $module_id == 'null') {
    $sql1 = "SELECT * FROM course_metirials_tbl WHERE course_id='" . $course_id . "'";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result1)) {
?>
        <table width="100%" cellspacing="10" class="coursematerials">
            <thead class="titles">
                <tr>
                    <th width=10%>Material ID</th>
                    <th width=10%>Course ID</th>
                    <th width=10%>Batch ID</th>
                    <th width=10%>Module ID</th>
                    <th width=15%>File</th>
                    <th>Description</th>
                    <th width=10%>Operations</th>
                </tr>
                <?php
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo "<tr>";
                    echo "<td>$row1[meaterial_id]</td>";
                    echo "<td>$row1[course_id]</td>";
                    echo "<td>$row1[batch_id]</td>";
                    echo "<td>$row1[module_id]</td>";
                    echo "<td><a href='/pages/html/common/common-download_course_materials.php?id=$row1[meaterial_id]'>Download File</a></td>";
                    echo "<td>$row1[description]</td>";
                    echo "<td><button type='button' value=$row1[meaterial_id] class='confirm_del_btn' name='deletebtn' id='deletebtn'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
        </table>
    <?php
    } else {
        echo "<div class='noData'>Sorry! No records found.</div>";
    }
} elseif ($course_id != '' && $batch_id != 'null' && $module_id == 'null') {
    // echo "<script>console.log('batch_id')</script>";
    $sql1 = "SELECT * FROM course_metirials_tbl WHERE course_id='" . $course_id . "' AND batch_id='" . $batch_id . "'";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result1)) {
    ?>
        <table width="100%" cellspacing="10" class="coursematerials">
            <thead class="titles">
                <tr>
                    <th width=10%>Material ID</th>
                    <th width=10%>Course ID</th>
                    <th width=10%>Batch ID</th>
                    <th width=10%>Module ID</th>
                    <th width=15%>File</th>
                    <th>Description</th>
                    <th width=10%>Operations</th>
                </tr>
                <?php
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo "<tr>";
                    echo "<td>$row1[meaterial_id]</td>";
                    echo "<td>$row1[course_id]</td>";
                    echo "<td>$row1[batch_id]</td>";
                    echo "<td>$row1[module_id]</td>";
                    echo "<td><a href='/pages/html/common/common-download_course_materials.php?id=$row1[meaterial_id]'>Download File</a></td>";
                    echo "<td>$row1[description]</td>";
                    echo "<td><button type='button' value=$row1[meaterial_id] class='confirm_del_btn' name='deletebtn' id='deletebtn'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
        </table>
    <?php
    } else {
        echo "<div class='noData'>Sorry! No records found.</div>";
    }
} elseif ($course_id != '' && $batch_id != 'null' && $module_id != 'null') {
    $sql1 = "SELECT * FROM course_metirials_tbl WHERE course_id='" . $course_id . "' AND batch_id='" . $batch_id . "' AND  module_id='" . $module_id . "'";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result1)) {
    ?>
        <table width="100%" cellspacing="10" class="coursematerials">
            <thead class="titles">
                <tr>
                    <th width=10%>Material ID</th>
                    <th width=10%>Course ID</th>
                    <th width=10%>Batch ID</th>
                    <th width=10%>Module ID</th>
                    <th width=15%>File</th>
                    <th>Description</th>
                    <th width=10%>Operations</th>
                </tr>
                <?php
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo "<tr>";
                    echo "<td>$row1[meaterial_id]</td>";
                    echo "<td>$row1[course_id]</td>";
                    echo "<td>$row1[batch_id]</td>";
                    echo "<td>$row1[module_id]</td>";
                    echo "<td><a href='/pages/html/common/common-download_course_materials.php?id=$row1[meaterial_id]'>Download File</a></td>";
                    echo "<td>$row1[description]</td>";
                    echo "<td><button type='button' value=$row1[meaterial_id] class='confirm_del_btn' name='deletebtn' id='deletebtn'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
        </table>
    <?php
    } else {
        echo "<div class='noData'>Sorry! No records found.</div>";
    }
} elseif ($course_id == '') {
    $batch_id = '';
    $module_id = '';

    $sql1 = "SELECT * FROM course_metirials_tbl WHERE author_id='" . $_SESSION['memberid'] . "'";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result1)) {
    ?>
        <table width="100%" cellspacing="10" class="coursematerials">
            <thead class="titles">
                <tr>
                    <th width=10%>Material ID</th>
                    <th width=10%>Course ID</th>
                    <th width=10%>Batch ID</th>
                    <th width=10%>Module ID</th>
                    <th width=15%>File</th>
                    <th>Description</th>
                    <th width=10%>Operations</th>
                </tr>
                <?php
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo "<tr>";
                    echo "<td>$row1[meaterial_id]</td>";
                    echo "<td>$row1[course_id]</td>";
                    echo "<td>$row1[batch_id]</td>";
                    echo "<td>$row1[module_id]</td>";
                    echo "<td><a href='/pages/html/common/common-download_course_materials.php?id=$row1[meaterial_id]'>Download File</a></td>";
                    echo "<td>$row1[description]</td>";
                    echo "<td><button type='button' value=$row1[meaterial_id] class='confirm_del_btn' name='deletebtn' id='deletebtn'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
        </table>
<?php
    } else {
        echo "<div class='noData'>Sorry! No records found.</div>";
    }
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
                            url: "lecturer-delete_course_material.php?id=" + id,
                            success: function(response) {
                                swal("Course Material deleted!", {
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