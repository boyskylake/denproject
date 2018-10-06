<?php

    include('connectdb.php');

    $r_book = $_POST['r_book'];
    $r_type = $_POST['r_type'];
    $r_view = $_POST['r_view'];
    $r_rating = $_POST['r_rating'];
    $r_av = $_POST['r_av'];

    $sql = "INSERT INTO report(r_book, r_type, r_view, r_rating, r_av)
            VALUES ('$r_book', '$r_type', '$r_view', '$r_rating', '$r_av')";

    $result = mysqli_query($dbcon, $sql);
    if($result) {
			echo "<script>";
			echo "alert('รายงานเรียบร้อย');";
			echo "window.location ='show_report.php'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ไม่สามารถรายงานหนังสือได้ !');";
			echo "window.location ='show_report.php'; ";
			echo "</script>";
		}
    mysqli_close($dbcon);

 ?>
