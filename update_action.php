<?php
include "config.php";
$id = intval($_POST['id']);
$Username = $_POST['Name'];
$Father_name = $_POST['Father_name'];
$Email = $_POST['Email'];
$sql = "UPDATE studect_table SET Name = ?, FatherName = ?, Email = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $Username, $Father_name, $Email, $id);
if($stmt->execute()){
    echo "success";
} else {
    echo "error";
}
?>
