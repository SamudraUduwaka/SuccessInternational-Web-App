<?php

session_start();
require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>SuccessInternational | Teachers | Panel</title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="adminpanel.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php

if(isset($_SESSION['teacher'])){
    $id = $_SESSION['teacher']['id'];
    ?>


<body onload="loadUploadedAssignments(); loadUploadedLessonNotes(); loadAllAssignmentMarks();">

    <div class="container-fluid">

        <div class="sidenav d-none d-md-block">
            <a class="fs-5" href="#assignments">Assignments</a>
            <a class="fs-5" href="#lessonnotes">Lesson Notes</a>
            <a class="fs-5" href="teacherprofile.php">Update Profile</a>
            <a class="fs-5" href="teacherlogout.php">Log Out</a>
        </div>

        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="#assignments">Assignments</a>
                <a href="#lessonnotes">Lesson Notes</a>
                <a href="teacherprofile.php">Update Profile</a>
                <a href="teacherlogout.php">Log Out</a>
            </div>
        </div>


        <div class="main">

            <!-- navbar for device screens above medium -->
            <div class="col-12 d-none d-md-block">
                <div id="navbar">
                    <a class="navbar-brand" href="#">
                        <img src="resources/logofinal120.png" width="40" height="40" class="d-inline-block align-top" alt="">
                        Success International
                    </a>
                    <a href="#s" class="mt-1">Teacher | Dashboard</a>
                    <button class="btn btn-outline-light pe-3 ps-3 me-md-5 mt-3 float-end" id="MyClockDisplay" onload="showTime()"></button>
                </div>
            </div>
            <!-- navbar for device screens above medium -->

            <!-- navbar for device screens below medium -->
            <div class="col-12 d-block d-md-none">
                <div id="navbars">
                    <div class="row">
                        <div class="col-1">
                            <button class="btn btn-outline-light m-1 mt-3 float-start" onclick="openNav();"><i class="bi bi-distribute-vertical"> </i></button>
                        </div>
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
            <!-- navbar for device screens below medium -->

            <div class="col-12 mt-5">
                <div class="row">

                    <!-- caraousel -->
                    <div class="col-12 col-md-6 offset-0 offset-md-1 mt-5 pt-md-5">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="resources/children2.jpeg" class="d-block w-100 admincarousel" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/girl2.jpeg" class="d-block w-100 admincarousel" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/littlegirl2.jpeg" class="d-block w-100 admincarousel" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <!-- caraousel -->

                    <!-- calender -->
                    <div class="col-12 col-md-5">
                        <section class="ftco-section">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-8 col-xl-6">
                                    <div class="today">
                                        <div class="today-piece  top  day"></div>
                                        <div class="today-piece  middle  month"></div>
                                        <div class="today-piece  middle  date"></div>
                                        <div class="today-piece  bottom  year"></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- calender -->


                    <!-- Assignments area -->
                    <div class="row p-2" id="assignments">
                        <div class="col-12">
                            <div class="admintaskbarimage">
                                <div class="admintaskbartext">
                                    <h3 class="text-light">Assignments</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="accordion">Upload New Assignment</button>
                            <!-- Upload new Assignment -->
                            <div class="panel">
                                <div class="row mt-3">

                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="medium" onchange="selectMedium();">
                                            <option value="0">Select Medium</option>

                                            <?php
                                            $medium = Database::search("SELECT * FROM `medium`;");
                                            $nmedium = $medium->num_rows;

                                            for ($i = 0; $i < $nmedium; $i++) {
                                                $media = $medium->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $media['id']; ?>"><?php echo $media['name']; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="class" onchange="selectClass();" disabled>
                                            <option value="0">Select Class</option>

                                            <?php
                                            $classes = Database::search("SELECT * FROM `class`");
                                            $nclasses = $classes->num_rows;

                                            for ($i = 0; $i < $nclasses; $i++) {
                                                $class = $classes->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="subject" disabled>
                                            <option value="0">Select class & medium to select Subject</option>

                                            <!-- subjects gain via AJAX technology -->
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1 mt-lg-4">
                                        <select class="form-select" id="plagiarism">
                                            <option value="0">Select Plagiarism status</option>
                                            <?php
                                            $plagiarism = Database::search("SELECT * FROM `plagiarism_status`");
                                            $nplagiarism = $plagiarism->num_rows;

                                            for ($i = 0; $i < $nplagiarism; $i++) {
                                                $status = $plagiarism->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $status['id']; ?>"><?php echo $status['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="col-12 col-lg-4 mt-1">
                                        <span class="form-text">Assignment Title</span>
                                        <input class="form-control" type="text" id="title" />
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1">
                                        <span class="form-text">Select submission deadline</span>
                                        <input class="form-control" type="date" id="deadline" />
                                    </div>

                                    <div class="col-12 col-lg-6 mt-1 mb-0 mb-lg-1">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="description" style="height: 100px"></textarea>
                                            <label for="description">Description of Assignment</label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 mt-1 mt-lg-2 mb-0 mb-lg-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="assignmentfile" accept=".pdf">
                                                    <label class="input-group-text" for="assignmentfile">Upload the Assignment</label>
                                                </div>
                                            </div>
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-outline-primary" onclick="realeaseAssignment();">Release Assignment</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Upload new Assignment -->

                            <!-- Uploaded Assignments -->
                            <button class="accordion">Uploaded Assignments</button>
                            <div class="panel">

                                <div id="uploadedAssignments">

                                </div>
                            </div>
                            <!-- Uploaded Assignments -->

                            <!-- Assignment marks Releasing -->
                            <button class="accordion">Assignment marks Releasing</button>
                            <div class="panel">
                                <div class="row mt-3">

                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="armedium" onchange="selectARMedium();">
                                            <option value="0">Select Medium</option>

                                            <?php
                                            $medium = Database::search("SELECT * FROM `medium`;");
                                            $nmedium = $medium->num_rows;

                                            for ($i = 0; $i < $nmedium; $i++) {
                                                $media = $medium->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $media['id']; ?>"><?php echo $media['name']; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="arclass" onchange="selectARClass(); selectARStudent();" disabled>
                                            <option value="0">Select Class</option>

                                            <?php
                                            $classes = Database::search("SELECT * FROM `class`");
                                            $nclasses = $classes->num_rows;

                                            for ($i = 0; $i < $nclasses; $i++) {
                                                $class = $classes->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="arsubject" onchange="selectARAssignment();" disabled>
                                            <option value="0">Select class & medium to select Subject</option>
                                            <!-- subjects gain via AJAX technology -->
                                        </select>
                                    </div>

                                    <div class="col-12 mt-1">
                                        <select class="form-select" id="arassignment" disabled>
                                            <option value="0">Select above to select Assignment PDF</option>
                                            <!-- assignment pdfs gain via AJAX technology -->
                                        </select>
                                    </div>

                                    <div class="col-12 mt-1">
                                        <select class="form-select" id="arstudent" disabled>
                                            <option value="0">Select class to select Student</option>
                                            <!-- student names gain via AJAX technology -->
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1">
                                        <input class="form-control" placeholder="Mark" id="armark" />
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="argrade">
                                            <option value="0">Select Grade</option>

                                            <?php
                                            $grades = Database::search("SELECT * FROM `grade`;");
                                            $ngrade = $grades->num_rows;

                                            for ($i = 0; $i < $ngrade; $i++) {
                                                $grade = $grades->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $grade['id']; ?>"><?php echo $grade['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="arexamstatus">
                                            <option value="0">Select Exam status</option>

                                            <?php
                                            $examStatuss = Database::search("SELECT * FROM `exam_status`;");
                                            $nexamStatus = $examStatuss->num_rows;

                                            for ($i = 0; $i < $nexamStatus; $i++) {
                                                $examStatus = $examStatuss->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $examStatus['id']; ?>"><?php echo $examStatus['status']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 mt-1 mt-lg-2">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="arcomment" style="height: 120px"></textarea>
                                            <label for="arcomment">Comments to student</label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 mt-1 mt-lg-2 mb-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" id="arassignmentpdf" accept=".pdf">
                                                    <label class="input-group-text" for="arassignmentpdf">Upload the marked Assignment</label>
                                                </div>
                                            </div>
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-outline-primary" onclick="releaseAssignmentMark();">Release Assignment mark</button>
                                            </div>
                                            <div class="col-12 d-grid mt-1">
                                                <button class="btn btn-outline-dark" onclick="resetAssignmentMarkFeilds();">Reset Feilds</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Assignment marks Releasing -->

                            <!-- Released Assignment Marks and PDFs -->
                            <button class="accordion">Released Assignment Marks and PDFs</button>
                            <div class="panel">
                                <div id="allreleasedassignmentmarksdiv"></div>
                            </div>
                            <!-- Released Assignment Marks and PDFs -->
                        </div>
                    </div>
                    <!-- Assignments area -->
                </div>
            </div>

            <!-- Manage Lesson Notes -->
            <div class="row p-2 mt-5" id="lessonnotes">
                <div class="col-12">
                    <div class="admintaskbarimage">
                        <div class="admintaskbartext">
                            <h3 class="text-light">Lesson Notes</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Add Lesson Notes -->
                    <button class="accordion">Add Lesson Notes</button>
                    <div class="panel">
                        <div class="row mt-3">

                            <div class="col-12 col-lg-4 mt-1">
                                <select class="form-select" id="lnmedium" onchange="selectLNMedium();">
                                    <option value="0">Select Medium</option>

                                    <?php
                                    $medium = Database::search("SELECT * FROM `medium`;");
                                    $nmedium = $medium->num_rows;

                                    for ($i = 0; $i < $nmedium; $i++) {
                                        $media = $medium->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $media['id']; ?>"><?php echo $media['name']; ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col-12 col-lg-4 mt-1">
                                <select class="form-select" id="lnclass" onchange="selectLNClass();" disabled>
                                    <option value="0">Select Class</option>

                                    <?php
                                    $classes = Database::search("SELECT * FROM `class`");
                                    $nclasses = $classes->num_rows;

                                    for ($i = 0; $i < $nclasses; $i++) {
                                        $class = $classes->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-lg-4 mt-1">
                                <select class="form-select" id="lnsubject" disabled>
                                    <option value="0">Select class & medium to select Subject</option>

                                    <!-- subjects gain via AJAX technology -->
                                </select>
                            </div>

                            <div class="col-12 col-lg-6 mt-1">
                                <span class="form-text">Lesson note Title</span>
                                <input class="form-control" type="text" id="lntitle" />
                            </div>

                            <div class="col-12 col-lg-6 mt-1 mt-lg-4">
                                <div class="input-group mb-0 mb-lg-3">
                                    <input type="file" class="form-control" id="lessonotefile" accept=".pdf">
                                    <label class="input-group-text" for="lessonotefile">Upload Lesson Note</label>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mt-1 mb-0 mb-lg-1">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="lndescription" style="height: 110px"></textarea>
                                    <label for="lndescription">Description of Lesson Note</label>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mt-1 mt-lg-2 mb-3 mb-lg-1">
                                <div class="row">

                                    <div class="col-12 d-grid">
                                        <button class="btn btn-outline-primary" onclick="realeaseLessonNote();">Release Lesson Note</button>
                                    </div>
                                    <div class="col-12 d-grid mt-1">
                                        <button class="btn btn-outline-dark" onclick="resetLessonNoteFeilds();">Reset Feilds</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View Lesson Notes -->
                    <button class="accordion">View Lesson Notes</button>
                    <div class="panel">
                        <div id="uploadedLessonNotes">

                        </div>
                    </div>


                </div>
            </div>
            <!-- Manage Lesson Notes -->

            <!-- example panel to use -->
            <!-- <div class="row p-2 mt-5" id="exams">
                <div class="col-12">
                    <div class="admintaskbarimage">
                        <div class="admintaskbartext">
                            <h3 class="text-light">Exams</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="accordion">Upload Exams</button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>

                    <button class="accordion">Request Send Academic Officers</button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>

                    <button class="accordion">Academic Officers' details</button>
                    <div class="panel">
                        <p>Lorem ipsum...</p>
                    </div>
                </div>
            </div> -->

            <div class="col-12 mt-2">
                <?php require "footer.php"; ?>
            </div>

        </div>

        <script src="script.js"></script>
        <script src="adminpanel.js"></script>
        <script src="popper.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>


</body>
<?php
}else{
    ?>
    <div class="row mt-5 mb-5 text-center">
        <span class="fs-5 fw-bold">Login Needed ! ..</span>
    </div>
    <div class="row mt-5 text-center">
        <div class="col-12 col-lg-4 offset-0 offset-lg-4">
            <a type="button" class="btn btn-warning" href="teachersignin.php">Go To Sign In</a>
        </div>
    </div>
    <?php
}

?>
</html>