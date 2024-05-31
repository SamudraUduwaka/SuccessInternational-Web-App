<?php

$id = 1; //from session

require "connection.php";

$student = Database::search("SELECT * FROM `student` WHERE `id`='" . $id . "'");
$dstudent = $student->fetch_assoc();
$classID = $dstudent['class_id'];

$subjectsavailable = Database::search("SELECT * FROM `subject_has_class` WHERE `class_id`='" . $classID . "'");
$nsubjectsavailable = $subjectsavailable->num_rows;

if ($nsubjectsavailable != 0) {
    for ($j = 0; $j < $nsubjectsavailable; $j++) {
        $dsubjectsavailable = $subjectsavailable->fetch_assoc();
        $subjectsavailableID = $dsubjectsavailable['id'];

        $sub = Database::search("SELECT * FROM `subject` WHERE `id`='" . $dsubjectsavailable['subject_id'] . "'");
        $dsub = $sub->fetch_assoc();

        $med = Database::search("SELECT * FROM `medium` WHERE `id`='" . $dsub['medium_id'] . "'");
        $dmed = $med->fetch_assoc();

        $class = Database::search("SELECT * FROM `class` WHERE `id`='" . $classID . "'");
        $dclass = $class->fetch_assoc();


        $all = Database::search("SELECT * FROM `assignmentpdfs` WHERE `subject_has_class_id`='" . $subjectsavailableID . "'");
        $nall = $all->num_rows;

        if ($nall > 0) {

?>
            <div class="col-12 border-1 border-top-0 border-right-0 border-left-0 border-dark mt-2 text-start pt-3 bg-info">
                <p class="fw-bold text-white"><?php echo $dclass['name'] ?> | <?php echo $dmed['name'] ?> | <?php echo $dsub['name'] ?></p>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Assignment</th>
                        <th>Comment</th>
                        <th>Mark</th>
                        <th>Grade</th>
                        <th>dateadded</th>
                        <th>Download</th>
                        <th></th>
                    </tr>
                    <?php
                    for ($i = 0; $i < $nall; $i++) {
                        $dall = $all->fetch_assoc();
                        $shas = Database::search("SELECT * FROM `student_has_assignmentmark` WHERE `assignmentpdfs_id`='" . $dall["id"] . "' AND `student_id`='" . $id . "'");
                        $nshas = $shas->num_rows;
                        if ($nshas == 1) {
                            $dshas = $shas->fetch_assoc();

                    ?>
                            <tr>

                                <td><?php echo $dshas['id'] ?></td>
                                <td><?php echo $dall['name']; ?></td>
                                <td><?php echo $dshas['comment']; ?></td>
                                <td><?php echo $dshas['mark'] ?></td>
                                <?php
                                $grade = Database::search("SELECT * FROM `grade` WHERE `id`='" . $dshas['grade_id'] . "'");
                                $dgrade = $grade->fetch_assoc();
                                ?>
                                <td><?php echo $dgrade['name'] ?></td>
                                <td><?php echo $dshas['dateadded']?></td>
                                <td class="text-center"><a target="_blank" download href="<?php echo $dshas['url'] ?>"><i class="bi bi-file-earmark-arrow-down-fill fs-4"></i></a></td>
                                <?php
                                $examS = Database::search("SELECT * FROM `exam_status` WHERE `id`='".$dshas['exam_status_id']."'");
                                $dexamS = $examS->fetch_assoc();
                                if ($dexamS['id']=="2") {
                                ?>
                                    <td><button class="btn btn-danger" disabled ><i class="bi bi-arrow-repeat"></i> Repeat</button></td>
                                    <?php
                                } else {
                                    ?>
                                        <td><button class="btn btn-success" disabled><i class="bi bi-check2-circle"></i> Passed</button></td>
                                    
                                    <?php
                                }
                                ?>
                            </tr>

                        <?php
                        }
                        ?>
                </table>
            </div>


        <?php

                    }
                } else {
        ?>
        <p class="fw-bold">No Assignments Available.</p>
<?php
                }
            }
        }

?>