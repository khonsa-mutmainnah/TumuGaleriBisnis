<?php
require_once('./class/class.kategori.php');

if(isset($_GET['id_kategori'])){
    $objKategori = new Kategori();
    $objKategori->id_kategori = $_GET['id_kategori'];
    $objKategori->DeleteKategori();
    echo "<script> alert('$objKategori->message'); </script>";
    echo "<script>window.location = '?p=kategorilist'</script>";
}
else{
    echo '<script>window.history.back()</script>';
}

?>