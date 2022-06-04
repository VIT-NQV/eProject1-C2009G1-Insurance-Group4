<?php
require_once('../database/database1.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.dèault.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
        body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: rgb(0,0,0,0.5);
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 20%;
  font-family: 'time new roman'
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 100px 20px;
  height: 100%;
  font-family:'time new roman';
  font-size: 22px
}
.H{
  color: blue;
  font-family: 'time new roman';
}
.H2{
  color: black;
}
.img{
width: 100%;
}
img{
  max-height:500px;
}
ul {
list-style: none;
}
.scroll{
          height:700px;
          width:100%;
          border:solid 2px orange;
          overflow:scroll;
          overflow-x:hidden;
          overflow-y:scroll;
        }
        </style>
</head>
<body>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img class="img"  src="img/congty.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img class="img" src="img/congty1.jpg" alt="Chicago" >
    </div>

    <div class="item">
      <img class="img"  src="img/congty2.jpg" alt="New York" >
    </div>

    <div class="item">
      <img class="img"  src="img/congty3.jpg" alt="New York" >
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php  
  $Company_set = find_all_CongTyBaoHiem();
  $count = mysqli_num_rows($Company_set);
  for ($i = 0; $i < $count; $i++):
    $CongTyBaoHiem = mysqli_fetch_assoc($Company_set); 
    if($i==1){
  ?>
  <div class="demo" class="collapse in">
    <?php
      $Tencongty =  $CongTyBaoHiem['TenCongTy']; 
    ?>           
  <?php
    }
    endfor; 
    mysqli_free_result($Company_set);
  ?>

  <button class="tablink" onclick="openPage('congty', this, 'lightblue')" id="defaultOpen"><i class="fa fa-home" style="font-size:20px;color:turquoise"></i><?php
      echo $Tencongty ; 
    ?></button>
  <button class="tablink" onclick="openPage('batbuoc', this, 'lightblue')" >Bảo Hiểm Bắt Buộc</button>
  <button class="tablink" onclick="openPage('ototunguyen', this, 'lightblue')">Bảo Hiểm Oto Tự Nguyện</button>
  <button class="tablink" onclick="openPage('xemaytunguyen', this, 'lightblue')">Bảo Hiểm Xe Máy Tự Nguyện</button>
  <button class="tablink"><a href="Hompage.php" style="color: white">Back Home</a></button>
  
  <div id="congty" class="tabcontent">
    <h1 style="text-align: center; color: blue">Về Chúng Tôi</h3>
    <ul style="text-align: center; color: black">
        <li>Công ty thành lập từ năm 2002.</li><br>
        <li>Với mô hình tổ chức hoạt động quản lý theo tiêu chuẩn Iso, chuyên nghiệp, mạng lưới các công ty thành viên khắp cả nước</li><br>
        <li>Uy tín và thương hiệu đã được khẳng định qua nhiều năm có mặt trên thị truờng</li><br>
        <li>Xếp hạng năng lực tài chính B++ (Tốt) từ A.M. Best</li><br>
        <li>Top 50 Doanh nghiệp xuất sắc nhất Việt Nam năm</li><br>
        <li>Hơn 10 triệu người tin dùng.</li>
    </ul>
    <br><br>
    <h1 style="text-align: center; color: blue">Khách hàng cá nhân</h1>
    <div class="row">
      <div class="col-md-6">
        <h3 style="color: red; text-align: center">Bảo Hiểm OTO</h3>
        <p style="color: red; text-align: center"><img src="img/BaoHiem.jpg" alt=""></p> 
      </div>
      <div class="col-md-6">
        <h3 style="color: red; text-align: center">Bảo Hiểm Xe Máy</h3>        
        <p style="color: red; text-align: center"><img src="img/xemay1.jpg" alt=""></p> 
      </div>
    </div>
    
  </div>
  
  <div id="batbuoc" class="tabcontent">
  <div class="row">
    <div class="col-md-6">
      <div class="scroll">
      <?php       
        $gbh_set = fin_all_gbh();
        $count = mysqli_num_rows($gbh_set);
        for ($i = 0; $i < $count; $i++):
          $gbh = mysqli_fetch_assoc($gbh_set);
            if($i == 6){
      ?>
                      <div>
                              <ul class="list-group">
                                  <li class="list-group-item list-group-item-info"><h2 class="H2">Xe ô tô </li>
                                  <li class="list-group-item list-group-item-info"><h2 class="H2"> Tên gói bảo hiểm: </h2><?php echo "<br>".$gbh['TenGoiBaoHiem']; ?></li>
                                  <li class="list-group-item list-group-item-info"><h2 class="H2">Phạm Vi Bảo Hiểm: </h2><?php echo "<br>".$gbh['PhamViBaoHiem']; ?></li>
                                  <li class="list-group-item list-group-item-info"><h2 class="H2">Quyền Lợi:</h2> <?php echo "<br>".$gbh['QuyenLoi']; ?></li>
                                  <li class="list-group-item list-group-item-info"><h2 class="H2">Hạn Sử Dụng: </h2><?php echo "<br>".$gbh['HanSuDung']; ?></li>
                                  <li class="list-group-item list-group-item-info"><h2 class="H2">Gía: </h2><?php echo "<br>".$gbh['Gia']; ?></li>
                                  <li class="list-group-item list-group-item-info"><h2 class="H2">Mức trách nhiệm: </h2><?php echo "<br>".$gbh['MucTrachNhiem']; ?></li>
                                  <li class="list-group-item list-group-item-info"><h2 class="H2">Mức Bồi Thường: </h2><?php echo "<br>".$gbh['MucBoiThuong']; ?></li>
                                  <li class="list-group-item list-group-item-danger"><h2 class="H2">Các trường hợp không được bồi thường: </h2><?php echo "<br>".$gbh['CacTruongHopKhongDuocBoiThuong']; ?></li>
                              </ul>
                      </div>
                      <?php
            }
                          endfor;
                          mysqli_free_result($gbh_set);
                      ?>
                      </div>
    </div>
    <div class="col-md-6">
    <div class="scroll">
    <?php       
      $gbh_set = fin_all_gbh();
      $count = mysqli_num_rows($gbh_set);
      for ($i = 0; $i < $count; $i++):
        $gbh = mysqli_fetch_assoc($gbh_set);
          if($i == 7){
    ?>
                    <div>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Xe Máy </li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2"> Tên gói bảo hiểm:</h2><?php echo "<br>".$gbh['TenGoiBaoHiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Phạm Vi Bảo Hiểm: </h2><?php echo "<br>".$gbh['PhamViBaoHiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Quyền Lợi:</h2> <?php echo "<br>".$gbh['QuyenLoi']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Hạn Sử Dụng:  </h2><?php echo "<br>".$gbh['HanSuDung']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Gía: </h2><?php echo "<br>".$gbh['Gia']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Mức trách nhiệm: </h2><?php echo "<br>".$gbh['MucTrachNhiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Mức Bồi Thường: </h2><?php echo "<br>".$gbh['MucBoiThuong']; ?></li>
                                <li class="list-group-item list-group-item-danger"><h2 class="H2">Các trương hợp không được bồi thường </h2><?php echo "<br>".$gbh['CacTruongHopKhongDuocBoiThuong']; ?></li>
                            </ul>
                    </div>
                    <?php
          }
                        endfor;
                        mysqli_free_result($gbh_set);
                    ?>
                    </div>
    </div>
  </div>
  
                    
                    
  </div>
  
  <div id="xemaytunguyen" class="tabcontent">
  <div class="scroll">
  
 
    <?php       
      $gbh_set = fin_all_gbh();
      $count = mysqli_num_rows($gbh_set);
      for ($i = 0; $i < $count; $i++):
        $gbh = mysqli_fetch_assoc($gbh_set);
          if($i == 5){
    ?>
                    <div>
                            <ul class="list-group">

                                <li class="list-group-item list-group-item-info"><h2 class="H2"> Tên gói bảo hiểm: </h2><?php echo "<br>".$gbh['TenGoiBaoHiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Phạm Vi Bảo Hiểm: </h2><?php echo "<br>".$gbh['PhamViBaoHiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Quyền Lợi:</h2> <?php echo "<br>".$gbh['QuyenLoi']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Hạn Sử Dụng: </h2><?php echo "<br>".$gbh['HanSuDung']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Gía: </h2><?php echo "<br>".$gbh['Gia']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Mức trách nhiệm: </h2><?php echo "<br>".$gbh['MucTrachNhiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Mức Bồi Thường: </h2><?php echo "<br>".$gbh['MucBoiThuong']; ?></li>
                                <li class="list-group-item list-group-item-danger"><h2 class="H2">Các trương hợp không được bồi thường: </h2><?php echo "<br>".$gbh['CacTruongHopKhongDuocBoiThuong']; ?></li>
                            </ul>
                    </div>
                    <?php
          }
                        endfor;
                        mysqli_free_result($gbh_set);
                    ?> 
            </div>
  </div>
  
  <div id="ototunguyen" class="tabcontent">
  <div class="scroll">
  <?php
                        $gbh_set = fin_all_gbh();
                        $count = mysqli_num_rows($gbh_set);
                        for ($i = 0; $i < $count; $i++):
                            $gbh = mysqli_fetch_assoc($gbh_set);
                            if($i == 4){
                    ?>
                    <div>
                            <ul class="list-group">

                                <li class="list-group-item list-group-item-info"><h2 class="H2"> Tên gói bảo hiểm: </h2><?php echo "<br>".$gbh['TenGoiBaoHiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Phạm Vi Bảo Hiểm: </h2><?php echo "<br>".$gbh['PhamViBaoHiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Quyền Lợi:</h2> <?php echo "<br>".$gbh['QuyenLoi']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Hạn Sử Dụng: </h2><?php echo "<br>".$gbh['HanSuDung']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Gía: </h2><?php echo "<br>".$gbh['Gia']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Mức trách nhiệm: </h2><?php echo "<br>".$gbh['MucTrachNhiem']; ?></li>
                                <li class="list-group-item list-group-item-info"><h2 class="H2">Mức Bồi Thường: </h2><?php echo "<br>".$gbh['MucBoiThuong']; ?></li>
                                <li class="list-group-item list-group-item-danger"><h2 class="H2">Các trương hợp không được bồi thường: </h2><?php echo "<br>".$gbh['CacTruongHopKhongDuocBoiThuong']; ?></li>
                            </ul>
                    </div>
                    <?php
                            }
                        endfor;
                        mysqli_free_result($gbh_set);
                    ?>
  </div>
  </div>
  <footer >
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  
  <div class="row">
    <div class="col-md-4">
      <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-square" style="font-size:24px"></i> facebook.com</a> 
    </div>
    <div class="col-md-4">
      <a href="https://www.google.com/" target="_blank"><i class="fa fa-google-plus-square" style="font-size:24px"></i> google.com</a> 
    </div>
    <div class="col-md-4">
      <a href="http://skype.com/" target="_blank"><i class="fa fa-skype" style="font-size:24px"></i>skype.com</a> 
    </div>
  </div>
    Liên hệ với chúng tôi: <a href="  https://www.google.com/maps/place/79+Nguy%E1%BB%85n+Ch%C3%AD+Thanh,+Th%C3%A0nh+C%C3%B4ng,+Ba+%C4%90%C3%ACnh,
                                    +H%C3%A0+N%E1%BB%99i,+Vietnam/@21.0231355,105.8080516,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab68a13f6f13:0xe863dd0d1f1b45fd
                                    !8m2!3d21.0231355!4d105.8102403" target="_blank"><i class="fa fa-map-marker" style="font-size:36px;color:red"></i>79 Nguyễn Chí Thanh</a> <br>
    Hotline: 0382158174 <br>
  
    Chúng tôi sẽ nỗ lực cố gắng phát triển, lắng nghe và luôn luôn bên bạn.  <br>
    Cảm ơn bạn đã tin tưởng chúng tôi <br>
    &copy; 2021 Copyright
  </div>

</footer>
        <script>
          function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
        </script>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>src="js/owl.carousel.js"</script>

</body>
</html>