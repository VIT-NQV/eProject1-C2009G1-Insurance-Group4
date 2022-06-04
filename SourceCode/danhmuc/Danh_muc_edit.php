<?php 
require_once('../database/database1.php');
require_once('../session/initialize.php');
require_once('../successfully/successfully.php');

$errors = [];

function isFormValidated() {
    global $errors;
    return count($errors) == 0;
}

function checkFrom(){
    global $errors;
    if (empty($_POST['tendanhmuc'])){
        $errors[] = 'Bạn cần nhập tên danh mục';
    } elseif (!empty($_POST['tendanhmuc']) && strlen($_POST['tendanhmuc']) > 255){
        $errors[] = 'Tên danh mục không được vượt quá 255 kí tự';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    checkFrom();
    if (isFormValidated()){
        $danhmuc = [];
        $danhmuc['IDDanhMuc'] = $_POST['IDdanhmuc'];
        $danhmuc['TenDanhMuc'] = $_POST['tendanhmuc'];

        update_danhmuc($danhmuc);
        $_SESSION['update'] = 'Cập nhật thông tin thành công';
        redirect_to('Danh_muc_index.php');
    }
} else {
    if (!isset($_GET['IDDanhMuc'])) {
        redirect_to('Danh_muc_index.php');
    }
    $id = $_GET['IDDanhMuc'];
    $danhmuc = find_danhmuc_by_id($id);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Danh mục</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/error.css">
</head>
<body>
<div class="container">
    <?php include('../successfully/header.php'); ?>
    <h1>Chỉnh sửa Danh mục</h1>

    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
        <div class="error">
            <span> Hãy sửa các lỗi sau: </span>
            <ul>
                <?php
                foreach ($errors as $key => $value){
                    if (!empty($value)){
                        echo '<li>', $value, '</li>';
                    }
                }
                ?>
            </ul>
        </div><br><br>
    <?php endif; ?>
    
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

        <div class="form-group">
            <input type="hidden" name="IDdanhmuc" class="form-control"
            value='<?php echo isFormValidated()? $danhmuc['IDDanhMuc']: $_POST['IDdanhmuc'] ?>'>
        </div >
        
        <div class="form-group">
        <label for="tendanhmuc">Tên danh mục</label>
            <input type="text" name="tendanhmuc" id="tendanhmuc" class="form-control" placeholder="Nhập tên danh mục"
            value="<?php echo isFormValidated()? $danhmuc['TenDanhMuc']: $_POST['tendanhmuc'] ?>">
        </div>

        
        <br><br>
        <input type="submit" class="btn btn-success" value="Xong">
        <input type="reset" class="btn btn-warning" value="Xóa các thông tin đã nhập">
    </form>

    <br><br>
    <a href="Danh_muc_index.php" class="btn btn-primary" role="button"><- Quay lại</a>
</div>
</body>
</html>

<?php
db_disconnect($db);
?>