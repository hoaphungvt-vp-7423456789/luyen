<?php
include "connect.php";
$sql="SELECT * FROM `types`";
//đinh ngĩa câu truy vấn 
$statement=$connect->prepare($sql);
// nạp câu truy vấn 
$statement->excute();
// thực thi câu truy vấn 
$types=$statement->$fetchAll()
// lấy dữ liệu 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tnyc_add.php" method="post">
        <input type="text" name="id" placeholder="" hidden>
        <input type="text" name="name" placeholder="">
        <input type="file" name="img" placeholder="">
        <input type="text" name="intro" placeholder="">
        <input type="text" name="des" placeholder="">
        <input type="number" name="number " placeholder="">
        <input type="number" name="price" placeholder="">
        <select name="type_id" id="">
            <option value="">type_id</option>
<?
foreach($types as $value ){?>
<option value="<?=$value['id']?>"><?=$value['name']?></option>
<?}?>
           
        </select>
    </form>
</body>
</html>