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
    <title>Gói bảo hiểm</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/table.css">
    <style>
        th{
            text-align:center;
        }
    </style>
</head>
<body>

<div class="container">
    <?php include('../successfully/successfully.php'); ?>
    <?php include('../successfully/header.php'); ?>
    <h1>Gói bảo hiểm</h1><br>
    <a href="Goibaohiem_new.php" class="btn btn-info" role="button">Tạo gói bảo hiểm mới</a>
    <div class="table-responsive"> 
        <table class="talbe table-bordered table-condensed">
            <tr>
                <th>Tên công ty</th>
                <th>Tên danh mục</th>
                <th>Tên gói bảo hiểm</th>
                <th>Phạm vi bảo hiểm</th>
                <th>Quyền lợi</th>
                <th>Hạn sử dụng</th>
                <th>Giá tiền</th>
                <th>Mức trách nhiệm</th>
                <th>Mức bồi thường</th>
                <th>Các trường hợp không được bồi thường</th>
                <th>Xem chi tiết</th>
            </tr>
            <?php
                $gbh_set = find_all_gbh_full();
                $count = mysqli_num_rows($gbh_set);
                for ($i = 0; $i < $count; $i++):
                    $gbh = mysqli_fetch_assoc($gbh_set);
            ?>
            <tr>
                <td class="dot"><?php echo $gbh['TenCongTy']; ?></td>
                <td class="dot"><?php echo $gbh['TenDanhMuc']; ?></td>
                <td class="dot"><?php echo $gbh['TenGoiBaoHiem']; ?></td>
                <td class="dot"><?php echo $gbh['PhamViBaoHiem']; ?></td>
                <td class="dot"><?php echo $gbh['QuyenLoi']; ?></td>
                <td class="dot"><?php echo $gbh['HanSuDung']; ?></td>
                <td class="dot"><?php echo $gbh['Gia']; ?></td>
                <td class="dot"><?php echo $gbh['MucTrachNhiem']; ?></td>
                <td class="dot"><?php echo $gbh['MucBoiThuong']; ?></td>
                <td class="dot"><?php echo $gbh['CacTruongHopKhongDuocBoiThuong']; ?></td>
                <td class="center"><a href="<?php echo 'view.php?IDGoiBaoHiem=' . $gbh['IDGoiBaoHiem']; ?>" class="glyphicon glyphicon-eye-open"></a></td>
            </tr>
        <?php
            endfor;
            mysqli_free_result($gbh_set);
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

