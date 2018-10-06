<?php
      include('connectdb.php');

      $id = $_POST['id'];
      $status = $_POST['status'];

      $sql = "UPDATE login_member SET status='$status' WHERE id='$id'";
      $result = mysqli_query($dbcon, $sql);

      if($result) {
        echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย');";
        echo "window.location ='show_member.php'; ";
        echo "</script>";
      } else {

        echo "<script>";
        echo "alert('ไม่สามารถบันทึกข้อมูลได้ !');";
        echo "window.location ='show_member.php'; ";
        echo "</script>";
      }
      mysqli_close($dbcon);

 ?>
