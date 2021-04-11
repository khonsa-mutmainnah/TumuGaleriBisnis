<?php 

class Barang{
    private $kode;
    private $namaBarang;
    private $deskripsi;
    private $harga;
    private $variasi;
    private $gambar;
    private $status;

    //Contructor Barang
    public function __construct(
        $kode;
        $namaBarang;
        $deskripsi;
        $harga;
        $variasi;
        $gambar;
        $status;
    )
    {
        $this->kode = $kode;
        $this->namaBarang = $namaBarang;
        $this->deskripsi = $deskripsi;
        $this->harga = $harga;
        $this->variasi = $variasi;
        $this->gambar = $gambar;
        $this->status = $status;
    }

    //Get Automatic
    public function __get($atribute){
        if(property_exists($this, $atribute))
        {
            return $this->$atribute;
        }
    }
}
?>