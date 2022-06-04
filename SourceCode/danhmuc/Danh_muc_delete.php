<?php 
require_once('../database/database1.php');
require_once('../session/initialize.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    delete_danhmuc($_POST['IDdanhmuc']);
    $_SESSION['delete'] = 'Xóa thành công';
    redirect_to('Danh_muc_index.php');
} else {
    if (!isset($_GET['IDDanhMuc'])) {
        redirect_to('Danh_muc_index.php');
    }
    $id = $_GET['IDDanhMuc'];
    $danhmuc = find_danhmuc_by_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Xóa danh mục</title>
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
    <h2>Bạn có muốn xóa danh mục này không?</h2>
    <p><span class="spann">Tên danh mục: </span><?php echo $danhmuc['TenDanhMuc']; ?></p>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="IDdanhmuc" value="<?php echo $danhmuc['IDDanhMuc']; ?>" >
     
        <input type="submit" class="btn btn-danger" value="Xóa">
     
    </form>
    
    <br><br>
    <a href="Danh_muc_index.php" class="btn btn-primary" role="button"><- Quay lại</a> 
</body>
</html>

<?php
db_disconnect($db);
?>