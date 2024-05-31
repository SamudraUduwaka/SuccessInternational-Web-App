<?php

$id = 1; //from session

require "connection.php";

$student = Database::search("SELECT * FROM `student` WHERE `id`='" . $id . "'");
$dstudent = $student->fetch_assoc();
$classID = $dstudent['class_id'];

$subjectsavailable = Database::search("SELECT * FROM `subject_has_class` WHERE `class_id`='" . $classID . "'");
$nsubjectsavailable = $subjectsavailable->num_rows;

if ($nsubjectsavailable > 0) {
    for ($j = 0; $j < $nsubjectsavailable; $j++) {
        $dsubjectsavailable = $subjectsavailable->fetch_assoc();
        $subjectsavailableID = $dsubjectsavailable['id'];

        $sub = Database::search("SELECT * FROM `subject` WHERE `id`='" . $dsubjectsavailable['subject_id'] . "'");
        $dsub = $sub->fetch_assoc();

        $med = Database::search("SELECT * FROM `medium` WHERE `id`='" . $dsub['medium_id'] . "'");
        $dmed = $med->fetch_assoc();

        $class = Database::search("SELECT * FROM `class` WHERE `id`='" . $classID . "'");
        $dclass = $class->fetch_assoc();
?>
        <div class="col-12 border-1 border-top-0 border-right-0 border-left-0 border-dark mt-2 text-start">
            <p class="fw-bold text-primary"><?php echo $dclass['name'] ?> | <?php echo $dmed['name'] ?> | <?php echo $dsub['name'] ?></p>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date Added</th>
                    <th>Subject</th>
                    <th>View</th>
                    <th>Download</th>
                </tr>
                <?php

                $all = Database::search("SELECT * FROM `lesson_notes` WHERE `subject_has_class_id`='" . $subjectsavailableID . "'");
                $nall = $all->num_rows;

                if ($nall > 0) {


                    for ($i = 0; $i < $nall; $i++) {
                        $dall = $all->fetch_assoc();

                ?>
                        <tr>

                            <td><?php echo $dall['id'] ?></td>
                            <td><?php echo $dall['title']; ?></td>
                            <td><?php echo $dall['description']; ?></td>
                            <td><?php echo $dall['dateadded']?></td>
                            <td><?php echo $dmed['name']." ".$dsub['name']?></td>
                            <td class="text-center"><a href="openlessonnotes.php?id=<?php echo $dall['id']; ?>" target="_blank"><i class="bi bi-eye-fill fs-4"></i></a></td>
                            <td class="text-center"><a target="_blank" download href="<?php echo $dall['url'] ?>"><i class="bi bi-file-earmark-arrow-down-fill fs-4"></i></a></td>

                        </tr>

                    <?php
                    }
                } else {
                    ?>
                    <p class="fw-bold">No Assignments Available.</p>
                <?php
                }
                ?>
            </table>
        </div>
<?php
    }
}

?>