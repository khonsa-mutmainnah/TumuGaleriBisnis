<?php 

class Toko{
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
        $sql = "INSERT INTO toko(ssn, fname, alamat)
                VALUES ('$this->ssn', '$this->fname', '$this->alamat')";
                $this->hasil=mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil ditambahkan!';
        else
            $this->message='data gagal ditambahkan';
    }

    public function UpdateToko(){
        $sql = "UPDATE employee
                SET fname='$this->fname', alamat = '$this->alamat'
                WHERE ssn = '$this->ssn'";
        
        if($this->hasil)
            $this->message='data berhasil diupdate!';
        else
            $this->message='data gagal diupdate';
    }

    public function DeleteToko(){
        $sql = "DELETE FROM employee WHERE ssn='$this->ssn'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil dihapus!';
        else
            $this->message='data gagal dihapus';
    }

    public function SelectAllToko(){
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