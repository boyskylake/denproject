<?php session_start(); ?>
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
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style media="screen">
      .mainbox{
        font-family: 'Prompt', sans-serif;
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
          <?php include('navbar.php');?>
        </div>
      </div>
    </div>
    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div style="padding-top:30px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

          <form class="form-horizontal" action="login_check.php" method="POST">
            <div class="form-group" align="center">
                <img src="img/user2.png" alt="" width="20%" style="padding-bottom:20px"/>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">ชื่อผู้ใช้ :</label>
                  <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" value="" required autofocus autocomplete="off">
                  </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">รหัสผ่าน :</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" value="" required>
                  </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                <input type="submit" name="submit" class=" form-control btn btn-success" value="เข้าสู่ระบบ">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                <a href="register.php" class=" form-control btn btn-info">สมัครสมาชิก</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php include('footer.php');?>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
