<!-- <h4 class="title"><span class="text"><strong>Masukkan Password Baru</strong></span></h4> 
<form action="?p=reset-pw" method="post"> 
    <table class="table" border="0"> 
        <tr> 
        <td>Password Baru</td> 
        <td>:</td> 
        <td> 

        <input type="password" name="password" id="email" class="form-control" maxlength="50" required> </tr> 


        <td><input type="submit" class="btn btn-primary" value="Submit" name="btnSubmit"> 
        <a class="btn btn-danger">Cancel</a></td> 
        </tr> 
    </table> -->
<?php
  require_once("./class/class.User.php");

  // $newpass = $_POST['newpass'];
  // $repass = $_POST['repass'];

//is data empty
if (empty($newpass)) {
    echo "<script>
    alert('Gagal Memperbaharui User, Pastikan semua data diiisi');
    </script>";
}

//not empty
else {
    //password harus maching
    if ($newpass) {

        $user = new User();
        $user->id_user = $id_user;
        $user->password = $newpass;
        $hasil = $user->resetPass();

        //berhasil edit
        if ($hasil == "berhasil mengedit") {
            echo "<script>
        alert('Berhasil memperbaharui Password')
        window.location = 'index.php?p=login';
        </script>";
        }

        //gagal edit
        else {
            echo "<script>
        alert('Gagal Memperbaharui Password, Pastikan semua data benar')
        window.location = 'index.php?p=user&id_user=$id_user';
        </script>";
        }
    }

    //password tidak semua
    else {
        echo "<script>
        alert('Gagal Memperbaharui Password, Pastikan Password Sama')
        window.location = 'index.php?p=user&id-user=$id_user';
        </script>";
    }
}

?>
    <div class="container reset col-lg-4">
    <form class ="reset-form" action="" method = "post">
      <div class="text-center logol">
        <img src="./gambar/logo.png" class="rounded" alt="...">
        <h1 class="masuk">Masukkan Password Baru</h1>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword" class="form-label">New Password</label>
        <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" name="newpass">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" name="repass">
      </div>
      <div class="button-end">
        <input href="login.php" class="btn col-lg-4" type="submit" value="Save" name="btnSubmit">
      </div>

    </form>
</div>