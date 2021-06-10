<?php 
    require_once ('./class/class.Mail.php'); 
    require_once ('./class/class.User.php'); 

    $email = $_POST['email'];
    $mail = new Mail();
    $mail->mailUser = $email;
    $mail->sendMailAction();
    // echo "<script>alert('Konfirmasi dikirim Via Email')</script>";
    echo '<script>window.location = "index.php";</script>';
?>
