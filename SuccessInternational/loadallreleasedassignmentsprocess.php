<?php

$id = 1; //from session

require "connection.php";

$all = Database::search("SELECT * FROM `student_has_assignmentmark` WHERE `status_id`='1' GROUP BY `assignmentpdfs_id`");
$nall = $all->num_rows;

if ($nall > 0) {
    $dall = $all->fetch_assoc();

    for ($i = 0; $i < $nall; $i++) {
        $as = Database::search("SELECT * FROM `assignmentpdfs` WHERE `id`='" . $dall['assignmentpdfs_id'] . "'");
        $das = $as->fetch_assoc();

        $subclass = Database::search("SELECT * FROM `subject_has_class` WHERE `id`='".$das['subject_has_class_id']."'");
        $dsubclass = $subclass->fetch_assoc();

        $sub = Database::search("SELECT * FROM `subject` WHERE `id`='".$dsubclass['subject_id']."'");
        $dsub = $sub->fetch_assoc();

        $med = Database::search("SELECT * FROM `medium` WHERE `id`='".$dsub['medium_id']."'");
        $dmed = $med->fetch_assoc();

        $class = Database::search("SELECT * FROM `class` WHERE `id`='".$dsubclass['class_id']."'");
        $dclass = $class->fetch_assoc();
?>
        <div class="col-12 border-1 border-top-0 border-right-0 border-left-0 border-dark mt-2 text-start">
            <p class="fw-bold text-primary"><?php echo $dclass['name']?> | <?php echo $dmed['name']?> | <?php echo $dsub['name']?> | <?php echo $das['name']?></p>
        </div>
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
                    <?php
                    $stu = Database::search("SELECT * FROM `student` WHERE `id`='" . $dall['student_id'] . "'");
                    $stuu = $stu->fetch_assoc();
                    $stuname = $stuu['fname'] . " " . $stuu['lname'];
                    ?>
                    <td><?php echo $stuname; ?></td>

                    <td><?php echo $das['name']; ?></td>
                    <td><?php echo $dall['mark']; ?></td>
                    <td><?php echo $dall['comment']; ?></td>
                    <?php
                    $gr = Database::search("SELECT * FROM `grade` WHERE `id`='" . $dall['grade_id'] . "'");
                    $dgr = $gr->fetch_assoc();
                    ?>
                    <td><?php echo $dgr['name']; ?></td>
                    <?php
                    $teacher = Database::search("SELECT * FROM `teacher` WHERE `id`='" . $dall['teacher_id'] . "'");
                    $dteacher = $teacher->fetch_assoc();
                    ?>
                    <td><?php echo $dteacher['fname'] . " " . $dteacher['lname'] ?></td>

                    <td class="text-center"><a href="opendocuments.php?id=<?php echo $dall['assignmentpdfs_id']; ?>" target="_blank"><i class="bi bi-eye-fill fs-4"></i></a></td>
                    <td class="text-center"><a target="_blank" download href="<?php echo $dall['url'] ?>"><i class="bi bi-file-earmark-arrow-down-fill fs-4"></i></a></td>
                    <td><button class="btn btn-warning" onclick="makeStatusReleasedMR(<?php echo $dall['id'] ?>);" id="sbutn<?php echo $dall['id'] ?>"><i class='bi bi-send-x-fill'></i></button></td>

                </tr>
            </table>
        </div>
    <?php
    }
} else {
    ?>
    <p class="fw-bold">All assignment marks has not been released yet.</p>
<?php
}

?>