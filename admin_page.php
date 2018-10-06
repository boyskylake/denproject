<?php session_start();?>
<?php

    include('connectdb.php');
    include('session.php');


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
        #TEST{
          background-color: blue;
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
          <?php include('navbar_admin.php');?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-xs-6 col-sm-3 placeholder">
            <div class="list-group">
            <p class="list-group-item active">Admin</p>
            <a href="show_member.php" class="list-group-item">จัดการข้อมูลสมาชิก</a>
            <a href="show_comment.php" class="list-group-item">ดูบทวิเคราะห์</a>
            <a href="show_rating.php" class="list-group-item">จำนวนการเข้าดูหนังสือ / Rating</a>
            <a href="member_comment.php" class="list-group-item">สถิติสมาชิกที่เข้ามารีวิว</a>
            <a href="show_problem.php" class="list-group-item">รายงานปัญหาการใช้งานระบบ</a>
            <a href="show_proplem_block.php" class="list-group-item">รายงานปัญหาระงับการใช้งานระบบ</a>
            <a href="show_comment_top.php" class="list-group-item">แสดงบทวิเคราะห์ 10 อันดับสูงสุด</a>
            <a href="rating_top_foradmin.php" class="list-group-item">10 Rating สูงสุด</a>
          </div>
        </div>
        <div class="c0l-sm-12">
          <h1 class="text-center">ยินดีต้อนรับ Admin</h1>
        </div>
        </div>
      </div>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
