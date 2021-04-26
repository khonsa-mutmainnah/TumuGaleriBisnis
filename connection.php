<?php
class Connection{
   private $host = "localhost";
   private $struser = "root";
   private $strpassword = "";
   private $dbname = "tumu_gb";
   public $connection;
      
	function __construct() {
	   $this->connect();
	}
	
	function connect(){
	    $conn = mysqli_connect($this->host,$this->struser, $this->strpassword);
	 	 mysqli_select_db($conn, $this->dbname);
		 $this->connection = $conn;	
	}

}
?>