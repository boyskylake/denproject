<?php session_start();?>
<?php

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
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style media="screen">
        .container{
          font-family: 'Prompt', sans-serif;
          font-size: 18px;
        }
        #loginbox{
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
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">แสดงข้อมูลส่วนตัวสมาชิก</h3>
          <hr>

        </div>
      </div>
    </div>
    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div style="padding-top:30px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-3 control-label">ชื่อผู้ใช้ :</label>
              <div class="col-sm-8">
                <input type="text" name="username" class="form-control" value="<?php echo $s_username; ?>" disabled="disabled" required autofocus autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">รหัสผ่าน :</label>
              <div class="col-sm-8">
                <input type="password" name="password" class="form-control" value="<?php echo $s_password; ?>" disabled="disabled" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">ชื่อ - สกุล :</label>
              <div class="col-sm-8">
                <input type="text" name="username" class="form-control" value="<?php echo $s_name; ?>" disabled="disabled" required autofocus autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">ที่อยู่ E-mail :</label>
              <div class="col-sm-8">
                <input type="text" name="username" class="form-control" value="<?php echo $s_email; ?>" disabled="disabled" required autofocus autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-8">
                <a href="member_edit.php?id=<?php echo $session_id; ?>" class="form-control btn btn-success">แก้ไขข้อมูลส่วนตัว</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
