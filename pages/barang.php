<?php 
	require_once('./class/class.Barang.php')
	$objBarang = new Barang();

	if (isset($_POST['btnSubmit'])) {
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
		echo '<script> window.location = "index.php?p=listbarang";
		</script>';}
	}

	elseif (isset($_GET['id_barang'])) {
		$objBarang->id_barang = $_GET['id_barang'];
		$objEmployee->SelectSatuBarang();
	}
?>

	<h4 class="title">
		<span class="text"><strong>Employee</strong></span>
	</h4>
	<form action="" method="post">
		<table class="table">
			<tr>
				<td>SSN</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="ssn"
				value="<?php echo $objEmployee->ssn; ?>"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input type="text" class="formcontrol" ssn="fname" name="fname"
				value="<?php echo $objEmployee->fname; ?>"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><textarea class="formcontrol" name="address" rows="3" cols="19">
				<?php echo $objEmployee->address; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit">
					<a href="index.php?p=employeelist" class="btn btnwarning">Cancel</a>
				</td>
			</tr>
		</table>
	</form>