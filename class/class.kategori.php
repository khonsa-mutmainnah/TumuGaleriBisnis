<?php 

class Kategori{
    private $id_kategori;
    private $nama_kategori;

    //kategori Contructor
    public function __construct(
        $id_kategori,
        $nama_kategori

    )
    {
        $this->id_kategori = $id_kategori;
        $this->nama_kategori = $nama_kategori;
    
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