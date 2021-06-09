<!-- <h4 class="title"><span class="text"><strong>Masukkan Email</strong></span></h4> 
<form action="?p=reset-pw" method="post"> 
    <table class="table" border="0"> 
        <tr> 
        <td>Email</td> 
        <td>:</td> 
        <td> 

        <input type="email" name="email" id="email" class="form-control" maxlength="50" required> </tr> 


        <td><input type="submit" class="btn btn-primary" value="Submit" name="btnSubmit">  
        </tr> 
    </table> -->
<?php
  require_once('./class/class.User.php');
  require_once('./class/class.Mail.php'); 
  if(isset($_POST['btnReset'])){
    $email = $_POST['email'];
    // $password = $_POST['password'];
    $objUser = new User();
    $objUser->hasil = true;
    $objUser->ValidateEmail($email);

    if($objUser->hasil){
      echo "<script>alert('Konfirmasi Telah dikirim Via email');</script>";
      $email = $_POST['email'];
      $mail = new Mail();
      $mail->mailUser = $email;
      $mail->sendMailAction();
    }
    else{
      echo "<script>alert('Email tidak terdaftar');</script>";
    }
  }

?>
    <div class="container reset col-lg-4">
    <form class ="reset-form" action="" method = "post">
      <div class="text-center logol">
        <img src="./gambar/logo.png" class="rounded" alt="...">
        <h1 class="masuk">Masukkan Email</h1>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
      </div>
      <div class="button-end">
        <input class="btn col-lg-4" type="submit" value="Submit" name="btnReset">
      </div>

    </form>
</div>