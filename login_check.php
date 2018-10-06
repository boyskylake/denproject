<?php
    session_start();
    include('connectdb.php');

    // $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    // $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    //
    // $salt = 'huytegdftsrqw3091hf456jkplr40mn';
    // $hash_password = hash_hmac('sha256', $password, $salt);
    //
    // $sql = "SELECT * FROM login_member WHERE username=? AND password=?";
    // $stmt = mysqli_prepare($dbcon, $sql);
    // mysqli_stmt_bind_param($stmt, "ss", $username, $hash_password);
    // mysqli_execute($stmt);
    // $result_user = mysqli_stmt_get_result($stmt);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_member WHERE username='$username' AND password='$password'";
    $result = mysqli_query($dbcon,$sql);
    // $result_user = mysqli_fetch_array($query,MYSQLI_ASSOC);
    // $result_user->num_rows == 1
    if($result->num_rows == 1){
      session_start();
      $row_user = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $_SESSION['id'] = $row_user['id'];
      if($row_user['status'] == 1){
        $_SESSION['admin'] = 1;
        echo "<script>";
        echo "alert('เข้าสู่ระบบสำเร็จ');";
        echo "window.location ='admin_page.php'; ";
        echo "</script>";
      }elseif($row_user['status'] == 2){
        $_SESSION['bunna'] = 1;
        echo "<script>";
        echo "alert('เข้าสู่ระบบสำเร็จ');";
        echo "window.location ='bunna_page.php'; ";
        echo "</script>";
      }elseif($row_user['status'] == 3) {
        $_SESSION['block'] = 3;
        echo "<script>";
        echo "alert('เข้าสู่ระบบสำเร็จ');";
        echo "window.location ='block_page.php'; ";
        echo "</script>";
      }else{
        echo "<script>";
        echo "alert('เข้าสู่ระบบสำเร็จ');";
        echo "window.location ='index.php'; ";
        echo "</script>";
      }


    }else {
      echo "<script>";
			echo "alert('กรุณากรอกข้อมูบให้ถูกต้อง !');";
			echo "window.location ='login.php'; ";
			echo "</script>";
    }


?>
