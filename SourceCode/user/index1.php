<?php

require_once('../database/database1.php');
require_once('../session/initialize.php');

?>
<html>
<head>
    <meta charset="utf-8" />
    <title>index</title>
    <style>
        body{
            float: center;
        }
    </style>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container">

<?php include('../successfully/successfully.php'); ?>
<?php include('../successfully/header.php'); ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
        <div class="item active">
            <img class="photo" src="../photo/bh1.png" class="img-responsive" alt="car 1" >
        </div>

        <div class="item">
            <img class="photo" src="../photo/car7.png" class="img-responsive" alt="car 3" >
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


</div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php
db_disconnect($db);
?>