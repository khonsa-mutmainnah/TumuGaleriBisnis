<!-- <h4 class="title"><span class="text"><strong>Masukkan Password Baru</strong></span></h4> 
<form action="?p=reset-pw" method="post"> 
    <table class="table" border="0"> 
        <tr> 
        <td>Password Baru</td> 
        <td>:</td> 
        <td> 

        <input type="password" name="password" id="email" class="form-control" maxlength="50" required> </tr> 


        <td><input type="submit" class="btn btn-primary" value="Submit" name="btnSubmit"> 
        <a class="btn btn-danger">Cancel</a></td> 
        </tr> 
    </table> -->

    <div class="container reset col-lg-4">
    <form class ="reset-form" action="?p=reset-pw" method = "post">
      <div class="text-center logol">
        <img src="./gambar/logo.png" class="rounded" alt="...">
        <h1 class="masuk">Masukkan Password Baru</h1>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" name="password">
      </div>
      <div class="button-end">
        <input class="btn col-lg-4" type="submit" value="Save" name="btnReset">
      </div>

    </form>
</div>