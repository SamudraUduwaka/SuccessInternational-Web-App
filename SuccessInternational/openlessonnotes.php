<?php
require "connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $lessonNotes = Database::search("SELECT * FROM `lesson_notes` WHERE `id`='".$id."'");
    $nlessonNotes = $lessonNotes->num_rows;

    if($nlessonNotes==1){
        $dlessonNotes = $lessonNotes->fetch_assoc();
        $url = $dlessonNotes['url'];
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