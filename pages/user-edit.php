<?php
    require_once('./class/class.User.php');
    $objUser= new User();

    if (isset ($_POST['btnSubmit'])){
      $objUser->username = $_POST['username'];
      $objUser->password = $password;
      $objUser->nama = $_POST['nama'];
      $objUser->no_hp = $_POST['no_hp'];
      $objUser->email = $_POST['email'];
      $objUser->kota = $_POST['kota'];
      $objUser->instagram_user = $_POST['instagram_user'];
      $objUser->role = "penjual";
      // $objUser->foto = $_POST['foto'];
      
      if(isset ($_GET['id_user'])){
        $objUser->id_user= $_GET['id_user'];
        $objUser->UpdateUser();

        $_SESSION['username'] = $objUser->username;
        $_SESSION['password'] = $objUser->password;
        $_SESSION['nama'] = $objUser->nama;
        $_SESSION['no_hp'] = $objUser->no_hp;
        $_SESSION['email'] = $objUser->email;
        $_SESSION['kota'] = $objUser->kota;
        $_SESSION['instagram_user'] = $objUser->instagram_user;
        $_SESSION['role'] = $objUser->role;
      }
      
      echo "<script> alert('$objUser->message'); </script>";
      if($objUser->hasil){
        echo '<script> window.location = "?p=GaleriBisnis"; </script>';
      }
    }
    // else if(isset($_GET['id_user'])){
    //     $objUser->id_user = $_GET['id_user'];
    //     $objUser->SelectOneUser();
    // }
?>

<div class="user">
    <div class="container col-lg-7">
      <form form action="" method="post" class="user-form">
        <h4 class="title text-center fs-1 fw-bolder" >Edit profil</h4>
        <?php echo "<img src='./upload/user/".$foto."' width='50px'/>";?>
        <a href="?p=user-foto" style="font-size:8px; color: #e4edea;">edit foto profil</a>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="username" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">nama lengkap</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" placeholder="nama lengkap" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="email@user.com" class="form-control">
              </div>
          </div>
        </div>
        <!-- <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="password" class="form-control">
              </div>
          </div>
        </div> -->
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">no hp</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp; ?>" placeholder="08123456789" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">kota</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="kota" value="<?php echo $kota; ?>" placeholder="kota" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">instagram</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="instagram_user" value="<?php echo $instagram_user; ?>" placeholder="@instagram" class="form-control">
              </div>
          </div>
        </div>
        <div class="col-lg-6 button-end">
          <a class="btn" href="?p=GaleriBisnis">kembali</a>
          <input class="btn" name="btnSubmit" type="submit" value="simpan">
        </div>
      </form>
    </div>
</div>