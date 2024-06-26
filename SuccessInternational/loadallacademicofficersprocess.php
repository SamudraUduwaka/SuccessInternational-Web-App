<?php

$id = 1; //admin from session
require "connection.php";

?>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-1 text-center">
                <span class="fw-bold">ID</span>
            </div>
            <div class="col-1 d-none d-lg-block text-center">
                <span class="fw-bold">Image</span>
            </div>
            <div class="col-3 text-center">
                <span class="fw-bold">Name</span>
            </div>
            <div class="col-5 col-lg-3 text-center">
                <span class="fw-bold">Email</span>
            </div>
            <div class="col-2 d-none d-lg-block text-center">
                <span class="fw-bold">Mobile</span>
            </div>
            <div class="col-3 col-lg-2">

            </div>
        </div>
        <?php
        $resultset = Database::search("SELECT * FROM `academic_officer`");
        $nresulset = $resultset->num_rows;

        for ($i = 0; $i < $nresulset; $i++) {
            $dresultset = $resultset->fetch_assoc();

            if($dresultset['fname']==null){
                $dnname = "null";
            }else{
                $dnname = $dresultset['fname'] . " " . $dresultset['lname'];
            }

            if($dresultset['mobile']==null){
                $dnmobile = "null";
            }else{
                $dnmobile = $dresultset['mobile'];
            }
        ?>
            <div class="row">
                <div class="col-1 text-center">
                    <span><?php echo $dresultset['id'] ?></span>
                </div>
                <?php
                if($dresultset['academic_officer_image_id']==null){
                    $im = "resources/profileimage.png";
                }else{
                    $image = Database::search("SELECT * FROM `academic_officer_image` WHERE `id`='".$dresultset['academic_officer_image_id']."' ");
                    $dimage = $image->fetch_assoc();
                    $im = $dimage['url'];
                }
                ?>
                <div class="col-1 d-none d-lg-block text-center">
                    <img src="<?php echo $im;?>" width="50px" style="border-radius: 50%;"/>
                </div>
                
                <div class="col-3 text-center">
                    <span><?php echo $dnname ?></span>
                </div>
                <div class="col-5 col-lg-3 text-center">
                    <span><?php echo $dresultset['email'] ?></span>
                </div>
                <div class="col-2 d-none d-lg-block text-center">
                    <span><?php echo $dnmobile ?></span>
                </div>
                <div class="col-3 col-lg-2 text-end"><?php
                    if($dresultset['status_id']=="1"){
                        ?>
                            <button class="btn btn-warning" onclick="manageAcademicOfficers(<?php echo $dresultset['id'] ?>);" id="statusbtn1<?php echo $dresultset['id']?>">Deactive</button>
                        <?php
                    }else{
                        ?>
                            <button class="btn btn-success" onclick="manageAcademicOfficers(<?php echo $dresultset['id'] ?>);" id="statusbtn1<?php echo $dresultset['id']?>">Active</button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php

?>