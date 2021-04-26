<?php
    require_once('./class/class.User.php');
    $objToko= new User();
    if(isset($_POST['btnSubmit'])){
        $objToko->username=$_POST['username'];
        $objToko->nama=$POST['password'];
        $objToko->email=$_POST['email'];
        $objToko->no_hp=$_POST['no_hp'];
        $objToko->kota=$_POST['kota'];
        $objToko->role=$_POST['role'];

        if(isset($_GET['username'])){
            $objToko->id_toko= $_GET['username'];
            $objToko->UpdateUser();
        }
        else{
            $objEmployee->AddUser();
        }
    }
    if($objUser->hasil){
        echo '<script> window.location = "index.php?p=userlist";
        </script>';
    }
    else if(isset($_GET['username'])){
        $objToko->username = $_GET['username'];
        $objToko->SelectOneUser();
    }
?>

<div class="toko">
    <h4 class="title" >USER</h4>
    <form action="" method="post">
        <table class="table table-borderless table-responsive" style="color:#D9DFDB;">
            <tr>
                <td>username</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="id_toko"
                value="<?php echo $objUser->username; ?>"></td>
            </tr>
            <tr>
                <td>password</td>
                <td>:</td>
                <td><input type="password" class="formcontrol" name="pass"value="<?php echo $objToko->password; ?>"></td>
            </tr>
            <tr>
                <td>nama</td>
                <td>:</td>
                <td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objUser->nama; ?>">
            </tr>
            <tr>
                <td>email</td>
                <td>:</td>
                <td><input type="text" class="form-control" id="email" name="email" value="<?php echo $objUser->email; ?>">
            </tr>
            <tr>
                <td>no hp</td>
                <td>:</td>
                <td><input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $objUser->no_hp; ?>">
            </tr>
            <tr>
                <td>kota</td>
                <td>:</td>
                <td><input type="text" class="form-control" id="kota" name="kota" value="<?php echo $objUser->kota; ?>">
            </tr>
            <tr>
                <td>role</td>
                <td>:</td>
                <td><input type="text" class="form-control" id="role" name="role" value="<?php echo $objUser->role; ?>">
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit" style="width: 100px;">
                <a href="index.php?p=userlist" class="btn btnwarning" style="width: 100px;">Cancel</a></td>
            </tr>
        </table>
    </form>
</div>