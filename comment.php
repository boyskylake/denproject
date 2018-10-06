<?php session_start();?>
<?php
    include('connectdb.php');
    include('session.php');
    // include('session_book.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_book WHERE id='$id'";
    $result = mysqli_query($dbcon, $sql);
    $row_book = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <!-- ckeditor-->
    <!-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
    <style media="screen">
    .container{
      font-family: 'Prompt', sans-serif;
      font-size: 16px;
    }
    #loginbox{
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
          <?php include('navbar.php');?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">เพิ่มบทวิเคราะห์</h3>
          <hr>
        </div>
      </div>
    </div>

    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div style="padding-top:30px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
          <form class="form-horizontal" action="comment_db.php" method="post">
            <div class="form-group">
              <div class="col-sm-8">
                <label>ชื่อหนังสือ : </label>
                <?php echo $row_book['b_name']; ?>
                <input type="hidden" name="c_name" value="<?php echo $row_user['name']; ?>">
                <input type="hidden" name="c_book" value="<?php echo $row_book['b_name']; ?>">
                <input type="hidden" name="c_id_book" value="<?php echo $row_book['id']; ?>">
                <textarea name="c_detail" id="c_detail" class="ckeditor" cols="59" rows="8" required></textarea>
                <div class="form-group text-right">
                  <label >เพิ่มโดย : </label>
                  <?php echo $s_name; ?><br>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-8" align="left">
                <input type="submit" name="submit" class="btn btn-success" value="บันทึกข้อมูล">
                <input type="reset" name="reset" class="btn btn-danger" value="ยกเลิก">
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
