<?php session_start();?>
<?php
    include('connectdb.php');
    include('session.php');

    $sql = "SELECT * FROM tbl_book INNER JOIN tbl_book_type ON tbl_book.type_id=tbl_book_type.type_id";
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
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

    <style media="screen">
      input[type=number]{
        width:40px;
        text-align:center;
        color:red;
        font-weight:600;
      }
      .container{
        font-family: 'Prompt', sans-serif;
      }
      th{
        background-color: #12B3EB;
      }
      td{
        background-color: #DBF9BA;
      }
      #view{
        background-color: #CEDA8F;
      }
      #rating{
        background-color: #34D7DA;
      }
      #rating_count{
        background-color: #DAC334;
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
          <h3 class="text-center">แสดงรายการจำนวน การเข้าดูหนังสือ / Rating </h3>
          <hr>
          <table id="example" class="display table table-bordered">
            <thead>
              <tr>
                <th class="text-center">ลำดับที่</th>
                <th class="text-center">ประเภท</th>
                <th class="text-center">ชื่อหนังสือ</th>
                <th class="text-center">จำนวนการดู</th>
                <th class="text-center">Rating</th>
                <th class="text-center">เฉลี่ย</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
              <tr>
                <td class="text-center"><?php echo $row['id']; ?></td>
                <td class="text-center"><?php echo $row['type_name']; ?></td>
                <td><?php echo $row['b_name']; ?></td>
                <td class="text-center" id="view"><?php echo $row['p_view']; ?></td>
                <td class="text-center" id="rating"><?php echo $row['rating']; ?></td>
                <td class="text-center" id="rating_count"><?php echo $row['rating_count']; ?></td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
