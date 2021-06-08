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

    if(isset($_POST['btnSubmit'])){
        $objToko = new Toko();
        $objToko->nama_toko = $_POST['nama_toko'];
        // $objToko->logo = $_POST['logo'];
        $objToko->tagline = $_POST['tagline'];
        $objToko->no_telp = $_POST['no_telp'];
        // $objToko->status = $_POST['status'];
        $objToko->instagram = $_POST['instagram'];
        $objToko->url_toko = $_POST['url_toko'];
        $objToko->user->id_user= $_POST['id_user'];
        $objToko->lokasi->id_lokasi = $_POST['id_lokasi'];
        $objToko->kategori->id_kategori = $_POST['id_kategori'];

        $lokasi_file = @$_FILES['logo']['tmp_name'];
        $ukuran_file = @$_FILES['logo']['size'];
        $type_file = @$_FILES['logo']['type'];
        $folder = './upload/';

        //image not compatible
        if ($type_file != "image/gif" and $type_file != "image/jpeg" and $type_file != "image/png" and $type_file != "image/jpg") {
            echo "<script>
            alert('Gagal Menambahkan Foto, gambarnya nggak kompetible')
            </script>";
        }
        //competible
        else {
            //move photo to foto folder
            $uniquesavename = time() . uniqid(rand());
            $new_destination = $folder . $uniquesavename . ".png";
            $succes_move = move_uploaded_file($lokasi_file, $new_destination);
            if($succes_move){
                $objToko->logo=$new_destination;
            }
        }

        if(isset($_GET['id_toko'])){
            $objToko->id_toko= $_GET['id_toko'];
            $objToko->UpdateToko();
        }
        else{
            $objToko->AddToko();
        }

        if($objToko->hasil){
        echo '<script> window.location = "?p=tokolist";
        </script>';
    }
    }
    else if(isset($_GET['id_toko'])){
        $objToko->id_toko = $_GET['id_toko'];
        $objToko->SelectOneToko();
    }
?>
<div class="toko">
    <div class="container col-lg-7">
        <form form action="" method="post" class="toko-form" enctype="multipart/form-data">
            <h4 class="title text-center fs-1 fw-bolder" >toko</h4>
            <div class="col">
                <img id="image-preview" alt="image preview" class="rounded mx-auto" style="width:40px;">
                <div class="mb-3">
                    <label for="formFile" class="form-label">logo</label>
                    <input class="form-control" type="file" id="logo" name="logo" onchange="previewImage();">
                </div>
            </div>
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
                <input type="text" name="no_telp" value="<?php echo $objToko->no_telp; ?>" class="form-control" id="exampleFormControlInput1" placeholder="password">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">instagram</label>
                <input type="text" name="instagram" value="<?php echo $objToko->instagram; ?>" class="form-control" id="exampleFormControlInput1" placeholder="@instagram_toko">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">url toko</label>
                <input type="text" name="url_toko" value="<?php echo $objToko->url_toko; ?>" class="form-control" id="exampleFormControlInput1" placeholder="@instagram_toko">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">id_user</label>
                <select name="id_user" class="form-control">
                    <option value="">--Please select user--</option>
                        <?php
                            foreach ($objUserList as $user){
                                if($objUser->user->id_user == $user->id_user)
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
                                if($objLokasi->lokasi->id_lokasi == $lokasi->id_lokasi)
                                    echo '<option selected="true" value='.$lokasi->id_lokasi.'>'.$lokasi->kecamatan.'</option>';
                                else
                                    echo '<option value='.$lokasi->id_lokasi.'>'.$lokasi->kecamatan.'</option>';
                            }
                        ?>
                </select>
            </div>
            <!-- <div class="col">
            <label for="exampleFormControlInput1" class="form-label">kota</label>
            <select name="id_lokasi" class="form-control">
                    <option value="">--Please select kota--</option>
                        <?php
                            foreach ($lokasiList as $lokasi){
                                if($objLokasi->lokasi->id_lokasi == $lokasi->id_lokasi)
                                    echo '<option selected="true" value='.$lokasi->id_lokasi.'>'.$lokasi->kota.'</option>';
                                else
                                    echo '<option value='.$lokasi->id_lokasi.'>'.$lokasi->kota.'</option>';
                            }
                        ?>
                </select>
            </div> -->
            <!-- <div class="col">
            <label for="exampleFormControlInput1" class="form-label">provinsi</label>
            <select name="id_lokasi" class="form-control">
                    <option value="">--Please select kota--</option>
                        <?php
                            foreach ($lokasiList as $lokasi){
                                if($objLokasi->lokasi->id_lokasi == $lokasi->id_lokasi)
                                    echo '<option selected="true" value='.$lokasi->id_lokasi.'>'.$lokasi->provinsi.'</option>';
                                else
                                    echo '<option value='.$lokasi->id_lokasi.'>'.$lokasi->provinsi.'</option>';
                            }
                        ?>
                </select>
            </div> -->
            <div class="col">
            <label for="exampleFormControlInput1" class="form-label">kategori</label>
            <select name="id_kategori" class="form-control">
                    <option value="">--Please select kategori--</option>
                        <?php
                            foreach ($objKategoriList as $kategori){
                                if($objKategori->kategori->id_kategori == $kategori->id_kategori)
                                    echo '<option selected="true" value='.$kategori->id_kategori.'>'.$kategori->nama_kategori.'</option>';
                                else
                                    echo '<option value='.$kategori->id_kategori.'>'.$kategori->nama_kategori.'</option>';
                            }
                        ?>
                </select>
            </div>
            <div class="col-lg-6 button-end">
                <input class="btn btnsuccess" name="btnSubmit" type="submit" value="Save" >
            </div>
        </form>
    </div>
    <script>
        function previewImage() {
            document.getElementById("image-preview").style.display ="block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("logo").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script>
</div>
