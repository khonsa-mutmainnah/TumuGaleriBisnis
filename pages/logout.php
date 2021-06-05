<?php
// require_once("./authPemilik.php");
session_destroy();

echo "<script>
      alert('Anda Berhasil Keluar!');
      window.location = 'index.php'
      </script>";