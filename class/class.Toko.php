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
    public function __construct(
        $id_toko,
        $nama_toko,
        $logo,
        $id_lokasi,
        $tagline,
        $no_telp,
        $status,
        $instagram
    )
    {
        $this->idToko = $idToko;
        $this->namaToko = $namaToko;
        $this->logo = $logo;
        $this->alamat = $alamat;
        $this->tagline = $tagline;
        $this->noTelp = $noTelp;
        $this->status = $status;
        $this->instagram = $instagram;
        $this->website = $website;
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