<?php 

require_once('./class/class.gambar_barang.php'); 	
require_once('./class/class.Barang.php'); 	

$objGambarBarang = new GambarBarang(); 
$objBarang = new Barang(); 
$objBarangList = $objBarang->SelectAllBarang(); 

if(isset($_POST['btnSubmit'])){	
    $objGambarBarang->id_barang = $_POST['id_barang'];
    // $objGambarBarang->gambar_barang = $_POST['gambar_barang'];
	$message = '';
		
	if(isset($_GET['id_barang'])){		
		$objGambarBarang->id_barang = $_GET['id_barang'];
		$objGambarBarang->UpdateGambarBarang();
	}
	else{
		$objGambarBarang->AddGambarBarang();					
	}	
		
	if(!$objGambarBarang->hasil){			
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
		die();
	}
	
	$lokasi_file = @$_FILES['foto']['tmp_name'];
    $ukuran_file = @$_FILES['foto']['size'];
    $type_file = @$_FILES['foto']['type'];
    $folder = './upload/';
	
	if ($type_file != "image/gif" and $type_file != "image/jpeg" and $type_file != "image/png") {
		echo "<script>
		alert('Gagal Menambahkan Foto, gambarnya tidak kompetible')
		</script>";
	}
	
	else {
		//move photo to foto folder
		$uniquesavename = time() . uniqid(rand());
		$new_destination = $folder . $uniquesavename . ".png";
		$succes_move = move_uploaded_file($lokasi_file, $new_destination);
  
		//berhasil pindah
		if ($succes_move) {
		  $objGambarBarang->gambar_barang = $new_destination;
		  $objGambarBarang->AddGambarBarang();
  
		  if ($objUser->hasil) {
			echo "<script> alert('Registrasi Berhasil'); </script>";
			echo '<script> window.location="?p=gambarBarangList";</script>';
		  }
		}
	}
}			

else if(isset($_GET['id_barang'])){	
	$objGambarBarang->id = $_GET['id_barang'];	
	$objGambarBarang->SelectOneGambarBarang();
}
?>

<div class="gambar_barang">
    <div class="container col-lg-7">
      <form form action="" method="post" class="gambarBarang-form" enctype="multipart/form-data">
        <h4 class="title text-center fs-1 fw-bolder" >gambar barang</h4>
        <div class="col">
		<label for="exampleFormControlInput1" class="form-label">barang</label>
                <select name="id_barang" class="form-control">
                    <option value="">--Please select barang--</option>
                        <?php
                            foreach ($objBarangList as $kategori){
                                if($objBarang->barang->id_barang == $barang->id_barang)
                                    echo '<option selected="true" value='.$barang->id_barang.'>'.$barang->nama_barang.'</option>';
                                else
                                    echo '<option value='.$barang->id_barang.'>'.$barang->nama_barang.'</option>';
                            }
                        ?>
                </select>
        </div>
        <div class="col">
			<img id="image-preview" alt="image preview" class="rounded mx-auto ">
			<div class="mb-3">
				<label for="formFile" class="form-label">foto</label>
				<input class="form-control" type="file" id="foto" name="foto" onchange="previewImage();">
			</div>
		</div>
		<script>
			function previewImage() {
				document.getElementById("image-preview").style.display = "block";
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("foto").files[0]);

				oFReader.onload = function(oFREvent) {
					document.getElementById("image-preview").src = oFREvent.target.result;
				};
			};
		</script>
        <div class="col-lg-6 button-end">
          <input class="btn btnsuccess" type="submit" name="btnSubmit" value="Upload">
        </div>
      </form>
    </div>
</div>