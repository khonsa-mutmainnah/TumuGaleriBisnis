<?php 

class Toko extends Connection{
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
    public function __get($atribut){
        if(property_exists($this, $atribut))
        {
            return $this->$atribut;
        }
    }

    public function __set($atribut, $value){
        if(property_exists($this,$atribut)){
            $this->atribut=$value;
        }
    }

    public function AddToko(){
        $sql = "INSERT INTO employee(ssn, fname, alamat)
                VALUES ('$this->ssn', '$this->fname', '$this->alamat')";
                $this->hasil=mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil ditambahkan!';
        else
            $this->message='data gagal ditambahkan';
    }
}
?>