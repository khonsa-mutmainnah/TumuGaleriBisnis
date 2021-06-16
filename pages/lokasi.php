<?php
  require_once("./class/class.Lokasi.php");
  require_once("./akses-admin.php");

  $objLokasi = new Lokasi();
  if (isset ($_POST['btnSubmit'])){
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
          echo '<script> window.location = "dashboard.php?p=lokasilist"; </script>';
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
        <h1 class="title text-center fs-1 fw-bolder" >LOKASI</h1>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">kecamatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="kecamatan" value="<?php echo $objLokasi->kecamatan; ?>" placeholder="kecamatan" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">kota</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="kota" value="<?php echo $objLokasi->kota; ?>" placeholder="kota" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">provinsi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="provinsi" value="<?php echo $objLokasi->provinsi; ?>" placeholder="provinsi" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 button-end">
                <a class="btn" href="?p=lokasilist">kembali</a>
                <input class="btn" name="btnSubmit" type="submit" value="simpan">
            </div>
      </form>
    </div>
</div>