<?php
require_once('../database/database1.php');
require_once('../session/initialize.php');
$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){	
    if (empty($_POST['TenCongTy'])){
        $errors[] = 'Bạn cần nhập tên công ty';
    }

    if (empty($_POST['SoDienThoai'])){
        $errors[] = 'Bạn cần nhập số điện thoại';
    } else if (!tel($_POST['SoDienThoai'])){
        $errors[] = 'Sai định dạng số điện thoại';
    }
    
    if (empty($_POST['QuocGia'])){
        $errors[] = 'Bạn cần nhập Quốc gia';
    }

    if (empty($_POST['DiaChi'])){
        $errors[] = 'Bạn cần nhập địa chỉ';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Tạo công ty mới</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/error.css">
</head>
<body>
<div class="container">

    <?php include('../successfully/header.php'); ?>
    <h1>Tạo Công ty mới</h1><br>
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
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
                <label for="TenCongTy">Tên công ty</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['TenCongTy'] ?>" class="form-control" name="TenCongTy">
        </div>

        <div class="form-group">
                <label for="SoDienThoai">Số điện thoại</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['SoDienThoai'] ?>" class="form-control" name="SoDienThoai">
        </div>

        <div class="form-group">
                <label for="QuocGia">Quốc gia</label>
                <input type="text" name="QuocGia"  value="<?php echo isFormValidated()? '': $_POST['QuocGia'] ?>" class="form-control" name="QuocGia">
        </div>

        <div class="form-group">
                <label for="DiaChi">Địa chỉ</label>
                <input type="text" name="DiaChi"  value="<?php echo isFormValidated()? '': $_POST['DiaChi'] ?>" class="form-control" name="DiaChi">
        </div>
		

        <input type="submit" class="btn btn-success" value="Submit">
        <input type="reset" class="btn btn-warning" value="Reset">
    
    </form><br>

    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $CongTyBaoHiem = [];
        $CongTyBaoHiem['TenCongTy'] = $_POST['TenCongTy'];
        $CongTyBaoHiem['SoDienThoai'] = $_POST['SoDienThoai'];
        $CongTyBaoHiem['QuocGia'] = $_POST['QuocGia'];
        $CongTyBaoHiem['DiaChi'] = $_POST['DiaChi'];
        $result = insert_company($CongTyBaoHiem);
        $newCongTyBaoHiem = mysqli_insert_id($db);
        ?>
        <div>
            <h2>Đã tạo công ty mới thành công</h2>
            <?php
                echo 'Tên công ty' . ' : ' . $CongTyBaoHiem['TenCongTy'] . '<br>';
                echo 'Số điện thoại' . ' : ' .  $CongTyBaoHiem['SoDienThoai'] . '<br>';
                echo 'Quốc Gia' . ' : ' .  $CongTyBaoHiem['QuocGia'] . '<br>';
                echo 'Địa chỉ' . ' : ' .  $CongTyBaoHiem['DiaChi'] . '<br>'; 
            ?>
        </div>
    <?php endif; ?>
    <br><br>
    <a href="Tencongty_index.php" class="btn btn-primary" role="button"><- Quay lại</a>
</div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>