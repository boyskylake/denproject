<?php
    include('connectdb.php');

    $id = $_GET['id'];

    $qedit = "SELECT * FROM tbl_book INNER JOIN tbl_book_type ON tbl_book.type_id=tbl_book_type.type_id WHERE id='$id'";
    $qresult = mysqli_query($dbcon, $qedit);

    $rowedit = mysqli_fetch_array($qresult, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>จัดการข้อมูลสังเขปหนังสือ</title>

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
          font-size: 18px;
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
          <h3 class="text-center">จัดการข้อมูลสังเขปหนังสือ</h3>
            <form class="" action="update_brieflt.php" method="post" enctype="multipart/form-data">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="container">
                    <font color="#0000FF">ประเภทหนังสือ :</font>
                      <?php echo $rowedit['type_name']; ?><br>
                    <font color="#0000FF">ชื่อหนังสือ :</font>
                      <?php echo $rowedit['b_name']; ?><br>
                      <font color="#0000FF">รหัสหนังสือ : </font>
                        <?php echo $rowedit['b_dcall']; ?><br>
                      <font color="#0000FF">ผู้แต่ง : </font>
                        <?php echo $rowedit['b_author']; ?><br>
                      <font color="#0000FF">ครั้งที่พิมพ์ : </font>
                        <?php echo $rowedit['b_print']; ?><br>
                      <font color="#0000FF">พิมพลักษณ์ : </font>
                        <?php echo $rowedit['b_imprint']; ?><br>
                      <font color="#0000FF">ลักษณะทางกายภาพ : </font>
                        <?php echo $rowedit['b_physical']; ?><br>
                      <font color="#0000FF">หัวเรื่อง : </font>
                        <?php echo $rowedit['b_heading']; ?><br>
                      <font color="#0000FF">ISBN : </font>
                        <?php echo $rowedit['b_isbn']; ?><br><br>
                        <label>วันที่เพิ่ม : </label>
                        <?php echo $rowedit['date']; ?>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="col-xs-6 col-sm-3 placeholder">
                    <p>ภาพที่ 1 หน้าปก</p>
                    <img src="image/01/<?php echo $rowedit['b_img1']; ?>" width="80%" class="img-rounded thumbnail">
                  </div>
                  <div class="col-xs-6 col-sm-3 placeholder">
                    <p>ภาพที่ 2 สารบัญ 1</p>
                    <img src="image/02/<?php echo $rowedit['b_img2']; ?>" width="80%" class="img-rounded thumbnail">
                  </div>
                  <div class="col-xs-6 col-sm-3 placeholder">
                    <p>ภาพที่ 3 สารบัญ 2</p>
                    <img src="image/03/<?php echo $rowedit['b_img3']; ?>" width="80%" class="img-rounded thumbnail">
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <h3>เนื้อหาสังเขป</h3>
                      <textarea name="b_briefly" rows="8" cols="80" class="form-control" value="" required><?php echo $rowedit['b_briefly']; ?></textarea>
                    <br>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="hidden" name="id" value="<?php echo $rowedit['id']; ?>">
                      <!-- <input type="reset" name="reset" class="btn btn-danger" value="ยกเลิก"> -->
                      <a href="show_book_2.php" class="btn btn-danger">ยกเลิก</a>
                      <input type="submit" name="submit"class="btn btn-primary" value="บันทึกข้อมูล">
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
