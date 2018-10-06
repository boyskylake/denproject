<?php
    session_start();
    include('connectdb.php');
    include('session.php');

    $sql = "SELECT * FROM login_member";
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
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

    <style media="screen">
      .container{
        font-family: 'Prompt', sans-serif;
      }
      th{
        background-color: #12B3EB;
      }
      td{
        background-color: #DBF9BA;
      }
      #status{
        background-color: #C0810C;
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
          <h3 class="text-center">ข้อมูลสมาชิก</h3>
          <hr>
          <p>
            สถานะ :
            0 = สมาชิกทั่วไป ,
            1 = ผู้ดูแลระบบ ,
            2 = บรรณารักษ์ ,
            3 = สมาชิกที่ถูกระงับใช้งานชั่วคราว
          </p>
          <!-- <div class="container">
            <div class="col-md-12">
              <form class="" action="#" method="post">
                <div class="form-group">
                  <label>ค้นหา :</label>
                  <input type="text" name="text_search" value="" autofocus autocomplete="off">
                  <input type="submit" name="submit" value="ค้นหา">
                </div>
              </form>
            </div>
          </div> -->
          <table id="example" class="display table table-bordered">
            <thead>
              <tr>
                <th class="text-center">ลำดับ</th>
                <th class="text-center">ชื่อผู้ใช้</th>
                <th class="text-center">รหัสผ่าน</th>
                <th class="text-center">ชื่อ</th>
                <th class="text-center">อีเมล</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">จัดการสถานะ</th>
                <th class="text-center">ลบ</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
              <tr>
                <td class="text-center"><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td class="text-center" id="status"><?php echo $row['status']; ?></td>
                <td class="text-center"><a href="edit_member.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">จัดการสถานะ</a></td>
                <td class="text-center"><a href="delete_member.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบข้อมูล จริงหรือ ?');">ลบ</a></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
