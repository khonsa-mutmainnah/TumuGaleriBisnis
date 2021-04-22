<?php
    if (isset($_POST['submit'])){
        $file = $_FILES['file'];
        print_r($file);
        $fileName = $_FILES['file']['name'];
    }
?>

<div class="tambahproduk">
    <div class="all-form">

        <div class="judul">
            <p>TAMBAH PRODUK</p>
        </div>
        <div class="input">
            <h4>Masukkan Gambar</h4>
            <form action="tambahproduk.php" method="POST" enctype="multipart/form-data">
                <div class="ufile">
                    <input type="file" id="file" name="file">
                    <label for="file" class="label-file">
                        <img class="logo-upload" src="./svg/upload-icon.svg" style="width:61.79px;" alt="">
                    </label>
                </div>
                <br><br><br>
                <div class="form-semua">
                    Nama produk : <input type="text" name="nproduk"> <br>
                    Deskripsi produk :<textarea name="dproduk" id="" cols="30" rows="10"></textarea> <br>
                    Harga : <input type="text" name="harga"> <br>
                    Harga Grosir : <input type="text" name="hgrosir"> <br>
                    Variasi : <input type="text" name="variasi"> <br>
                    <div class="footer">
                        <input type="submit" name="submit" value="Next">
                        <input type="reset" name="reset" value="Hapus">
                    </div>
                </div>
            </form>              
        </div>            
    </div>
</div>
