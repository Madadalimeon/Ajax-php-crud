<?php
include "config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM studect_table WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost/PHP_Ajax/index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>
