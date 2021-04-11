<?php 

class User{
    private $username;
    private $password;
    private $nama;
    private $noTelp;
    private $email;
    private $kota;
    private $role;

    //User Contructor
    public function __construct(
        $username;
        $password;
        $nama;
        $noTelp;
        $email;
        $kota;
        $role;
    )
    {
        $this->username = $username;
        $this->password = $password;
        $this->nama = $nama;
        $this->noTelp = $noTelp;
        $this->email = $email;
        $this->kota = $kota;
        $this->role = $role;
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