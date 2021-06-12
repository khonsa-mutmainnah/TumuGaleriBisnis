<?php
require_once('./class/class.User.php');

if (isset($_POST["btnSubmit"])) {
  $inputemail = $_POST["email"];
  $objUser = new User();
  $objUser->ValidateEmail($inputemail);

  //kalau terdaftar
    if ($objUser->hasil) {
        echo "<script>alert('Email sudah terdaftar');</script>";
    }
    else {
        $objUser->username = $_POST['username'];
        $password = $_POST['password'];
        $objUser->password = password_hash($password, PASSWORD_DEFAULT);
        $objUser->nama = $_POST['nama'];
        $objUser->email = $_POST['email'];
        $objUser->role = 'penjual';
        $objUser->AddUser();

        if ($objUser->hasil) {
            echo "<script> alert('Registrasi Berhasil'); </script>";
            echo '<script> window.location="index.php?p=login";</script>';
        }
        
    }
}
?>

<div class="container register-user col-lg-7">
  <form class="register-form" method="POST" enctype="multipart/form-data">
    <div class="text-center logol">
      <img src="./gambar/logo.png" class="rounded" alt="...">
      <h1 class="daftar">daftar</h1>
    </div>
    <div class="container">
      <div class="row username">
        <div class="col">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" placeholder="user@email.com" name="email">
        </div>
        <div class="col">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
      </div>
    </div>
    <div class="col">
      <label for="nama" class="form-label">Nama lengkap</label>
      <input type="text" class="form-control" id="nama" placeholder="nama lengkap" name="nama">
    </div>
    <div class="col">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" placeholder="username" name="username">
    </div>
    <div class="col-lg-4 button-end">
      <input class="btn col-8" type="submit" value="Daftar" name="btnSubmit" id="btnSubmit">
    </div>
    <label for="" class="form-label">sudah punya akun?</label>
    <div class="col-lg-4 button-end">
      <a class="btn col-8" href="index.php?p=login" role="button">Masuk</a>
    </div>
  </form>
</div>