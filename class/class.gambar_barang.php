<?php
    include "class.Barang.php";

    class GambarBarang extends Connection{
        private $id_gb='';
        private $barang;
        private $lokasi_gambar='';
        private $hasil = false;
        private $message = "";
        
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
            $this->barang = new Barang();
        }

        public function AddGambarBarang(){
            $sql = "INSERT INTO gambar_barang (id_barang, lokasi_gambar)
                VALUES (".$this->barang->id_barang.",'$this->lokasi_gambar')";
                $this->hasil = mysqli_query($this->connection, $sql);
                
            if($this->hasil){
                $this->message='data berhasil ditambahkan!';
            }
            else{
                    $this->message='data gagal ditambahkan';
            }
        }
    
        public function DeleteGambarBarang(){
            $sql = "DELETE FROM gambar_barang WHERE id_gb='$this->id_gb'";
            $this->hasil = mysqli_query($this->connection, $sql);
    
            if($this->hasil)
                $this->message = 'data berhasil dihapus!';
            else
                $this->message = 'data gagal dihapus';
        }
    
        public function SelectAllGambarBarang(){
            $sql="SELECT b.nama_barang, gb.lokasi_gambar 
            FROM gambar_barang gb INNER JOIN barang b 
            ON b.id_barang=gb.id_barang";
            $result = mysqli_query($this->connection, $sql);
            $arrResult= Array();
            $cnt=0;
    
            if(mysqli_num_rows($result)>0){
                while ($data=mysqli_fetch_Array($result)){
                    $objGambarBarang = new GambarBarang();
                    $objGambarBarang->barang->nama_barang = $data['nama_barang'];
                    $objGambarBarang->lokasi_gambar = $data['lokasi_gambar'];
                    $arrResult[$cnt] = $objGambarBarang;
                    $cnt++;
                }
            }
            return $arrResult;
        }
    
    }
?>