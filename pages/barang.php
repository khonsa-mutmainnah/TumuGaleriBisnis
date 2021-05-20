<?php 
	require_once('./class/class.Barang.php')
	$objBarang = new Barang();

	if (isset($_POST['btnSubmit'])) {
		$objBarang->id_barang = $_POST['id_barang'];
	}
 ?>