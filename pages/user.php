<?php
    require_once ('./class/class.User.php');
    $objUser= new User();
    if (isset ($_POST['btnSubmit'])){
      $objUser->username = $_POST['username'];
      $objUser->password = $_POST['password'];
      $objUser->password = password_hash($password, PASSWORD_DEFAULT);
      $objUser->nama = $_POST['nama'];
      $objUser->no_hp = $_POST['no_hp'];
      $objUser->email = $_POST['email'];
      $objUser->kota = $_POST['kota'];
      $objUser->role = $_POST['role'];
      $objUser->instagram_user = $_POST['instagram_user'];
      // $objUser->foto = $_POST['foto'];
      
      if(isset ($_GET['id_user'])){
        $objUser->id_user= $_GET['id_user'];
        $objUser->UpdateUser();
      }
      else{
        $objUser->AddUser();
      }
      
      echo "<script> alert('$objUser->message'); </script>";
      if($objUser->hasil){
        echo '<script> window.location = "?p=userlist"; </script>';
      }
    }
    else if(isset($_GET['id_user'])){
        $objUser->id_user = $_GET['id_user'];
        $objUser->SelectOneUser();
    }
?>

<div class="user">
    <div class="container col-lg-7">
      <form form action="" method="post" class="user-form">
        <h4 class="title text-center fs-1 fw-bolder" >USER</h4>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="username" value="<?php echo $objUser->username; ?>" placeholder="username" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">nama lengkap</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" value="<?php echo $objUser->nama; ?>" placeholder="nama lengkap" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" name="email" value="<?php echo $objUser->email; ?>" placeholder="email@user.com" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="password" value="<?php echo $objUser->username; ?>" placeholder="password" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">no hp</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="no_hp" value="<?php echo $objUser->no_hp; ?>" placeholder="08123456789" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">kota</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="kota" value="<?php echo $objUser->kota; ?>" placeholder="kota" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">instagram</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="instagram" value="<?php echo $objUser->instagram; ?>" placeholder="@instagram" class="form-control">
              </div>
          </div>
        </div>
        <div class="col">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">role</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="role" value="<?php echo $objUser->role; ?>" placeholder="role" class="form-control">
              </div>
          </div>
        </div>
        <div class="col-lg-6 button-end">
          <a class="btn" href="?p=userlist">kembali</a>
          <input class="btn" name="btnSubmit" type="submit" value="simpan">
        </div>
      </form>
    </div>
</div>