<?php
require_once('../database/database1.php');
require_once('../session/initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    delete_company($_POST['IDTenCongTy']);
	$_SESSION['delete'] = 'Xóa thành công';
    redirect_to('Tencongty_index.php');
} else {
    if(!isset($_GET['IDTenCongTy'])) {
        redirect_to('Tencongty_index.php');
    }
    $id = $_GET['IDTenCongTy'];
    $CongTyBaoHiem = find_company_by_id($id);
	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Xóa Công ty</title>
    <style>
        .spann {
            font-weight: bold;
            font-size: large;
        }
    </style>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <?php include('../successfully/header.php'); ?>
    <h2>Bạn có muốn xóa công ty này không?</h2>

    <p><span class="spann">Tên công ty: </span><?php echo $CongTyBaoHiem['TenCongTy']; ?></p>
    <p><span class="spann">Số điện thoại: </span><?php echo $CongTyBaoHiem['SoDienThoai']; ?></p>
	<p><span class="spann">Quốc gia: </span><?php echo $CongTyBaoHiem['QuocGia']; ?></p>
	<p><span class="spann">Địa chỉ: </span><?php echo $CongTyBaoHiem['DiaChi']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="IDTenCongTy" value="<?php echo $CongTyBaoHiem['IDTenCongTy']; ?>" >
     
        <input type="submit" class="btn btn-danger" value="Xóa">
     
    </form><br>
    <a href="Tencongty_index.php" class="btn btn-primary" role="button"><- Quay lại</a>

</div>
</body>
</html>


<?php
db_disconnect($db);
?>