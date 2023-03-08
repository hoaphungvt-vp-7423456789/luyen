<?php
include "./connect.php";
$id = $_GET["id"];
$sql = "SELECT * FROM rooms WHERE id = $id";
$statement = $connect->prepare($sql);
$statement->execute();
$room = $statement->fetch();

$sql1 = "SELECT * FROM types";
$statement = $connect->prepare($sql1);
$statement->execute();
$types = $statement->fetchAll();

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
    <h1>edit room</h1>

    <form action="tnyc_edit_room.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?= $room["id"] ?>" hidden> <br>
        <input type="text" name="name" value="<?= $room["name"] ?>"> <br>
        <img src="./img/<?= $room["image"] ?>" width=150> <br>
        <!-- <input type="file" name="anh_moi" id="" hidden> <br> -->
        <input type="text" name="anh_cu" value="<?= $room["image"] ?>" hidden> <br>
        <input type="text" name="intro" value="<?= $room["intro"] ?>"> <br>
        <input type="text" name="description" value="<?= $room["description"] ?>"> <br>
        <input type="number" name="number" value="<?= $room["number"] ?>"> <br>
        <input type="number" name="price" value="<?= $room["price"] ?>"> <br>
        <input type="number" name="type_id" value="<?= $room["type_id"] ?>"> <br>
        <select name="type_id">
            <?php foreach ($types as $value) { ?>
                <option value="<?= $value['id'] ?>">
                <?= $value['name'] ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <button type="submit">Sửa</button>
    </form>
</body>

</html>