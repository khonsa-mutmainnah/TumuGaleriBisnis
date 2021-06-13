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

<div class="user-foto">
    <div class="container col-lg-7">
        <form form action="" method="post" class="user-foto-form" enctype="multipart/form-data">
            <h1 class="title text-center fs-1 fw-bolder" >foto profil</h1>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">foto</label>
                    <div class="col-sm-9">
                    <?php 
                        if($objUser->foto !=null){
                            echo "<td ><img src='./upload/user/".$objUser->foto."' width='50px'/></td>";
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">upload foto</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="foto" name="foto" required>	
                    </div>
                </div>
            </div>
            <div class="col-lg-6 button-end">
                <a class="btn" href="?p=userlist">kembali</a>
                <input class="btn" name="btnSubmit" type="submit" value="simpan">
            </div>
        </form>
    </div>
</div>