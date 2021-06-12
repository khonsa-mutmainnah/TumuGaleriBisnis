<?php 
include 'class.User.php';
include 'class.Kategori.php';
include 'class.Lokasi.php';

class Toko extends Connection{
    private $id_toko='';
    private $nama_toko='';
    private $logo='';
    private $lokasi;
    private $tagline='';
    private $no_telp='';
    private $status;
    private $instagram='';
    private $url_toko='';
    private $user;
    private $kategori;
    private $hasil=false;
    private $message='';

    //Get Automatic
    public function __get($atribute)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
    }

    public function __set($atribute, $value)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute = $value;
        }
    }

    function __construct() {
        parent::__construct();
        $this->lokasi = new Lokasi();
        $this->user = new User();
        $this->kategori = new Kategori();
    }

    public function SelectAllToko(){
        $sql="SELECT t.id_toko, t.nama_toko, t.logo, t.tagline, t.no_telp, t.instagram, t.url_toko,
                u.username , k.nama_kategori, l.kecamatan, l.kota, l.provinsi, t.status
                FROM toko t JOIN user u ON u.id_user=t.id_user 
                    JOIN kategori k ON k.id_kategori=t.id_kategori
                    JOIN lokasi l ON l.id_lokasi=t.id_lokasi";
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
                $objToko->url_toko = $data['url_toko'];
                $objToko->user->username = $data['username'];
                $objToko->lokasi->kecamatan = $data['kecamatan'];
                $objToko->lokasi->kota = $data['kota'];
                $objToko->lokasi->provinsi = $data['provinsi'];
                $objToko->kategori->nama_kategori = $data['nama_kategori'];
                $arrResult[$cnt]=$objToko;
                $cnt++;
            }
        }
        return $arrResult;
    }

    public function AddToko(){
        $sql = "INSERT INTO toko(nama_toko, id_lokasi, 
                tagline, no_telp, instagram, url_toko, id_kategori, id_user)
                VALUES ('$this->nama_toko', ".$this->lokasi->id_lokasi.",
                        '$this->tagline', '$this->no_telp', '$this->instagram', '$this->url_toko',
                        ".$this->kategori->id_kategori.", ".$this->user->id_user.")";
                $this->hasil=mysqli_query($this->connection, $sql);
                
        if($this->hasil)
            $this->message='toko berhasil ditambahkan!';
        else
            $this->message='toko gagal ditambahkan';
    }

    public function AddLogoToko(){
        $sql = "INSERT INTO toko(logo)
                VALUES ('$this->logo')";
                $this->hasil=mysqli_query($this->connection, $sql);
                
        if($this->hasil)
            $this->message='logo toko berhasil ditambahkan!';
        else
            $this->message='logo toko gagal ditambahkan';
    }

    public function UpdateToko(){
        $sql = "UPDATE toko
                SET nama_toko='$this->nama_toko', id_lokasi=".$this->lokasi->id_lokasi.",
                    tagline='$this->tagline', no_telp='$this->no_telp', instagram='$this->instagram', url_toko='$this->url_toko',
                    id_kategori=".$this->kategori->id_kategori.", id_user=".$this->user->id_user."
                WHERE id_toko = '$this->id_toko'";
                $this->hasil=mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='toko berhasil diupdate!';
        else
            $this->message='toko gagal diupdate';
    }

    public function UpdateLogoToko(){
        $sql = "UPDATE toko
                SET logo='$this->logo'
                WHERE id_toko='$this->id_toko'";
                $this->hasil = mysqli_query($this->connection, $sql);
        
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
            $this->url_toko = $data['url_toko'];
            $this->user->id_user = $data['id_user'];
            $this->lokasi->id_lokasi = $data['id_lokasi'];
            $this->kategori->id_kategori = $data['id_kategori'];
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