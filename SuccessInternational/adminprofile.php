<?php

require "connection.php";
$id = 1;

?>

<!DOCTYPE html>
<html>

<head>
    <title>SuccessInternational | Admin | Profile</title>
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
                    <a href="#s" class="mt-1">Admin | Profile Settings</a>
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
                            <li class="breadcrumb-item"><a href="adminpanel.php">Admin Panel</a></li>
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

                            $admin = Database::search("SELECT * FROM `admin` WHERE `id`='" . $id . "'");
                            $adminrs = $admin->fetch_assoc();

                            $adminImageID = $adminrs["admin_image_id"];
                            if ($adminImageID == null) {
                            ?>
                                <div class="col-12 text-center">
                                    <img src="resources/profileimage.png" class="rounded" height="150px">
                                </div>

                                <div class="col-10 offset-1 text-start">
                                    <span class="form-text">Upload a Profile Picture</span>
                                </div>

                            <?php
                            } else {
                                $image = Database::search("SELECT * FROM `admin_image` WHERE `id`='" . $adminImageID . "'");
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
                                    <input type="file" class="form-control" id="inputimage" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04" onclick="uploadAdminImage();">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Information -->
                    <div class="col-12 col-lg-4 mt-3 p-5 p-lg-1">
                        <div class="row">
                            <div class="col-6">
                                <span class="form-text">Admin ID</span>
                                <input class="inputbottomborder" type="text" disabled value="<?php echo $id ?>" />
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <span class="form-text">First Name</span>
                                <input class="inputbottomborder w-100" type="text" value="<?php echo $adminrs['fname']; ?>" id="fname" />
                            </div>

                            <div class="col-6">
                                <span class="form-text">Last Name</span>
                                <input class="inputbottomborder w-100" type="text" value="<?php echo $adminrs['lname']; ?>" id="lname" />
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-12">
                                <span class="form-text">Email Address</span><br />
                                <input class="inputbottomborder w-100" type="email" value="<?php echo $adminrs['email']; ?>" id="email" />
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <span class="form-text">Mobile</span>
                                <input class="inputbottomborder w-100" type="text" placeholder="+94" value="<?php echo $adminrs['mobile']; ?>" id="mobile" />
                            </div>

                            <div class="col-6">
                                <span class="form-text">Password</span>
                                <input class="inputbottomborder w-100" type="password" disabled value="<?php echo $adminrs['password']; ?>" />
                            </div>
                        </div>

                        <div class="row mt-3 mt-lg-4">
                            <div class="col-12 d-grid">
                                <button class="btn btn-outline-primary" onclick="updateAdminProfile();">Update Info</button>
                            </div>
                        </div>
                    </div>

                    <!-- Extra Image (Additional) -->
                    <div class="col-12 col-lg-4 mt-3 mt-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <img src="resources/adminprofileimg.jpg" class="w-100" height=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php require "footer.php"; ?>

    <script src="script.js"></script>
    <script src="adminpanel.js"></script>
    <script src="bootstrap.js"></script>

</body>

</html>