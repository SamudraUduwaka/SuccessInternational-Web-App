<?php

$id = 1;
require "connection.php";
?>
<option>Take a look first</option>
<?php

$subject = Database::search("SELECT * FROM `subject`");
$nsubject = $subject->num_rows;
if ($nsubject > 0) {
    for ($i = 0; $i < $nsubject; $i++) {
        $dsubject = $subject->fetch_assoc();

        $med = Database::search("SELECT * FROM `medium` WHERE `id`='".$dsubject['medium_id']."'");
        $dmed = $med->fetch_assoc();
?>
        <option><?php echo $dsubject['name']." ".$dmed['name']; ?></option>
    <?php
    }
} else {
    ?>

<?php
}
?>