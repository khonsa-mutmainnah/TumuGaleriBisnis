<?php
    require_once ('./class/class.kategori.php');
    $objKategori= new Kategori();
    if(isset ($_POST['btnSubmit'])){
        $objKategori->id_kategori = $_POST['id_kategori'];
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
        <h4 class="title text-center fs-1 fw-bolder" >LOKASI</h4>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">id_kategori</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="id kategori" name="id_kategori" value="<?php echo $objKategori->id_kategori; ?>">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">nama kategori</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama kategori" name="nama_kategori" value="<?php echo $objKategori->nama_kategori; ?>">
        </div>
        <div class="col-lg-6 button-end">
          <input class="btn btnsuccess" name="btnSubmit" type="submit" value="Save" >
        </div>
      </form>
    </div>
</div>
<!-- <div class="kategori">
<h4 class="title" >KATEGORI</h4>
<form action="" method="post">
    <table class="table table-borderless table-responsive" style="color:#D9DFDB;">
        <tr>
            <td>ID Kategori</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="id_kategori"
            value="<?php echo $objKategori->id_kategori; ?>"></td>
        </tr>
        <tr>
            <td>Nama Kategori</td>
            <td>:</td>
            <td><input type="text" class="formcontrol" name="nama_kategori" value="<?php echo $objKategori->nama_kategori; ?>"></td>
        </tr>


        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit">
            <a href="index.php?p=kategorilist" class="btn btnwarning">Cancel</a></td>
        </tr>
    </table>
</form> -->

</div>

