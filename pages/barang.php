<?php 
	require_once('./class/class.Barang.php');
	require_once('./class/class.Toko.php');

	$objBarang = new Barang();
	$objToko = new Toko();
	$objTokoList= $objToko->SelectAllToko();

	if (isset($_POST['btnSubmit'])) {
		$objBarang->id_barang = $_POST['id_barang'];
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
			echo '<script> window.location = "dashboard.php?p=baranglist"; </script>';
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
            <h4 class="title text-center fs-1 fw-bolder" >Barang</h4>
    
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $objBarang->nama_barang; ?>" placeholder="nama barang" class="form-control">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                <input type="textarea" name="deskripsi" value="<?php echo $objBarang->deskripsi; ?>" class="form-control" id="exampleFormControlInput1" placeholder="deskripsi">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input type="text" name="harga" value="<?php echo $objBarang->harga; ?>" class="form-control" id="exampleFormControlInput1" placeholder="harga">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Variasi</label>
                <input type="text" name="variasi" value="<?php echo $objBarang->variasi; ?>" class="form-control" id="exampleFormControlInput1" placeholder="variasi">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">id_toko</label>
                <select name="id_toko" class="form-control">
                    <option value="">--Please select Toko--</option>
                        <?php
                            foreach ($objTokoList as $toko){
                                if($objToko->toko->id_toko == $toko->id_toko)
                                    echo '<option selected="true" value='.$toko->id_toko.'>'.$toko->nama_toko.'</option>';
                                else
                                    echo '<option value='.$toko->id_toko.'>'.$toko->nama_toko.'</option>';
                            }
                        ?>
                </select>
            </div>
			<div class="col-lg-6 button-end">
                <input class="btn btnsuccess" name="btnSubmit" type="submit" value="Save" >
            </div>
        </form>
    </div>
</div>