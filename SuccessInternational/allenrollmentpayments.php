<?php

require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>All enrollment payments | SuccessInternational</title>
    <link rel="icon" href="resources/logofinal.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="adminpanel.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid">
        <!-- navbar for device screens above medium -->
        <div class="col-12 d-none d-md-block">
            <div id="navbar" class="w-100">
                <a class="navbar-brand" href="#">
                    <img src="resources/logofinal120.png" width="40" height="40" class="d-inline-block align-top" alt="">
                    Success International
                </a>
                <a href="#s" class="mt-1">Admin | All payments</a>
                <button class="btn btn-outline-light pe-3 ps-3 me-md-5 mt-3 float-end" id="MyClockDisplay" onload="showTime()"></button>
            </div>
        </div>
        <!-- navbar for device screens above medium -->

        <!-- navbar for device screens below medium -->
        <div class="col-12 d-block d-md-none">
            <div id="navbars">
                <div class="row">
                    <!-- <div class="col-1">
                        <button class="btn btn-outline-light m-1 mt-3 float-start" onclick="openNav();"><i class="bi bi-distribute-vertical"> </i></button>
                    </div> -->
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

        <div class="mt-5" style="height: 50px;"></div>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Payment id</th>
                    <th>Student</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>

                <?php
                $pay = Database::search("SELECT * FROM `enrollment_payment` ");
                $npay = $pay->num_rows;
                for($i=0;$i<$npay;$i++){
                    $dpay = $pay->fetch_assoc();
                    $stu = Database::search("SELECT * FROM `student` WHERE `id`='".$dpay['student_id']."'");
                    $dstu = $stu->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $dpay['id']?></td>
                        <td><?php echo $dstu['fname']." ".$dstu['lname']?></td>
                        <td>$ <?php echo $dpay['amount']?></td>
                        <td><?php echo $dpay['date']?></td>
                        <td><?php echo $dpay['time']?></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="adminpanel.js"></script>
</body>

</html>