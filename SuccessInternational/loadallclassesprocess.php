<?php

$id = 1;
require "connection.php";
?>
<option>Take a look first</option>
<?php

$class = Database::search("SELECT * FROM `class`");
$nclass = $class->num_rows;
if ($nclass > 0) {
    for ($i = 0; $i < $nclass; $i++) {
        $dclass = $class->fetch_assoc();
?>
        <option><?php echo $dclass['name']; ?></option>
    <?php
    }
} else {
    ?>

<?php
}
?>