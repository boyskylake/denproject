<?php
      include('connectdb.php');

      $sql = "SELECT * FROM `login_member` WHERE `status` = '0'";
      $result = mysqli_query($dbcon, $sql);
      while ($a = mysqli_fetch_array($result)) {
       echo $a['email']."<br>";
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>


  </head>
  <body>

          <h3 class='text-center'>เมื่อมีหนังสือเข้ามาใหม่</h3>
          <table border='1'>
            <tr>
              <th>เรื่อง</th>
              <th>รูปภาพ</th>
              <th>รายละเอียด</th>
            </tr>
            <tr>
              <td>a h</td>
              <td>
              </td>
              <td><img src="" alt="" width="50"></td>
            </tr>
          </table>
            <a href="#"></a>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
