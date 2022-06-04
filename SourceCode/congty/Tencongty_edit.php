<?php
require_once('../database/database1.php');
require_once('../session/initialize.php');
require_once('../successfully/successfully.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    if (empty($_POST['TenCongTy'])){
        $errors[] = 'Bạn cần nhập tên công ty';
    }

    if (empty($_POST['SoDienThoai'])){
        $errors[] = 'Bạn cần nhập số điện thoại';
    } 

    if (!tel($_POST['SoDienThoai'])){
        $errors[] = 'Sai định dạng số điện thoại';
    }

    if (empty($_POST['QuocGia'])){
        $errors[] = 'Bạn cần nhập Quốc gia';
    }

    if (empty($_POST['DiaChi'])){
        $errors[] = 'Bạn cần nhập địa chỉ';
    }
	
}
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){

        $CongTyBaoHiem = [];
        $CongTyBaoHiem['IDTenCongTy'] = $_POST['IDTenCongTy'];
        $CongTyBaoHiem['TenCongTy'] = $_POST['TenCongTy'];
        $CongTyBaoHiem['SoDienThoai'] = $_POST['SoDienThoai'];
        $CongTyBaoHiem['QuocGia'] = $_POST['QuocGia'];
        $CongTyBaoHiem['DiaChi'] = $_POST['DiaChi'];

        update_company($CongTyBaoHiem);
		$_SESSION['update'] = 'Cập nhật thông tin thành công';
        redirect_to('Tencongty_index.php');
    }
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
    <title>Chỉnh sửa thông tin công ty</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/error.css">
</head>
<body>
<div class="container">
    <?php include('../successfully/successfully.php'); ?>
    <?php include('../successfully/header.php'); ?>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <h1>Chỉnh sửa thông tin công ty</h1>

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
            </div>
        <?php endif; ?>

        <div class="form-group">
            <input type="hidden" id="IDTenCongTy" name="IDTenCongTy"  
            value="<?php echo isFormValidated()? $CongTyBaoHiem['IDTenCongTy']: $_POST['IDTenCongTy'] ?>">
        </div>

        <div class="form-group">
            <label for="TenCongTy">Tên công ty</label>
            <input type="text"  class="form-control" id="TenCongTy" name="TenCongTy"  
            value="<?php echo isFormValidated()? $CongTyBaoHiem['TenCongTy']: $_POST['TenCongTy'] ?>">
        </div>

        <div class="form-group">
            <label for="SoDienThoai">Số điện thoại</label>
            <input type="tel" class="form-control" id="SoDienThoai" name="SoDienThoai"  
            value="<?php echo isFormValidated()? $CongTyBaoHiem['SoDienThoai']: $_POST['SoDienThoai'] ?>">
        </div>

        <div class="form-group">
            <label for="QuocGia">Quốc gia</label>
            <input type="text" class="form-control" id="QuocGia" name="QuocGia"  
            value="<?php echo isFormValidated()? $CongTyBaoHiem['QuocGia']: $_POST['QuocGia'] ?>">
        </div>

        <div class="form-group">
            <label for="DiaChi">Địa chỉ</label>
            <input type="text" class="form-control" name="DiaChi" id="DiaChi" 
            value="<?php echo isFormValidated()? $CongTyBaoHiem['DiaChi']: $_POST['DiaChi'] ?>">
        </div>
            <input type="submit" class="btn btn-success" value="Submit">
            <input type="reset" class="btn btn-warning" value="Reset">
        
    </form><br>
    <a href="Tencongty_index.php" class="btn btn-primary" role="button"><- Quay lại</a>
</div>
<script src="../js/jquery-2.2.4.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>




