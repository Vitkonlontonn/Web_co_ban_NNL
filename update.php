<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng bài</title>
</head>

<body>
    <?php
    $ma = $_GET["ma"];
    $ket_noi = mysqli_connect('localhost', 'root', '', 'kho_tin_tuc');
    mysqli_set_charset($ket_noi, 'utf8');
    $sql = "SELECT *FROM tin_tuc WHERE ma = '$ma'";
    $ket_qua = mysqli_query($ket_noi, $sql);
    $ban_tin = mysqli_fetch_array($ket_qua);
    ?>
    <form method="post" action="process_update.php">
        <input type="hidden" name="ma" value="<?php echo $ma ?>">
        Tiêu đề
        <input type="text" name="tieu_de" value="<?php echo $ban_tin['tieu_de'] ?>">
        <br>
        Nội dung
        <textarea name="noi_dung">"<?php echo $ban_tin['noi_dung'] ?>"</textarea>
        <br>
        Ảnh
        <input type="text" name="anh" value="<?php echo $ban_tin['anh'] ?>">
        <br>
        <button type="submit">Sửa</button>

    </form>

</body>

</html>