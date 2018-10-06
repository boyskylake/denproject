<?php
    include('connectdb.php');

    $q = "SELECT * FROM tbl_book INNER JOIN tbl_book_type ON tbl_book.type_id=tbl_book_type.type_id";
    $result = mysqli_query($dbcon, $q);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <?php include('font.php'); ?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        input[type=number]{
          width:40px;
          text-align:center;
          color:red;
          font-weight:600;
        }
        table{
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
          <?php include('navbar_check.php');?>
        </div>
      </div>
  </div>
    <div class="container"><font style="font-family: 'Prompt', sans-serif;">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading"> จัดการข้อมูลหนังสือ
              <a href="add_book.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> เพิ่มหนังสือ</a>
          </div>
        </div>
      </div>
    </div></font>
        <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
            <table class="table table-striped">
              <tr>
                <th>

                  <div class="container">
                    <div class="col-xs-12 col-sm-4 col-md-6">

                        <div class="col-xs-3">
                          <img src="image/01/<?php echo $row['b_img1']; ?>" width="130px" class="img-rounded"/>
                        </div>
                      <div class="col-xs-3">
                        <img src="image/02/<?php echo $row['b_img2']; ?>" width="130px" class="img-rounded"/>
                      </div>
                      <div class="col-xs-3">
                        <img src="image/03/<?php echo $row['b_img3']; ?>" width="130px" class="img-rounded"/>
                      </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6" align="left"><font style="font-family: 'Prompt', sans-serif;">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                      <font color="#0000FF">ลำดับที่ : </font>
                      <?php echo $row['id']; ?><br>
                      <font color="#0000FF">ชื่อหนังสือ : </font>
                      <?php echo $row['b_name']; ?><br>
                      <font color="#0000FF">ประเภท : </font>
                      <?php echo $row['type_name']; ?><br>
                      <font color="#0000FF">รหัส : </font>
                      <?php echo $row['b_dcall']; ?><br>
                      <font color="#0000FF">ผู้แต่ง : </font>
                      <?php echo $row['b_author']; ?><br>
                      <font color="#0000FF">ครั้งที่พิมพ : </font>
                      <?php echo $row['b_print']; ?><br>
                      <font color="#0000FF">พิมพลักษณ์ : </font>
                      <?php echo $row['b_imprint']; ?><br>
                      <font color="#0000FF">ลักษณะกายภาพ : </font>
                      <?php echo $row['b_physical']; ?><br>
                      <font color="#0000FF">หัวเรื่อง : </font>
                      <?php echo $row['b_heading']; ?><br>
                      <font color="#0000FF">ISBN : </font>
                      <?php echo $row['b_isbn']; ?><br>
                      <font color="#0000FF">รายละเอียด : </font>
                      <?php echo $row['b_detail']; ?><br>
                      <font color="#0000FF">เนื้อหาสังเขป : </font>
                      <?php echo $row['b_briefly']; ?><br>
                    </div>
                  </div>

                      <div class="panel panel-info" align="right">
                        <div class="panel-heading"> จัดการข้อมูลหนังสือ
                          <a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> แก้ไขข้อมูล</a>
                          <a href="delete_book.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูล จริงหรือ ?');"><span class="glyphicon glyphicon-trash"> ลบข้อมูล</a>
                      </div>
                    </div>
                  </div></font>
                </th>
              </tr>
            </table>
        <?php }?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
