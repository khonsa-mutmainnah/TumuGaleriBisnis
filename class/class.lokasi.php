<?php 

class lokasi extends connection{
    private $id_lokasi;
    private $kecamatan;
    private $kota;
    private $provinsi;

    //Contructor lokasi
    public function __construct(
        $id_lokasi,
        $kecamatan,
        $kota,
        $provinsi
    )
    {
        $this->id_lokasi = $id_lokasi;
        $this->kecamatan = $kecamatan;
        $this->kota = $kota;
        $this->provinsi = $provinsi;
        
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