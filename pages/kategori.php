<?php
    require_once ('./class/class.kategori.php');
    $objKategori= new Kategori();
    if(isset ($_POST['btnSubmit'])){
        $objKategori->nama_kategori = $_POST['nama_kategori'];

        if(isset ($_GET['id_kategori'])){
            $objKategori->id_kategori= $_GET['id_kategori'];
            $objKategori->UpdateKategori();
        }
        else{
            $objKategori->AddKategori();
        }
        echo "<script> alert('$objKategori->message'); </script>";
        if($objKategori->hasil){
            echo '<script> window.location = "?p=kategorilist"; </script>';
        }
    }
    else if(isset($_GET['id_kategori'])){
        $objKategori->id_kategori = $_GET['id_kategori'];
        $objKategori->SelectOneKategori();
    }
?>
<div class="kategori">
    <div class="container col-lg-7">
      <form form action="" method="post" class="kategori-form">
        <h4 class="title text-center fs-1 fw-bolder" >kategori</h4>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">nama kategori</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_kategori" value="<?php echo $objKategori->nama_kategori; ?>" placeholder="nama kategori" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 button-end">
                <a class="btn" href="?p=kategorilist">kembali</a>
                <input class="btn" name="btnSubmit" type="submit" value="simpan">
            </div>
      </form>
    </div>
</div>

