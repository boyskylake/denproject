<?php
    include('connectdb.php');

    $id = $_POST['id'];
    $sql = "SELECT * FROM tbl_book INNER JOIN tbl_book_type ON tbl_book.type_id=tbl_book_type.type_id WHERE id='$id'";
    $result = mysqli_query($dbcon, $sql);

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

  </head>
  <body>
    <div class="table table-responsive">
      <table class="table table-bordered">
        <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
          <tr>
            <td width="20%"><label>ลำดับที่</label></td>
            <td><?php echo $row['id']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>ชื่อหนังสือ</label></td>
            <td><?php echo $row['b_name']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>ประเภท</label></td>
            <td><?php echo $row['type_name']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>รหัส</label></td>
            <td><?php echo $row['b_dcall']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>ผู้แต่ง</label></td>
            <td><?php echo $row['b_author']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>ครั้งที่พิมพ์</label></td>
            <td><?php echo $row['b_print']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>พิมพลักษณ์</label></td>
            <td><?php echo $row['b_imprint']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>ลักษณะกายภาพ</label></td>
            <td><?php echo $row['b_physical']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>หัวเรื่อง</label></td>
            <td><?php echo $row['b_heading']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>ISBN</label></td>
            <td><?php echo $row['b_isbn']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>เนื้อหาสังเขป</label></td>
            <td><?php echo $row['b_briefly']; ?></td>
          </tr>
          <tr>
            <td width="20%"><label>ภาพ 1</label></td>
            <td><img src="image/01/<?php echo $row['b_img1']; ?>" width="50px" /></td>
          </tr>
          <tr>
            <td width="20%"><label>ภาพ 2</label></td>
            <td><img src="image/02/<?php echo $row['b_img2']; ?>" width="50px" /></td>
          </tr>
          <tr>
            <td width="20%"><label>ภาพ 3</label></td>
            <td><img src="image/03/<?php echo $row['b_img3']; ?>" width="50px" /></td>
          </tr>
          <tr>
            <td width="20%"><label>วันที่เพิ่ม</label></td>
            <td><?php echo $row['date']; ?></td>
          </tr>
        <?php }?>
      </table>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
