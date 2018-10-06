<?php
        include('connectdb.php');

        $id = $_POST['id'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];


        $sql = "UPDATE login_member SET password='$password',name='$name', email='$email' WHERE id='$id'";
        $result = mysqli_query($dbcon, $sql);

        if($result) {
    			echo "<script>";
    			echo "alert('บันทึกข้อมูลเรียบร้อย');";
    			echo "window.location ='data_bunna.php'; ";
    			echo "</script>";
    		} else {

    			echo "<script>";
    			echo "alert('ไม่สามารถบันทึกข้อมูลได้ !');";
    			echo "window.location ='data_bunna.php'; ";
    			echo "</script>";
    		}
        mysqli_close($dbcon);





 ?>
