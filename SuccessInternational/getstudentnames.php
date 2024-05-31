<?php

//check availability of teacher id via session management

require "connection.php";

if (isset($_POST["c"])) {

    $class = $_POST["c"];

    if ($class != "0") {


        $students = Database::search("SELECT * FROM `student` WHERE `class_id`='" . $class . "'");
        $nstudent = $students->num_rows;
        if ($nstudent > 0) {
?>
            <option value="0">Select Student</option>
            <?php
            for ($i = 0; $i < $nstudent; $i++) {
                $student = $students->fetch_assoc();
            ?>
                <option value="<?php echo $student['id'] ?>"><?php echo $student['fname'] . " " . $student['lname'] ?></option>
            <?php
            }
        } else {
            ?>
            <option value="0">No Students registered under that class</option>
<?php
        }
    } else {
        echo "ok";
    }
}

?>