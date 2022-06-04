<?php
require_once('../database/database1.php');
require_once('../session/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tên công ty</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>

<div class="container">
    <?php include('../successfully/successfully.php'); ?>
    <?php include('../successfully/header.php'); ?>
    <h1>Tên công ty</h1><br>
    <a href="Tencongty_new.php" class="btn btn-info" role="button">Tạo công ty mới</a>
    <div class="table-responsive"> 
        <table class="table table-bordered table-condensed">
            <tr>
                <th>Tên công ty</th>
                <th>Số điện thoại</th>
                <th>Quốc gia</th>
                <th>Địa chỉ</th>
                <th class="center">Chỉnh sửa</th>
                <th class="center">Xóa</th>
            </tr>
            <?php
            $Company_set = find_all_CongTyBaoHiem();
            $count = mysqli_num_rows($Company_set);
            for ($i = 0; $i < $count; $i++):
                $CongTyBaoHiem = mysqli_fetch_assoc($Company_set); 
            ?>
                <tr>
                    <td><?php echo $CongTyBaoHiem['TenCongTy']; ?></td>
                    <td><?php echo $CongTyBaoHiem['SoDienThoai']; ?></td>
                    <td><?php echo $CongTyBaoHiem['QuocGia']; ?></td>
                    <td><?php echo $CongTyBaoHiem['DiaChi']; ?></td>
                    <td class="center"><a href="<?php echo 'Tencongty_edit.php?IDTenCongTy='.$CongTyBaoHiem['IDTenCongTy']; ?> "class="glyphicon glyphicon-pencil center"></a></td>
                    <td class="center"><a href="<?php echo 'Tencongty_delete.php?IDTenCongTy='.$CongTyBaoHiem['IDTenCongTy']; ?> "class="glyphicon glyphicon-trash center"></a></td>
                </tr>
            <?php 
            endfor; 
            mysqli_free_result($Company_set);
            ?>
        </table>
    </div>
</div>

    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php
db_disconnect($db);
?>

