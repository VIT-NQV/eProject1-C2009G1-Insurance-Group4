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
    <title>Tên danh mục</title>
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>

<div class="container back">
    <?php include('../successfully/successfully.php'); ?>
    <?php include('../successfully/header.php'); ?>
    <h1>Tên danh mục</h1><br>
    <a href="Danh_muc_new.php" class="btn btn-info" role="button">Tạo danh mục mới</a>
    <div class="table-responsive"> 
        <table class="talbe table-bordered max table-condensed">
            <tr>

                <th>Tên danh mục</th>
                <th class="center">Chỉnh sửa</th>
                <th class="center">Xóa</th>
            </tr>
            <?php
                $danhmuc_set = fin_all_danhmuc();
                $count = mysqli_num_rows($danhmuc_set);
                for ($i = 0; $i < $count; $i++):
                    $danhmuc = mysqli_fetch_assoc($danhmuc_set);
            ?>
            <tr>
            <td><?php echo $danhmuc['TenDanhMuc']; ?></td>
            <td class="center"><a href="<?php echo 'Danh_muc_edit.php?IDDanhMuc=' . $danhmuc['IDDanhMuc']; ?>" class="glyphicon glyphicon-pencil center"></a></td>
            <td class="center"><a href="<?php echo 'Danh_muc_delete.php?IDDanhMuc=' . $danhmuc['IDDanhMuc']; ?>" class="glyphicon glyphicon-trash center"></a></td>
            </tr>
            <?php
                endfor;
                mysqli_free_result($danhmuc_set);
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

