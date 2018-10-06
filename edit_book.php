<?php
    include('connectdb.php');

    $id = $_GET['id'];
    $qedit = "SELECT * FROM tbl_book WHERE id='$id'";
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
    <title>แก้ไขข้อมูลหนังสือ</title>

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
          <h4>แก้ไขข้อมูลหนังสือ</h4>
          <hr>
            <form class="" action="update_book.php" method="post" enctype="multipart/form-data">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>ประเภทสินค้า</label>
                      <?php
                          $q = "SELECT * FROM tbl_book_type";
                          $result = mysqli_query($dbcon, $q);
                      ?>
                      <select class="" name="type_id" required>
                        <!-- <option value="">---ประเภทหนังสือ---</option> -->
                        <?php while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                          if($row[0] == $rowedit['type_id']){
                            echo "<option value='$row[0]' selected>$row[1]</option>";
                          }else{
                            echo "<option value='$row[0]'>$row[1]</option>";
                          }
                      }?>
                    </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ชื่อหนังสือ</label>
                      <input type="text" name="b_name" class="form-control" value="<?php echo $rowedit['b_name']; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>รหัสหนังสือ</label>
                      <input type="text" name="b_dcall" class="form-control" value="<?php echo $rowedit['b_dcall']; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ผู้แต่ง</label>
                      <input type="text" name="b_author" class="form-control" value="<?php echo $rowedit['b_author']; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ครั้งที่พิมพ์</label>
                      <input type="text" name="b_print" class="form-control" value="<?php echo $rowedit['b_print']; ?>" required>
                      <br>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>พิมพลักษณ์</label>
                      <input type="text" name="b_imprint" class="form-control" value="<?php echo $rowedit['b_imprint']; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ลักษณะทางกายภาพ</label>
                      <input type="text" name="b_physical" class="form-control" value="<?php echo $rowedit['b_physical']; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>หัวเรื่อง</label>
                      <input type="text" name="b_heading" class="form-control" value="<?php echo $rowedit['b_heading']; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ISBN</label>
                      <input type="text" name="b_isbn" class="form-control" value="<?php echo $rowedit['b_isbn']; ?>" required>
                      <br>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <label>เนื้อหาสังเขป</label>
                      <textarea name="b_briefly" rows="8" cols="80" class="form-control" value="" required><?php echo $rowedit['b_briefly']; ?></textarea>
                    <br>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ภาพที่ 1 หน้าปก</label>
                      <input type="file" name="b_img1" class="form-control btn btn-info" value=""><br>
                      <img src="image/01/<?php echo $rowedit['b_img1']; ?>" width="80%" class="img-rounded thumbnail">

                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ภาพที่ 2 สารบัญ 1 </label>
                      <input type="file" name="b_img2" class="form-control btn btn-info" value="" ><br>
                      <img src="image/02/<?php echo $rowedit['b_img2']; ?>" width="80%" class="img-rounded thumbnail">

                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-3">
                      <label>ภาพที่ 3 สารบัญ 2 </label>
                      <input type="file" name="b_img3" class="form-control btn btn-info" value=""><br>
                      <img src="image/03/<?php echo $rowedit['b_img3']; ?>" width="80%" class="img-rounded thumbnail">
                      <br><br>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-md-6">
                      <label>วันที่เพิ่ม</label>
                      <input type="date" name="date" class="form-control" value="<?php echo $rowedit['date']; ?>" required>
                      <br>
                    </div>
                  </div><br><br>

                  <div class="form-group">
                    <div class="col-sm-12">

                      <input type="hidden" name="old_file1" value="<?php echo $rowedit['b_img1']; ?>">
                      <input type="hidden" name="old_file2" value="<?php echo $rowedit['b_img2']; ?>">
                      <input type="hidden" name="old_file3" value="<?php echo $rowedit['b_img3']; ?>">

                      <input type="hidden" name="id" value="<?php echo $rowedit['id']; ?>">
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
