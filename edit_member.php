<?php
    session_start();
    include('connectdb.php');
    include('session.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM login_member WHERE id='$id'";
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
        font-size: 14px;

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
          <h3 class="text-center">จัดการข้อมูลสมาชิก</h3>
          <hr>
          <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
              <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form class="form-horizontal" id="edit" action="update_member.php" method="post">

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Username :</label>
                    <div class="col-sm-8">
                      <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" disabled="disabled" required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password :</label>
                    <div class="col-sm-8">
                      <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" disabled="disabled" required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">E-mail :</label>
                    <div class="col-sm-8">
                      <input type="email" name="password" class="form-control" value="<?php echo $row['email']; ?>" disabled="disabled" required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name :</label>
                    <div class="col-sm-8">
                      <input type="email" name="name" class="form-control" value="<?php echo $row['name']; ?>" disabled="disabled" required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">สถานะ :</label>
                    <div class="col-sm-8">
                      <ul>
                        <li>0 = สมาชิกทั่วไป</li>
                        <li>1 = ผู้ดูแลระบบ</li>
                        <li>2 = บรรณารักษ์</li>
                        <li>3 = สมาชิกที่ถูกระงับใช้งานชั่วคราว</li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                      <label>
                        <input type="radio" name="status" value="0" id="status_0" <?php if($row['status'] == 0) echo "checked"; ?>> 0
                      </label>
                      <label>
                        <input type="radio" name="status" value="1" id="status_1" <?php if($row['status'] == 1) echo "checked"; ?>> 1
                      </label>
                      <label>
                        <input type="radio" name="status" value="2" id="status_2" <?php if($row['status'] == 2) echo "checked"; ?>> 2
                      </label>
                      <label>
                        <input type="radio" name="status" value="3" id="status_3" <?php if($row['status'] == 3) echo "checked"; ?>> 3
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="col-sm-offset-3 col-sm-8">
                      <input type="reset" name="reset" class="btn btn-danger" value="ยกเลิก">
                      <input type="submit" name="submit" class="btn btn-success" value="บันทึกข้อมูล">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
