<?php
require_once('./akses-admin.php'); 
require_once('./class/class.Mail.php');
require_once("./class/class.Toko.php");
require_once('./class/class.User.php');

$id_toko = $_GET['id_toko'];

$objToko = new Toko();
$objToko->id_toko = $id_toko;
$objToko->getTokoData();


//fetch data kosan by id
if(isset($_POST['btnSubmit'])){

        $email = $_POST['email'];
        $status = $_POST['status'];
        // $password = $_POST['password'];
        $objToko->status=$status;
        $objToko->editStatusToko();
    
        if($objToko->hasil){
          echo "<script>alert('Konfirmasi Telah dikirim Via email');</script>";
          echo '<script> window.location = "?p=tokolist"; </script>';
          $email = $_POST['email'];
          $mail = new Mail();
          $mail->mailUser = $email;
          $mail->templateStatus();
        }
        else{
          echo "<script>alert('Email tidak terdaftar');</script>";
        }
      }
// $toko = new Toko();
// $toko->id_toko = $id_toko;
// $toko->getStatusToko();
?>

<div class="toko">
    <div class="container col-lg-7">
        <form form action="" method="POST" class="toko-form" enctype="multipart/form-data">
            <h1 class="title text-center fs-1 fw-bolder" >Edit Status</h1>
            <div class="col">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">status</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-control">
                            <option value="">--status--</option>
                            <option value="0"<?php if ($objToko->status == 0) echo 'selected="selected"'; ?>> Tinjau </option>
                            <option value="1"<?php if ($objToko->status == 1) echo 'selected="selected"'; ?>> Setuju </option>
                            <option value="2"<?php if ($objToko->status == 2) echo 'selected="selected"'; ?>> Tolak </option>
                            <!-- <?php
                                $arrlength=count($objToko->status_toko);
                                    for($x = 0; $x < $arrlength; $x++){
                                        if($objToko->status==0){
                                        }
                                        else if($objToko->status==1){
                                            if(isset($_POST['btnSubmit'])){
                                                $objToko->user->email = $_POST['email'];
                                                $password = $_POST['password'];
                                                $objToko->hasil = true;
                                            
                                                if($objToko->status){
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
                            ?> -->
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="email" value="<?php echo $objToko->user->email; ?>" />
            <input type="hidden" name="id_toko" value="<?php echo $objToko->id_toko; ?>" />

            <div class="col-lg-6 button-end">
                <a class="btn" href="?p=tokolist">kembali</a>
                <input class="btn" name="btnSubmit" type="submit" value="simpan">
            </div>
        </form>
    </div>
</div>