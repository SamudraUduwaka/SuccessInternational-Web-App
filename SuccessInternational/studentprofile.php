<?php

$id = 1;
require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <title>SuccessInternational | Student | Profile Settings </title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="bootstrap.css.map" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container-fluid">

        <!-- navbar start -->

        <div class="row">
            <nav class="navbar navbar-expand navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="#">
                    <img src="resources/logofinal120.png" width="40" height="40" class="d-inline-block align-top" alt="">
                    <span class="mt-5">SuccessInternational</span>
                </a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active d-none d-lg-block">
                            <a class="nav-link" style="text-decoration: underline;">Student | Profile Settings <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Samudra Samadhi</a>
                        </li>
                    </ul>

                </div>
            </nav>
            </nav>
            <div style="height: 80px;"></div>
        </div>

        <div class="col-12 bg-light">
            <div class="row p-4 ms-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Student Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-12 d-block">
            <div class="row p-2">
                <div class="col-12 mt-2">
                    <div class="row">
                        <!-- Profile photo -->
                        <div class="col-12 col-lg-4 mt-3 mt-lg-5">
                            <div class="row mt-0 mt-lg-4">

                                <?php

                                $student = Database::search("SELECT * FROM `student` WHERE `id`='" . $id . "'");
                                $studentrs = $student->fetch_assoc();

                                $studentImageID = $studentrs["student_image_id"];
                                if ($studentImageID == null) {
                                ?>
                                    <div class="col-12 text-center">
                                        <img src="resources/profileimage.png" class="rounded" height="150px">
                                    </div>

                                    <div class="col-10 offset-1 text-start">
                                        <span class="form-text">Upload a Profile Picture</span>
                                    </div>

                                <?php
                                } else {
                                    $image = Database::search("SELECT * FROM `student_image` WHERE `id`='" . $studentImageID . "'");
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
                                        <button class="btn btn-outline-primary" type="button" id="inputimagebtn" onclick="uploadStudentImage();">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Information -->
                        <div class="col-12 col-lg-4 mt-3 p-5 p-lg-1">
                            <div class="row">
                                <div class="col-6">
                                    <span class="form-text">Student ID</span>
                                    <input class="inputbottomborder" type="text" disabled value="<?php echo $id; ?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <span class="form-text">First Name</span>
                                    <input class="inputbottomborder w-100" type="text" value="<?php echo $studentrs["fname"]; ?>" id="fname" />
                                </div>

                                <div class="col-6">
                                    <span class="form-text">Last Name</span>
                                    <input class="inputbottomborder w-100" type="text" value="<?php echo $studentrs["lname"]; ?>" id="lname" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <span class="form-text">Email Address</span><br />
                                    <input class="inputbottomborder w-100" type="email" value="<?php echo $studentrs["email"]; ?>" id="email" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <span class="form-text">Mobile</span>
                                    <input class="inputbottomborder w-100" type="text" value="<?php echo $studentrs["mobile"]; ?>" id="mobile" />
                                </div>

                                <div class="col-6">
                                    <span class="form-text">Password</span>
                                    <input class="inputbottomborder w-100" type="password" disabled value="<?php echo $studentrs["password"]; ?>" id="password" />
                                </div>
                            </div>

                            <div class="row">
                                <?php
                                $class = Database::search("SELECT * FROM `class` WHERE `id`='" . $studentrs['class_id'] . "'");
                                $dclass = $class->fetch_assoc();
                                ?>
                                <div class="col-12">
                                    <span class="form-text">Class study</span>
                                    <input class="inputbottomborder w-100" disabled type="text" value="<?php echo $dclass["name"]; ?>" id="class" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <span class="form-text">Date Joined</span>
                                    <input class="inputbottomborder w-100" disabled type="text" value="<?php echo $studentrs["dateadded"]; ?>" id="date" />
                                </div>

                                <div class="col-6">
                                    <span class="form-text">Gender</span>
                                    <select class="inputbottomborder w-100" id="gender">
                                        <?php
                                        if ($studentrs['gender_id'] == null) {
                                        ?>
                                            <option value="0" selected>Select</option>
                                            <?php
                                            $gen = Database::search("SELECT * FROM `gender`");
                                            $ngen = $gen->num_rows;
                                            for ($i = 0; $i < $ngen; $i++) {
                                                $dgen = $gen->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $dgen['id'] ?>"><?php echo $dgen['name'] ?></option>
                                            <?php
                                            }
                                        } else {
                                            $gen = Database::search("SELECT * FROM `gender` WHERE `id`='" . $studentrs['gender_id'] . "'");
                                            $dgen = $gen->fetch_assoc();
                                            ?>
                                            <option value="<?php echo $dgen['id'] ?>" selected><?php echo $dgen['name'] ?></option>
                                            <?php
                                            $gen = Database::search("SELECT * FROM `gender` WHERE `id`!='" . $studentrs['gender_id'] . "'");
                                            $ngen = $gen->num_rows;
                                            for ($i = 0; $i < $ngen; $i++) {
                                                $dgen = $gen->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $dgen['id'] ?>"><?php echo $dgen['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3 mt-lg-4">
                                <div class="col-12 d-grid">
                                    <button class="btn btn-outline-primary" onclick="updateStudentProfile();">Update Info</button>
                                </div>
                            </div>
                        </div>

                        <!-- Teacher Status -->
                        <div class="col-12 col-lg-4 mt-3 mt-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <span class="form-text">Your Progress on SuccessInternational</span>
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
                                        } else if ($nlessonNotes > 0) {
                                            $numberLessonNotes = Database::search("SELECT COUNT(`id`) AS `count` FROM `lesson_notes` GROUP BY `teacher_id`");
                                            $numberLessonNotesF = $numberLessonNotes->fetch_assoc();
                                        ?>
                                            <div class="col-3">
                                                <input class="inputbottomborder w-100 text-center" type="text" value="<?php echo $numberLessonNotesF['count']; ?>" disabled />
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
                                        } else if ($nassignments > 0) {
                                            $numberassignments = Database::search("SELECT COUNT(`id`) AS `count` FROM `assignmentpdfs` GROUP BY `teacher_id`");
                                            $numberassignmentsF = $numberassignments->fetch_assoc();
                                        ?>
                                            <div class="col-3">
                                                <input class="inputbottomborder w-100 text-center" type="text" value="<?php echo $numberassignmentsF['count']; ?>" disabled />
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
    </div>

    <script src="script.js"></script>
</body>

</html>