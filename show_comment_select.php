<?php session_start();?>
<?php
      include('connectdb.php');
      include('session.php');

      $c_id = $_GET['c_id'];
      $sql = "SELECT * FROM comment WHERE c_id='$c_id'";
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
    <style media="screen">
    .container{
      font-family: 'Prompt', sans-serif;
      font-size: 16px;
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
          <h3 class="text-center">แสดงบทวิเคราะห์</h3>
          <hr>
          <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
              <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                ลำดับที่ : <?php echo $row['c_id']; ?><br>
                เพิ่มโดย : <?php echo $row['c_name']; ?><br>
                ชื่อหนังสือ : <?php echo $row['c_book']; ?><br>
                บทวิเคราะห์ : <?php echo $row['c_detail']; ?><br>
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
