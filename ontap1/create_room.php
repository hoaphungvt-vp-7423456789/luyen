<?php
include "./connect.php";
$sql = "SELECT * FROM types";
$statement = $connect->prepare($sql);
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
    <h1>create room</h1>

    <form action="tnyc_create_room.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" placeholder="id" hidden> <br>
        <input type="text" name="name" placeholder="name"><br>
        <input type="file" name="anh_moi" id=""> <br>
        <input type="text" name="intro" placeholder="intro"> <br>
        <input type="text" name="description" placeholder="description"> <br>
        <input type="number" name="number" placeholder="number"> <br>
        <input type="number" name="price" placeholder="price"> <br>
        <select name="type_id">
            <option value="">Type room</option>
            <?php foreach ($types as $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?> </option>
            <?php } ?>
        </select>
        <br>
        <button type="submit">Thêm</button>
    </form>
    <h2><?php echo isset($_GET["thong_bao"]) ? $_GET["thong_bao"] : "" ?></h2>
</body>

</html>





