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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    checkFrom();
    if (isFormValidated()){
        $gbh = [];
        $gbh['IDGoiBaoHiem'] = addslashes($_POST['IDGoiBaoHiem']);
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


        update_gbh($gbh);
        $_SESSION['update'] = 'Cập nhật thông tin thành công';
        redirect_to('Goibaohiem_index.php');
    }
} else {
    if (!isset($_GET['IDGoiBaoHiem'])) {
        redirect_to('Goibaohiem_index.php');
    }
    $id = $_GET['IDGoiBaoHiem'];
    $gbh = find_gbh_by_id($id);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa gói bảo hiểm</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/error.css">
</head>
<body>
<div class="container">
    <?php include('../successfully/header.php'); ?>
    <h1>Chỉnh sửa gói bảo hiểm</h1>

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

        <input type="hidden" name="IDGoiBaoHiem" 
        value='<?php echo isFormValidated()? $gbh['IDGoiBaoHiem']: $_POST['IDGoiBaoHiem'] ?>'>

<!--  -->
        <div class="form-group">
            <label for="IDTenCongTy">Tên công ty</lable>
            <select class="form-control" name="IDTenCongTy">
            <?php
                $list = find_all_CongTyBaoHiem();
                while($congty = mysqli_fetch_assoc($list)){
            ?>

            <option value='<?php echo $congty['IDTenCongTy']?>' 
                <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        if($congty['IDTenCongTy']== $gbh['IDTenCongTy']) echo "selected";
                    } else {
                        if ($_POST['IDTenCongTy']== $congty['IDTenCongTy']) echo "selected";
                    }
                ?>>
            <?php echo $congty['TenCongTy'];?></option>

            <?php 
                }
            ?>
            </select>
        </div>
<!--  -->
        <div class="form-group">
            <label for="IDDanhMuc">Tên danh mục</lable>
            <select class="form-control" name="IDDanhMuc">
            <?php
                $list = fin_all_danhmuc();
                while($danhmuc = mysqli_fetch_assoc($list)){
            ?>
            <option value='<?php echo $danhmuc['IDDanhMuc']?>' 
                <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        if($danhmuc['IDDanhMuc']== $gbh['IDDanhMuc']) echo "selected";
                    } else {
                        if ($_POST['IDDanhMuc']== $danhmuc['IDDanhMuc']) echo "selected";
                    }
                ?>>
            <?php echo $danhmuc['TenDanhMuc'];?></option>

            <?php 
                }
            ?>
            </select>
        </div>
<!--  -->
        <div class="form-group">
            <label for="TenGoiBaoHiem">Tên gói bảo hiểm</label>
            <input type="text" class="form-control" name="TenGoiBaoHiem" id="TenGoiBaoHiem" 
            value="<?php echo isFormValidated()? $gbh['TenGoiBaoHiem']: $_POST['TenGoiBaoHiem'] ?>">
            <br>
        </div>

        <div class="form-group">
            <label for="PhamViBaoHiem">Phạm vi bảo hiểm</label>
            <input type="text" class="form-control" name="PhamViBaoHiem" id="PhamViBaoHiem" 
            value="<?php echo isFormValidated()? $gbh['PhamViBaoHiem']: $_POST['PhamViBaoHiem'] ?>">
            <br>
        </div>

        <div class="form-group">
            <label for="QuyenLoi">Quyền lợi</label>
            <input type="text" class="form-control" name="QuyenLoi" id="QuyenLoi" 
            value="<?php echo isFormValidated()? $gbh['QuyenLoi']: $_POST['QuyenLoi'] ?>">
            <br>
        </div>

        <div class="form-group">
            <label for="HanSuDung">Hạn sử dụng</label>
            <input type="text" class="form-control" name="HanSuDung" id="HanSuDung" 
            value="<?php echo isFormValidated()? $gbh['HanSuDung']: $_POST['HanSuDung'] ?>">
            <br>
        </div>

        <div class="form-group">
            <label for="Gia">Giá tiền</label>
            <input type="number" class="form-control" name="Gia" id="Gia" 
            value="<?php echo isFormValidated()? $gbh['Gia']: $_POST['Gia'] ?>">
            <br>
        </div>

        <div class="form-group">
            <label for="MucTrachNhiem">Mức trách nhiệm</label>
            <input type="text" class="form-control" name="MucTrachNhiem" id="MucTrachNhiem" 
            value="<?php echo isFormValidated()? $gbh['MucTrachNhiem']: $_POST['MucTrachNhiem'] ?>">
            <br>
        </div>

        <div class="form-group">
            <label for="MucBoiThuong">Mức bồi thường</label>
            <input type="text" class="form-control" name="MucBoiThuong" id="MucBoiThuong" 
            value="<?php echo isFormValidated()? $gbh['MucBoiThuong']: $_POST['MucBoiThuong'] ?>">
            <br>
        </div>

        <div class="form-group">
            <label for="CacTruongHopKhongDuocBoiThuong">Các trường hợp không được bồi thường</label>
            <input type="text" class="form-control" name="CacTruongHopKhongDuocBoiThuong" id="CacTruongHopKhongDuocBoiThuong" 
            value="<?php echo isFormValidated()? $gbh['CacTruongHopKhongDuocBoiThuong']: $_POST['CacTruongHopKhongDuocBoiThuong'] ?>">
            <br>
        </div>

        <input type="submit" class="btn btn-success" value="Xong">
        <input type="reset" class="btn btn-warning" value="Xóa các thông tin đã nhập">
    </form>

    <br><br>
    <a href="<?php echo 'view.php?IDGoiBaoHiem=' . $gbh['IDGoiBaoHiem']; ?>" class="btn btn-primary" role="button"><- Quay lại</a>       

</body>
</html>

<?php
db_disconnect($db);
?>


