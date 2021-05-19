<?php
    require_once ('./class/class.User.php');
    $objUser= new User();
    if (isset ($_POST['btnSubmit'])){
      $objUser->username = $_POST['username'];
      $objUser->password = $_POST['password'];
      $objUser->nama = $_POST['nama'];
      $objUser->no_hp = $_POST['no_hp'];
      $objUser->email = $_POST['email'];
      $objUser->kota = $_POST['kota'];
      $objUser->role = $_POST['role'];
      $objUser->instagram_user = $_POST['instagram_user'];
      $objUser->foto = $_POST['foto'];
      
      if(isset ($_GET['username'])){
        $objUser->username= $_GET['username'];
        $objUser->UpdateUser();
      }
      else{
        $objUser->AddUser();
      }
      echo "<script> alert('$objUser->message'); </script>";
      if($objUser->hasil){
        echo '<script> window.location = "index.php?p=userlist"; </script>';
      }
    }
    else if(isset($_GET['username'])){
        $objUser->username = $_GET['username'];
        $objUser->SelectOneUser();
    }
?>

<div class="user">
    <div class="container col-lg-7">
      <form form action="" method="post" class="user-form">
        <h4 class="title text-center fs-1 fw-bolder" >USER</h4>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">username</label>
          <input type="text" class="form-control" name="username" value="<?php echo $objUser->username; ?>" placeholder="username" class="form-control">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">password</label>
          <input type="password" name="password" value="<?php echo $objUser->username; ?>" class="form-control" id="exampleFormControlInput1" placeholder="password">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">nama lengkap</label>
          <input type="text" username="nama" name="nama" value="<?php echo $objUser->nama; ?>" class="form-control" id="exampleFormControlInput1" placeholder="nama kota">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">no hp</label>
          <input type="text" username="no_hp" name="no_hp" value="<?php echo $objUser->nama; ?>" class="form-control" id="exampleFormControlInput1" placeholder="08888888">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">email</label>
          <input type="text" username="email" name="email" value="<?php echo $objUser->email; ?>" class="form-control" id="exampleFormControlInput1" placeholder="email@gm.com">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">kota</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama kota" username="kota" name="kota" value="<?php echo $objUser->kota; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">instagram</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" username="@instagram" name="instagram_user" value="<?php echo $objUser->instagram_user; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">role</label>
          <input type="text" class="form-control" id="exampleFormControlInput1"username="irole" name="role" value="<?php echo $objUser->role; ?>">
        </div>
        <div class="col-lg-6 button-end">
          <input class="btn btnsuccess" name="btnSubmit" type="submit" value="Save" >
        </div>
      </form>
    </div>
</div>