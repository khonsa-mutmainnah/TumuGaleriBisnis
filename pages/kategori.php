<?php
    require_once('./class/class.kategori.php');
    $objToko= new Kategori();
    if(isset($_POST['btnSubmit'])){
        $objKategori->id_Kategori=$_POST['id_kategori'];
        $objKategori->nama_kategori=$POST['nama_kategori'];

        if(isset($_GET['id_kategori'])){
            $objKategori->id_kategori= $_GET['id_kategori'];
            $objKategori->UpdateKategori();
        }
        else{
            $objKategori->AddKategori();
        }
    }
    if($objKategori->hasil){
        echo '<script> window.location = "index.php?p=kategorilist";
        </script>';
    }
    else if(isset($_GET['id_kategori'])){
        $objKategori->id_kategori = $_GET['id_kategori'];
        $objKategori->SelectOneKategori();
    }
?>
<div class="kategori">
<h4 class="title" >KATEGORI</h4>
<form action="" method="post">
    <table class="table table-borderless table-responsive" style="color:#D9DFDB;">
        <tr>
            <td>id kategori</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="id_kategori"
            value="<?php echo $objKategori->id_kategori; ?>"></td>
        </tr>
        <tr>
            <td>nama kategori</td>
            <td>:</td>
            <td><input type="text" class="formcontrol" name="fname"value="<?php echo $objKategori->nama_kategori; ?>"></td>
        </tr>

            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="<?php echo $objKategori->status=false; ?>checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Tolak
            </label>
            </div>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit">
            <a href="index.php?p=tokolist" class="btn btnwarning">Cancel</a></td>
        </tr>
    </table>
</form>

</div>

