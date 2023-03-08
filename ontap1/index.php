<?php
include "./connect.php";
$sql = "SELECT rooms.* ,types.name AS type_name FROM rooms LEFT JOIN types ON rooms.type_id = types.id;";
$statement = $connect->prepare($sql);
$statement->execute();
$rooms = $statement->fetchAll();
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
   

    <table border=1px>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>image</th>
            <th>intro</th>
            <th>description</th>
            <th>number</th>
            <th>price</th>
            <th>type</th>
            <th>action</th>
        </thead>
        <tbody>
            <?php foreach ($rooms as $value) { ?>
                <tr>
                    <td><?= $value["id"] ?></td>
                    <td><?= $value["name"] ?></td>
                    <td><img src="./img/<?= $value["image"] ?>" width=150></td>
                    <td><?= $value["intro"] ?></td>
                    <td><?= $value["description"] ?></td>
                    <td><?= $value["number"] ?></td>
                    <td><?= $value["price"] ?></td>
                    <td><?= $value["type_name"] ?></td>
                    <td>
                        <a href="./create_room.php"><button>Thêm</button></a>
                        <a href="edit_room.php?id=<?= $value["id"] ?>"><button>sửa</button></a>
                        <a href="delete_room.php?id=<?= $value["id"] ?>" onclick="return confirm('bạn có muốn xóa phòng không?');"><button>xóa</button></a>
                        <!-- link sang trang khác cùng với id của room hàng đấy, ở file khác, gọi id ra = $_GET -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>