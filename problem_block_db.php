<?php

      include('connectdb.php');

      $pb_name = $_POST['pb_name'];
      $pb_email = $_POST['pb_email'];
      $pb_detail = $_POST['pb_detail'];

      $sql = "INSERT INTO problem_block(pb_name, pb_email, pb_detail) VALUES ('$pb_name', '$pb_email', '$pb_detail')";
      $result = mysqli_query($dbcon, $sql);

      if($result) {
  			echo "<script>";
  			echo "alert('แจ้งปัญหาเรียบร้อย');";
  			echo "window.location ='problem_success.php'; ";
  			echo "</script>";
  		} else {

  			echo "<script>";
  			echo "alert('ไม่สามารถแจ้งปัญหาได้ !');";
  			echo "window.location ='problem_success.php'; ";
  			echo "</script>";
  		}
      mysqli_close($dbcon);

?>
