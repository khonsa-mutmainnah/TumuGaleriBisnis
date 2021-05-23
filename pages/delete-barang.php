<?php
	require_once('./class/class.Barang.php');
	if(isset($_GET['id_barang'])){
		$objBarang = new Barang();
		$objBarang->id_barang = $_GET['id_barang'];
		$objBarang->DeleteBarang();
		echo "<script> alert('$objBarang->message'); </script>";
		echo "<script>window.location = 'index.php?p=baranglist'</script>";
	}
	else{
		echo '<script> window.history.back() </script>';
	}
?>