<?php 

class Kategori extends connection{
    private $id_kategori = "";
    private $nama_kategori = "";
    private $hasil = false;
    private $message = "";

    // //kategori Contructor
    // public function __construct(
    //     $id_kategori,
    //     $nama_kategori

    // )
    // {
    //     $this->id_kategori = $id_kategori;
    //     $this->nama_kategori = $nama_kategori;
    
    // }

    //Get Automatic
    public function __get($atribute){
        if(property_exists($this, $atribute))
        {
            return $this->$atribute;
        }
    }
    public function __set($atribute, $value){
        if(property_exists($this,$atribute)){
            $this->atribute=$value;
        }
    }

    public function AddKategori(){
        $sql = "INSERT INTO kategori (id_kategori, nama_kategori)
                VALUES ('$this->id_kategori', '$this->nama_kategori')";
                $this->hasil=mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil ditambahkan!';
        else
            $this->message='data gagal ditambahkan';
    }

    public function UpdateKategori(){
        $sql = "UPDATE kategori
                SET '$this->id_kategori', '$this->nama_kategori'
                WHERE id_kategori = '$this->kategori'";
        
        if($this->hasil)
            $this->message='Kategori berhasil diupdate!';
        else
            $this->message='Kategori gagal diupdate';
    }

    public function DeleteKategori(){
        $sql = "DELETE FROM kategori WHERE id_kategori='$this->id_kategori'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message = 'data berhasil dihapus!';
        else
            $this->message = 'data gagal dihapus';
    }

    public function SelectAllKategori(){
        $sql="SELECT * FROM kategori";
        $result = mysqli_query($this->connection, $sql);
        $arrResult= Array();
        $cnt=0;

        if(mysqli_num_rows($result)>0){
            while ($data=mysqli_fetch_Array($result)){
                $objKategori = new Kategori();
                $objKategori->id_kategori = $data['id_kategori'];
                $objKategori->nama_kategori = $data['nama_kategori'];
                $arrResult[$cnt] = $objKategori;
                $cnt++;
            }
        }
        return $arrResult;
    }

    public function SelectOneKategori(){
        $sql="SELECT* FROM kategori WHERE id_kategori='$this->id_kategori'";
        $resultOne = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($resultOne) == 1){
            $this->hasil=true;

            $data=mysqli_fetch_assoc($resultOne);
            $objKategori->id_kategori = $id_kategori['id_kategori'];
            $objKategori->nama_kategori = $nama_kategori['nama_kategori'];
            
        }
    }
}
?>