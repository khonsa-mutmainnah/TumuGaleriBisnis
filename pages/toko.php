<?php
    require_once('./class/class.Toko.php');
    $objToko= new Toko();
    if(isset($_POST['btnSubmit'])){
        $objToko->idToko=$_POST['id_toko'];
        $objToko->namaToko=$POST['nama_toko'];
        $objToko->logo=$_POST['logo'];
        $objToko->id_lokaso=$_POST['id_lokasi'];
        $objToko->tagline=$_POST['tagline'];
        $objToko->no_telp=$_POST['no_telp'];
        $objToko->status=$_POST['status'];
        $objToko->instagram=$_POST['instagram'];

        if(isset($_GET['id_toko'])){
            $objToko->id_toko= $_GET['id_toko'];
            $objToko->UpdateToko();
        }
        else{
            $objEmployee->AddToko();
        }
    }
    echo "<script> alert('$objToko->message'); </script>";
    if($objToko->hasil){
        echo '<script> window.location = "index.php?p=tokolist";
        </script>';
    }
    else if(isset($_GET['id_toko'])){
        $objtoko->id_toko = $_GET['id_toko'];
        $objtoko->SelectOneToko();
    }
?>

<h4 class="title">
<span class="text"><strong>Employee</strong></span>
</h4>
<form action="" method="post">
<table class="table table-bordered" style="color:white;">
<tr>
<td>SSN</td>
<td>:</td>
<td><input type="text" class="form-control" name="ssn"
value="<?php echo $objEmployee->ssn; ?>"></td>
</tr>
<tr>
<td>Name</td>
<td>:</td>
<td><input type="text" class="formcontrol" ssn="fname" name="fname"
value="<?php echo $objEmployee->fname; ?>"></td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td><textarea class="formcontrol" name="address" rows="3" cols="19">
<?php echo $objEmployee->address; ?></textarea></td>
</tr>
<tr>
<td colspan="2"></td>
<td><input type="submit" class="btn btnsuccess" value="Save" name="btnSubmit">
<a href="index.php?p=employeelist" class="btn btnwarning">Cancel</a></td>
</tr>
</table>
</form>

