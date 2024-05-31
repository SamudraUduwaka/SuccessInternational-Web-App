<?php

session_start();
require "connection.php";

if (isset($_SESSION['unstudent'])) {
    $id = $_SESSION['unstudent']['id'];
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>SuccessInternational | Enrollment Payment manager</title>
        <link rel="icon" href="resources/logofinal.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="bootstrap.css.map" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    </head>

    <body onload="enroll();">
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
                                <a class="nav-link" style="text-decoration: underline;">Student | Enrollment Payment Manager <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Samudra Samadhi</a>
                            </li>
                        </ul>

                    </div>
                </nav>
                </nav>
                <div style="height: 68px;"></div>
            </div>

            <div class="row bg-light">
                <div class="col-9">
                    <div class="row p-4 ms-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pay Enrollment fee</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-3 col-lg-1 mt-4 text-end">
                    <button class="bg-light d-inline-block" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="border: none; outline: none;"><i class="bi bi-credit-card-2-front-fill fs-4"></i></button>
                </div>
                <div class="col-lg-2 d-none d-lg-block text-start" style="margin-top: 30px;">
                    <span class="text-black-50 fs-6">Payment history</span>
                </div>

                <!-- offcanvas -->
                <div class="offcanvas offcanvas-end bg-secondary text-white" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Payment history</h5>
                        <button type="button" class="bg-dark" style="outline: none; border: none;" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-list-nested text-white fs-4"></i></button>
                    </div>
                    <div class="offcanvas-body">

                    </div>
                </div>
                <!-- offcanvas -->
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 col-xl-7 offset-0 offset-xl-1">
                    <div class="row mt-5 bg-light">
                        <div class="col-11 col-lg-4 offset-1 mt-1 mt-lg-5">
                            <span class="fw-bold">Name in full :</span>
                        </div>
                        <?php
                        $stu = Database::search("SELECT * FROM `student` WHERE `id`='" . $id . "'");
                        $dstu = $stu->fetch_assoc();

                        ?>
                        <div class="col-11 offset-1 col-lg-7 offset-lg-0 mt-0 mt-lg-5">
                            <input class="inputbottomborder w-75" type="text" disabled value="<?php echo $dstu['fname'] . " " . $dstu['lname'] ?>" />
                        </div>

                        <div class="col-11 col-lg-4 offset-1 mt-3">
                            <span class="fw-bold">Date of Registeration :</span>
                        </div>
                        <div class="col-11 offset-1 col-lg-7 offset-lg-0 mt-0 mt-lg-3">
                            <input class="inputbottomborder w-75" type="text" disabled value="<?php echo $dstu['dateadded'] ?>" />
                        </div>

                        <div class="col-11 col-lg-4 offset-1 mt-3">
                            <span class="fw-bold">Year of study :</span>
                        </div>

                        <?php

                        $d = new DateTime();
                        $tz = new DateTimeZone("Asia/Colombo");
                        $d->setTimezone($tz);
                        $date = $d->format("Y-m-d");

                        $datejoined = $dstu['dateadded'];
                        $dj = new DateTime($datejoined);
                        $d = new DateTime($date);
                        $interval = $dj->diff($d);

                        if ($interval->y == 0) {
                        ?>
                            <div class="col-11 offset-1 col-lg-7 offset-lg-0 mt-0 mt-lg-3">
                                <input class="inputbottomborder w-75" type="text" disabled value="First year" />
                            </div>
                        <?php
                        }else if($interval->y == 1){
                            ?>
                            <div class="col-11 offset-1 col-lg-7 offset-lg-0 mt-0 mt-lg-3">
                                <input class="inputbottomborder w-75" type="text" disabled value="Second year" />
                            </div>
                        <?php
                        }else if($interval->y == 2){
                            ?>
                            <div class="col-11 offset-1 col-lg-7 offset-lg-0 mt-0 mt-lg-3">
                                <input class="inputbottomborder w-75" type="text" disabled value="Third year" />
                            </div>
                        <?php
                        }else if($interval->y == 3){
                            ?>
                            <div class="col-11 offset-1 col-lg-7 offset-lg-0 mt-0 mt-lg-3">
                                <input class="inputbottomborder w-75" type="text" disabled value="Fourth year" />
                            </div>
                        <?php
                        }else{
                            ?>
                            <div class="col-11 offset-1 col-lg-7 offset-lg-0 mt-0 mt-lg-3">
                                <input class="inputbottomborder w-75" type="text" disabled value="Out" />
                            </div>
                        <?php
                        }

                        ?>




                        <div class="col-11 col-lg-4 offset-1 mt-3">
                            <span class="fw-bold">Enrollment fee :</span>
                        </div>
                        <div class="col-11 offset-1 col-lg-7 offset-lg-0 mt-0 mt-lg-3">
                            <input class="inputbottomborder w-75" type="text" disabled value="$10 (Approximately Rs.3570. 00)" />
                        </div>

                        <div class="col-10 offset-1 col-lg-4 offset-lg-6 mt-5 d-grid">
                            <button class="btn btn-primary" id="proceedbtn" onclick="proceedTo();">Proceed to payment</button>
                        </div>

                        <div class="col-10 offset-1 col-lg-4 offset-lg-6 mt-5 d-none" id="paypalbtn">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-3 text-center d-none d-lg-block mt-5">
                    <img src="resources/enroll fee.webp" width="100%" height="450px" />
                </div>
            </div>
        </div>

        <!-- modal on startup-->

        <div class="modal fade" id="startmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog border-0 rounded-0">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">The Free trial priod expired!</h5>
                        <button type="button" style="border: none; outline: none;" class="bg-light" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg fw-bold"></i></button>
                    </div>
                    <div class="modal-body bg-dark text-white">
                        <p>To access the SuccessInternational Learning Management System from now, you have to pay the enrollment fee of $10. </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary border-2 border-dark" style="outline: none;" data-bs-dismiss="modal">Ok. Got it.</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://www.paypal.com/sdk/js?client-id=AUixLXeQ8JAvpd_Hc4lKYVPQiBeHBh8JiG_uR2euACmp9iuXiwQLiwkDeyKzJsOqZmfTw6HAo_ETe1Zk&currency=USD&disable-funding=credit,card"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>
<?php
}

?>