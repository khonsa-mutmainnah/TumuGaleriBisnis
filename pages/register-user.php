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

  //kalau nggak
  else {
    $lokasi_file = @$_FILES['foto']['tmp_name'];
    $ukuran_file = @$_FILES['foto']['size'];
    $type_file = @$_FILES['foto']['type'];
    $folder = './upload/';

    //image not compatible
    if ($type_file != "image/gif" and $type_file != "image/jpeg" and $type_file != "image/png") {
      echo "<script>
      alert('Gagal Menambahkan Foto, gambarnya nggak kompetible')
      </script>";
    }

    //competible
    else {
      //move photo to foto folder
      $uniquesavename = time() . uniqid(rand());
      $new_destination = $folder . $uniquesavename . ".png";
      $succes_move = move_uploaded_file($lokasi_file, $new_destination);

      //berhasil pindah
      if ($succes_move) {
        $objUser->username = $_POST['username'];
        $password = $_POST['password'];
        $objUser->password = password_hash($password, PASSWORD_DEFAULT);
        $objUser->nama = $_POST['nama'];
        $objUser->no_hp = $_POST['no_hp'];
        $objUser->email = $_POST['email'];
        $objUser->kota = $_POST['kota'];
        $objUser->role = $_POST['role'];
        $objUser->instagram_user = $_POST['instagram_user'];
        $objUser->foto = $new_destination;
        $objUser->AddUser();

        if ($objUser->hasil) {
          echo "<script> alert('Registrasi Berhasil'); </script>";
          echo '<script> window.location="index.php?p=login";</script>';
        }
      }
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
    <div class="col">
      <img id="image-preview" alt="image preview" class="rounded mx-auto ">
      <div class="mb-3">
        <label for="formFile" class="form-label">foto</label>
        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage();">
      </div>
    </div>
    <div class="col">
      <label for="nama" class="form-label">Nama lengkap</label>
      <input type="text" class="form-control" id="nama" placeholder="nama lengkap" name="nama">
    </div>
    <div class="container">
      <div class="row username">
        <div class="col">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" placeholder="username" name="username">
        </div>
        <div class="col">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
      </div>
    </div>
    <div class="col">
      <label for="no_hp" class="form-label">nomor handphone</label>
      <input type="text" class="form-control" id="no_hp" placeholder="088888888" name="no_hp">
    </div>
    <div class="col">
      <label for="email" class="form-label">email</label>
      <input type="email" class="form-control" id="email" placeholder="user@email.com" name="email">
    </div>
    <div class="col">
      <label for="instagram_user" class="form-label">instagram</label>
      <input type="text" class="form-control" id="instagram_user" placeholder="@instagram_user" name="instagram_user">
    </div>
    <div class="col">
      <label for="kota" class="form-label">kota</label>
      <input type="text" class="form-control" id="kota" placeholder="kota" name="kota">
    </div>
    <div class="col">
      <label for="role" class="form-label">Role</label>
      <input type="text" class="form-control" id="role" placeholder="role" name="role">
    </div>
    <div class="col-lg-4 button-end">
      <input class="btn col-8" type="submit" value="Daftar" name="btnSubmit" id="btnSubmit">
    </div>
    <label for="" class="form-label">sudah punya akun?</label>
    <div class="col-lg-4 button-end">
      <a class="btn col-8" href="index.php?p=login" role="button">Masuk</a>
    </div>
  </form>

  <script>
    function previewImage() {
      document.getElementById("image-preview").style.display = "block";
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("foto").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("image-preview").src = oFREvent.target.result;
      };
    };
  </script>
</div>