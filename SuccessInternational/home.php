<?php

session_start();
require "connection.php";
?>
<!DOCTYPE html>

<html>

<head>
    <title>Home | SuccessInternational</title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="bootstrap.css.map" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<?php

if (isset($_SESSION["student"])) {
    $id = $_SESSION["student"]['id'];
    $stu = Database::search("SELECT * FROM `student` WHERE `id`='".$id."'");
    $student = $stu->fetch_assoc();
?>

    <body>
        <div class="container-fluid">

            <!-- navbar start -->

            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                    <a class="navbar-brand" href="#">
                        <img src="resources/logofinal120.png" width="40" height="40" class="d-inline-block align-top" alt="">
                        SuccessInternational
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" style="text-decoration: underline;">Home <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Hello <?php echo $student['fname']." ".$student['lname']?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#news">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#footer">About us</a>
                            </li>
                        </ul>

                    </div>
                </nav>
                </nav>
                <div style="height: 80px;"></div>
            </div>

            <div class="row">

                <!-- to be only visible when logged in -->
                <div class="col-12 col-md-4">
                    <div class="row bg-light">
                        <div class="col-10 col-lg-8 offset-1 offset-lg-2 p-2 mt-4 mt-lg-5 mb-4 mb-lg-5">

                            <a href="studentprofile.php" class="fs-6 text-dark mt-4" style="text-decoration: none;"><i class="bi bi-person-circle"></i> My Profile</a><br />
                            <a href="uploadansweredassignments.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-card-list"></i> Upload Assignments</a><br />
                            <a href="viewmarkedassignments.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-card-checklist"></i> Assignment Marks</a><br />
                            <a href="viewassignments.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-card-heading"></i> Assignments</a><br />
                            <a href="viewassignments.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-download"></i> Download Assignments</a><br />
                            <a href="viewlessonnotes.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-folder2-open"></i> Lesson Notes</a><br />
                            <a href="viewlessonnotes.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-folder-check"></i> Download Lesson Notes</a><br />
                            <a href="studentlogout.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-box-arrow-in-right"></i> Log Out</a>

                        </div>

                        <div class="col-10 col-lg-8 offset-1 offset-lg-2 p-2 mt-2 mb-5 d-none d-lg-block">
                            <span class="fs-5 fw-bold">SuccessInternational</span><br />
                            <span>The school of enthusiasts</span>
                        </div>
                    </div>
                </div>
                <!-- caraousel -->
                <div class="col-12 col-md-8 mt-1 mb-1">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/children2.jpeg" height="500px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/girl2.jpeg" height="500px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/littlegirl2.jpeg" height="500px" class="d-block w-100 admincarousel" alt="...">
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

                <!-- <div class="col-3 col-md-4 col-lg-3 d-none d-md-block">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-12 col-md-10 col-xl-10 offset-0 offset-md-1 offset-xl-1 text-center mb-5">
                                <div class="row border-2 rounded-3 border-dark logincover">
                                    <div class="col-12 w-100 mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="mb-4 mt-2">Log In</h3>
                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToAdminPanel();">Log In as Admin</button>
                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToTeacherSignin();">Log In as a Teacher</button>
                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToAcademicOfficerSignin();">Log In as an Officer</button>
                                                <button class="btn-primary mb-4 w-100 btn-7" onclick="goToStudentsSignin();">Log In as a Student</button>
                                                <img src="resources/logofinal120.png" width="80px" />
                                                <br />
                                                <span>SuccessInternational</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            </div>

            <div class="row">

            </div>

            <div class="row p-2">
                <div class="col-12 history-image w-100">
                    <div class="row text-center fs-5 text-black-50 ">
                        <div class="col-6 historyyear">

                        </div>

                        <div class="col-6">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-2" id="news">
                <div class="col-12 mt-1 mb-1 d-none d-md-block">
                    <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/image11.png" height="550px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/image2.png" height="550px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/image3.png" height="550px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-12 mt-1 mb-1 d-block d-md-none">
                    <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/image11.png" height="450px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/image2.png" height="450px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/image3.png" height="450px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="text-center">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64114.4402990121!2d79.82118589538184!3d6.921922576385074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo!5e1!3m2!1sen!2slk!4v1650867758230!5m2!1sen!2slk" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-10 offset-1 text-center">
                                <span class="fs-5 fw-bold">Want to get more familier with our latest news?</span>
                            </div>
                            <div class="col-10 offset-1">
                                <div class="row mt-5">
                                    <div class="col-12 d-grid">
                                        <input class="border border-2 bg-light" style="outline: none;" placeholder="Your Email" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 d-grid">
                                        <textarea class="border border-2 bg-light" style="outline: none; height: 140px;" placeholder="Special Points to state to the admin"></textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 d-grid">
                                        <button class="btn btn-dark border-2 border-dark" style="outline: none;">Contact Admin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="footer">
                <?php require "footer.php"; ?>
            </div>

        </div>

        <script src="bootstrap.bundle.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="script.js"></script>
    </body>
<?php
}else{
    ?>

    <body>
        <div class="container-fluid">

            <!-- navbar start -->

            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                    <a class="navbar-brand" href="#">
                        <img src="resources/logofinal120.png" width="40" height="40" class="d-inline-block align-top" alt="">
                        SuccessInternational
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" style="text-decoration: underline;">Home <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Log In Now</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#news">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#footer">About us</a>
                            </li>
                        </ul>

                    </div>
                </nav>
                </nav>
                <div style="height: 80px;"></div>
            </div>

            <div class="row">

                <!-- to be only visible when logged in -->
                <div class="col-12 col-md-4 d-none">
                    <div class="row bg-light">
                        <div class="col-10 col-lg-8 offset-1 offset-lg-2 p-2 mt-4 mt-lg-5 mb-4 mb-lg-5">

                            <a href="studentprofile.php" class="fs-6 text-dark mt-4" style="text-decoration: none;"><i class="bi bi-person-circle"></i> My Profile</a><br />
                            <a href="uploadansweredassignments.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-card-list"></i> Upload Assignments</a><br />
                            <a href="viewmarkedassignments.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-card-checklist"></i> Assignment Marks</a><br />
                            <a href="viewassignments.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-card-heading"></i> Assignments</a><br />
                            <a href="viewassignments.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-download"></i> Download Assignments</a><br />
                            <a href="viewlessonnotes.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-folder2-open"></i> Lesson Notes</a><br />
                            <a href="viewlessonnotes.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-folder-check"></i> Download Lesson Notes</a><br />
                            <a href="studentlogout.php" class="fs-6 text-dark mt-2" style="text-decoration: none;"><i class="bi bi-box-arrow-in-right"></i> Log Out</a>

                        </div>

                        <div class="col-10 col-lg-8 offset-1 offset-lg-2 p-2 mt-2 mb-5 d-none d-lg-block">
                            <span class="fs-5 fw-bold">SuccessInternational</span><br />
                            <span>The school of enthusiasts</span>
                        </div>
                    </div>
                </div>
                <!-- caraousel -->
                <div class="col-12 col-md-4">
                    <img src="resources/adminprofileimg.jpg" class="w-100" height="100%"/>
                </div>
                <div class="col-12 col-md-8 mt-1 mb-1">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/children2.jpeg" height="500px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/girl2.jpeg" height="500px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/littlegirl2.jpeg" height="500px" class="d-block w-100 admincarousel" alt="...">
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

                <!-- <div class="col-3 col-md-4 col-lg-3 d-none d-md-block">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-12 col-md-10 col-xl-10 offset-0 offset-md-1 offset-xl-1 text-center mb-5">
                                <div class="row border-2 rounded-3 border-dark logincover">
                                    <div class="col-12 w-100 mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="mb-4 mt-2">Log In</h3>
                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToAdminPanel();">Log In as Admin</button>
                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToTeacherSignin();">Log In as a Teacher</button>
                                                <button class="btn-primary mb-2 w-100 btn-7" onclick="goToAcademicOfficerSignin();">Log In as an Officer</button>
                                                <button class="btn-primary mb-4 w-100 btn-7" onclick="goToStudentsSignin();">Log In as a Student</button>
                                                <img src="resources/logofinal120.png" width="80px" />
                                                <br />
                                                <span>SuccessInternational</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            </div>

            <div class="row">

            </div>

            <div class="row p-2">
                <div class="col-12 history-image w-100">
                    <div class="row text-center fs-5 text-black-50 ">
                        <div class="col-6 historyyear">

                        </div>

                        <div class="col-6">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-2" id="news">
                <div class="col-12 mt-1 mb-1 d-none d-md-block">
                    <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/image11.png" height="550px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/image2.png" height="550px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/image3.png" height="550px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-12 mt-1 mb-1 d-block d-md-none">
                    <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/image11.png" height="450px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/image2.png" height="450px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/image3.png" height="450px" class="d-block w-100 admincarousel" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="text-center">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64114.4402990121!2d79.82118589538184!3d6.921922576385074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo!5e1!3m2!1sen!2slk!4v1650867758230!5m2!1sen!2slk" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-10 offset-1 text-center">
                                <span class="fs-5 fw-bold">Want to get more familier with our latest news?</span>
                            </div>
                            <div class="col-10 offset-1">
                                <div class="row mt-5">
                                    <div class="col-12 d-grid">
                                        <input class="border border-2 bg-light" style="outline: none;" placeholder="Your Email" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 d-grid">
                                        <textarea class="border border-2 bg-light" style="outline: none; height: 140px;" placeholder="Special Points to state to the admin"></textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 d-grid">
                                        <button class="btn btn-dark border-2 border-dark" style="outline: none;">Contact Admin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="footer">
                <?php require "footer.php"; ?>
            </div>

        </div>

        <script src="bootstrap.bundle.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="script.js"></script>
    </body>
<?php
}

?>





</html>