<?php 
    require_once('./class/class.Toko.php'); 
    $objToko = new Toko(); 

    if(isset($_POST['btnSubmit'])){	
        $message ='';
        $isErrorFile = false;
        $folder		= './upload/toko/';
        $file_type	= array('jpg','jpeg','png','gif','bmp');
        $max_size	= 1000000; // 1MB	
        $file_name	= $_FILES['logo']['name'];
        $file_size	= $_FILES['logo']['size'];
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
            $objToko->id_toko =  $_GET['id_toko'];		
            $isSuccessUpload = move_uploaded_file($_FILES['logo']['tmp_name'], $folder . $objToko->id_toko.'.'.$extensi);				
            
            if($isSuccessUpload){	
                $objToko->logo = $objToko->id_toko.'.'.$extensi;

                $objToko->UpdateLogoToko();
                if($objToko->hasil){			
                    echo "<script> alert('".$objToko->message."'); </script>";
                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?p=tokolist">'; 				
                }
                else
                    echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
            }
            else
                echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
        }		
    }
    else if(isset($_GET['id_toko'])){	
        $objToko->id = $_GET['id_toko'];	
        $objToko->SelectOneToko();
    }
?>

<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>toko</strong></span></h4>
    <form action="" method="post" enctype="multipart/form-data">
	<table class="table" border="0">
	<td>logo</td>
	<td>:</td>
	<td>
	<?php 
		if($objToko->logo !='')
			echo "<img src='upload/toko/".$objToko->logo."' width='100px' height='100px'/>"; 
	?>
	</td>
	</tr>	
	<tr>
	<td>Upload Foto</td>
	<td>:</td>
	<td><input type="file" class="form-control" id="logo" name="logo" required>	
	</td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="?p=tokolist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>