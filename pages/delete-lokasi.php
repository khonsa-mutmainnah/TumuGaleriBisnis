<?php
require_once('./class/class.lokasi.php');
if(isset($_GET['id_lokasi'])){
$objLokasi = new Lokasi();
$objLokasi->id_lokasi = $_GET['id_lokasi'];
$objLokasi->DeleteLokasi();
echo "<script> alert('$objLokasi->message'); </script>";
echo "<script>window.location = 'index.php?p=lokasilist'</script>";
}
else{
echo '<script> window.history.back() </script>';
}
?>