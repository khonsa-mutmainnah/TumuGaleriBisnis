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

<div class="lokasi">
    <div class="container col-lg-7">
      <form form action="" method="post" class="lokasi-form">
        <h4 class="title text-center fs-1 fw-bolder" >LOKASI</h4>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">id_lokasi</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="id lokasi" name="id_lokasi" value="<?php echo $objLokasi->id_lokasi; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">kecamatan</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama kecamatan" name="kecamatan" value="<?php echo $objLokasi->kecamatan; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">kota</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama kota" name="kota" value="<?php echo $objLokasi->kota; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">provinsi</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama provinsi" name="provinsi" value="<?php echo $objLokasi->provinsi; ?>">
        </div>
        <div class="col-lg-6 button-end">
          <input class="btn btnsuccess" name="btnSubmit" type="submit" value="Save" >
        </div>
      </form>
    </div>
</div>
