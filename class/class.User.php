<?php 

class User{
    private $username;
    private $password;
    private $nama;
    private $email;
    private $no_hp;
    private $kota;
    private $role;
    private $hasil=false;
    private $message='';

    //User Contructor
    public function __construct(){
        $this->username = $username;
        $this->password = $password;
        $this->nama = $nama;
        $this->email = $email;
        $this->no_hp = $no_hp;
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
    
    public function __set($atribut, $value){
        if(property_exists($this,$atribut)){
            $this->atribut=$value;
        }
    }
}
?>