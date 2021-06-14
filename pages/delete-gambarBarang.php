<?php
require_once('./class/class.gambar_barang.php');

if(isset($_GET['id_gb'])){
    $objGambarBarang = new GambarBarang();
    $objGambarBarang->id_gb = $_GET['id_gb'];
    $objGambarBarang->DeleteGambarBarang();
    echo "<script> alert('$objGambarBarang->message'); </script>";
    echo "<script>window.location = '?p=gambarBarangList'</script>";
}
else{
    echo '<script>window.history.back()</script>';
}

?>