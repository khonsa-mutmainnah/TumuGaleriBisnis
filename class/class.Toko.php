<?php 
include 'class.User.php';
include 'class.Kategori.php';
include 'class.Lokasi.php';

class Toko extends Connection{
    private $id_toko='';
    private $nama_toko='';
    private $logo='';
    private $id_lokasi;
    private $tagline='';
    private $no_telp='';
    private $status='';
    private $instagram='';
    private $username;
    private $hasil=false;
    private $message='';

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

    function __construct() {
        parent::__construct();
        $this->lokasi = new Lokasi();
        $this->user = new User();
        $this->kategori = new Kategori();
    }

    public function SelectAllToko(){
        $sql="SELECT t.id_toko, t.nama_toko, t.logo, t.tagline, t.no_telp, t.instagram, u.username, l.kecamatan, l.kota, l.provinsi, k.nama_kategori, t.status
            FROM toko t INNER JOIN user u ON t.id_user=u.id_user
            INNER JOIN lokasi l ON t.id_lokasi=l.id_lokasi
            INNER JOIN kategori k ON t.id_kategori=k.id_kategori";
        $result = mysqli_query($this->connection, $sql);
        $arrResult= Array();
        $cnt=0;

        if(mysqli_num_rows($result)>0){
            while ($data=mysqli_fetch_Array($result)){
                $objToko = new Toko();
                $objToko->id_toko = $data['id_toko'];
                $objToko->nama_toko = $data['nama_toko'];
                $objToko->logo = $data['logo'];
                $objToko->tagline = $data['tagline'];
                $objToko->no_telp = $data['no_telp'];
                $objToko->status = $data['status'];
                $objToko->instagram = $data['instagram'];
                $objToko->user->id_user = $data['id_user'];
                $objToko->lokasi->kecamatan = $data['kecamatan'];
                $objToko->lokasi->kota = $data['kota'];
                $objToko->lokasi->provinsi = $data['provinsi'];
                $objToko->kategori->nama_kategori = $data['kategori'];
                $arrResult[$cnt]=$objToko;
                $cnt++;
            }
        }
        return $arrResult;
    }

    public function AddToko(){
        $sql = "INSERT INTO toko(id_toko, nama_toko, logo, id_lokasi, tagline, no_telp, status, 
        instagram, id_kategori, id_user)
                VALUES ('$this->id_toko', '$this->nama_toko', '$this->logo', ".$this->lokasi->id_lokasi.",
                        '$this->tagline', '$this->no_telp', '$this->status', '$this->instagram'
                        ".$this->kategori->id_kategori.", ".$this->user->id_user.")";
                $this->hasil=mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='toko berhasil ditambahkan!';
        else
            $this->message='toko gagal ditambahkan';
    }

    public function UpdateToko(){
        $sql = "UPDATE toko
                SET (id_toko='$this->id_toko', nama_toko='$this->nama_toko', logo='$this->logo', id_lokasi=".$this->lokasi->id_lokasi.",
                        tagline='$this->tagline', no_telp='$this->no_telp', status='$this->status', instagram='$this->instagram',
                        id_kategori=".$this->kategori->id_kategori.", id_user".$this->user->id_user.")";
        
        if($this->hasil)
            $this->message='toko berhasil diupdate!';
        else
            $this->message='toko gagal diupdate';
    }

    public function SelectOneToko(){
        $sql="SELECT* FROM toko WHERE id_toko='$this->id_toko'";
        $resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

        if(mysqli_num_rows($resultOne)==1){
            $this->hasil=true;
            $data=mysqli_fetch_assoc($resultOne);

            $this->id_toko = $data['id_toko'];
            $this->nama_toko = $data['nama_toko'];
            $this->logo = $data['logo'];
            $this->tagline = $data['tagline'];
            $this->no_telp = $data['no_telp'];
            $this->status = $data['status'];
            $this->instagram = $data['instagram'];
            $this->user->id_user = $data['id_user'];
            $this->lokasi->kecamatan = $data['kecamatan'];
            $this->lokasi->kota = $data['kota'];
            $this->lokasi->provinsi = $data['provinsi'];
            $this->kategori->nama_kategori = $data['kategori'];
        }
    }

    public function DeleteToko(){
        $sql = "DELETE FROM toko WHERE id_toko='$this->id_toko'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil dihapus!';
        else
            $this->message='data gagal dihapus';
    }

    
}
?>