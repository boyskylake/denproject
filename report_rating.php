<?php session_start();?>
<?php
    include('connectdb.php');
    include('session.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_book INNER JOIN tbl_book_type ON tbl_book.type_id=tbl_book_type.type_id WHERE id='$id'";
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
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">แสดงข้อมูล Rating</h3>
          <hr>
          <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
              <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form class="form-horizontal" action="report_db.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">ชื่อหนังสือ :</label>
                    <div class="col-sm-8">
                      <input type="text" name="r_book" class="form-control" value="<?php echo $row['b_name']; ?>" readonly required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">ประเภทหนังสือ :</label>
                    <div class="col-sm-8">
                      <input type="text" name="r_type" class="form-control" value="<?php echo $row['type_name']; ?>" readonly required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">เข้าดู :</label>
                    <div class="col-sm-8">
                      <input type="text" name="r_view" class="form-control" value="<?php echo $row['p_view']; ?>" readonly required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Rating :</label>
                    <div class="col-sm-8">
                      <input type="text" name="r_rating" class="form-control" value="<?php echo $row['rating']; ?>" readonly required autofocus autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">เฉลี่ย :</label>
                    <div class="col-sm-8">
                      <input type="text" name="r_av" class="form-control" value="<?php echo $row['rating_count']; ?>" readonly required autofocus autocomplete="off">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                      <input type="submit" name="submit" class=" form-control btn btn-success" value="รายงาน">
                    </div>
                  </div> -->
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
