<?php
include "./connect.php";
if ($_POST["name"] == null) {
    $mess = "KHông để trống tên";
    header("location: ./create_room.php?thong_bao=$mess");
} else if ($_FILES["anh_moi"]["name"] == null) {
    $mess = "Mời tải ảnh lên";
    header("location: ./create_room.php?thong_bao=$mess");
} else if (filesize($_FILES["anh_moi"]["tmp_name"]) > 2000000) {
    $mess = "Kích thước ảnh tải lên <= 2MB";
    header("location: ./create_room.php?thong_bao=$mess");
} else if ($_POST["intro"] == null) {
    $mess = "KHông để trống intro";
    header("location: ./create_room.php?thong_bao=$mess");
} else if ($_POST["description"] == null) {
    $mess = "KHông để trống description";
    header("location: ./create_room.php?thong_bao=$mess");
} else if ($_POST["number"] == null) {
    $mess = "KHông để trống number";
    header("location: ./create_room.php?thong_bao=$mess");
} else if ($_POST["price"] == null) {
    $mess = "KHông để trống price";
    header("location: ./create_room.php?thong_bao=$mess");
}
// else if (!is_numeric($_POST["price"]) || !is_numeric($_POST["number"])) {
//     $mess = "Price hoặc number phải nhập số";
//     header("location: ./create_room.php?thong_bao=$mess");
// }  is_numeric true nếu là số
else if ($_POST["price"] <= 0 || $_POST["number"] <= 0) {
    $mess = "Price hoặc number phải >= 0";
    header("location: ./create_room.php?thong_bao=$mess");
} else if ($_POST["type_id"] == null) {
    $mess = "KHông để trống type room";
    header("location: ./create_room.php?thong_bao=$mess");
} else {
    $name = $_POST["name"];
    $intro = $_POST["intro"];
    $description = $_POST["description"];
    $number = $_POST["number"];
    $price = $_POST["price"];
    $type_id = $_POST["type_id"];

    $image = $_FILES["anh_moi"]["name"];
    move_uploaded_file($_FILES["anh_moi"]["tmp_name"], "./img/" . $_FILES["anh_moi"]["name"]);

    //tmp_name: lưu tạm thời trên localhost
    //name: tên file vừa tải lên
    //chuyển file ảnh từ file tạm trên localhost mà mình vừa tải lên, chuyển vào fooder img 

    $sql = "INSERT INTO `rooms` (`id`, `name`, `image`, `intro`, `description`, `number`, `price`, `type_id`) 
VALUES (NULL, '$name', '$image', '$intro', '$description', '$number', '$price', '$type_id');";

    $statement = $connect->prepare($sql);
    $statement->execute();
    header("location: ./index.php");
}
