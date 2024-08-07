<?php

require "connection.php";
$id = 1;

?>

<!DOCTYPE html>
<html>

<head>
    <title>SuccessInternational | Teachers | Profile</title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="adminpanel.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12 d-none d-md-block">
                <div id="navbar" style="width: 100%;">
                    <a class="navbar-brand" href="#">
                        <img src="resources/logofinal120.png" width="40" height="40" class="d-inline-block align-top" alt="">
                        Success International
                    </a>
                    <a href="#s" class="mt-1">Teacher | Profile Settings</a>
                    <button class="btn btn-outline-light pe-3 ps-3 me-md-5 mt-3 float-end" id="MyClockDisplay" onload="showTime()"></button>
                </div>
            </div>

            <div class="col-12 d-block d-md-none">
                <div id="navbars">
                    <div class="row">
                        <div class="col-5">
                            <a class="navbar-brand" href="#">
                                <img src="resources/logofinal120.png" width="38" height="38" class="d-inline-block align-top" alt="">
                                <span class="fs-6">Success International</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-light pe-4 ps-3 m-2 mt-3 float-end fs-6" id="MyClockDisplays" onload="showTime()"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5" style="height: 50px;">

            </div>

            <div class="col-12 mt-1">
                <div class="row bg-light p-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Main Home</a></li>
                            <li class="breadcrumb-item"><a href="teacherpanel.php">Teacher Panel</a></li>
                            <li class="breadcrumb-item active bg-light text-secondary" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="row">
                    <!-- Profile photo -->
                    <div class="col-12 col-lg-4 mt-3 mt-lg-5">
                        <div class="row mt-0 mt-lg-4">

                            <?php

                            $teacher = Database::search("SELECT * FROM `teacher` WHERE `id`='" . $id . "'");
                            $teacherrs = $teacher->fetch_assoc();

                            $teacherImageID = $teacherrs["teacher_image_id"];
                            if ($teacherImageID == null) {
                            ?>
                                <div class="col-12 text-center">
                                    <img src="resources/profileimage.png" class="rounded" height="150px">
                                </div>

                                <div class="col-10 offset-1 text-start">
                                    <span class="form-text">Upload a Profile Picture</span>
                                </div>

                            <?php
                            } else {
                                $image = Database::search("SELECT * FROM `teacher_image` WHERE `id`='" . $teacherImageID . "'");
                                $imagers = $image->fetch_assoc();
                            ?>
                                <div class="col-12 text-center">
                                    <img src="<?php echo $imagers['url']; ?>" class="rounded" height="150px">
                                </div>

                                <div class="col-10 offset-1 text-start">
                                    <span class="form-text">Update the Profile Picture</span>
                                </div>
                            <?php
                            }

                            ?>

                            <div class="col-10 offset-1 mt-1">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputimage" aria-describedby="inputimagebtn" aria-label="Upload">
                                    <button class="btn btn-outline-primary" type="button" id="inputimagebtn" onclick="uploadTeacherImage();">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Information -->
                    <div class="col-12 col-lg-4 mt-3 p-5 p-lg-1">
                        <div class="row">
                            <div class="col-6">
                                <span class="form-text">Teacher ID</span>
                                <input class="inputbottomborder" type="text" disabled value="<?php echo $id; ?>" />
                            </div>
                        </div>

                        <?php

                        $teacher_has_subject = Database::search("SELECT * FROM `teacher_has_subject` WHERE `teacher_id`='" . $id . "'");
                        $nteacher_has_subject = $teacher_has_subject->num_rows;

                        ?>

                        <div class="row">
                            <div class="col-6">
                                <span class="form-text">First Name</span>
                                <input class="inputbottomborder w-100" type="text" value="<?php echo $teacherrs["fname"]; ?>" id="fname" />
                            </div>

                            <div class="col-6">
                                <span class="form-text">Last Name</span>
                                <input class="inputbottomborder w-100" type="text" value="<?php echo $teacherrs["lname"]; ?>" id="lname" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <span class="form-text">Email Address</span><br />
                                <input class="inputbottomborder w-100" type="email" value="<?php echo $teacherrs["email"]; ?>" id="email" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <span class="form-text">Mobile</span>
                                <input class="inputbottomborder w-100" type="text" value="<?php echo $teacherrs["mobile"]; ?>" id="mobile" />
                            </div>

                            <div class="col-6">
                                <span class="form-text">Password</span>
                                <input class="inputbottomborder w-100" type="password" disabled value="<?php echo $teacherrs["password"]; ?>" id="password" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <span class="form-text">Subjects Teach</span>
                                <span class="d-inline-block addIcon" data-bs-toggle="modal" data-bs-target="#subjectModel">
                                    <i class="bi bi-plus-square-dotted"></i>
                                </span>

                                <?php
                                if ($nteacher_has_subject >= 1) {

                                    for ($i = 0; $i < $nteacher_has_subject; $i++) {
                                        $teacher_has_subjectrs = $teacher_has_subject->fetch_assoc();

                                        $subject = Database::search("SELECT * FROM `subject` WHERE `id`='" . $teacher_has_subjectrs["subject_id"] . "'");
                                        $subjectrs = $subject->fetch_assoc();
                                        $medium = Database::search("SELECT * FROM `medium` WHERE `id`='" . $subjectrs["medium_id"] . "'");
                                        $mediumrs = $medium->fetch_assoc();
                                ?>
                                        <input class="inputbottomborder w-100" type="text" placeholder="" value="<?php echo $subjectrs['name'] . ' - ' . $mediumrs['name']; ?>" disabled id="subjects<?php echo $i?>" />
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <span class="form-text">Add a Subject</span>
                                <?php
                                }
                                ?>
                                <!-- subjects iterate -->
                            </div>
                        </div>

                        <div class="row mt-3 mt-lg-4">
                            <div class="col-12 d-grid">
                                <button class="btn btn-outline-primary" onclick="updateTeacherProfile();">Update Info</button>
                            </div>
                        </div>
                    </div>

                    <!-- Teacher Status -->
                    <div class="col-12 col-lg-4 mt-3 mt-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <span class="form-text">Teacher Status</span>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-8 text-end">
                                        <span class="form-text">No of Lesson notes uploaded</span>
                                    </div>
                                    <?php
                                    $lessonNotes = Database::search("SELECT * FROM `lesson_notes` WHERE `teacher_id`='" . $id . "'");
                                    $nlessonNotes = $lessonNotes->num_rows;
                                    if ($nlessonNotes == 0) {
                                    ?>
                                    <div class="col-3">
                                        <input class="inputbottomborder w-100 text-center" type="text" value="0" disabled />
                                    </div>
                                    <?php
                                    }else if($nlessonNotes>0){
                                        $numberLessonNotes = Database::search("SELECT COUNT(`id`) AS `count` FROM `lesson_notes` GROUP BY `teacher_id`");
                                        $numberLessonNotesF = $numberLessonNotes->fetch_assoc();
                                        ?>
                                        <div class="col-3">
                                        <input class="inputbottomborder w-100 text-center" type="text" value="<?php echo $numberLessonNotesF['count'];?>" disabled />
                                    </div>
                                        <?php
                                    }
                                    ?>

                                </div>

                                <div class="row">
                                    <div class="col-8 text-end">
                                        <span class="form-text">No of Assignment PDFs uploaded</span>
                                    </div>
                                    <?php
                                    $assignments = Database::search("SELECT * FROM `assignmentpdfs` WHERE `teacher_id`='" . $id . "'");
                                    $nassignments = $assignments->num_rows;
                                    if ($nassignments == 0) {
                                    ?>
                                    <div class="col-3">
                                        <input class="inputbottomborder w-100 text-center" type="text" value="0" disabled />
                                    </div>
                                    <?php
                                    }else if($nassignments>0){
                                        $numberassignments = Database::search("SELECT COUNT(`id`) AS `count` FROM `assignmentpdfs` GROUP BY `teacher_id`");
                                        $numberassignmentsF = $numberassignments->fetch_assoc();
                                        ?>
                                        <div class="col-3">
                                        <input class="inputbottomborder w-100 text-center" type="text" value="<?php echo $numberassignmentsF['count'];?>" disabled />
                                    </div>
                                        <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require "footer.php"; ?>

    <!-- subjectModel -->
    <div class="modal fade" id="subjectModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-light">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Subjects</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <span class="fs-6"><i class="bi bi-exclamation-triangle text-warning"></i> Please note that this admin feature can be blocked anytime if violent action is detected!</span>
                    </div>
                    <div class="row mt-1">
                        <div class="col-8 offset-2">
                            <select class="inputbottomborder w-100">
                                <option>Select Subject</option>
                                <option>Science</option>
                                <option>Sinhala</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" style="height: 35px;" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary" style="height: 35px;">Understood and Add new Subject</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="adminpanel.js"></script>
    <script src="bootstrap.js"></script>

</body>

</html>