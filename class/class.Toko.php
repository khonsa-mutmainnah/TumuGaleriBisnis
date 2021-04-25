<?php 

class Toko{
    private $id_toko;
    private $namaToko;
    private $logo;
    private $id_lokasi;
    private $tagline;
    private $noTelp;
    private $status;
    private $instagram;

    //Contructor Toko
    public function __construct(
    $id_toko;
    $namaToko;
    $logo;
    $id_lokasi;
    $tagline;
    $noTelp;
    $status;
    $instagram;
    )
    {
        $this->idToko = $idToko;
        $this->namaToko = $namaToko;
        $this->logo = $logo;
        $this->alamat = $alamat;
        $this->tagline = $tagline;
        $this->noTelp = $noTelp;
        $this->status = $status;
        $this->instagram = $instagram;
    }

    //Get Automatic
    public function __get($atribute){
        if(property_exists($this, $atribute))
        {
            return $this->$atribute;
        }
    }

    public function AddToko(){
        $sql = "INSERT INTO toko(nama_toko, logo, tagline, no_telp, status, instagram)
                VALUES ('$this->nama_toko', '$this->logo', '$this->tagline', '$this->no_telp', '$this->status', '$this->instagram')";
                $this->hasil=mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil ditambahkan!';
        else
            $this->message='data gagal ditambahkan';
    }

    public function UpdateToko(){
        $sql = "UPDATE toko
                SET nama_toko='$this->nama_toko', logo='$this->logo', tagline='$this->tagline', no_telp='$this->no_telp', status='$this->id_status', instagram='$this->instagram'
                WHERE id_toko = '$this->id_toko'";
        
        if($this->hasil)
            $this->message='toko berhasil diupdate!';
        else
            $this->message='toko gagal diupdate';
    }

    public function DeleteToko(){
        $sql = "DELETE FROM toko WHERE id_toko='$this->id_toko'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='toko berhasil dihapus!';
        else
            $this->message='toko gagal dihapus';
    }

    public function SelectAllEmployee(){
        $sql="SELECT * FROM employee";
        $result = mysqli_query($this->connection, $sql);
        $arrResult= Array();
        $cnt=0;

        if(mysqli_num_rows($result)>0){
            while ($data=mysqli_fetch_Array($result)){
                $objEmployee = new Employee();
                $objEmployee->ssn=$data['ssn'];
                $objEmployee->fname=$data['fname'];
                $objEmployee->alamat=$data['alamat'];
                $arrResult[$cnt]=$objEmployee;
                $cnt++;
            }
        }
        return $arrResult;
    }

    public function SelectOneEmployee(){
        $sql="SELECT* FROM employee WHERE ssn='$this->ssn'";
        $resultOne = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($resultOne)==1){
            $this->hasil=true;

            $data=mysqli_fetch_assoc($resultOne);
            $this->fname=$data['fname'];
            $this->alamat=$data['alamat'];
        }
    }
}
?>