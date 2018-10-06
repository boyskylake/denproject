<?php
    include('connectdb.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>เพิ่มข้อมูลหนังสือ</title>


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
          <h3 class="text-center">เพิ่มข้อมูลหนังสือ</h3>
            <form class="" action="add_book_db.php" method="post" enctype="multipart/form-data">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>ประเภทหนังสือ</label>
                      <?php
                          $q = "SELECT * FROM tbl_book_type";
                          $result = mysqli_query($dbcon, $q);
                      ?>
                      <select class="" name="type_id" required>
                        <option value="">---ประเภทหนังสือ---</option>
                        <?php while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                          echo "<option value='$row[0]'>$row[1]</option>";
                      }?>
                      </select>
                    </div>
                  </div>
                  <br><br>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ชื่อหนังสือ</label>
                      <input type="text" name="b_name" class="form-control" value="" required autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>รหัสหนังสือ</label>
                      <input type="text" name="b_dcall" class="form-control" value="" required autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ผู้แต่ง</label>
                      <input type="text" name="b_author" class="form-control" value="" required autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ครั้งที่พิมพ์</label>
                      <input type="text" name="b_print" class="form-control" value="" required autocomplete="off">
                      <br>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>พิมพลักษณ์</label>
                      <input type="text" name="b_imprint" class="form-control" value="" required autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ลักษณะทางกายภาพ</label>
                      <input type="text" name="b_physical" class="form-control" value="" required autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>หัวเรื่อง</label>
                      <input type="text" name="b_heading" class="form-control" value="" required autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ISBN</label>
                      <input type="text" name="b_isbn" class="form-control" value="" required autocomplete="off">
                      <br>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <label>เนื้อหาสังเขป</label>
                      <textarea name="b_briefly" rows="8" cols="80" class="form-control" required></textarea>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <h3 class="text-center">รูปภาพประกอบ</h3>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>หน้าปก</label>
                      <input type="file" name="b_img1" class="form-control btn btn-info" value="" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>สารบัญ 1 </label>
                      <input type="file" name="b_img2" class="form-control btn btn-info" value="" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>สารบัญ 2 </label>
                      <input type="file" name="b_img3" class="form-control btn btn-info" value="" required>
                      <br>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-md-6">
                      <label>วันที่เพิ่ม</label>
                      <input type="date" name="date" class="form-control" value="" required>
                      <br>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <a href="show_book_2.php" class="btn btn-danger">ยกเลิก</a>
                      <input type="submit" name="submit"class="btn btn-success" value="เพิ่มข้อมูล">
                      <hr>
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
