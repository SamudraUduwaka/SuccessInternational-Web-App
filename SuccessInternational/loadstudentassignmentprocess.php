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
                                <th>Description</th>
                                <th>Deadline</th>
                                <th>Plagiarism</th>
                                <th>View</th>
                                <th>Download</th>
                                <th>Upload</th>
                            </tr>
                            <?php
                    for ($i = 0; $i < $nall; $i++) {
                        $dall = $all->fetch_assoc();

                ?>
                        <tr>

                            <td><?php echo $dall['id'] ?></td>
                            <td><?php echo $dall['name']; ?></td>
                            <td><?php echo $dall['description']; ?></td>
                            <td><?php echo $dall['deadline'] ?></td>
                            <?php
                            $plag = Database::search("SELECT * FROM `plagiarism_status` WHERE `id`='" . $dall['plagiarism_status_id'] . "'");
                            $dplag = $plag->fetch_assoc();
                            ?>
                            <td><?php echo $dplag['name'] ?></td>
                            <td class="text-center"><a href="opendocuments.php?id=<?php echo $dall['id']; ?>" target="_blank"><i class="bi bi-eye-fill fs-4"></i></a></td>
                            <td class="text-center"><a target="_blank" download href="<?php echo $dall['url'] ?>"><i class="bi bi-file-earmark-arrow-down-fill fs-4"></i></a></td>
                            <?php
                            $d = new DateTime();
                            $tz = new DateTimeZone("Asia/Colombo");
                            $d->setTimezone($tz);
                            $date = $d->format("Y-m-d");
                            if ($date > $dall['deadline']) {
                            ?>
                                <td><button class="btn btn-danger" disabled id="sbutn<?php echo $dall['id'] ?>"><i class="bi bi-send-check-fill"></i> Expired</button></td>
                                <?php
                            } else {
                                $uploadass = Database::search("SELECT * FROM `submittedassignments` WHERE `student_id`='" . $id . "' AND `assignmentpdfs_id`='" . $dall['id'] . "'");
                                $nuploadass = $uploadass->num_rows;

                                if ($nuploadass == 0) {
                                ?>
                                    <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $dall['id']?>" id="sbutn<?php echo $dall['id'] ?>"><i class="bi bi-send-check-fill"></i> Upload</button></td>
                                <?php
                                } else {
                                ?>
                                    <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $dall['id']?>" id="sbutn<?php echo $dall['id'] ?>"><i class="bi bi-send-check-fill"></i> Reupload</button></td>
                                <?php
                                }
                                ?>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop<?php echo $dall['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light">
                                                <h5 class="modal-title" id="staticBackdropLabel">Upload Assignment</h5>
                                                <button type="button" class="bg-light" style="border: none; outline: none;" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg fw-bold"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <span>
                                                    Assignment Rules!<br /><br />

                                                    1. Your work is to be done *on time* unless you use one of your late passes (and use it correctly). Forgetting to turn things in on time is not an workable excuse.<br />

                                                    2. Submit the correct version of the work (be sure you save, do not pick the wrong file, etc.) You can double check after you save files to be sure they are the correct one, correct version, etc.<br />

                                                    3. Use the correct assignment; no points for turning in your work in the wrong place!<br />

                                                    4. Turn in work using the correct file formats and following the instructions (see the assignment). You can try to open your work on a university computer to be sure.<br />

                                                    These rules help you get full points for your work and they help me get good feedback to you on time!<br />
                                                </span>
                                                <div class="input-group mt-5 mb-3">
                                                    <input type="file" class="form-control" id="fileupload<?php echo $dall['id']?>" aria-describedby="fileuploadbtn<?php echo $dall['id']?>" aria-label="Upload">
                                                    <button class="btn btn-outline-secondary" type="button" id="fileuploadbtn<?php echo $dall['id']?>" onclick="uploadAssignmentByStudent(<?php echo $dall['id']; ?>);">Upload</button><br />
                                                </div>
                                                <div class="mt-2 mb-3">
                                                    <span class="text-danger">The accepted file type is pdf</span>
                                                </div>

                                            </div>
                                            <div class="modal-footer bg-light">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                
                } else {
                    ?>
                    <p class="fw-bold">No Assignments Available.</p>
                <?php
                }

    }
}

?>