<?php 

class Toko{
    private $idToko;
    private $namaToko;
    private $logo;
    private $alamat;
    private $tagline;
    private $noTelp;
    private $status;
    private $website;

    //Toko Contructor
    public function __construct(
        $idToko;
        $namaToko;
        $logo;
        $alamat;
        $tagline;
        $noTelp;
        $status;
        $website;
    )
    {
        $this->idToko = $idToko;
        $this->namaToko = $namaToko;
        $this->logo = $logo;
        $this->alamat = $alamat;
        $this->tagline = $tagline;
        $this->noTelp = $noTelp;
        $this->status = $status;
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