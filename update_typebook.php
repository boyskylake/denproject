<?php
    include('connectdb.php');

    $type_id = $_POST['type_id'];
    $type_name = $_POST['type_name'];
    $datetime = $_POST['datetime'];

    $q = "UPDATE tbl_book_type SET type_name='$type_name',datetime='$datetime' WHERE type_id='$type_id'";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('บันทึกข้อมูลประเภทหนังสือเรียบร้อย');";
      echo "window.location ='addtype_book.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถบันทึกประเภทหนังสือได้ !');";
      echo "window.location ='addtype_book.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
