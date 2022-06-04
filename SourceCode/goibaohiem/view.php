<?php

require_once('../database/database1.php');
require_once('../session/initialize.php');

if (!isset($_GET['IDGoiBaoHiem'])) {
    redirect_to('../user/index1.php');
}
$id = $_GET['IDGoiBaoHiem'];
$gbh = find_gbh_by_id_full($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin gói bảo hiểm</title>
    <style>
        .spann {
            font-weight: bold;
            font-size: large;
        }
    </style>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
<div class="container">
    <?php include('../successfully/successfully.php'); ?>
    <?php include('../successfully/header.php'); ?>

    <h1>Thông tin gói bảo hiểm</h1>

    <p><span class="spann">Tên công ty: </span><?php echo $gbh['TenCongTy']; ?></p>
    <p><span class="spann">Tên danh mục: </span><?php echo $gbh['TenDanhMuc']; ?></p>
    <p><span class="spann">Tên gói bảo hiểm: </span><?php echo $gbh['TenGoiBaoHiem']; ?></p>
    <p><span class="spann">Phạm vi bảo hiểm: </span><?php echo $gbh['PhamViBaoHiem']; ?></p>
    <p><span class="spann">Quyền lợi: </span><?php echo $gbh['QuyenLoi']; ?></p>
    <p><span class="spann">Hạn sử dụng: </span><?php echo $gbh['HanSuDung']; ?></p>
    <p><span class="spann">Giá tiền: </span><?php echo $gbh['Gia']; ?></p>
    <p><span class="spann">Mức trách nhiệm: </span><?php echo $gbh['MucTrachNhiem']; ?></p>
    <p><span class="spann">Mức bồi thường: </span><?php echo $gbh['MucBoiThuong']; ?></p>
    <p><span class="spann">Các trường hợp không được bồi thường: </span><?php echo $gbh['CacTruongHopKhongDuocBoiThuong']; ?></p>

    <a href="<?php echo 'Goibaohiem_edit.php?IDGoiBaoHiem=' . $gbh['IDGoiBaoHiem']; ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
    <a href="<?php echo 'Goibaohiem_delete.php?IDGoiBaoHiem=' . $gbh['IDGoiBaoHiem']; ?>" class="btn btn-danger" role="button">Xóa</a>
    <br><br>
    <a href="Goibaohiem_index.php" class="btn btn-primary" role="button"><- Quay lại</a>

</div>


    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>