<?php

$id = 1;
require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <title>SuccessInternational | Student | Marked Assignments </title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="bootstrap.css.map" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body onload="loadStudentMarkedAssignments();">
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
                            <a class="nav-link" style="text-decoration: underline;">Student | Marked Assignments <span class="sr-only"></span></a>
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
                        <li class="breadcrumb-item active" aria-current="page">Marked and graded Assignments</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="row" id="loadstudentassignmentsmarks">

            </div>
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>