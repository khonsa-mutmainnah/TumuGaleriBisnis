<?php
if (!isset($_SESSION)) {
    session_start();
}

//if not logged in
if (!isset($_SESSION['email'])) {
    echo "<script>
          alert('Maaf, Anda Tidak Mempunyai Akses Ke Halaman Ini')
          window.location = 'index.php';
          </script>";
    exit();
}

else if ($_SESSION['role'] != 'admin') {
    echo "<script>
          alert('Maaf, Anda Tidak Mempunyai Akses Ke Halaman Ini')
          window.location = 'dashboard.php';
          </script>";
    exit();
}