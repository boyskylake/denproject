<?php session_start(); ?>
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
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <a class="navbar-brand" href="block_page.php"><span class="glyphicon glyphicon-home"></span> หน้าหลัก</a>
                <a class="navbar-brand" href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-phone-alt"></span> ติดต่อ</a>

              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <?php if(isset($_SESSION['id'])){ ?>
                  <li>
                    <p>
                      <b>ยินดีต้อนรับคุณ : <?php echo $s_name; ?></b><br>
                      <!-- <a href="data_member.php">ดูข้อมูลส่วนตัว</a> -->
                      <a href="logout.php" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการออกจากระบบ จริงหรือ ?');">ออกจากระบบ</a>
                    </p>
                  </li>
                <?php }else { ?>
                  <li>
                      <a href="login.php" >เข้าสู่ระบบ</a>
                  </li>
                  <li>
                      <a href="register.php" >สมัครสมาชิก</a>
                  </li>
                  <?php } ?>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">แจ้งปัญหาการเข้าใช้งานระบบไม่ได้</h3>
          <hr>
        </div>
      </div>
    </div>
    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div style="padding-top:30px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
          <div class="col-sm-12">
            <label>ชื่อ : </label>
            <?php echo $s_name; ?><br>
            <label>E-mail : </label>
            <?php echo $s_email;['b_name']; ?>
          </div>
        </div>
      </div>
    </div>
    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div style="padding-top:30px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
          <form class="form-horizontal" action="problem_block_db.php" method="post">
            <div class="form-group">
              <label class="col-sm-3 control-label">รายละเอียด :</label>
              <div class="col-sm-8">
                <input type="hidden" name="pb_name" value="<?php echo $row_user['name']; ?>">
                <input type="hidden" name="pb_email" value="<?php echo $row_user['email']; ?>">
                <textarea name="pb_detail" id="pb_detail" cols="40" rows="6" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-8">
                <input type="reset" name="reset" class="btn btn-danger" value="ยกเลิก">
                <input type="submit" name="submit" class="btn btn-success" value="แจ้งปัญหา">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?php include('footer.php');?>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
