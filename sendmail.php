<?php

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    $mail->isSMTP();        //Sets Mailer to send message using SMTP
    $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
    $mail->SMTPAuth = 'true';       //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'singmahan1.7@gmail.com';     //Sets SMTP username
    $mail->Password = 'aabb1155';     //Sets SMTP password
    $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->Port = 587;        //Sets the default SMTP server port
    $mail->setFrom('singmahan1.7@gmail.com','Amagetdon');     //Sets the From email address for the message
    // $mail->FromName = $_POST["name"];    //Sets the From name of the message
    $mail->addAddress($_POST['email'],'test'); //Adds a "To" address
    $mail->addAttachment('/var/tmp/file.tar.gz');
    $mail->addAttachment('/tmp/image.jpg','new.jpg');
    // $mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
    // $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
    $mail->isHTML(true);       //Sets message type to HTML
    $mail->Subject = 'test2';    //Sets the Subject of the message
    $mail->Body = 'สวัสดีครับคุณ'.$_POST['name'].'<br>'.$_POST['detail'];    //An HTML or plain text message body
    if(!$mail->send()){ //Send an Email. Return true on success or false on error
      echo 'Mailer Error'.$mail->ErrorInfo;
    }else {
      echo 'ส่งอีเมล์เรียบร้อย';
    }

?>
