<?php
$tieu_de = $_POST["tieu_de"];
$noi_dung = $_POST["noi_dung"];
$anh = $_POST["anh"];

$connection = mysqli_connect('localhost', 'root', '', 'kho_tin_tuc');

mysqli_set_charset($connection, 'utf8');

$sql = "insert into tin_tuc(tieu_de, noi_dung, anh)
       values('$tieu_de','$noi_dung', '$anh')";
mysqli_query($connection, $sql);

// if (!$connection) {
//        die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
//dd($sql);

//mysqli_close($connection);

mysqli_close($connection); ?>
<a href="index.php">Trang chủ</a>