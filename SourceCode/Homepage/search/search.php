<?php if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $search = $_POST['search'];
    $haiau = "Gói bảo hiểm Hải Âu";
    $baoviet = "Gói bảo hiểm Bảo Việt";
    $congtyhaiau = "Công ty bảo hiểm Hải Âu";
    $congtybaoviet = "Công ty bảo hiểm Bảo Việt";
    if(strlen(strstr($haiau, $search)) > 0 || strlen(strstr($baoviet, $search)) > 0
      || strlen(strstr($congtyhaiau, $search)) > 0  || strlen(strstr($congtybaoviet, $search)) > 0){
  ?>
  <ul class="list-group" id="myList">
    <li class="list-group-item"><a href="CongTyBaoHiemBaoViet.php">Gói bảo hiểm Bảo Việt</a></li>
    <li class="list-group-item"><a href="CongTyBaoHiemBaoViet.php">Công ty bảo hiểm Bảo Việt</a></li>
    <li class="list-group-item"><a href="CongTyBaoHiemHaiAu.php">Công ty bảo hiểm Hải Âu</a></li>
    <li class="list-group-item"><a href="CongTyBaoHiemHaiAu.php">Gói bảo hiểm Hải Âu</a></li>
  </ul>
  <?php
    }else{
  ?>
  <ul class="list-group" id="myList">
    <li class="list-group-item"><i class="fa fa-warning" style="font-size:24px"></i>Bạn ơi, bạn nhập lại đi. :(</li>
  </ul>
  <?php
    }
  }
  ?>

  