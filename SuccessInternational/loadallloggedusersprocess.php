<?php

$id = 1;
require "connection.php";

$type = $_POST["usertype"];

$resultset = Database::search("SELECT * FROM `" . $type . "` WHERE `status_id`='1'");
$nresultset = $resultset->num_rows;

if ($nresultset > 0) {

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");
?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Email Address</th>
                <th>Date Added</th>
                <th>Status</th>
            </tr>
            <?php
            for ($i = 0; $i < $nresultset; $i++) {
                $dresultset = $resultset->fetch_assoc();
            ?>


                <tr>
                    <td><?php echo $dresultset['id']; ?></td>
                    <td><?php echo $dresultset['email']; ?></td>
                    <td><?php echo $dresultset['dateadded']; ?></td>
                    <?php
                    $status = Database::search("SELECT * FROM `status` WHERE `id`='" . $dresultset['status_id'] . "'");
                    $dstatus = $status->fetch_assoc();
                    ?>
                    <td><?php echo $dstatus['name']; ?></td>

                </tr>
            <?php
            }
            ?>
        </table>
    <?php
}

    ?>