<?php

require_once('../database/database1.php');
require_once('../session/initialize.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    if (empty($_POST['TenGoiBaoHiem'])){
        $errors[] = 'Bạn cần nhập tên gói bảo hiểm';
    } 

    if (empty($_POST['PhamViBaoHiem'])){
        $errors[] = 'Bạn cần nhập phạm vi bảo hiểm';
    } 

    if (empty($_POST['QuyenLoi'])){
        $errors[] = 'Bạn cần nhập quyền lợi';
    } 

    if (empty($_POST['HanSuDung'])){
        $errors[] = 'Bạn cần nhập hạn sử dụng';
    } 

    if (empty($_POST['Gia'])){
        $errors[] = 'Bạn cần nhập giá tiền';
    }  elseif (!empty($_POST['Gia']) && ((int)$_POST['Gia'] < 0) || ( !ctype_digit($_POST['Gia']))){
        $errors['Gia'] = 'Giá phải là số nguyên dương. Không cho phép kí tự, số âm';
    } 

    if (empty($_POST['MucTrachNhiem'])){
        $errors[] = 'Bạn cần nhập mức trách nhiệm';
    } 

    if (empty($_POST['MucBoiThuong'])){
        $errors[] = 'Bạn cần nhập mức bồi thường';
    }

    if (empty($_POST['CacTruongHopKhongDuocBoiThuong'])){
        $errors[] = 'Bạn cần nhập các trường hợp không được bồi thường';
    } 


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo gói bảo hiểm</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/error.css">
</head>
<body>
<div class="container">
    <?php include('../successfully/header.php'); ?>
    <h1>Tạo gói bảo hiểm</h1>

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
            <label for="IDTenCongTy">Tên công ty</lable>
            <select class="form-control" name="IDTenCongTy">
            <?php
                $list = find_all_CongTyBaoHiem();
                while($company = mysqli_fetch_assoc($list)){
            ?>
                <option value="<?php echo $company['IDTenCongTy'];?>" <?php if(!empty($_POST['IDTenCongTy']) && $_POST['IDTenCongTy'] == $company['IDTenCongTy']) echo 'selected'; ?>>
                    <?php echo $company['TenCongTy'];?>
                </option>
            <?php 
                }
            ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="IDDanhMuc">Tên danh mục</lable>
            <select class="form-control" name="IDDanhMuc">
            <?php
                $list = fin_all_danhmuc();
                while($danhmuc = mysqli_fetch_assoc($list)){
            ?>
                <option value="<?php echo $danhmuc['IDDanhMuc'];?>" <?php if(!empty($_POST['IDDanhMuc']) && $_POST['IDDanhMuc'] == $danhmuc['IDDanhMuc']) echo 'selected'; ?>>
                    <?php echo $danhmuc['TenDanhMuc'];?>
                </option>
            <?php 
                }
            ?>
            </select>
        </div>

        <div class="form-group">
                <label for="TenGoiBaoHiem">Tên gói bảo hiểm</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['TenGoiBaoHiem'] ?>" class="form-control" name="TenGoiBaoHiem">
        </div>

        <div class="form-group">
                <label for="PhamViBaoHiem">Phạm vi bảo hiểm</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['PhamViBaoHiem'] ?>" class="form-control" name="PhamViBaoHiem">
        </div>

        <div class="form-group">
                <label for="QuyenLoi">Quyền lợi</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['QuyenLoi'] ?>" class="form-control" name="QuyenLoi">
        </div>

        <div class="form-group">
                <label for="HanSuDung">Hạn sử dụng</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['HanSuDung'] ?>" class="form-control" name="HanSuDung">
        </div>

        <div class="form-group">
                <label for="Gia">Giá tiền</label>
                <input type="number" value="<?php echo isFormValidated()? '': $_POST['Gia'] ?>" class="form-control" name="Gia">
        </div>

        <div class="form-group">
                <label for="MucTrachNhiem">Mức trách nhiệm</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['MucTrachNhiem'] ?>" class="form-control" name="MucTrachNhiem">
        </div>

        <div class="form-group">
                <label for="MucBoiThuong">Mức bồi thường</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['MucBoiThuong'] ?>" class="form-control" name="MucBoiThuong">
        </div>

        <div class="form-group">
                <label for="CacTruongHopKhongDuocBoiThuong">Các trường hợp không được bồi thường</label>
                <input type="text" value="<?php echo isFormValidated()? '': $_POST['CacTruongHopKhongDuocBoiThuong'] ?>" class="form-control" name="CacTruongHopKhongDuocBoiThuong">
        </div>

        <input type="submit" class="btn btn-success" value="Submit">
        <input type="reset" class="btn btn-warning" value="Reset">
    </form>    

    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
            $gbh = [];
            $gbh['IDTenCongTy'] = addslashes($_POST['IDTenCongTy']);
            $gbh['IDDanhMuc'] = addslashes($_POST['IDDanhMuc']);
            $gbh['TenGoiBaoHiem'] = addslashes($_POST['TenGoiBaoHiem']);
            $gbh['PhamViBaoHiem'] = addslashes($_POST['PhamViBaoHiem']);
            $gbh['QuyenLoi'] = addslashes($_POST['QuyenLoi']);
            $gbh['HanSuDung'] = addslashes($_POST['HanSuDung']);
            $gbh['Gia'] = addslashes($_POST['Gia']);
            $gbh['MucTrachNhiem'] = addslashes($_POST['MucTrachNhiem']);
            $gbh['MucBoiThuong'] = addslashes($_POST['MucBoiThuong']);
            $gbh['CacTruongHopKhongDuocBoiThuong'] = addslashes($_POST['CacTruongHopKhongDuocBoiThuong']);

            $result = insert_gbh($gbh);

        ?>
        <h2> Đã tạo thành công gói bảo hiểm </h2>
        <ul>
        <?php 
            foreach ($_POST as $key => $value) {
                if ($key == 'submit') continue;
                if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
            }        
        ?>
        </ul>
    <?php endif; ?>
    <br><br>
    <a href="Goibaohiem_index.php" class="btn btn-primary" role="button"><- Quay lại</a>
</div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>


<?php
db_disconnect($db);
?>