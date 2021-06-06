<?php 
    require_once ('./class/class.Mail.php'); 
    // require_once ('./class/class.User.php'); 

    $email = $_POST['email'];
    $mail = new Mail();
    $mail->mailUser = $email;
    $mail->sendMailAction();
    echo "<script>alert('Berhasil Mengirim Konfirmasi')</script>";
    echo '<script>window.location = "index.php";</script>';
?>
