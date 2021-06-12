<?php 
    require_once('./class/class.User.php'); 
    $objUser = new User(); 

    if(isset($_POST['btnSubmit'])){	
        $message ='';
        $isErrorFile = false;
        $folder		= './upload/user/';
        $file_type	= array('jpg','jpeg','png','gif','bmp');
        $max_size	= 5000000; // 1MB	
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
            $objUser->id_user =  $_GET['id_user'];		
            $isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $objUser->id_user.'.'.$extensi);				
            
            if($isSuccessUpload){	
                $objUser->foto = $objUser->id_user.'.'.$extensi;

                $objUser->UpdateFotoUser();
                if($objUser->hasil){			
                    echo "<script> alert('".$objUser->message."'); </script>";
                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?p=userlist">'; 				
                }
                else
                    echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
            }
            else
                echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
        }		
    }
    else if(isset($_GET['id_user'])){	
        $objUser->id = $_GET['id_user'];	
        $objUser->SelectOneUser();
    }
?>

<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>user</strong></span></h4>
    <form action="" method="post" enctype="multipart/form-data">
	<table class="table" border="0">
	<td>foto</td>
	<td>:</td>
	<td>
	<?php 
		if($objUser->foto !='')
			echo "<img src='upload/user/".$objUser->foto."' width='100px' height='100px'/>"; 
	?>
	</td>
	</tr>	
	<tr>
	<td>Upload Foto</td>
	<td>:</td>
	<td><input type="file" class="form-control" id="foto" name="foto" required>	
	</td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="?p=userlist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>