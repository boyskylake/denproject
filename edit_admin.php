<?php session_start();?>
<?php

      include('connectdb.php');
      include('session.php');

      $id = $_GET['id'];
      $sql = "SELECT * FROM login_member WHERE id='$session_id'";
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
          <?php include('navbar_admin.php');?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">แก้ไขข้อมูลส่วนตัว Admin</h3>
          <hr>

        </div>
      </div>
    </div>
    <div id="loginbox" style="margin-top:60px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div style="padding-top:30px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
          <form class="form-horizontal" action="update_admin.php" method="post">
            <div class="form-group">
              <label class="col-sm-3 control-label">ชื่อผู้ใช้ : </label>
              <div class="col-sm-8">
                <input type="text" name="username" class="form-control" value="<?php echo $s_username; ?>" disabled="disabled" required autofocus autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">รหัสผ่าน :</label>
              <div class="col-sm-8">
                <input type="text" name="password" class="form-control" value="<?php echo $s_password; ?>" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">ชื่อ - สกุล : </label>
              <div class="col-sm-8">
                <input type="text" name="name" class="form-control" value="<?php echo $s_name; ?>" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">ที่อยู่ E-mail : </label>
              <div class="col-sm-8">
                <input type="email" name="email" class="form-control" value="<?php echo $s_email; ?>" placeholder="example@domain.com" required autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <div class="col-sm-offset-3 col-sm-8">
                <input type="submit" name="submit" class="form-control btn btn-success" value="บันทึกข้อมูล">
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
