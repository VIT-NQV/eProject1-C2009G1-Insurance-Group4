<?php
require_once('../session/initialize.php');
?>

<nav class="navbar navbar-default header">
    <div class="container-fluid">
        <div class="navbar-header">
        <a href="../user/index1.php"><img src="../photo/logo_home.png" alt="aaa" height="50px" width="150px"></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="../congty/Tencongty_index.php">Công ty</a></li>
            <li><a href="../danhmuc/Danh_muc_index.php">Danh mục</a></li>
            <li><a href="../goibaohiem/Goibaohiem_index.php">Gói bảo hiểm</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php include('../user/user.php'); ?></a></li>
           <li><a href="../user/logout.php"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
        </ul>
    </div>
</nav>



