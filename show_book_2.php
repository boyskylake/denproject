<?php
    include('connectdb.php');

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
        th{
          background-color: #12B3EB;
        }
        td{
          background-color: #DBF9BA;
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
      <h3 class="text-center">แสดงรายการหนังสือ</h3>
      <br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <a href="add_book.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> เพิ่มหนังสือ</a>
            <a href="addtype_book.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> เพิ่มประเภทหนังสือ</a>
            <br><br>

              <div class="table-responsive">
                <table id="example" class="display table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับที่</th>
                      <th class="text-center">ประเภท</th>
                      <th class="text-center">ชื่อหนังสือ</th>
                      <th class="text-center">รหัสหนังสือ</th>
                      <th class="text-center">ดูเพิ่มเติม</th>
                      <th class="text-center">จัดการข้อมูลสังเขป</th>
                      <th class="text-center">แก้ไข</th>
                      <th class="text-center">ลบ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                    <tr>
                      <td class="text-center"><?php echo $row['id']; ?></td>
                      <td><?php echo $row['type_name']; ?></td>
                      <td><?php echo $row['b_name']; ?></td>
                      <td><?php echo $row['b_dcall']; ?></td>
                      <td class="text-center">
                          <input type="button" name="view" value="view" class="btn btn-primary btn-xs view_data" id="<?php echo $row['id']; ?>">
                      </td>
                      <td class="text-center">
                        <a href="book_briefly.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">จัดการข้อมูลสังเขป</a>
                      </td>
                      <td class="text-center">
                      <a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span> แก้ไข</a>
                      </td>
                      <td class="text-center">
                      <a href="delete_book.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบข้อมูล จริงหรือ ?');"><span class="glyphicon glyphicon-trash"> ลบ</a>
                      </td>
                    </tr>

                  <?php } ?>
                  </tbody>
                </table>
                <?php include('viewmodal.php'); ?>
              </div>
            </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.view_data').click(function(){
        var uid=$(this).attr("id");
        $.ajax({
          url:"select_show.php",
          method:"post",
          data:{id:uid},
          success:function(data){
            $('#detail').html(data);
            $('#dataModal').modal('show');
          }
        });
      });
    });
  </script>

</html>
