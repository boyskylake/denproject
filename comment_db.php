<?php
    include('connectdb.php');

    $c_name = $_POST['c_name'];
    $c_book = $_POST['c_book'];
    $c_id_book = $_POST['c_id_book'];
    $c_detail = $_POST['c_detail'];

    $sqlcmcount = "SELECT `id`,`comment_count` FROM `tbl_book` WHERE `id` = '$c_id_book'";
    $rescmcount = mysqli_query($dbcon, $sqlcmcount);
    if ($rescmcount) {
      $quecmcount = mysqli_fetch_array($rescmcount);
      $num = $quecmcount['comment_count'] + 1;
      $sqlincount = "UPDATE `tbl_book` SET `comment_count`='$num' WHERE `id` = '$c_id_book'";
      mysqli_query($dbcon, $sqlincount);
    }

    $sql = "INSERT INTO comment(c_detail,c_name,c_book,c_id_book) VALUES ('$c_detail','$c_name','$c_book','$c_id_book')";
    $result = mysqli_query($dbcon, $sql);

    if($result) {
			echo "<script>";
			echo "alert('เพิ่มบทวิเคราะห์เรียบร้อย');";
			echo "window.location ='index.php'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ไม่สามารถเพิ่มบทวิเคราะห์ได้ !');";
			echo "window.location ='index.php'; ";
			echo "</script>";
		}
    mysqli_close($dbcon);

 ?>
