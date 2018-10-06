<?php
    include('connectdb.php');

    $id = $_POST['id'];
    $b_briefly = $_POST['b_briefly'];

    $sql = "UPDATE tbl_book SET b_briefly='$b_briefly' WHERE id='$id'";
    $result = mysqli_query($dbcon, $sql);

    if($result) {
      echo "<script>";
      echo "alert('บันทึกข้อมูลสังเขปเรียบร้อย');";
      echo "window.location ='show_book_2.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถบันทึกข้อมูลสังเขปหนังสือได้ !');";
      echo "window.location ='show_book_2.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);



 ?>
