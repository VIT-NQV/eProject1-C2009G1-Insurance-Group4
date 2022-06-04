<?php 
require_once('../database/database1.php');
require_once('../session/initialize.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    delete_gbh($_POST['IDGoiBaoHiem']);
    $_SESSION['delete'] = 'Xóa thành công';
    redirect_to('Goibaohiem_index.php');
} else {
    if (!isset($_GET['IDGoiBaoHiem'])) {
        redirect_to('Goibaohiem_index.php');
    }
    $id = $_GET['IDGoiBaoHiem'];
    $gbh = find_gbh_by_id_full($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Xóa gói bảo hiểm</title>
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
    <?php include('../successfully/header.php'); ?>

    <h2>Bạn có muốn xóa gói bảo hiểm này không?</h2><br>
    <p><span class="spann">Tên công ty: </span><?php echo $gbh['TenCongTy']; ?></p>
    <p><span class="spann">Tên danh mục: </span><?php echo $gbh['TenDanhMuc']; ?></p>
    <p><span class="spann">Tên gói bảo hiểm: </span><?php echo $gbh['TenGoiBaoHiem']; ?></p>
    <p><span class="spann">Phạm vi của bảo hiểm: </span><?php echo $gbh['PhamViBaoHiem']; ?></p>
    <p><span class="spann">Quyền lợi: </span><?php echo $gbh['QuyenLoi']; ?></p>
    <p><span class="spann">Hạn sử dụng: </span><?php echo $gbh['HanSuDung']; ?></p>
    <p><span class="spann">Giá tiền: </span><?php echo $gbh['Gia']; ?></p>
    <p><span class="spann">Mức trách nhiệm: </span><?php echo $gbh['MucTrachNhiem']; ?></p>
    <p><span class="spann">Mức bồi thường: </span><?php echo $gbh['MucBoiThuong']; ?></p>
    <p><span class="spann">Các trường hợp không được bồi thường: </span><?php echo $gbh['CacTruongHopKhongDuocBoiThuong']; ?></p>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="IDGoiBaoHiem" value="<?php echo $gbh['IDGoiBaoHiem']; ?>" >
     
        <input type="submit" class="btn btn-danger" value="Xóa">
     
    </form>
    
    <br><br>
    <a href="<?php echo 'view.php?IDGoiBaoHiem=' . $gbh['IDGoiBaoHiem']; ?>" class="btn btn-primary" role="button"><- Quay lại</a>       

</body>
</html>

<?php
db_disconnect($db);
?>