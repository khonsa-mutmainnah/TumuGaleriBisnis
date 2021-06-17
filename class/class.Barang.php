<?php 
	require_once("class.Toko.php");

	class Barang extends Connection
	{
		
		private $id_barang = '';
		private $nama_barang = '';
		private $deskripsi = '';
		private $harga = '';
		private $variasi = '';
		private $toko;
		private $hasil = false;
		private $message = '';

		public function __get($atribute) {
			if (property_exists($this, $atribute)) {
				return $this->$atribute;
			}
		}
		public function __set($atribut, $value){
			if (property_exists($this, $atribut)) {
				$this->$atribut = $value;
			}
		}
		
		function __construct(){
			parent::__construct();
			$this->toko= new Toko();
		}

		public function SelectAllBarang(){
			$sql = "SELECT b.*, t.nama_toko 
			FROM barang b INNER JOIN toko t ON b.id_toko = t.id_toko ORDER BY b.id_barang";
			
			$result = mysqli_query($this->connection, $sql);
			
			$arrResult = Array();
			$cnt = 0;

			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objBarang = new Barang();
					$objBarang->id_barang = $data['id_barang'];
					$objBarang->nama_barang = $data['nama_barang'];
					$objBarang->deskripsi= $data['deskripsi'];
					$objBarang->harga = $data['harga'];
					$objBarang->variasi = $data['variasi'];
					$objBarang->toko->id_toko = $data['id_toko'];
					$objBarang->toko->nama_toko = $data['nama_toko'];
					$arrResult[$cnt] = $objBarang;
					$cnt++;
				}
			}	
			return $arrResult;				
		}

		public function SelectBarangByToko(){
			$sql = "SELECT b.*, t.nama_toko 
			FROM barang b INNER JOIN toko t ON b.id_toko = t.id_toko 
			WHERE b.id_toko=".$this->toko->id_toko."";
			
			$result = mysqli_query($this->connection, $sql);
			
			$arrResult = Array();
			$cnt = 0;

			if(mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$objBarang = new Barang();
					$objBarang->id_barang = $data['id_barang'];
					$objBarang->nama_barang = $data['nama_barang'];
					$objBarang->deskripsi= $data['deskripsi'];
					$objBarang->harga = $data['harga'];
					$objBarang->variasi = $data['variasi'];
					$objBarang->toko->id_toko = $data['id_toko'];
					$objBarang->toko->nama_toko = $data['nama_toko'];
					$arrResult[$cnt] = $objBarang;
					$cnt++;
				}
			}	
			return $arrResult;				
		}

		public function getAllGambarBarang(){
			$sql= "SELECT* FROM gambar_barang WHERE id_barang='$this->id_barang'";
			$result = mysqli_query($this->connection, $sql);
			$cnt = 0;
	
			require_once("class.gambar_barang.php");
			$arrResult  = Array();
			//ada
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_array($result)) {
					$gambarBarang = new GambarBarang();
					$gambarBarang->id_gb = $data['id_gb'];
					$gambarBarang->lokasi_gambar = $data['lokasi_gambar'];
					$gambarBarang->id_toko = $data['id_toko'];
	
					$arrResult[$cnt] = $gambarBarang;
					$cnt++;
				}
	
				return $arrResult;
			}
	
			//tidak ada
			else {
				return $arrResult = "kosong";
			}
		}

		public function AddBarang(){
			$sql = "INSERT INTO barang (nama_barang, deskripsi, harga, variasi, id_toko) 
			VALUES ('$this->nama_barang', '$this->deskripsi', '$this->harga', '$this->variasi',".$this->toko->id_toko.")";
			
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
				$this->message ='Data berhasil ditambahkan!';
			else
				$this->message ='Data gagal ditambahkan!';
		}
		public function UpdateBarang(){
			$sql = "UPDATE barang 
			SET nama_barang = '$this->nama_barang',
			deskripsi = '$this->deskripsi', 
			harga = '$this->harga', 
			variasi = '$this->variasi',
			id_toko = ".$this->toko->id_toko."
			WHERE id_barang = '$this->id_barang'";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
				$this->message ='Data berhasil ditambahkan!';
			else
				$this->message ='Data gagal ditambahkan!';
		}

		public function SelectSatuBarang(){
			$sql = "SELECT * FROM barang WHERE id_barang = $this->id_barang";
			$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));

			if (mysqli_num_rows($resultOne)==1) {
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);

				$this->id_barang = $data['id_barang'];
				$this->nama_barang = $data['nama_barang'];
				$this->deskripsi = $data['deskripsi'];
				$this->harga = $data['harga'];
				$this->variasi = $data['variasi'];
				$this->toko->id_toko =$data['id_toko'];
			}
		}
		public function DeleteBarang(){
			$sql = "DELETE FROM barang WHERE id_barang=$this->id_barang";
			$this->hasil = mysqli_query($this->connection, $sql);
			if ($this->hasil)
				$this->message = 'Data berhasil di hapus!';
			else
				$this->message = 'Data Gagal Dihapus';
			
		}
	}
 ?>