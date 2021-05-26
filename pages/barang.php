<?php 
	require_once ('./class/class.Barang.php');
	$objBarang = new Barang();

	if (isset ($_POST['btnSubmit'])) {
		$objBarang->id_barang = $_POST['id_barang'];
		$objBarang->nama_barang = $_POST['nama_barang'];
		$objBarang->deskripsi= $_POST['deskripsi'];
		$objBarang->harga = $_POST['harga'];
		$objBarang->variasi = $_POST['variasi'];
		$objBarang->id_toko = $_POST['id_toko'];

		if (isset($_GET['id_barang'])) {
			$objBarang->id_barang = $_GET['id_barang'];
			$objBarang->UpdateBarang();
		}else{
			$objBarang->AddBarang();
		}

		echo "<script> alert('$objBarang->message'); </script>";
		if($objBarang->hasil){
		echo '<script> window.location = "index.php?p=baranglist";
		</script>';}
		}
	elseif (isset($_GET['id_barang'])) {
		$objBarang->id_barang = $_GET['id_barang'];
		$objBarang->SelectSatuBarang();
	}
?>

	<h4 class="title">
		<span class="text"><strong>Barang</strong></span>
	</h4>
	<form action="" method="post">
		<table class="table">
			<tr>
				<td>ID Barang</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="id_barang"
				value="<?php echo $objBarang->id_barang; ?>"></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" class="form-control" id_barang="nama_barang" name="nama_barang"
				value="<?php echo $objBarang->nama_barang; ?>"></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td><textarea class="form-control" name="deskripsi" rows="3" cols="19"
				value="<?php echo $objBarang->deskripsi; ?>"></textarea>
				</td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="text" class="form-control" id_barang="harga" name="harga"
				value="<?php echo $objBarang->harga; ?>"></td>

			</tr>
			<tr>
				<td>id toko</td>
				<td>:</td>
				<td><textarea class="form-control" name="id_toko" rows="3" cols="19"
				value="<?php echo $objBarang->id_toko; ?>"></textarea>
				</td>
			</tr>
			<tr>
				<td>Variasi</td>
				<td>:</td>
				<td><input type="text" class="form-control" id_barang="variasi" name="variasi"
				value="<?php echo $objBarang->variasi; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit">
					<a href="index.php?p=baranglist" class="btn btnwarning">Cancel</a>
				</td>
			</tr>
		</table>
	</form>

