<?php
    require_once ('./class/class.User.php');
    $objUser= new User();
    if(isset($_POST['btnSubmit'])){
        $objUser->username= $_POST['username'];
        $objUser->password= $_POST['password'];
        $objUser->nama= $_POST['nama'];
        $objUser->email= $_POST['email'];
        $objUser->no_hp= $_POST['no_hp'];
        $objUser->kota= $_POST['kota'];
        $objUser->foto= $_POST['foto'];
        $objUser->role= $_POST['role'];
        $objUser->instagram_user= $_POST['instagram_user'];

        if(isset($_GET['username'])){
            $objUser->username= $_GET['username'];
            $objUser->UpdateUser();
        }
        else{
            $objUser->AddUser();
        }
        echo "<script> alert('$objUser->message'); </script>";
        if($objUser->hasil){
            echo '<script> window.location = "index.php?p=userlist";
            </script>';
        }
    }
    else if(isset($_GET['username'])){
        $objUser->username = $_GET['username'];
        $objUser->SelectOneUser();
    }
?>

<div class="user">
    <div class="container col-lg-7">
      <form form action="" method="post" class="register-form">
        <h4 class="title text-center fs-1 fw-bolder" >USER</h4>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">Nama lengkap</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama lengkap" value="<?php echo $objUser->nama; ?>">
        </div>
        <div class="container">
            <div class="row username">
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $objUser->username; ?>">
                </div>
                <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" value="<?php echo $objUser->password; ?>">
                </div>
            </div>
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">nomor handphone</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="088888888" value="<?php echo $objUser->no_hp; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">asal kota</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="kota" value="<?php echo $objUser->kota; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="user@email.com" value="<?php echo $objUser->email; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">instagram</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="@instagram_user" value="<?php echo $objUser->instagram_user; ?>">
        </div>
        <div class="col-lg-4 button-end">
          <input class="btn" name="btnSubmit" type="submit" value="Save" >
        </div>
      </form>
    </div>
</div>