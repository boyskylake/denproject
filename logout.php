<?php
    session_start();
    session_destroy();

    echo "<script>";
    echo "alert('ออกจากระบบสำเร็จ !');";
    echo "window.location ='index.php'; ";
    echo "</script>";
 ?>
