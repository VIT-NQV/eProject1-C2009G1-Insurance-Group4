<?php

require_once('../database/database1.php');
require_once('../session/initialize.php');
$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    if (empty($_POST['tendanhmuc'])){
        $errors[] = 'Bạn cần nhập tên danh mục';
    } elseif (!empty($_POST['tendanhmuc']) && strlen($_POST['tendanhmuc']) > 255){
        $errors[] = 'Tên danh mục không được vượt quá 255 kí tự';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo danh mục mới</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/error.css">
</head>
<body>
<div class="container">
    <?php include('../successfully/header.php'); ?>
    <h1>Tạo danh mục mới</h1><br>

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
            <label for="tendanhmuc">Tên danh mục</label>
            <input type="text" name="tendanhmuc" class="form-control" id="tendanhmuc" value="<?php echo isFormValidated()? '': $_POST['tendanhmuc'] ?>">
        </div>

        <br>
        <input type="submit" class="btn btn-success" value="Xong">
    </form>    

    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
            $danhmuc = [];
            $danhmuc['tendanhmuc'] = $_POST['tendanhmuc'];

            insert_danhmuc($danhmuc);

        ?>
        <h2>Danh mục mới đã được tạo thành công:</h2>
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
    <a href="Danh_muc_index.php" class="btn btn-primary" role="button"><- Quay lại</a>

</div>

    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>