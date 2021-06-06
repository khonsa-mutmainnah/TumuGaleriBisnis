<?php
  require_once('./class/class.User.php');
  if(isset($_POST['btnLogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $objUser = new User();
    $objUser->hasil = true;
    $objUser->ValidateEmail($email);

    if($objUser->hasil){
      $ismatch = password_verify($password, $objUser->password);

      if($ismatch){
        if (!isset($_SESSION)) {
        session_start();
        }
        $_SESSION["username"]= $objUser->usename;
        $_SESSION["password"]= $objUser->password;
        $_SESSION["email"]= $objUser->email;
        $_SESSION["nama"]= $objUser->nama;
        $_SESSION["role"]= $objUser->role;

        echo "<script>alert('Login sukses');</script>";

        if($objUser->role == 'penjual'){
          echo '<script>window.location = "dashboardpenjual.php";</script>';
        }
        else if($objUser->role == 'manager'){
          echo '<script>window.location = "dashboardpembeli.php";</script>';
        }
        else if($objUser->role == 'admin'){
          echo '<script>window.location = "dashboard-admin.php";</script>';
        }
      }

      else{
        echo "<script>alert('Password tidak match');</script>";
      }

    }
    else{
      echo "<script>alert('Email tidak terdaftar');</script>";
      }
  }
?>

<div class="container log-in col-lg-4">
    <form class="login-form" method = "post">
      <div class="text-center logol">
        <img src="./gambar/logo.png" class="rounded" alt="...">
        <h1 class="masuk">masuk</h1>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <div class="button-end">
      <h4 class="btn col-lg-4" href="index.php?p=reset-pw-form" role="button">Lupa Password?</h4>
      </div>
      <div class="button-end">
        <input class="btn col-lg-4" type="submit" value="Masuk" name="btnLogin">
      </div>
      <label for="" class="form-label">belum punya akun?</label>
      <div class="button-end">
        <a class="btn col-lg-4" href="index.php?p=register-user" role="button">Daftar</a>
      </div>
    </form>
</div>