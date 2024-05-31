<?php
require "connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $assignment = Database::search("SELECT * FROM `student_has_assignmentmark` WHERE `assignmentpdfs_id`='".$id."'");
    $nassignment = $assignment->num_rows;

    if($nassignment==1){
        $dassignment = $assignment->fetch_assoc();
        $url = $dassignment['url'];
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Open Document</title>
                <link rel="icon" href="resources/logofinal.png" />
                <link rel="stylesheet" href="bootstrap.css"/>
            </head>
            <body>
                <div class="container-fluid">
                    <div class="col-12 d-grid">
                    <embed src="<?php echo $url?>#toolbar=0" type ="application/pdf" style="width:100% ; height: 680px;">
                    </div>
                </div>
            </body>
        </html>
        <?php
    }

}

?>