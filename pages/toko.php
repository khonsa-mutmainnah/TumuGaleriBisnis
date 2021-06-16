<?php
    require_once('./akses-admin.php'); 
    require_once('./class/class.Toko.php');
    require_once('./class/class.User.php');
    require_once('./class/class.Lokasi.php');
    require_once('./class/class.kategori.php');
    require_once('./class/class.Mail.php');

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
        $objToko->status = $_POST['status'];
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
            <h1 class="title text-center fs-1 fw-bolder" >toko</h1>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">nama toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_toko" value="<?php echo $objToko->nama_toko; ?>" placeholder="nama toko" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">tagline</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tagline" value="<?php echo $objToko->tagline; ?>" placeholder="tagline" class="form-control"></input>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">no telp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_telp" value="<?php echo $objToko->no_telp; ?>" placeholder="02222222" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">instagram</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="instagram" value="<?php echo $objToko->instagram; ?>" placeholder="@instagram" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">url toko</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="url_toko" value="<?php echo $objToko->url_toko; ?>" placeholder="ww.url-toko.com" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">user</label>
                    <div class="col-sm-9">
                        <select name="id_user" class="form-control">
                        <option value="">--pilih user--</option>
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
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">kecamatan</label>
                    <div class="col-sm-9">
                        <select name="id_lokasi" class="form-control">
                            <option value="">--Pilih kecamatan--</option>
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
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">kategori</label>
                    <div class="col-sm-9">
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih kategori--</option>
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
            <!-- <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">status</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-control">
                            <option value="">--status--</option>
                            <option value="<?php echo $objToko->status=1; ?>">setujui</option>
                            <option value="<?php echo $objToko->status=2; ?>">tolak</option>
                            <option value="<?php echo $objToko->status=0; ?>">meninjau</option>
                            <?php
                                $arrlength=count($objToko->status_toko);
                                    for($x = 0; $x < $arrlength; $x++){
                                        if($objToko->status==0){
                                        }
                                        else if($objToko->status==1){
                                            if(isset($_POST['btnSubmit'])){
                                                $objToko->user->email = $_POST['email'];
                                                $password = $_POST['password'];
                                                $objToko->hasil = true;
                                            
                                                if($objToko->hasil){
                                                  echo "<script>alert('Konfirmasi Telah dikirim Via email');</script>";
                                                  $email = $_POST['email'];
                                                  $mail = new Mail();
                                                  $mail->mailUser = $email;
                                                  $mail->sendMailAction();
                                                }
                                                else{
                                                  echo "<script>alert('Email tidak terdaftar');</script>";
                                                }
                                              }
                                        }
                                        else if($objToko->status=2){
                                            echo '<option selected="true" value='.$objToko->status='2'.'>'.$objToko->status_toko.'</option>';
                                        }
                                    }
                            ?>
                        </select>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-6 button-end">
                <a class="btn" href="?p=tokolist">kembali</a>
                <input class="btn" name="btnSubmit" type="submit" value="simpan">
            </div>
        </form>
    </div>
</div>