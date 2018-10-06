<?php
    include('connectdb.php');

    $type_id = $_GET['type_id'];

    $q = "DELETE FROM tbl_book_type WHERE type_id='$type_id'";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('ลบประเภทหนังสือเรียบร้อย');";
      echo "window.location ='addtype_book.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถลบประเภทหนังสือได้ !');";
      echo "window.location ='addtype_book.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
