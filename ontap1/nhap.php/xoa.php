<?
include "connect.php";
$id =$_GET["id"];
$sql="DELETE FROM rooms WHERE `rooms`.`id` = $id";
$statement=$connect->prepare($sql);
$stastement->excute();
header("location:index.php")
?>










