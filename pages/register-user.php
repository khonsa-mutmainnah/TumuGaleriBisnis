<div class="container register-user col-lg-7">
  <form class="register-form">
    <div class="text-center logol">
      <img src="./gambar/logo.png" class="rounded" alt="...">
      <h1 class="daftar">daftar</h1>
    </div>
    <div class="col">
      <img id="image-preview" alt="image preview" class="rounded mx-auto ">
      <div class="mb-3">
        <label for="formFile" class="form-label">foto</label>
        <input class="form-control" type="file" id="image-source" onchange="previewImage();">
      </div>
      <script>
        function previewImage() {
          document.getElementById("image-preview").style.display = "block";
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

          oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
          };
        };
      </script>
    </div>
    <div class="col">
      <label for="exampleFormControlInput1" class="form-label">Nama lengkap</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nama lengkap">
    </div>
    <div class="container">
      <div class="row username">
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">Username</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
        </div>
      </div>
    </div>
    <div class="col">
      <label for="exampleFormControlInput1" class="form-label">nomor handphone</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="088888888">
    </div>
    <div class="col">
      <label for="exampleFormControlInput1" class="form-label">email</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="user@email.com">
    </div>
    <div class="col">
      <label for="exampleFormControlInput1" class="form-label">instagram</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="@instagram_user">
    </div>
    <div class="col-lg-4 button-end">
      <input class="btn col-8" type="submit" value="Daftar">
    </div>
    <label for="" class="form-label">sudah punya akun?</label>
    <div class="col-lg-4 button-end">
      <a class="btn col-8" href="#" role="button">Masuk</a>
    </div>
  </form>
</div>