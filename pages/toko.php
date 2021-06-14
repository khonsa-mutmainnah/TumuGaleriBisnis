<?php
    require_once('./class/class.Toko.php');
    require_once('./class/class.User.php');
    require_once('./class/class.Lokasi.php');
    require_once('./class/class.kategori.php');

    $objToko= new Toko();
    $objUser= new User();
    $objUserList= $objUser->SelectAllUser();
    $objLokasi= new Lokasi();
    $objLokasiList= $objLokasi->SelectAllLokasi();
    $objKategori= new Kategori();
    $objKategoriList= $objKategori->SelectAllKategori();

    if (isset($_POST["btnSubmit"])) {
        $objToko->nama_toko = $_POST['nama_toko'];
        $objToko->tagline = $_POST['tagline'];
        $objToko->no_telp = $_POST['no_telp'];
        $objToko->status = 0;
        $objToko->instagram = $_POST['instagram'];
        $objToko->url_toko = $_POST['url_toko'];
        $objToko->user->id_user = $_POST['id_user'];
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
            echo '<script> window.location = "?p=tokolist"; </script>';
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
                <label for="exampleFormControlInput1" class="form-label">nama_toko</label>
                <input type="text" class="form-control" name="nama_toko" value="<?php echo $objToko->nama_toko; ?>" placeholder="nama_toko" class="form-control">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">tagline</label>
                <input type="text" class="form-control" name="tagline" value="<?php echo $objToko->tagline; ?>" placeholder="tagline" class="form-control">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">no telp</label>
                <input type="text" name="no_telp" value="<?php echo $objToko->no_telp; ?>" class="form-control" id="exampleFormControlInput1" placeholder="nomor telepon">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">instagram</label>
                <input type="text" name="instagram" value="<?php echo $objToko->instagram; ?>" class="form-control" id="exampleFormControlInput1" placeholder="@instagram_toko">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">url toko</label>
                <input type="text" name="url_toko" value="<?php echo $objToko->url_toko; ?>" class="form-control" id="exampleFormControlInput1" placeholder="http://../">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">id_user</label>
                <select name="id_user" class="form-control">
                    <option value="">--Please select user--</option>
                        <?php
                            foreach ($objUserList as $user){
                                if($objToko->user->id_user == $user->id_user)
                                    echo '<option selected="true" value='.$user->id_user.'>'.$user->username.'</option>';
                                else
                                    echo '<option value='.$user->id_user.'>'.$user->username.'</option>';
                            }
                        ?>
                </select>
            </div>
            <div class="col">
            <label for="exampleFormControlInput1" class="form-label">kecamatan</label>
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
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">kategori</label>
                <?php echo $objToko->kategori->id_kategori ?>
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
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">status</label>
                <?php echo $objToko->status ?>
                <select name="status" class="form-control">
                    <option value="">--Please select status--</option>
                    <option value="">setujui</option>
                    <option value="">tidak disetujui</option>
                    <option value="">tidak disetujui</option>
                </select>
            </div>
            <div class="col-lg-6 button-end">
                <input class="btn btnsuccess" name="btnSubmit" type="submit" value="Save" >
            </div>
        </form>
    </div>
</div>
