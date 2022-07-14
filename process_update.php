<?php
$ma = $_POST['ma'];
$noi_dung = $_POST['noi_dung'];
$tieu_de = $_POST['tieu_de'];
$anh = $_POST['anh'];

$ket_noi = mysqli_connect('localhost', 'root', '', 'kho_tin_tuc');
mysqli_set_charset($ket_noi, 'utf8');

$sql = "update tin_tuc 
        set tieu_de ='$tieu_de',
            noi_dung='$noi_dung',
            anh ='$anh'
        where ma = $ma";
mysqli_query($ket_noi, $sql);
//die ($sql);
mysqli_close($ket_noi); ?>
<a href="index.php">Trang chủ</a>