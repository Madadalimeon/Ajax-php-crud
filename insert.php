<?php
include "config.php";

if(isset($_POST['Name'])){

    $Username = $_POST['Name'];
    $Father_name = $_POST['Father_name'];
    $Email = $_POST['Email'];

    $sql = "INSERT INTO studect_table(Name, FatherName, Email) VALUES('$Username','$Father_name','$Email')";

    if(mysqli_query($conn, $sql)){
        echo "success";
    } else {
        echo "error";
    }
}
?>
