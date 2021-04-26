<?php
    require_once('./class/class.Toko.php');
    $objToko= new Toko();
    if(isset($_POST['btnSubmit'])){
        $objToko->id_Toko=$_POST['id_toko'];
        $objToko->nama_toko=$POST['nama_toko'];
        $objToko->logo=$_POST['logo'];
        $objToko->id_lokasi=$_POST['id_lokasi'];
        $objToko->tagline=$_POST['tagline'];
        $objToko->no_telp=$_POST['no_telp'];
        $objToko->status=$_POST['status'];
        $objToko->instagram=$_POST['instagram'];

        if(isset($_GET['id_toko'])){
            $objToko->id_toko= $_GET['id_toko'];
            $objToko->UpdateToko();
        }
        else{
            $objEmployee->AddToko();
        }
    }
    if($objToko->hasil){
        echo '<script> window.location = "index.php?p=tokolist";
        </script>';
    }
    else if(isset($_GET['id_toko'])){
        $objToko->id_toko = $_GET['id_toko'];
        $objToko->SelectOneToko();
    }
?>
<div class="toko">
<h4 class="title" >TOKO</h4>
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
            <td><div class="form-check" >
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="<?php echo $objToko->status=true; ?>" style="width:15px;">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Setuju
                    </label>
                </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" style="width:15px;" value="<?php echo $objToko->status=false; ?>checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Tolak
            </label>
            </div>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit" style="width: 100px;">
            <a href="index.php?p=tokolist" class="btn btnwarning" style="width: 100px;">Cancel</a></td>
        </tr>
    </table>
</form>

</div>

