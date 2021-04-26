<?php 

class Toko extends connection{
    private $id_toko;
    private $nama_toko;
    private $logo;
    private $id_lokasi;
    private $tagline;
    private $no_telp;
    private $status;
    private $instagram;
    private $hasil=false;
    private $message='';

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
        $sql = "INSERT INTO toko(id_toko, nama_toko, logo, id_lokasi, tagline, no_telp, status, instagram)
                VALUES ('$this->id_toko', '$this->nama_toko', '$this->logo', '$this->id_lokasi', '$this->tagline', '$this->no_telp', '$this->status', '$this->instagram')";
                $this->hasil=mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='toko berhasil ditambahkan!';
        else
            $this->message='toko gagal ditambahkan';
    }

    public function UpdateToko(){
        $sql = "UPDATE toko
                SET '$this->id_toko', '$this->nama_toko', '$this->logo', '$this->id_lokasi', '$this->tagline', '$this->no_telp', '$this->status', '$this->instagram'
                WHERE id_toko = '$this->toko'";
        
        if($this->hasil)
            $this->message='toko berhasil diupdate!';
        else
            $this->message='toko gagal diupdate';
    }

    public function DeleteToko(){
        $sql = "DELETE FROM employee WHERE id_toko='$this->id_toko'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil dihapus!';
        else
            $this->message='data gagal dihapus';
    }

    public function SelectAllToko(){
        $sql="SELECT * FROM toko";
        $result = mysqli_query($this->connection, $sql);
        $arrResult= Array();
        $cnt=0;

        if(mysqli_num_rows($result)>0){
            while ($data=mysqli_fetch_Array($result)){
                $objToko = new Toko();
                $objToko->id_toko = $id_toko['id_toko'];
                $objToko->nama_toko = $nama_toko['nama_toko'];
                $objToko->logo = $logo['logo'];
                $objToko->id_lokasi = $id_lokasi['id_lokasi'];
                $objToko->tagline = $tagline['tagline'];
                $objToko->no_telp = $no_telp['no_telp'];
                $objToko->status = $status['status'];
                $objToko->instagram = $instagram['instagram'];
                $arrResult[$cnt]=$objToko;
                $cnt++;
            }
        }
        return $arrResult;
    }

    public function SelectOneEmployee(){
        $sql="SELECT* FROM toko WHERE id_toko='$this->id_toko'";
        $resultOne = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($resultOne)==1){
            $this->hasil=true;

            $data=mysqli_fetch_assoc($resultOne);
            $objToko->id_toko = $id_toko['id_toko'];
            $objToko->nama_toko = $nama_toko['nama_toko'];
            $objToko->logo = $logo['logo'];
            $objToko->id_lokasi = $id_lokasi['id_lokasi'];
            $objToko->tagline = $tagline['tagline'];
            $objToko->no_telp = $no_telp['no_telp'];
            $objToko->status = $status['status'];
            $objToko->instagram = $instagram['instagram'];
        }
    }
}
?>