<?php

//check availability of teacher id via session management

require "connection.php";

if (isset($_POST["c"]) && isset($_POST["m"]) && isset($_POST["s"])) {

    $class = $_POST["c"];
    $subject = $_POST["s"];

    if ($class != "0" && $medium != "0" && $subject != "0") {

        $shc = Database::search("SELECT * FROM `subject_has_class` WHERE `subject_id`='".$subject."' AND `class_id`='".$class."'");
        $nshc = $shc->num_rows;

        if($nshc>0){
            $dshc = $shc->fetch_assoc();
            $shcId = $dshc['id'];

        $assignmentpdf = Database::search("SELECT * FROM `assignmentpdfs` WHERE `subject_has_class_id`='" . $shcId . "'");
        $nassignmentpdf = $assignmentpdf->num_rows;
        if ($nassignmentpdf > 0) {
?>
            <option value="0">Select Assignment PDF</option>
            <?php
            for ($i = 0; $i < $nassignmentpdf; $i++) {
                $assignments = $assignmentpdf->fetch_assoc();
            ?>
                <option value="<?php echo $assignments['id'] ?>"><?php echo $assignments['name'] ?></option>
            <?php
            }
        } else {
            ?>
            <option value="0">No Assignment PDFs under that subject</option>
<?php
        }
    }
    } else {
        echo "ok";
    }
}

?>