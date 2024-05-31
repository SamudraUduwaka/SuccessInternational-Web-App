<?php

$id = 1;
require "connection.php";

$assignment = $_POST['apdf'];
$student = $_POST['stu'];

if ($assignment == "0") {
?>
    <p class="fw-bold">Select the assignment</p>
<?php
} else if ($student == "0") {
?>
    <p class="fw-bold">Select a student</p>
    <?php
} else {

    $asStudents = Database::search("SELECT * FROM `student_has_assignmentmark` WHERE `student_id`='" . $student . "' AND `assignmentpdfs_id`='" . $assignment . "'");
    $nasStudents = $asStudents->num_rows;

    if ($nasStudents > 0) {
        $asStudent = $asStudents->fetch_assoc();
        $stu = Database::search("SELECT * FROM `student` WHERE `id`='" . $student . "'");
        $stuu = $stu->fetch_assoc();
        $stuname = $stuu['fname'] . " " . $stuu['lname'];
    ?>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Student</th>
                    <th>Assignment</th>
                    <th>Mark</th>
                    <th>Comment</th>
                    <th>Grade</th>
                    <th>Teacher</th>
                    <th>View</th>
                    <th>Download</th>
                    <th>Release</th>

                </tr>
                <tr>
                    <td><?php echo $stuname; ?></td>
                    <?php
                    $as = Database::search("SELECT * FROM `assignmentpdfs` WHERE `id`='" . $assignment . "'");
                    $das = $as->fetch_assoc();
                    ?>
                    <td><?php echo $das['name']; ?></td>
                    <td><?php echo $asStudent['mark']; ?></td>
                    <td><?php echo $asStudent['comment']; ?></td>
                    <?php
                    $gr = Database::search("SELECT * FROM `grade` WHERE `id`='" . $asStudent['grade_id'] . "'");
                    $dgr = $gr->fetch_assoc();
                    ?>
                    <td><?php echo $dgr['name']; ?></td>
                    <?php
                    $teacher = Database::search("SELECT * FROM `teacher` WHERE `id`='" . $asStudent['teacher_id'] . "'");
                    $dteacher = $teacher->fetch_assoc();
                    ?>
                    <td><?php echo $dteacher['fname'] . " " . $dteacher['lname'] ?></td>

                    <td class="text-center"><a href="opendocuments.php?id=<?php echo $assignment; ?>" target="_blank"><i class="bi bi-eye-fill fs-4"></i></a></td>
                    <td class="text-center"><a target="_blank" download href="<?php echo $asStudent['url'] ?>"><i class="bi bi-file-earmark-arrow-down-fill fs-4"></i></a></td>
                    <?php
                    $statusId = $asStudent['status_id'];
                    if ($statusId == "1") {
                    ?>
                        <td><button class="btn btn-warning" onclick="makeStatusReleasedMR(<?php echo $asStudent['id'] ?>);" id="sbutn<?php echo $asStudent['id'] ?>"><i class='bi bi-send-x-fill'></i></button></td>
                    <?php
                    } else {
                    ?>
                        <td><button class="btn btn-success" onclick="makeStatusReleasedMR(<?php echo $asStudent['id'] ?>);" id="sbutn<?php echo $asStudent['id'] ?>"><i class="bi bi-send-check-fill"></i></button></td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
        </div>
    <?php
    } else {
    ?>
        <p class="fw-bold">The assignment mark of this student has not been released yet</p>
<?php
    }
}



?>