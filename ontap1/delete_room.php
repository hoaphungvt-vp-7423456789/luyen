<?php
include "./connect.php";
$id = $_GET['id'];
$sql = "DELETE FROM rooms WHERE `rooms`.`id` = $id";
$statement = $connect->prepare($sql);
$statement->execute();
header("location: ./index.php");
