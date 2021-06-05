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
            echo '<script> window.location = "index.php?p=kategorilist"; </script>';
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
          <label for="exampleFormControlInput1" class="form-label">nama kategori</label>
          <input type="text" name="nama_kategori" value="<?php echo $objKategori->nama_kategori; ?>" class="form-control" id="exampleFormControlInput1" placeholder="nama kategori">
        </div>
        <div class="col-lg-6 button-end">
          <input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
        </div>
      </form>
    </div>
</div>

