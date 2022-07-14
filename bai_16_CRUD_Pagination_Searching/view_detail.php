<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết</title>
</head>

<body>
    <?php
    $ma = $_GET['ma'];
    $connection = mysqli_connect('localhost', 'root', '', 'kho_tin_tuc');
    mysqli_set_charset($connection, 'utf8');

    $sql = "select * from tin_tuc where ma = $ma";
    $result = mysqli_query($connection, $sql);
    $article = mysqli_fetch_array($result);
    ?>
    <h1><?php echo $article['tieu_de'] ?></h1>
    <br>
    <p><?php echo $article['noi_dung'] ?></p>
    <img src="<?php echo $article['anh'] ?>"> </img>
</body>

</html>