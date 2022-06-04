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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="cssproject/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
      .chinhanh{
        width: 100%;
      }
      .search{
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
      }
    </style>
</head>
<body>
<!-- The overlay -->
  <div id="Mot" class="overlay">
    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!-- Overlay content -->
    <div class="overlay-content">
      <?php
                $danhmuc_set = fin_all_danhmuc();
                $count = mysqli_num_rows($danhmuc_set);
                for ($i = 0; $i < $count; $i++):
                    $danhmuc = mysqli_fetch_assoc($danhmuc_set);
            ?>


            <a href="#" onclick="Chuyen()"><span style="font-family: Time New Roman; font-size: 30px;"><?php echo $danhmuc['TenDanhMuc']; ?></span> </a>
            <?php
                endfor;
                mysqli_free_result($danhmuc_set);
            ?>
    </div>
  </div>

  <div id="Hai" class="overlay">
    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="DongNav()">&times;</a>
    <!-- Overlay content -->
    <div class="overlay-content">

    <?php 
      $congty = array("CongTyBaoHiemHaiAu.php","CongTyBaoHiemBaoViet.php","#");
      $socongty = count($congty);
      echo $socongty;
      $Company_set = find_all_CongTyBaoHiem();
      $count = mysqli_num_rows($Company_set);
      for ($i = 0; $i < $count; $i++):
          $CongTyBaoHiem = mysqli_fetch_assoc($Company_set);
            if($i == 0){
      ?>
        <a href="CongTyBaoHiemHaiAu.php"> <?php echo $CongTyBaoHiem['TenCongTy']."<br>"; ?></a>
      <?php
        }
        if($i == 1){
      ?>
        <a href="CongTyBaoHiemBaoViet.php"> <?php echo $CongTyBaoHiem['TenCongTy']."<br>"; ?></a>
      <?php
        }
        if($i > 1){
      ?>
      <a href="#"> <?php echo $CongTyBaoHiem['TenCongTy']."<br>"; ?></a>
      <?php
        };
          endfor; 
        mysqli_free_result($Company_set);
      ?>    
      
            
          
           
    </div>
  </div>
  <!-- Use any element to open/show the overlay navigation menu -->
  <nav class="navbar ">
    <!-- navbar-inverse | navbar-default -->
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><i class="fa fa-home" style="font-size:28px;color:turquoise"></i><span style="font-family: Time New Roman; font-size: 30px;">Cộng đồng bảo hiểm</span></a>
        </div>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav"><a href="#" onclick="openNav()"><i class="fa fa-eercast" style="font-size:24px; color: rgb(65, 65, 243)"></i><span style="font-family: Time New Roman; font-size: 30px;">Danh Mục  </span></a></li>  
            <li class="nav"><a href="#" onclick="MoNav()"><i class="fa fa-eercast" style="font-size:24px; color: rgb(65, 65, 243)"></i><span style="font-family: Time New Roman; font-size: 30px;">Công Ty Bảo Hiểm </span></a></li>
            <li class="nav">
              <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <input class="search" type="text" placeholder="Search.." name="search" >
                <button class="search" type="submit"><i class="fa fa-search"></i></button>
              </form>
              
            </li>
          </ul>
        </div>
  </nav>

  <br>
  <?php include("search/search.php") ?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
          <div class="item active">
              <img src="img/BaoHiem1.jpg"  alt="Los Angeles" class="chinhanh">
              <div class="top-left">The darkest hour is before dawn.</div>
          </div>
          <div class="item">
              <img src="img/xemay1.jpg" alt="Chicago" class="chinhanh">
              <div class="top-left">Ask any loser you get the answer: Success is thanks to luck.</div>
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
    Chúng tôi sẽ nỗ lực cố gắng phát triển, lắng nghe và luôn luôn bên bạn.  <br>
    Cảm ơn bạn đã tin tưởng chúng tôi <br>
    &copy; 2021 Copyright
  </div>


</footer>

    
        <script>
            function openNav() {
              document.getElementById("Mot").style.width = "50%";
            }

            function Chuyen() {
              document.getElementById("Hai").style.width = "50%";
              document.getElementById("Mot").style.width = "0%";
            }
            
            
            function closeNav() {
              document.getElementById("Mot").style.width = "0%";
            }
            function MoNav() {
              document.getElementById("Hai").style.width = "50%";
            }
            
            
            function DongNav() {
              document.getElementById("Hai").style.width = "0%";
            }

            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#myList li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                return false;
              });
            });
          });
            
        </script>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>src="js/owl.carousel.js"</script>

</body>
</html>