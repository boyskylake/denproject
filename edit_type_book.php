<?php
    include('connectdb.php');

    $type_id = $_GET['type_id'];
    $q = "SELECT * FROM tbl_book_type WHERE type_id='$type_id'";
    $result = mysqli_query($dbcon, $q);
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
    <style type="text/css">
        input[type=number]{
          width:40px;
          text-align:center;
          color:red;
          font-weight:600;
        }
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
          <h3 class="text-center">แก้ไขข้อมูลประเภทหนังสือ</h3>
          <hr>
          <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
              <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form class="" action="update_typebook.php" method="post">
                  <div class="form-group">
                    <label>ชื่อประเภท</label>
                    <input type="text" name="type_name" class="form-control" value="<?php echo $row['type_name']; ?>" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>วันที่เพิ่ม</label>
                    <input type="date" name="datetime" class="form-control" value="<?php echo $row['datetime']; ?>" required>
                  </div>

                  <input type="hidden" name="type_id" value="<?php echo $row['type_id']; ?>">
                  <input type="reset" name="reset" class="btn btn-danger" value="ยกเลิก">
                  <input type="submit" name="submit" class="btn btn-success" value="บันทึกข้อมูล">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
