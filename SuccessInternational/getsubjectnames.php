<?php

require "connection.php";

if (isset($_POST["c"]) && isset($_POST["m"])) {

    $class = $_POST["c"];
    $medium = $_POST["m"];

    if ($class != "0" && $medium != "0") {


        $subjectMedium = Database::search("SELECT * FROM `subject_has_class` INNER JOIN `subject` ON `subject`.`id`=`subject_has_class`.`subject_id` INNER JOIN `medium` ON `medium`.`id`=`subject`.`medium_id` WHERE `class_id`='" . $class . "' AND `medium`.`id`='" . $medium . "'");
        $nsubjectMedium = $subjectMedium->num_rows;
        if ($nsubjectMedium > 0) {
?>
            <option value="0">Select subject</option>
            <?php
            for ($i = 0; $i < $nsubjectMedium; $i++) {
                $subject = $subjectMedium->fetch_assoc();
                $s = Database::search("SELECT * FROM `subject` WHERE `id`='" . $subject['subject_id'] . "' AND `medium_id`='" . $medium . "'");
                $ss = $s->fetch_assoc();
            ?>
                <option value="<?php echo $ss['id'] ?>"><?php echo $ss['name'] ?></option>
            <?php
            }
        } else {
            ?>
            <option value="0">No subjects for that class & subject</option>
<?php
        }
    } else {
        echo "ok";
    }
}

?>