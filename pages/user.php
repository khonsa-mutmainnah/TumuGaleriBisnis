<?php
    require_once('./class/class.User.php');
    $objToko= new Toko();
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
                <td>id toko</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="id_toko"
                value="<?php echo $objToko->id_toko; ?>"></td>
            </tr>
            <tr>
                <td>nama toko</td>
                <td>:</td>
                <td><input type="text" class="formcontrol" name="fname"value="<?php echo $objToko->fname; ?>"></td>
            </tr>
            <tr>
                <td>Logo</td>
                <td>:</td>
                <td><input type="file" class="form-control" id="foto" name="foto">
                <input type="hidden" name="currentfoto" value="<?php echo $objToko->foto; ?>">
            </tr>
            <tr>
                <td>tagline</td>
                <td>:</td>
                <td><input type="text-area" class="form-control" id="tagline" name="tagline" value="<?php echo $objToko->tagline; ?>">
            </tr>
            <tr>
                <td>No telepon</td>
                <td>:</td>
                <td><input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $objToko->no_telp; ?>">
            </tr>
            <tr>
                <td>instagram</td>
                <td>:</td>
                <td><input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $objToko->instagram; ?>">
            </tr>
            <tr>
                <td>Status toko</td>
                <td>:</td>
                <td><div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Default radio
                        </label>
                    </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Default checked radio
                </label>
                </div>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit">
                <a href="index.php?p=employeelist" class="btn btnwarning">Cancel</a></td>
            </tr>
        </table>
    </form>
</div>