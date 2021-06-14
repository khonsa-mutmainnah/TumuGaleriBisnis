<?php
require_once("class.Toko.php");
class User extends Connection{
    private $id_user = "";
    private $username = "";
    private $password = "";
    private $nama = "";
    private $no_hp = "";
    private $email = "";
    private $kota = "";
    private $role = "";
    private $instagram_user = "";
    private $foto = "";
    private $hasil = false;
    private $message = "";

    public function __get($atribute)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
    }

    public function __set($atribute, $value)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute = $value;
        }
    }

    public function AddUser()
    {
        $sql = "INSERT INTO user (id_user, username, password, nama, no_hp, email, kota, role, instagram_user, foto)
        VALUES ('$this->id_user','$this->username', '$this->password', '$this->nama', '$this->no_hp', '$this->email', '$this->kota', '$this->role', '$this->instagram_user', '$this->foto')";
        $this->hasil = mysqli_query($this->connection, $sql);

        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan';
        else
            $this->message = 'Data gagal ditambahkan';
    }

    public function UpdateUser()
    {
            $sql = "UPDATE user
            SET username ='$this->username', password = '$this->password', nama = '$this->nama', no_hp = '$this->no_hp', email = '$this->email', kota = '$this->kota', role = '$this->role', instagram_user = '$this->instagram_user', foto = '$this->foto' 
            WHERE id_user = '$this->id_user'";

            $this->hasil = mysqli_query($this->connection, $sql);
            if ($this->hasil)
                $this->message = 'Data berhasil diubah!';
            else
                $this->message = 'Data gagal diubah!';


    }


    public function DeleteUser()
    {
        $sql = "DELETE FROM user WHERE id_user = '$this->id_user'";

        $this->hasil = mysqli_query($this->connection, $sql);

        if ($this->hasil)
            $this->message = 'Data berhasil dihapus';
        else
            $this->message = 'Data gagal dihapus';
    }
    public function SelectAllUser()
    {
        $sql = "SELECT * FROM user";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = array();
        $cnt = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_array($result)) {
                $objUser = new User();
                $objUser->id_user = $data['id_user'];
                $objUser->username = $data['username'];
                $objUser->password = $data['password'];
                $objUser->nama = $data['nama'];
                $objUser->no_hp = $data['no_hp'];
                $objUser->email = $data['email'];
                $objUser->kota = $data['kota'];
                $objUser->role = $data['role'];
                $objUser->instagram_user = $data['instagram_user'];
                $objUser->foto = $data['foto'];
                $arrResult[$cnt] = $objUser;
                $cnt++;
            }
        }
        return $arrResult;
    }
    public function SelectOneUser()
    {
        $sql = "SELECT * FROM user WHERE id_user='$this->id_user'";
        $resultOne = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;

            $data = mysqli_fetch_assoc($resultOne);
            $this->username = $data['username'];
            $this->password = $data['password'];
            $this->nama = $data['nama'];
            $this->no_hp = $data['no_hp'];
            $this->email = $data['email'];
            $this->kota = $data['kota'];
            $this->role = $data['role'];
            $this->instagram_user = $data['instagram_user'];
            $this->foto = $data['foto'];
        }
    }

    public function UpdateFotoUser(){
        $sql = "UPDATE user
                SET foto='$this->foto'
                WHERE id_user='$this->id_user'";
                $this->hasil = mysqli_query($this->connection, $sql);
        
        if($this->hasil)
            $this->message='toko berhasil diupdate!';
        else
            $this->message='toko gagal diupdate';
    }

    public function ValidateEmail($email){

        $sql = "SELECT * FROM user WHERE email = '$email'";

        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows ($result) == 1){
            $this->hasil = true;
            $data = mysqli_fetch_assoc($result);
            $this->id_user = $data['id_user'];
            $this->username = $data['username'];
            $this->password = $data['password'];
            $this->nama = $data['nama'];
            $this->email = $data['email'];
            $this->role = $data['role'];
        }
    }

    //reset pass user
    public function resetPass()
    {
        try {

            //if password null
            $newpass = password_hash($this->password, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET password='$newpass' WHERE id_user=$this->id_user";
            mysqli_query($this->connection, $sql);

            return "berhasil mengedit";
        } catch (PDOException $e) {
            return "gagal mengedit";
        }
    }

    public function AddToko($nama_toko, $id_lokasi, $status,
    $tagline, $no_telp, $instagram, $url_toko, $id_kategori){
        $sql = "INSERT INTO toko(nama_toko, id_lokasi, status,
                tagline, no_telp, instagram, url_toko, id_kategori, id_user)
                VALUES ($nama_toko, $id_lokasi, $status,$tagline, $no_telp, $instagram, 
                $url_toko, $id_kategori, '$this->id_user')";
    $this->hasil=mysqli_query($this->connection, $sql);
                
        if($this->hasil)
            $this->message='toko berhasil ditambahkan!';
        else
            $this->message='toko gagal ditambahkan';
    }

    // //reset pass user
    // public function resetPass()
    // {
    //     $newpass = password_hash($this->password, PASSWORD_DEFAULT);
    //     $sql = "UPDATE user SET password='$newpass' WHERE id_user=$this->id_user";
    //     $result = mysqli_query($this->connection, $sql);
    //     // if (mysqli_num_rows ($result) == 1) {

    //     //     //if password null

    //     //     return "berhasil mengedit";
    //     // }
    // }
}
