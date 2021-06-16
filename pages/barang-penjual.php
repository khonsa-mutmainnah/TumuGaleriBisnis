<?php 
	require_once('./class/class.Barang.php');
	require_once('./class/class.Toko.php');
    require_once('./akses-penjual.php');

	$objBarang = new Barang();
	$objToko = new Toko();
	$objTokoList= $objToko->SelectAllToko();

	if (isset($_POST['btnSubmit'])) {
		$objBarang->nama_barang = $_POST['nama_barang'];
		$objBarang->deskripsi= $_POST['deskripsi'];
		$objBarang->harga = $_POST['harga'];
		$objBarang->variasi = $_POST['variasi'];
		$objBarang->toko->id_toko = $_POST['id_toko'];

		if (isset($_GET['id_barang'])) {
			$objBarang->id_barang = $_GET['id_barang'];
			$objBarang->UpdateBarang();
		}else{
			$objBarang->AddBarang();
		}

		echo "<script> alert('$objBarang->message'); </script>";
		if($objBarang->hasil){
			echo '<script> window.location = "?p=baranglist"; </script>';
		}
	}
	else if (isset($_GET['id_barang'])) {
		$objBarang->id_barang = $_GET['id_barang'];
		$objBarang->SelectSatuBarang();
	}
?>
<div class="barang">
    <div class="container col-lg-7">
        <form form action="" method="POST" class="barang-form" enctype="multipart/form-data">
            <h1 class="title text-center fs-1 fw-bolder" >Barang</h1>

            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nama Barang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_barang" value="<?php echo $objBarang->nama_barang; ?>" placeholder="nama barang" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Deskripsi barang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="deskripsi" value="<?php echo $objBarang->deskripsi; ?>" placeholder="deskripsi barang" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">harga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="harga" value="<?php echo $objBarang->harga; ?>" placeholder="harga" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">variasi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="variasi" value="<?php echo $objBarang->variasi; ?>" placeholder="variasi yang ada pada barang" class="form-control">
                    </div>
                </div>
            </div>
			<div class="col-lg-6 button-end">
                <a class="btn" href="?p=toko-penjual">kembali</a>
                <input class="btn" name="btnSubmit" type="submit" value="simpan">
            </div>
        </form>
    </div>
</div>