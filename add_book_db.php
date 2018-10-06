<?php
    include('connectdb.php');
    

    $b_name = $_POST['b_name'];
    $b_dcall = $_POST['b_dcall'];
    $b_author = $_POST['b_author'];
    $b_print = $_POST['b_print'];
    $b_imprint = $_POST['b_imprint'];
    $b_physical = $_POST['b_physical'];
    $b_heading = $_POST['b_heading'];
    $b_isbn = $_POST['b_isbn'];

    $b_briefly = $_POST['b_briefly'];
    $date = $_POST['date'];
    $type_id = $_POST['type_id'];

    //img
    $ext1 = pathinfo(basename($_FILES['b_img1']['name']), PATHINFO_EXTENSION);
    $ext2 = pathinfo(basename($_FILES['b_img2']['name']), PATHINFO_EXTENSION);
    $ext3 = pathinfo(basename($_FILES['b_img3']['name']), PATHINFO_EXTENSION);

    $new_image_name1 = 'img_'.uniqid().".".$ext1;
    $new_image_name2 = 'img_'.uniqid().".".$ext2;
    $new_image_name3 = 'img_'.uniqid().".".$ext3;

    $image_path1 = "image/01/";
    $image_path2 = "image/02/";
    $image_path3 = "image/03/";

    $upload_path1 = $image_path1.$new_image_name1;
    $upload_path2 = $image_path2.$new_image_name2;
    $upload_path3 = $image_path3.$new_image_name3;

    //Uploading
    $success1 = move_uploaded_file($_FILES['b_img1']['tmp_name'], $upload_path1);
    $success2 = move_uploaded_file($_FILES['b_img2']['tmp_name'], $upload_path2);
    $success3 = move_uploaded_file($_FILES['b_img3']['tmp_name'], $upload_path3);

    if($success1 == FALSE && $success2 == FALSE && $success3 == FALSE)
    {
      echo "ไม่สามารถ UPLOAD ได้";
      exit();
    }

    $b_img1 = $new_image_name1;
    $b_img2 = $new_image_name2;
    $b_img3 = $new_image_name3;

    $q = "INSERT INTO tbl_book(b_name, b_dcall, b_author, b_print, b_imprint,b_physical,b_heading,b_isbn,b_briefly,date,type_id,b_img1,b_img2,b_img3, `p_view`, `rating`, `rating_count`, `comment_count`)
          VALUES ('$b_name', '$b_dcall', '$b_author', '$b_print', '$b_imprint','$b_physical','$b_heading','$b_isbn','$b_briefly','$date','$type_id','$b_img1','$b_img2','$b_img3','0','0','0','0')";
    $result = $dbcon->query($q);
    $id_insert = mysqli_insert_id($dbcon);

    if($result) {

      // $id_insert = $result->insert_id;
      // echo $id_insert;

      require_once('class.phpmailer.php');

      $sql = "SELECT * FROM `login_member` WHERE `status` = '0'";
      $resmail = mysqli_query($dbcon, $sql);
        while ($a = mysqli_fetch_array($resmail)) {

           $mail = new PHPMailer();
           $mail->CharSet = "utf-8";
           $mail->IsHTML(true);
           $mail->IsSMTP();
           $mail->SMTPAuth = true; // enable SMTP authentication
           $mail->SMTPSecure = "tls"; // sets the prefix to the servier
           $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
           $mail->Port = 587; // set the SMTP port for the GMAIL server
           $mail->Username = "singmahan1.7@gmail.com"; // GMAIL username
           $mail->Password = "aabb1155"; // GMAIL password
           $mail->From = "singmahan1.7@gmail.com";
           $mail->FromName = "singmahan1.7@gmail.com";  // set from Name
           $mail->Subject = "มีหนังสือเข้ามาใหม่";
           $mail->Body = "<h1 align='center'>มีหนังสือเข้ามาใหม่</h1>";
           $mail->Body .= "<table align='center' width='50%' border='1'>";
           $mail->Body .= "<tr>";
           $mail->Body .= "<th>เรื่อง</th>";
           $mail->Body .= "<th>รูปภาพ</th>";
           $mail->Body .= "<th>รายละเอียด</th>";
           $mail->Body .= "</tr>";
           $mail->Body .= "<tr>";
           $mail->Body .= "<td>".$b_name."</td>";
           $mail->Body .= "<td><img src='https://denproject.azurewebsites.net/".$upload_path1."' alt='' width='150'></td>";
           $mail->Body .= "<td><a href='https://denproject.azurewebsites.net/detail_book.php?id=".$id_insert."'>ดูรายละเอียด</a> </td>";
           $mail->Body .= "</tr>";
           $mail->Body .= "</table>";
        //    echo $mail->Body;

           $mail->AddAddress($a['email'], $a['name']); // to Address
      		 $mail->Send();
         }

			echo "<script>";
			echo "alert('เพิ่มข้อมูลหนังสือเรียบร้อย');";
			echo "window.location ='show_book_2.php'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ไม่สามารถเพิ่มข้อมูลหนังสือได้ !');";
			echo "window.location ='show_book_2.php'; ";
			echo "</script>";
		}
    mysqli_close($dbcon);
?>
