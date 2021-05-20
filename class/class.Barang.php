<?php 

	require
	/**
	 * 
	 */
	class Barang extends Connection
	{
		
		private $id_barang = '';
		private $nama_barang = '';
		private $deskripsi = '';
		private $harga = '';
		private $variasi = '';
		private $id_toko = '';

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

		function __construct() {
			parent::__construct();
		}

		public function SelectAllBarang(){
			$sql = "SELECT b.*, t.nama_toko FROM barang b INNER JOIN toko t ON b.id_toko = t.id_toko";
			$result = mysql_query($this->connection, $sql);

			$arrResult = Array();
			$cnt = 0;

			if (mysqli_num_rows($result)>0) {
				while ($data = mysqli_fetch_array($result)) {
					$objBarang = new Barang();
					$objBarang->id_barang=$data['id_barang'];
					$objBarang->nama_barang = $data['nama_barang'];
					$objBarang->deskripsi= $data['deskripsi'];
					$objBarang->harga = $data['harga'];
					$objBarang->variasi = $data['variasi'];
					$objBarang->id_toko = $data['id_toko'];
					$cnt++;
				}
				return $arrResult				
			}
		}

		public function AddBarang(){
		$sql = "INSERT INTO barang (id_barang, nama_barang, deskripsi, harga) VALUES ($this->id_barang, '$this->nama_barang', '$this->deskripsi', ".$this->dept->dnumber.")";
		$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil ditambahkan!';
			else
				$this->message ='Data gagal ditambahkan!';
		}

		public function UpdateBarang(){
			$sql = "UPDATE barang SET 
					nama_barang = '$this->nama_barang'
					deskripsi = '$this->deskripsi'
					harga = '$this->harga'
					variasi = '$this->variasi'
					WHERE id_barang = '$this->id_barang';"

			if($this->hasil)
			$this->message ='Data berhasil ditambahkan!';
			else
			$this->message ='Data gagal ditambahkan!';
			}
		}

		public function DeleteBarang(){
			$sql = "DELETE FROM barang WHERE id_barang='$this->id_barang'";

			$this->hasil = mysqli_query($this->connection, $sql);

			if ($this->hasil) {
				$this->message = 'Data berhasil di hapus!';
			}else{
				$this->message = 'Data Gagal Dihapus';
			}
		}

		public function SelectSatuBarang(){
			$sql = "SELECT * FROM barang WHERE id_barang = '$this->id_barang'"
			$resultOne = mysqli_query($this->connection, $sql);

			if (mysqli_num_rows($resultOne)==1) {
				$this->hasil = true;

				$data = mysql_fetch_assoc($resultOne);
				$this->nama_barang = $data['nama_barang'];
				$this->deskripsi = $data['deskripsi'];
			}
		}
	}
 ?>