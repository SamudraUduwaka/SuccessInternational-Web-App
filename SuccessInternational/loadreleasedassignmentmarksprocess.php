<?php

$id = 1;

require "connection.php";

$r = Database::search("SELECT `assignmentpdfs_id` FROM `student_has_assignmentmark` WHERE `teacher_id`='" . $id . "' GROUP BY `assignmentpdfs_id`");
$nr = $r->num_rows;

if ($nr > 0) {
    for ($j = 0; $j < $nr; $j++) {
        $dr = $r->fetch_assoc();

        $assignmentpdfs = Database::search("SELECT * FROM `assignmentpdfs` WHERE `id`='" . $dr['assignmentpdfs_id'] . "'");
        $dassignmentpdfs = $assignmentpdfs->fetch_assoc();

        $subjectHasClass = Database::search("SELECT * FROM `subject_has_class` WHERE `id`='" . $dassignmentpdfs['subject_has_class_id'] . "'");
        $dsubjectHasClass = $subjectHasClass->fetch_assoc();

        $subjectID = $dsubjectHasClass['subject_id'];
        $classID = $dsubjectHasClass['class_id'];

        $class = Database::search("SELECT * FROM `class` WHERE `id`='" . $classID . "'");
        $dclass = $class->fetch_assoc();
        $c = $dclass['name'];

        $subject = Database::search("SELECT * FROM `subject` WHERE `id`='" . $subjectID . "'");
        $dsubject = $subject->fetch_assoc();
        $s = $dsubject['name'];

        $medium = Database::search("SELECT * FROM `medium` WHERE `id`='" . $dsubject['medium_id'] . "'");
        $dmedium = $medium->fetch_assoc();
        $m = $dmedium['name'];

?>
        <div class="accordion" id="accordionPanelsStayOpenExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <?php echo $c; ?> | <?php echo $s; ?> | <?php echo $m; ?>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="responsive-table">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Student</th>
                                    <th>Comment</th>
                                    <th>Mark</th>
                                    <th>Grade</th>
                                    <th>Uploaded date</th>
                                    <th>View</th>
                                    <th>Download</th>
                                </tr>

                        </div>

                        <?php

                        $resultset = Database::search("SELECT * FROM `student_has_assignmentmark` WHERE `assignmentpdfs_id`='" . $dr['assignmentpdfs_id'] . "'");
                        $nresultset = $resultset->num_rows;
                        if ($nresultset > 0) {

                            for ($i = 0; $i < $nresultset; $i++) {
                                $dresultset = $resultset->fetch_assoc();

                        ?>
                                <tr>

                                    <td><?php echo $dresultset['id']; ?></td>
                                    <?php
                                    $student = Database::search("SELECT * FROM `student` WHERE `id`='" . $dresultset['student_id'] . "'");
                                    $dstudent = $student->fetch_assoc();
                                    ?>
                                    <td><?php echo $dstudent['fname'] . " " . $dstudent['lname']; ?></td>
                                    <td><?php echo $dresultset['comment']; ?></td>
                                    <td><?php echo $dresultset['mark']; ?></td>
                                    <td><?php echo $dresultset['dateadded']; ?></td>
                                    <?php
                                    $grade = Database::search("SELECT * FROM `grade` WHERE `id`='" . $dresultset['grade_id'] . "'");
                                    $dgrade = $grade->fetch_assoc();
                                    ?>
                                    <td><?php echo $dgrade['name'] ?></td>
                                    <td class="text-center"><a href="opendocuments.php?id=<?php echo $dresultset['assignmentpdfs_id']; ?>" target="_blank"><i class="bi bi-eye-fill fs-4"></i></a></td>
                                    <td class="text-center"><a target="_blank" download href="<?php echo $dresultset['url'] ?>"><i class="bi bi-file-earmark-arrow-down-fill fs-4"></i></a></td>

                                </tr>

                        <?php


                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    <?php
    }
} else {
    ?>
    <div class="row border border-1 border-secondary p-3 mt-2 mb-2">
        <div class="col-12 col-lg-10 offset-0 offset-lg-1 text-center">
            <span class="fs-6">You have not released any assignment mark yet.</span>
        </div>
    </div>
<?php
}

?>