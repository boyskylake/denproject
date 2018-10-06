<?php
    include('connectdb.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    //การเข้ารหัสเพื่อความปลอดภัยมากขึ้น
    // $salt = 'huytegdftsrqw3091hf456jkplr40mn';
    // $hash_password = hash_hmac('sha256', $password, $salt);

    $sql = "INSERT INTO login_member(username,password,name,email) VALUES ('$username','$password','$name','$email')";
    $result = mysqli_query($dbcon, $sql);
    if($result)
    {
      echo "<script>";
      echo "alert('สมัครสมาชิกสำเร็จ');";
      echo "window.location ='login.php'; ";
      echo "</script>";
    }else {
      echo "<script>";
      echo "alert('ไม่สามารถสมัครสมาชิกได้');";
      echo "window.location ='register.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);

?>
