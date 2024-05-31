<?php

session_start();
require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>SuccessInternational | Academic Officers | Panel</title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="adminpanel.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php

if(isset($_SESSION['aofficer'])){
    $id = $_SESSION['aofficer']['id'];
    ?>


<body onload="loadAllNotReleasedAssignments(); loadAllReleasedAssignments(); loadAllEmailSentStudents(); loadAllLoggedStudents();">

    <div class="container-fluid">

        <div class="sidenav d-none d-md-block">
            <a class="mt-5 fs-5" href="#assignments">Assignments</a>
            <a class="fs-5" href="#students">Students</a>
            <a class="fs-5" href="academicofficerprofile.php">Profile</a>
            <a class="fs-5" href="academicofficerlogout.php">Log Out</a>
        </div>


        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="#assignments">Assignments</a>
                <a href="#students">Students</a>
                <a href="academicofficerprofile.php">Profile</a>
                <a href="academicofficerlogout.php">Log Out</a>
            </div>
        </div>


        <div class="main">
            <div class="col-12 d-none d-md-block">
                <div id="navbar">
                    <a class="navbar-brand" href="#">
                        <img src="resources/logofinal120.png" width="40" height="40" class="d-inline-block align-top" alt="">
                        Success International
                    </a>
                    <a href="#s" class="mt-1">Academic Officer | Dashboard</a>
                    <button class="btn btn-outline-light pe-3 ps-3 me-md-5 mt-3 float-end" id="MyClockDisplay" onload="showTime()"></button>
                </div>
            </div>

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

                    <div class="row p-2" id="assignments">
                        <div class="col-12">
                            <div class="admintaskbarimage">
                                <div class="admintaskbartext">
                                    <h3 class="text-light">Assignments</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Release marks to students by changing the statusid -->
                            <button class="accordion">Release marks to students</button>
                            <div class="panel">
                                <div class="row">
                                    <div class="col-12 col-lg-4 mt-1">
                                        <select class="form-select" id="mrmedium" onchange="selectMRMedium(); releaseAssignmentMarkMR();">
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
                                        <select class="form-select" id="mrclass" onchange="selectMRClass(); selectMRStudent(); releaseAssignmentMarkMR();" disabled>
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
                                        <select class="form-select" id="mrsubject" onchange="selectMRAssignment(); releaseAssignmentMarkMR();" disabled>
                                            <option value="0">Select class & medium to select Subject</option>
                                            <!-- subjects gain via AJAX technology -->
                                        </select>
                                    </div>

                                    <div class="col-12 mt-1">
                                        <select class="form-select" id="mrassignment" disabled>
                                            <option value="0">Select above to select Assignment PDF</option>
                                            <!-- assignment pdfs gain via AJAX technology -->
                                        </select>
                                    </div>

                                    <div class="col-12 mt-1">
                                        <select class="form-select" id="mrstudent" onchange="releaseAssignmentMarkMR();" disabled>
                                            <option value="0">Select class to select Student</option>
                                            <!-- student names gain via AJAX technology -->
                                        </select>
                                    </div>

                                    <div class="col-12 offset-0 col-lg-4 offset-lg-8 mt-1 d-grid">
                                        <button class="btn btn-outline-dark" onclick="resetAssignmentMarkMRFeilds();">Reset Feilds</button>
                                    </div>

                                    <div class="col-12 mt-2 text-center" id="loadstudentassignmentdetailsdiv">
                                        <p class="fw-bold">Search an assignment mark to release</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Released marks -->
                            <button class="accordion">Marks Not Released Assignments</button>
                            <div class="panel">
                                <div id="loadallnotreleasedassignmentdetailsdiv" class="text-center">

                                </div>
                            </div>

                            <button class="accordion">Marks Released Assignments</button>
                            <div class="panel">
                                <div id="loadallreleasedassignmentdetailsdiv" class="text-center">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-2 mt-5" id="students">
                        <div class="col-12">
                            <div class="admintaskbarimage">
                                <div class="admintaskbartext">
                                    <h3 class="text-light">Students</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Register new students -->
                            <button class="accordion">Register new Students</button>
                            <div class="panel">
                                <div class="row mt-2">
                                    <div class="col-12 col-lg-8 mt-2">
                                        <input class="form-control" placeholder="Student Email" id="rsemail" />
                                    </div>
                                    <div class="col-12 col-lg-4 mt-2">
                                        <select class="form-select" id="rsclass">
                                            <option value="0">Select class</option>
                                            <?php

                                            $class = Database::search("SELECT * FROM `class`");
                                            $nclass = $class->num_rows;
                                            if ($nclass > 0) {
                                                for ($i = 0; $i < $nclass; $i++) {
                                                    $dclass = $class->fetch_assoc();
                                            ?>
                                                    <option value="<?php echo $dclass['id']; ?>"><?php echo $dclass['name']; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mt-2">
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="rspassword" class="visually-hidden">Password</label>
                                                <input type="text" class="form-control w-100" id="rspassword" placeholder="Automatic Password">
                                            </div>
                                            <div class="col-4 d-grid">
                                                <button type="submit" class="btn btn-primary mb-3" id="rsgenpassword" onclick="rsgenPassword();">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 mt-2">
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="rsverification" class="visually-hidden">Verification code</label>
                                                <input type="text" class="form-control w-100" id="rsverification" placeholder="Verification code">
                                            </div>
                                            <div class="col-4 d-grid">
                                                <button type="submit" class="btn btn-primary mb-3" id="rsgenverificaton" onclick="rsgenVerification();">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 mt-2">
                                        <div class="row">
                                            <div class="col-6 d-grid">
                                                <button class="btn btn-dark" id="rsverifybtn" onclick="sendRequestStudentsVerify();">Verify</button>
                                            </div>
                                            <div class="col-6 d-grid">
                                                <button class="btn btn-dark" id="rssend" onclick="sendRequestStudents();">Send Request</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2 text-center" id="rstextbox">

                                    </div>
                                </div>
                            </div>

                            <button class="accordion">Request Email sent Students</button>
                            <div class="panel">
                                <div id="loadallemailsentStudentsdiv" class="text-center">

                                </div>
                            </div>

                            <button class="accordion">Logged In Students</button>
                            <div class="panel">
                                <div id="loadallLoggedInStudentsdiv" class="text-center">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-2">
                <?php require "footer.php"; ?>
            </div>

        </div>

        <script src="script.js"></script>
        <script src="adminpanel.js"></script>
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
            <a type="button" class="btn btn-warning" href="academicofficersignin.php">Go To Sign In</a>
        </div>
    </div>
    <?php
}

?>
</html>