<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>

<body>

    <!------------------------Tìm kiếm------------------->
    <?php
    require('connect.php');
    $tim_kiem = '';
    if (isset($_GET['tim_kiem']))
        $tim_kiem = $_GET['tim_kiem'];

    //<!--------------------- Phân trang ------------------------>

    $trang = 1;
    if (isset($_GET['trang']))
        $trang = $_GET['trang'];

    $sql_so_tin_tuc = "SELECT count(*) FROM tin_tuc
                        where tieu_de like '%$tim_kiem%'
                        ";

    $mang_so_tin_tuc = mysqli_query($ket_noi, $sql_so_tin_tuc);
    $ket_qua_so_tin_tuc = mysqli_fetch_array($mang_so_tin_tuc);
    $so_tin_tuc = $ket_qua_so_tin_tuc['count(*)'];
    $so_tin_tuc_tren_1_trang = 3;
    $so_trang = ceil($so_tin_tuc / $so_tin_tuc_tren_1_trang);

    $bo_qua = $so_tin_tuc_tren_1_trang * ($trang - 1);

    // phân trang + tìm kiếm
    $sql = "SELECT * FROM tin_tuc
        where tieu_de like '%$tim_kiem%' 
        limit $so_tin_tuc_tren_1_trang offset $bo_qua";

    $ket_qua = mysqli_query($ket_noi, $sql);
    ?>

    <!-------------------------- bảng tin tức ------------------------>

    <h1>Đây là trang chủ</h1>

    <a href="post_articles.php">Đăng thêm bài</a> <br>
    
    <table border="1" width="100%">

        <caption>
            <form>
                <input type="search" name="tim_kiem" value="<?php echo $tim_kiem; ?>" placeholder="Tìm kiếm">
            </form>
        </caption>
        <tr>
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th> </th>
            <th> </th>
        </tr>

        <?php foreach ($ket_qua as $tung_bai) { ?>
            <tr>
                <td><?php echo $tung_bai['ma'] ?></td>
                <td><a href="view_detail.php?ma=<?php echo $tung_bai['ma'] ?>">
                        <?php echo $tung_bai['tieu_de'] ?>
                    </a>
                </td>

                <td><img src="<?php echo $tung_bai['anh'] ?>" height=100px></img></td>
                <td><a href="update.php?ma=<?php echo $tung_bai['ma'] ?>">Sửa</a></td>
                <td><a href="delete.php?ma=<?php echo $tung_bai['ma'] ?>">Xóa</a></td>
            </tr>
        <?php } ?>

    </table>
    <?php
    for ($i = 1; $i <= $so_trang; $i++) { ?>
        <a href="?trang=<?php echo $i ?>">
            <?php echo $i; ?>
        </a>

    <?php } ?>

</body>

</html>