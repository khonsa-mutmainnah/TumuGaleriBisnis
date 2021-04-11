<?php 

class Kategori{
    private $idKategori;
    private $namaKategori;

    //kategori Contructor
    public function __construct(
        $idKategori;
        $namaKategori;

    )
    {
        $this->idKategori = $idKategori;
        $this->namaKategori = $namaKategori;
    
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