<?php
    include('connectdb.php');

    $id = $_GET['id'];

    //delete img
    $qdel = "SELECT b_img1, b_img2, b_img3 FROM tbl_book WHERE id='$id'";
    $resdel = mysqli_query($dbcon, $qdel);

    $b_img1 = mysqli_fetch_array($resdel, MYSQLI_NUM);
    $b_img2 = mysqli_fetch_array($resdel, MYSQLI_NUM);
    $b_img3 = mysqli_fetch_array($resdel, MYSQLI_NUM);

    $filename1 = $b_img1[0];
    $filename2 = $b_img1[1];
    $filename3 = $b_img1[2];

    @unlink('image/01/'. $filename1);
    @unlink('image/02/'. $filename2);
    @unlink('image/03/'. $filename3);

    $q = "DELETE FROM tbl_book WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('ลบข้อมูลหนังสือเรียบร้อย');";
      echo "window.location ='show_book_2.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถลบข้อมูลหนังสือได้ !');";
      echo "window.location ='show_book_2.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
