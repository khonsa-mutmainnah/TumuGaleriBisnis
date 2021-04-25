<?php 

class Barang{
    private $id_barang;
    private $nama_barang;
    private $deskripsi_barang;
    private $harga;
    private $variasi;
    private $gambar;
    private $id_toko;
    private $status;

    //Contructor Barang
    public function __construct(
        $id_barang,
        $nama_barang,
        $deskripsi_barang,
        $harga,
        $variasi,
        $gambar,
        $id_toko,
        $status
    )
    {
        $this->id_barang = $id_barang;
        $this->nama_barang = $nama_barang;
        $this->deskripsi_barang = $deskripsi_barang;
        $this->harga = $harga;
        $this->variasi = $variasi;
        $this->gambar = $gambar;
        $this->id_toko = $id_toko;
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