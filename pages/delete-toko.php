<?php
require_once('./class/class.Toko.php');

if(isset($_GET['id_toko']))
{
    $objToko = new Toko();
    $objToko->id_toko = $_GET['ssn'];
    $objToko->DeleteToko();
    echo "<script> alert('$objToko->message'); </script>";
    echo "<script>window.location = 'index.php?p=tokolist'</script>";
}
else
{
    echo '<script>window.history.back()</script>';
}

?>