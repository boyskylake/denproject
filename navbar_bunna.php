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
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style media="screen">
        .navbar{
          font-family: 'Prompt', sans-serif;
          font-size: 18px;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="bunna_page.php"><span class="glyphicon glyphicon-home"></span> หน้าหลัก</a>
          <!-- <a class="navbar-brand" href="bunna_page.php"><span class="glyphicon glyphicon-globe"></span> เกี่ยวกับ</a> -->

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['id'])){ ?>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                ยินดีต้อนรับเข้าสู่ระบบ <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li> -->
            <li>

              <p>
                <b>ยินดีต้อนรับคุณ : <?php echo $s_name; ?></b><br>
                <a href="data_bunna.php">ดูข้อมูลส่วนตัว</a>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
