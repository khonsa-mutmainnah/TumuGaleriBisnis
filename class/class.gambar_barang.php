<?php
    include "class.Barang.php";

    class GambarBarang extends Connection{
        private $id_barang;
        private $gambar_barang='';
        
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
    
        public function AddGambarBarang(){
            $sql = "INSERT INTO gambar_barang (id_gambar, gambar_barang)
                    VALUES ('$this->id_gambar','$this->gambar_barang')";
                    $this->hasil=mysqli_query($this->connection, $sql);
    
            if($this->hasil)
                $this->message='data berhasil ditambahkan!';
            else
                $this->message='data gagal ditambahkan';
        }
    
        public function UpdateGambarBarang(){
            $sql = "UPDATE gambar_barang
                    SET '$this->gambar_barang'
                    WHERE id_gambar = '$this->id_gambar'";
            
            if($this->hasil)
                $this->message='gambar berhasil diupdate!';
            else
                $this->message='gambar gagal diupdate';
        }
    
        public function DeleteGambarBarang(){
            $sql = "DELETE FROM gambar_barang WHERE id_barang='$this->id_barang'";
            $this->hasil = mysqli_query($this->connection, $sql);
    
            if($this->hasil)
                $this->message = 'data berhasil dihapus!';
            else
                $this->message = 'data gagal dihapus';
        }
    
        public function SelectAllGambarBarang(){
            $sql="SELECT * FROM gambar_barang";
            $result = mysqli_query($this->connection, $sql);
            $arrResult= array();
            $cnt=0;
    
            if(mysqli_num_rows($result)>0){
                while ($data=mysqli_fetch_Array($result)){
                    $objGambarBarang = new GambarBarang();
                    $objGambarBarang->id_barang = $data['id_barang'];
                    $objGambarBarang->gambar_barang = $data['gambar_barang'];
                    $arrResult[$cnt] = $objGambarBarang;
                    $cnt++;
                }
            }
            return $arrResult;
        }
    
        public function SelectOneGambarBarang(){
            $sql="SELECT* FROM gambar_barang WHERE id_barang='$this->id_barang'";
            $resultOne = mysqli_query($this->connection, $sql);
    
            if(mysqli_num_rows($resultOne) == 1){
                $this->hasil=true;
    
                $data=mysqli_fetch_assoc($resultOne);
                $this->gambar_barang = $data['gambar_barang'];
                
            }
        }
    
    }
?>