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
        $objUser->role= $_POST['role'];

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

<div class="toko">
    <h4 class="title" >USER</h4>
    <form action="" method="post">
        <table class="table table-borderless table-responsive" style="color:#D9DFDB;">
            <tr>
                <td>username</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="username"
                value="<?php echo $objUser->username; ?>"></td>
            </tr>
            <tr>
                <td>password</td>
                <td>:</td>
                <td><input type="password" class="formcontrol" name="password"value="<?php echo $objUser->password; ?>"></td>
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