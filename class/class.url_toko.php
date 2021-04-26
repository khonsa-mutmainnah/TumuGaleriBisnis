<?php 

class url_toko extends connection{
    private $id_toko;
    private $url_toko;

    // Contructor
    public function __construct(
        $id_toko,
        $url_toko

    )
    {
        $this->id_toko = $id_toko;
        $this->url_toko = $url_toko;
    
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