<?php
date_default_timezone_set('Asia/Bangkok');

    $dbcon = mysqli_connect('127.0.0.1:53846','azure','6#vWHD_$','db_book')
    or die('ไม่สามารถเชื่อมต่อได้'.mysqli_connect_error());
    mysqli_query($dbcon,"SET NAMES UTF8"); 
  //  echo "เชื่อมต่อฐานข้อมูลสำเร็จ !!";
?>
