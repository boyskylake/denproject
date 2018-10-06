<?php
      session_start();
      $session_id = $_SESSION['id'];
      $query_user = "SELECT * FROM login_member WHERE id='$session_id'";
      $result_user = mysqli_query($dbcon, $query_user);
      if($result_user){
        $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
        $s_name = $row_user['name'];
        $s_username = $row_user['username'];
        $s_password = $row_user['password'];
        $s_email = $row_user['email'];

      }

 ?>
