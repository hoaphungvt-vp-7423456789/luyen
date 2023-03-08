<?php
include "./connect.php";
$sql="SELECT rooms.*,types.name AS type_name FROM rooms LEFT JOIN types ON rooms.type_id=types.id"
$statement=$connect->prepare($sql);
$statement->execute();
$rooms=$statement->fetchAll();

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
    <table>
        <thead>
            <th>id </th>
            <th>name </th>
            <th>img </th>
            <th>intro</th>
            <th>des</th>
            <th>number </th>
            <th>price</th>
            <th>type_id</th>
        </thead>
       <?php
foreach($rooms as $value){?>
<tr>
<td><?=$value["id"]?></td>
<td><?=$value["name"]?></td>
<td><img src="./img/<?=$value[img]?>" alt=""></td>
<td><?=$value["intro"]?></td>
<td><?=$value["des"]?></td>
<td><?=$value["number"]?></td>
<td><?=$value["price"]?></td>
<td><?=$value["type_id"]?></td>
<td>
<a href="xoa.php?id=<?=$value['id']?>"><button>xóa</button></a>
<a href="add.php?id=<?=$value['id']?>"><button>thêm </button></a>
<a href="edit.php"><button>chỉnh sửa</button></a>
</td>





</tr>
<?php}?>


       ?>
    </table>
</body>
</html>