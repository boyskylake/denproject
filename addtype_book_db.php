<?php
    include('connectdb.php');

    $type_name = $_POST['type_name'];
    $datetime = $_POST['datetime'];

    $q = "INSERT INTO tbl_book_type(type_name,datetime) VALUES ('$type_name','$datetime')";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('เพิ่มประเภทหนังสือเรียบร้อย');";
      echo "window.location ='addtype_book.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถเพิ่มประเภทหนังสือได้ !');";
      echo "window.location ='addtype_book.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
