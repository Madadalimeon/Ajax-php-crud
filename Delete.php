<?php
include "config.php";
$stu_id = $_POST['id'];
$sql = "DELETE FROM studect_table WHERE id = {$stu_id}";
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
