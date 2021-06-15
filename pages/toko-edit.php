<?php
    require_once('./class/class.Toko.php');
    require_once('./class/class.User.php');
    require_once('./class/class.Lokasi.php');
    require_once('./class/class.kategori.php');

    

    $objToko= new Toko();
    $objToko->id_toko=isset($_GET['id_toko']);
    $objUser= new User();
    $objToko->user->id_user=isset($_GET['id_user']);
    $objUserList= $objUser->SelectAllUser();
    $objLokasi= new Lokasi();
    $objLokasiList= $objLokasi->SelectAllLokasi();
    $objKategori= new Kategori();
    $objKategoriList= $objKategori->SelectAllKategori();

    if (isset($_POST["btnSubmit"])) {
        $objToko->nama_toko = $_POST['nama_toko'];
        $objToko->tagline = $_POST['tagline'];
        $objToko->no_telp = $_POST['no_telp'];
        $objToko->instagram = $_POST['instagram'];
        $objToko->url_toko = $_POST['url_toko'];
        $objToko->status = 2;
        $objToko->user->id_user = $_GET['id_user'];
        $objToko->lokasi->id_lokasi = $_POST['id_lokasi'];
        $objToko->kategori->id_kategori = $_POST['id_kategori'];

        if (isset ($_GET['id_toko'])){
            $objToko->id_toko = $_GET['id_toko'];
            $objToko->UpdateToko();
        }
        else{
            $objToko->AddToko();
        }
        echo "<script> alert('$objToko->message'); </script>";
        if($objToko->hasil){
            echo '<script> window.location = "?p=Home"; </script>';
        }
    }
    else if(isset($_GET['id_toko'])){
        $objToko->id_toko = $_GET['id_toko'];
        $objToko->SelectOneToko();
    }
?>
<div class="toko">
    <div class="container col-lg-7">
        <form form action="" method="POST" class="toko-form" enctype="multipart/form-data">
            <h4 class="title text-center fs-1 fw-bolder" >toko</h4>
            <div class="col">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">nama toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_toko" value="<?php echo $objToko->nama_toko; ?>" placeholder="nama_toko" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">tagline</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tagline" value="<?php echo $objToko->tagline; ?>" placeholder="tagline" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">no_telp</label>
                    <div class="col-sm-9">
                    <input type="text" name="no_telp" value="<?php echo $objToko->no_telp; ?>" class="form-control" id="exampleFormControlInput1" placeholder="088888888">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">instagram toko</label>
                    <div class="col-sm-9">
                    <input type="text" name="instagram" value="<?php echo $objToko->instagram; ?>" class="form-control" id="exampleFormControlInput1" placeholder="@instagram_toko">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">url toko</label>
                    <div class="col-sm-9">
                        <input type="text" name="url_toko" value="<?php echo $objToko->url_toko; ?>" class="form-control" id="exampleFormControlInput1" placeholder="www.url-toko.com">
                        <span id="passwordHelpInline" class="form-text">link website/profil toko di platform online shop.</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">kecamatan</label>
                    <div class="col-sm-9">
                        <select name="id_lokasi" class="form-control">
                            <option value="">--Please select kecamatan--</option>
                            <?php
                                foreach ($objLokasiList as $lokasi){
                                    if($objToko->lokasi->id_lokasi == $lokasi->id_lokasi)
                                        echo '<option selected="true" value='.$lokasi->id_lokasi.'>'.$lokasi->kecamatan.'</option>';
                                    else
                                        echo '<option value='.$lokasi->id_lokasi.'>'.$lokasi->kecamatan.'</option>';
                                }
                            ?>
                        </select>
                        <span id="passwordHelpInline" class="form-text">kecamatan sudah terhubung dengan kota dan provinsi.</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">kategori</label>
                    <div class="col-sm-9">
                        <select name="id_kategori" class="form-control">
                            <option value="">--Please select kategori--</option>
                                <?php
                                    foreach ($objKategoriList as $kategori){
                                        if($objToko->kategori->id_kategori == $kategori->id_kategori)
                                            echo '<option selected="true" value='.$kategori->id_kategori.'>'.$kategori->nama_kategori.'</option>';
                                        else
                                            echo '<option value='.$kategori->id_kategori.'>'.$kategori->nama_kategori.'</option>';
                                    }
                                ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 button-end">
                <a class="btn" href="?p=GaleriBisnis">kembali</a>
                <input class="btn" name="btnSubmit" type="submit" value="simpan">
            </div>
        </form>
    </div>
</div>
