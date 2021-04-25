<?php 

class Toko{
    private $id_toko;
    private $nama_toko;
    private $logo;
    private $id_lokasi;
    private $tagline;
    private $no_telp;
    private $status;
    private $instagram;

    //Contructor Toko
    public function __construct(){
        $this->id_toko = $id_toko;
        $this->nama_toko = $nama_toko;
        $this->logo = $logo;
        $this->id_lokasi = $id_lokasi;
        $this->tagline = $tagline;
        $this->no_telp = $no_telp;
        $this->status = $status;
        $this->instagram = $instagram;
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