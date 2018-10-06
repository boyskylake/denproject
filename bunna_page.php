<?php
    session_start();
    include('connectdb.php');
    include('session.php');

    $sql = "SELECT * FROM login_member";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">

    <style type="text/css">
        input[type=number]{
          width:40px;
          text-align:center;
          color:red;
          font-weight:600;
        }
        .container{
          font-family: 'Prompt', sans-serif;
          font-size: 18px;
        }

    </style>

  </head>
  <body>
    <div class="container">
      <div class="row">
          <?php include('banner.php');?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php include('navbar_bunna.php');?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-xs-6 col-sm-3 placeholder">
            <div class="list-group">
            <p class="list-group-item active">บรรณารักษ์</p>
            <a href="show_book_2.php" class="list-group-item">จัดการข้อมูลหนังสือ</a>
            <a href="show_rating_top.php" class="list-group-item">แสดงจำนวนการเข้าดู และ Rating</a>
            <a href="show_com_bunna.php" class="list-group-item">ดูบทวิเคราะห์</a>
            <a href="rating_top.php" class="list-group-item">10 Rating สูงสุด</a>
          </div>
        </div>
        <div class="c0l-sm-12">
          <h1 class="text-center">ยินดีต้อนรับ บรรณารักษ์</h1>
        </div>
        </div>
      </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
