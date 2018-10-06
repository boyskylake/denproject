<?php
    include('connectdb.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM login_member WHERE id='$id'";
    $result = mysqli_query($dbcon, $sql);

    if($result) {
      echo "<script>";
      echo "alert('ลบข้อมูลสมาชิกเรียบร้อย');";
      echo "window.location ='show_member.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถลบข้อมูลสมาชิกได้ !');";
      echo "window.location ='show_member.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);

 ?>
