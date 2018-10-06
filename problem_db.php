<?php
    include('connectdb.php');

    $p_detail = $_POST['p_detail'];
    $p_name = $_POST['p_name'];
    $p_email = $_POST['p_email'];

    $sql = "INSERT INTO problem(p_detail, p_name, p_email) VALUES ('$p_detail', '$p_name', '$p_email')";
    $result = mysqli_query($dbcon, $sql);

    if($result) {
      echo "<script>";
      echo "alert('แจ้งรายการปัญหาเรียบร้อย ขอบคุณที่แจ้งปัญหากับเรา');";
      echo "window.location ='problem_user_success.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถรายงานปัญหาได้ !');";
      echo "window.location ='problem_user_success.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);

 ?>
