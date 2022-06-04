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
          font-family: 'time new roman';
        }
        .navbar {
          overflow: hidden;
          background-color: rgb(0,0,0,0.3);
          position: fixed;
          top: 0;
          width: 100%;
        }

        /* Style tab links */
        .tablink {
          background-color: rgb(0,0,0,0.3);
          color: white;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          font-size: 17px;
          width: 20%;
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
          font-size: 22px;
          color: white;
        }
        .H{
          color: blue;
          font-family: 'time new roman';
          color: red;
        }
        body{
          background-image: url(img/tamkhien.png);
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
<?php  
  $Company_set = find_all_CongTyBaoHiem();
  $count = mysqli_num_rows($Company_set);
  for ($i = 0; $i < 1; $i++):
    $CongTyBaoHiem = mysqli_fetch_assoc($Company_set); 
  ?>
  <div class="demo" class="collapse in">
    <?php
      $Tencongty =  $CongTyBaoHiem['TenCongTy']; 
    ?>           
  <?php 
    endfor; 
    mysqli_free_result($Company_set);
  ?>
  <div class="navbar">
    <button class="tablink" onclick="openPage('congty', this, 'lightblue')" id="defaultOpen"><i class="fa fa-home" style="font-size:20px;color:turquoise"></i><span style="font-size: 18px;"><?php
        echo $Tencongty ; 
      ?> </span></button>
    <button class="tablink" onclick="openPage('batbuoc', this, 'lightblue')" ><span >Bảo Hiểm Bắt Buộc</span></button>
    <button class="tablink" onclick="openPage('ototunguyen', this, 'lightblue')"><span>Bảo Hiểm Oto Tự Nguyện</span></button>
    <button class="tablink" onclick="openPage('xemaytunguyen', this, 'lightblue')"><span >Bảo Hiểm Xe Máy Tự Nguyện</span></button>
    <button class="tablink"><a href="Hompage.php" style="color: white">Back Home</a></button>  
  </div>
  
    <div>
     
      <img src="img/tieude.png" alt="" style="width:100%">
    </div>
    


  <div id="congty" class="tabcontent">
  <h3 class = "H">GIỚI THIỆU VỀ BẢO HIỂM HẢI ÂU</h3>
  <ul>
    <li>Doanh nghiệp Bảo hiểm số 1 Việt Nam từ 2014</li>
    <li>Doanh nghiệp Bảo hiểm duy nhất được trao tặng danh hiệu Anh hùng Lao động</li>
    <li>Xếp hạng năng lực tài chính B++ (Tốt) từ A.M. Best</li>
    <li>Top 50 Doanh nghiệp xuất sắc nhất Việt Nam</li>
    <li>Hiện tại hơn 14 triệu người tin dùng và đăng kí.</li>
  </ul>
  <h3 class = "H">Tiếp nhận yêu cầu xử lý bồi thường của Hải Âu:</h3>
  <span>Khi tiếp nhận yêu cầu xử lý bồi thường nêu trên của Quý khách, cán bộ tiếp nhận yêu cầu sẽ:</span>
  <ul>
    <li>Ghi nhận một số thông tin cơ bản của quý khách.</li>
    <li>Chuyển tiếp thông tin của Quý khách đến bộ phận xử lý bồi thường.</li>
    <li>Ngoài ra, cán bộ tiếp nhận cũng sẽ cung cấp cho Quý khách thông tin đầu mối xử lý bồi thường tại đơn vị để Quý khách liên hệ trực tiếp.</li>
  </ul>
  <h3 class = "H">Giám định tổn thất:</h3>
    <img src="img/Hai.png" alt="" style="width:100%">
    <span>Ngay khi nhận được thông báo tổn thất, Cán bộ Giám định Bồi thường sẽ đến hiện trường tai nạn/sự cố để nắm bắt thông tin và 
    điều tra tai nạn tại hiện trường, trừ một số trường hợp:</span> 
    <ul>
      <li>Do điều kiện khách quan không thể tới hiện trường để giám định;</li>
      <li>Tổn thất đơn giản dễ xác định nguyên nhân và mức độ thiệt hại;</li>
      <li>Vụ tai nạn đã được Cảnh sát giao thông giải quyết theo quy định của pháp luật.</li>
    </ul> 
    <span>Ở bước này, Cán bộ Giám định bồi thường của Hải Âu sẽ hướng dẫn Quý khách phối hợp thu thập và hoàn thiện hồ sơ Giám định tổn thất.</span>
  <h3>Lựa chọn phương án và khắc phục tổn thất</h3>
    <span>Trong trường hợp thiệt hại về tài sản, các phương án khắc phục hậu quả thiệt hại có thể áp dụng gồm: Tiến hành sửa chữa (với các tổn thất có thể sửa chữa), Bồi thường bằng 
    tiền trên cơ sở giá trị thiệt hại thực tế, và bồi thường toàn bộ.</span>
    <br>
    <h3 class = "H">Sửa chữa:</h3> 
    <ul>
      <li>Đối với những trường hợp sửa chữa đơn giản, sau khi giám định Quý khách có thể mang xe đi sửa, tuy nhiên trước khi sửa chữa Quý khách vẫn phải cung cấp trước báo giá để thống nhất chi phí 
      và phương án sửa chữa với Bảo Minh.</li>
      <li>Đối với tổn thất có nhiều yếu tố phức tạp, các bên khó thống nhất được giá cả sửa chữa hoặc tổn thất 
      có giá trị lớn: Bảo Minh sẽ tiến hành đấu thầu sửa chữa, giám định thiệt hại bổ sung (nếu có).</li>
    </ul>
    Trường hợp xe cần sửa chữa, Cán bộ Giám định Bồi thường sẽ hướng dẫn Quý khách lựa chọn Đơn vị sửa chữa.
    <br><br><br>
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
              if($i == 2){
        ?>
        <div>
        <ul class="list-group">
          <li class="list-group-item list-group-item-info"><h2 class="H2">Xe ô tô </li>
          <li class="list-group-item list-group-item-info"><h2 class="H2"> Tên gói bảo hiểm: </h2><?php echo "<br>".$gbh['TenGoiBaoHiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Phạm Vi Bảo Hiểm: </h2><?php echo "<br>".$gbh['PhamViBaoHiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Quyền Lợi:</h2> <?php echo "<br>".$gbh['QuyenLoi']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Hạn Sử Dụng:: </h2><?php echo "<br>".$gbh['HanSuDung']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Giá: </h2><?php echo "<br>".$gbh['Gia']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Mức trách nhiệm: </h2><?php echo "<br>".$gbh['MucTrachNhiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Mức bồi thường: </h2><?php echo "<br>".$gbh['MucBoiThuong']; ?></li>
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
                if($i == 3){
          ?>
          <div>
            <ul class="list-group">
              <li class="list-group-item list-group-item-info"><h2 class="H2">Xe Máy </li>
              <li class="list-group-item list-group-item-info"><h2 class="H2"> Tên gói bảo hiểm: </h2><?php echo "<br>".$gbh['TenGoiBaoHiem']; ?></li>
              <li class="list-group-item list-group-item-info"><h2 class="H2">Phạm Vi Bảo Hiểm: </h2><?php echo "<br>".$gbh['PhamViBaoHiem']; ?></li>
              <li class="list-group-item list-group-item-info"><h2 class="H2">Quyền Lợi:</h2> <?php echo "<br>".$gbh['QuyenLoi']; ?></li>
              <li class="list-group-item list-group-item-info"><h2 class="H2">Hạn Sử Dụng:: </h2><?php echo "<br>".$gbh['HanSuDung']; ?></li>
              <li class="list-group-item list-group-item-info"><h2 class="H2">Giá: </h2><?php echo "<br>".$gbh['Gia']; ?></li>
              <li class="list-group-item list-group-item-info"><h2 class="H2">Mức trách nhiệm: </h2><?php echo "<br>".$gbh['MucTrachNhiem']; ?></li>
              <li class="list-group-item list-group-item-info"><h2 class="H2">Mức bồi thường: </h2><?php echo "<br>".$gbh['MucBoiThuong']; ?></li>
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
  </div>
  
      
    
                    
  </div>
  
  <div id="xemaytunguyen" class="tabcontent">
    <div class="scroll">
      <?php       
        $gbh_set = fin_all_gbh();
        $count = mysqli_num_rows($gbh_set);
        for ($i = 0; $i < $count; $i++):
          $gbh = mysqli_fetch_assoc($gbh_set);
            if($i == 1){
      ?>
      <div>
        <ul class="list-group">
          <li class="list-group-item list-group-item-info"><h2 class="H2">Tên gói bảo hiểm: </h2><?php echo "<br>".$gbh['TenGoiBaoHiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Phạm Vi Bảo Hiểm: </h2><?php echo "<br>".$gbh['PhamViBaoHiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Quyền Lợi:</h2> <?php echo "<br>".$gbh['QuyenLoi']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Hạn Sử Dụng:: </h2><?php echo "<br>".$gbh['HanSuDung']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Giá: </h2><?php echo "<br>".$gbh['Gia']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Mức trách nhiệm: </h2><?php echo "<br>".$gbh['MucTrachNhiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Mức bồi thường: </h2><?php echo "<br>".$gbh['MucBoiThuong']; ?></li>
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
  
  <div id="ototunguyen" class="tabcontent">
    <div class="scroll">
      <?php
      $gbh_set = fin_all_gbh();
      $count = mysqli_num_rows($gbh_set);
      for ($i = 0; $i < 1; $i++):
        $gbh = mysqli_fetch_assoc($gbh_set);
      ?>
      <div>
        <ul class="list-group">
          <li class="list-group-item list-group-item-info"><h2 class="H2">Tên gói bảo hiểm: </h2><?php echo "<br>".$gbh['TenGoiBaoHiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Phạm Vi Bảo Hiểm: </h2><?php echo "<br>".$gbh['PhamViBaoHiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Quyền Lợi:</h2> <?php echo "<br>".$gbh['QuyenLoi']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Hạn Sử Dụng:: </h2><?php echo "<br>".$gbh['HanSuDung']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Giá: </h2><?php echo "<br>".$gbh['Gia']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Mức trách nhiệm: </h2><?php echo "<br>".$gbh['MucTrachNhiem']; ?></li>
          <li class="list-group-item list-group-item-info"><h2 class="H2">Mức bồi thường: </h2><?php echo "<br>".$gbh['MucBoiThuong']; ?></li>
          <li class="list-group-item list-group-item-danger"><h2 class="H2">Các trường hợp không được bồi thường: </h2><?php echo "<br>".$gbh['CacTruongHopKhongDuocBoiThuong']; ?></li>
        </ul>
    </div>
    <?php
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
    <div >
      
    </div>
  </div>
    <span style="color: white">
    Liên hệ với chúng tôi: <a href="https://www.google.com/maps/place/285+%C4%90%E1%BB%99i+C%E1%BA%A5n,+V%C4%A9nh+Ph%C3%BA,+Ba+%C4%90%C3%ACnh,+H%C3%A0+N%E1%BB%99i+100000,+Vietnam/@21.0354242,105.8197733,16.96z/data=!4m5!3m4!1s0x3135ab0d127a01e7:0xab069cd4eaa76ff2!8m2!3d21.0357568!4d105.8189851" target="_blank"><i class="fa fa-map-marker" style="font-size:36px;color:red"></i>285 Đội Cấn</a> <br>
    Hotline: 085 8834 201 <br>
    Chúng tôi sẽ nỗ lực cố gắng phát triển, lắng nghe và luôn luôn bên bạn.  <br>
    Cảm ơn bạn đã tin tưởng chúng tôi  <br>
    &copy; 2021 Copyright
    </span>
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