<?php

$id = 1;

require "connection.php";

$r = Database::search("SELECT `subject_has_class_id` FROM `lesson_notes` WHERE `teacher_id`='" . $id . "' GROUP BY `subject_has_class_id`");
$nr = $r->num_rows;

if ($nr > 0) {
    for ($j = 0; $j < $nr; $j++) {
        $dr = $r->fetch_assoc();

        $subjectHasClass = Database::search("SELECT * FROM `subject_has_class` WHERE `id`='" . $dr['subject_has_class_id'] . "'");
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
                        <div class="row">
                            <div class="col-1">
                                <h5>ID</h5>
                            </div>
                            <div class="col-3 col-lg-3">
                                <h5>Title</h5>
                            </div>
                            <div class="col-5 col-lg-4">
                                <h5>Description</h5>
                            </div>
                            <div class="col-3 col-lg-2 text-start">
                                <h5>Uploaded date</h5>
                            </div>
                            <div class="col-4 col-lg-2">

                            </div>
                        </div>
                        <?php

                        $resultset = Database::search("SELECT * FROM `lesson_notes` WHERE `subject_has_class_id`='" . $dr['subject_has_class_id'] . "'");
                        $nresultset = $resultset->num_rows;
                        if ($nresultset > 0) {

                            for ($i = 0; $i < $nresultset; $i++) {
                                $dresultset = $resultset->fetch_assoc();

                        ?>

                                <div class="row mt-2">
                                    <div class="col-1">
                                        <span class="fs-6"><?php echo $dresultset['id']; ?></span>
                                    </div>
                                    <div class="col-3 col-lg-3">
                                        <span class="fs-6"><?php echo $dresultset['title']; ?></span>
                                    </div>
                                    <div class="col-5 col-lg-4">
                                        <span class="fs-6"><?php echo $dresultset['description']; ?></span>
                                    </div>
                                    <div class="col-3 col-lg-2">
                                        <span class="fs-6"><?php echo $dresultset['dateadded']; ?></span>
                                    </div>
                                    <div class="col-4 col-lg-2">
                                        <a class="btn btn-success fs-6" style="height: 35px;" download href="<?php echo $dresultset['url']; ?>">Download</a>
                                    </div>
                                </div>

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
            <span class="fs-6">You have not added any assignments yet.</span>
        </div>
    </div>
<?php
}

?>