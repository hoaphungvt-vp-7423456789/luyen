<?php
include "./connect.php";
$id = $_POST['id'];
$name = $_POST["name"];
$intro = $_POST["intro"];
$description = $_POST["description"];
$number = $_POST["number"];
$price = $_POST["price"];
$type_id = $_POST["type_id"];

if ($_FILES == null) {
    $image = $_POST["anh_cu"];
} else {
    $image = $_FILES["anh_moi"]["name"];
    move_uploaded_file($_FILES["anh_moi"]["tmp_name"], "./img/" . $_FILES["anh_moi"]["name"]);

//tmp_name: lưu tạm thời trên localhost
//name: tên file vừa tải lên
//chuyển file ảnh từ file tạm trên localhost mà mình vừa tải lên, chuyển vào fooder img 
}
$sql = "UPDATE `rooms` SET `name` = '$name', `image` = '$image', `intro` = '$intro', `description` = '$description', `number` = '$number', `price` = '$price', `type_id` = '$type_id' WHERE `rooms`.`id` = $id;";
$statement = $connect->prepare($sql);
$statement->execute();
header("location: ./index.php");

?>
