<?php

session_start();
require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel | SuccessInternational</title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="adminpanel.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
if(isset($_SESSION["admin"])){
    $id = $_SESSION['admin']['id'];//from session
    ?>

<body onload="loadAllTeachers(); loadAllAcademicOfficers(); loadAllStudents(); loadAllEmailSentTeachers(); loadAllLoggedTeachers(); loadAllEmailSentAOfficers(); loadAllLoggedAOfficers(); loadAllClasses(); loadAllSubjects();">

    <div class="container-fluid">

        <div class="sidenav d-none d-md-block">
            <a class="mt-5 fs-5" href="#teachers">Teachers</a>
            <a class="fs-5" href="#academicofficers">Officers</a>
            <a class="fs-5" href="#students">Students</a>
            <a class="fs-5" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Classes</a>
            <a class="fs-5" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Subjects</a>
            <a class="fs-5" href="allenrollmentpayments.php">Payments</a>
            <a class="fs-5" href="adminprofile.php">Profile</a>
            <a class="fs-5" href="adminlogout.php">Log Out</a>
        </div>


        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="#teachers">Teachers</a>
                <a href="#academicofficers">Academic Officers</a>
                <a href="#students">Students</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Classes</a>
                <a class="fs-5" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Subjects</a>
                <a href="allenrollmentpayments.php">Payments</a>
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Log Out</a>
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
                    <a href="#s" class="mt-1">Admin | Dashboard</a>
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

                    <div class="col-12">

                        <!-- teacher Managaing area -->
                        <div class="row p-2" id="teachers">

                            <div class="col-12">
                                <div class="admintaskbarimage">
                                    <div class="admintaskbartext">
                                        <h3 class="text-light">Teacher Managing</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <!-- Send requests to teachers -->
                                <button class="accordion">Send Requests To Teachers</button>
                                <div class="panel">
                                    <div class="row mt-2">
                                        <div class="col-12 mt-2">
                                            <input class="form-control" placeholder="Teacher Email" id="rtemail" />
                                        </div>
                                        <div class="col-12 col-lg-4 mt-2">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="rtpassword" class="visually-hidden">Password</label>
                                                    <input type="password" class="form-control w-100" id="rtpassword" placeholder="Automatic Password">
                                                </div>
                                                <div class="col-4 d-grid">
                                                    <button type="submit" class="btn btn-primary mb-3" id="rtgenpassword" onclick="rtgenPassword();">Generate</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-2">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="rtverification" class="visually-hidden">Verification code</label>
                                                    <input type="text" class="form-control w-100" id="rtverification" placeholder="Verification code">
                                                </div>
                                                <div class="col-4 d-grid">
                                                    <button type="submit" class="btn btn-primary mb-3" id="rtgenverificaton" onclick="rtgenVerification();">Generate</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-2">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-dark" id="rtverifybtn" onclick="sendRequestTeacherVerify();">Verify</button>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-dark" id="rtsend" onclick="sendRequestTeacher();">Send Request</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2 text-center" id="rttextbox">

                                        </div>
                                    </div>
                                </div>
                                <!-- Send requests to teachers -->

                                <!-- Request sent teachers -->
                                <button class="accordion">Request Sent Teachers</button>
                                <div class="panel">
                                    <div id="loadallemailsentTeachersdiv" class="text-center">

                                    </div>
                                </div>
                                <!-- Request sent teachers -->

                                <!-- Logged In teachers -->
                                <button class="accordion">Logged In Teachers</button>
                                <div class="panel">
                                    <div id="loadallLoggedInTeachersdiv" class="text-center">

                                    </div>
                                </div>
                                <!-- Logged In teachers -->

                                <!-- Teachers' details -->
                                <button class="accordion">Teachers' details</button>
                                <div class="panel">
                                    <div id="teachersdetails">

                                    </div>
                                </div>
                                <!-- Teachers' details -->
                            </div>
                        </div>
                        <!-- teacher Managaing area -->

                        <!-- academic officer Managaing area -->
                        <div class="row p-2 mt-5" id="academicofficers">
                            <div class="col-12">
                                <div class="admintaskbarimage">
                                    <div class="admintaskbartext">
                                        <h3 class="text-light">Academic Officers</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- Send requests to academic officers -->
                                <button class="accordion">Send Requests To Academic Officers</button>
                                <div class="panel">
                                    <div class="row mt-2">
                                        <div class="col-12 mt-2">
                                            <input class="form-control" placeholder="Academic Officer Email" id="raemail" />
                                        </div>
                                        <div class="col-12 col-lg-4 mt-2">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="rapassword" class="visually-hidden">Password</label>
                                                    <input type="password" class="form-control w-100" id="rapassword" placeholder="Automatic Password">
                                                </div>
                                                <div class="col-4 d-grid">
                                                    <button type="submit" class="btn btn-primary mb-3" id="ragenpassword" onclick="ragenPassword();">Generate</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-2">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="raverification" class="visually-hidden">Verification code</label>
                                                    <input type="text" class="form-control w-100" id="raverification" placeholder="Verification code">
                                                </div>
                                                <div class="col-4 d-grid">
                                                    <button type="submit" class="btn btn-primary mb-3" id="ragenverificaton" onclick="ragenVerification();">Generate</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-2">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-dark" id="raverifybtn" onclick="sendRequestAcademicOfficerVerify();">Verify</button>
                                                </div>
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-dark" id="rasend" onclick="sendRequestAcademicOfficer();">Send Request</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2 text-center" id="ratextbox">

                                        </div>
                                    </div>
                                </div>
                                <!-- Send requests to academic officers -->

                                <!-- Request sent academic officers -->
                                <button class="accordion">Request Sent Academic Officers</button>
                                <div class="panel">
                                    <div id="loadallemailsentAOfficersdiv" class="text-center">

                                    </div>
                                </div>
                                <!-- Request sent academic officers -->

                                <!-- Logged In academic officers -->
                                <button class="accordion">Logged In Academic Officers</button>
                                <div class="panel">
                                    <div id="loadallLoggedInAOfficersdiv" class="text-center">

                                    </div>
                                </div>
                                <!-- Logged In academic officers -->

                                <!-- academic officers' details -->
                                <button class="accordion">Academic Officers' details</button>
                                <div class="panel">
                                    <div id="academicofficerdetails">

                                    </div>
                                </div>
                                <!-- academic officers' details -->
                            </div>
                        </div>
                        <!-- academic officer Managaing area -->

                        <!-- Students Managaing area -->
                        <div class="row p-2 mt-5" id="students">
                            <div class="col-12">
                                <div class="admintaskbarimage">
                                    <div class="admintaskbartext">
                                        <h3 class="text-light">Students Managing</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- payments -->
                                <button class="accordion" onclick="goToManagePayments();">Enrollment Payments Managing</button>
                                <div class="panel">

                                </div>
                                <!-- payments -->

                                <!-- Students' details -->
                                <button class="accordion">Students' details</button>
                                <div class="panel">
                                    <div id="studentsdetails">

                                    </div>
                                </div>
                                <!-- Students' details -->
                            </div>
                        </div>
                        <!-- Students Managaing area -->

                        <!-- subjects and classes related activites Managaing area -->
                        <div class="row p-2 mt-5" id="marks">
                            <div class="col-12">
                                <div class="admintaskbarimage">
                                    <div class="admintaskbartext">
                                        <h3 class="text-light">Classes and Subjects</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="accordion" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add classes</button>

                                <button class="accordion" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Add Subjects</button>

                            </div>
                        </div>
                        <!-- subjects and classes related activites Managaing area -->
                    </div>
                </div>
            </div>

            <!-- footer -->
            <div class="col-12 mt-2">
                <?php require "footer.php"; ?>
            </div>
            <!-- footer -->
        </div>
    </div>

    <!-- Class Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Add new class</h5>
                    <button type="button" class="bg-light" style="border: none; outline: none;" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg fw-bold"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <span class="fw-bold">Available classes</span>
                            <select class="inputbottomborder w-100" id="classes">
                                
                            </select>
                        </div>

                        <div class="col-10 offset-1 mt-3">
                            <span class="fw-bold">Add new class</span>
                            <input class="inputbottomborder w-100" placeholder="Type a new class" id="newclassname"/>
                        </div>

                        <div class="col-10 offset-1 text-center text-danger mt-2">
                            <p id="errmsgclass"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-primary" onclick="addNewClass();">Add new class</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Subject Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel1">Add new subject</h5>
                    <button type="button" class="bg-light" style="border: none; outline: none;" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg fw-bold"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <span class="fw-bold">Available subjects</span>
                            <select class="inputbottomborder w-100" id="subjects">
                                
                            </select>
                        </div>

                        <div class="col-10 offset-1">
                            <span class="fw-bold">Select Class</span>
                            <select class="inputbottomborder w-100" id="class">
                                <option value="0">Select</option>
                                <?php
                                    $class = Database::search("SELECT * FROM `class`");
                                    $nclass = $class->num_rows;
                                    for($i=0;$i<$nclass;$i++){
                                        $dclass = $class->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $dclass['id']?>"><?php echo $dclass['name']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-10 offset-1">
                            <span class="fw-bold">Select Medium</span>
                            <select class="inputbottomborder w-100" id="medium">
                                <option value="0">Select</option>
                                <?php
                                    $med = Database::search("SELECT * FROM `medium`");
                                    $nmed = $med->num_rows;
                                    for($i=0;$i<$nmed;$i++){
                                        $dmed = $med->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $dmed['id']?>"><?php echo $dmed['name']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-10 offset-1 mt-3">
                            <span class="fw-bold">Add new subject</span>
                            <input class="inputbottomborder w-100" placeholder="Type a new subject" id="newsubjectname"/>
                        </div>

                        <div class="col-10 offset-1 text-center text-danger mt-2">
                            <p id="errmsgsubject"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-primary" onclick="addNewSubject();">Add new subject</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="adminpanel.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
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
            <a type="button" class="btn btn-warning" href="adminsignin.php">Go To Sign In</a>
        </div>
    </div>
    <?php
}

?>
</html>