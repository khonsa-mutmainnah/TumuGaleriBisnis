<?php
require_once ('./class/class.lokasi.php');
$objLokasi = new Lokasi();
if (isset ($_POST['btnSubmit'])){
    $objLokasi->id_lokasi = $_POST['id_lokasi'];
    $objLokasi->kecamatan = $_POST['kecamatan'];
    $objLokasi->kota = $_POST['kota'];
    $objLokasi->provinsi = $_POST['provinsi'];
    
    if (isset ($_GET['id_lokasi'])){
        $objLokasi->id_lokasi = $_GET['id_lokasi'];
        $objLokasi->UpdateLokasi();
    }
    else{
        $objLokasi->AddLokasi();
    }
    echo "<script> alert('$objLokasi->message'); </script>";
    if($objLokasi->hasil){
        echo '<script> window.location = "index.php?p=lokasilist"; </script>';
    }
}
else if(isset($_GET['id_lokasi'])){
    $objLokasi->id_lokasi = $_GET['id_lokasi'];
    $objLokasi->SelectOneLokasi();
}
?>
<h4 class="title">
<span class="text"><strong>Lokasi</strong></span>
</h4>
<form action="" method="post">
<table class="table">
<tr>
<td>ID Lokasi</td>
<td>:</td>
<td><input type="text" class="form-control" name="id_lokasi"
value="<?php echo $objLokasi->id_lokasi; ?>"></td>
</tr>
<tr>
<td>kecamatan</td>
<td>:</td>
<td><input type="text" class="formcontrol" id_lokasi="kecamatan" name="kecamatan"
value="<?php echo $objLokasi->kecamatan; ?>"></td>
</tr>
<tr>
<td>Kota</td>
<td>:</td>
<td><input type="text" class="formcontrol" id_lokasi="kota" name="kota"
value="<?php echo $objLokasi->kota; ?>"></td>
</tr>
<tr>
<td>Provinsi</td>
<td>:</td>
<td><input type="text" class="formcontrol" id_lokasi="provinsi" name="provinsi"
value="<?php echo $objLokasi->provinsi; ?>"></td>
</tr>

<tr>
<td colspan="2"></td>
<td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit">
<a href="index.php?p=lokasilist" class="btn btnwarning">Cancel</a></td>
</tr>
</table>
</form>