<?php 

require_once('./class/class.gambar_barang.php'); 		
$objGambarBarang = new GambarBarang(); 

if(isset($_POST['btnSubmit'])){	
    $objGambarBarang->id_barang = $_POST['id_barang'];
    $objGambarBarang->gambar_barang = $_POST['gambar_barang'];
	$message = '';
		
	if(isset($_GET['id_barang'])){		
		$objGambarBarang->id_barang = $_GET['id_barang'];
		$objGambarBarang->UpdateGambarBarang();
	}
	else{
		$objBanner->AddGambarBarang();					
	}	
		
	if(!$objGambarBarang->hasil){			
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
		die();
	}
	
	$folder		= './upload/';
		//type file yang bisa diupload
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$max_size	= 1000000; // 1MB	
	$isErrorFile   = false;
	$isSuccessUpload = true;
	
	if (!empty($_FILES['foto']['name'])) {	
		$file_name	= $_FILES['foto']['name'];
		$file_size	= $_FILES['foto']['size'];
		//cari extensi file dengan menggunakan fungsi explode
		$explode	= explode('.',$file_name);
		$extensi	= $explode[count($explode)-1];
		//check apakah type file sudah sesuai
		if(!in_array($extensi,$file_type)){
			$isErrorFile   = true;
			$message .= 'Type file yang anda upload tidak sesuai';
		}
		if($file_size > $max_size){
			$isErrorFile   = true;
			$message .= 'Ukuran file melebihi batas maximum';
		}	
		
		if($isErrorFile){
			echo "<script> alert('$message'); </script>";
		}
		else{
			$objGambarBarang->foto = $objGambarBarang->id_barang.'.'.$extensi;			
			$isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$objGambarBarang->gambar_barang);	
			
			if(!$isSuccessUpload){
				echo "<script> alert('Upload error'); </script>";
				die();
			}			
		}
	}
		
	if($isSuccessUpload){					 
		$objGambarBarang->UpdateGambarBarang();
		if($objGambarBarang->hasil){			
			echo "<script> alert('$objBanner->message'); </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=bannerlist">'; 				
		}
		else
			echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
	}
	else
		echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
				
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
          <label for="exampleFormControlInput1" class="form-label">id_barang</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="id barang" name="id_barang" value="<?php echo $objGambarBarang->id_barang; ?>">
        </div>
        <div class="col mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="my_image">
        </div>
        <div class="col-lg-6 button-end">
          <input class="btn btnsuccess" type="submit" name="submit" value="Upload">
        </div>
      </form>
    </div>
</div>