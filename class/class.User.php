<?php
class User extends Connection
{
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
        $sql = "INSERT INTO user (username, password, nama, no_hp, email, kota, role, instagram_user, foto)
        VALUES ('$this->username', '$this->password', '$this->nama', '$this->no_hp', '$this->email', '$this->kota', '$this->role', '$this->instagram_user', '$this->foto')";
        $this->hasil = mysqli_query($this->connection, $sql);

        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan';
        else
            $this->message = 'Data gagal ditambahkan';
    }

    public function UpdateUser()
    {
        $sql = "UPDATE user
        SET password ='$this->password', nama = '$this->nama', no_hp = '$this->no_hp', email = '$this->email', 
        kota = '$this->kota', role = '$this->role', instagram_user = '$this->instagram_user', foto = '$this->foto' 
        WHERE username = '$this->username'";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil diubah!';
        else
            $this->message = 'Data gagal diubah!';
    }


    public function DeleteUser()
    {
        $sql = "DELETE FROM user WHERE username = '$this->username'";

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
        $sql = "SELECT * FROM user WHERE username='$this->username'";
        $resultOne = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;

            $data = mysqli_fetch_assoc($resultOne);
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

    public function ValidateEmail($inputemail){

        $sql = "SELECT * FROM user WHERE email = '$inputemail'";

        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows ($result) == 1){
            $this->hasil = true;
            $data = mysqli_fetch_assoc($result);
            $this->username = $data['username'];
            $this->password = $data['password'];
            $this->nama = $data['nama'];
            $this->email = $data['email'];
            $this->role = $data['role'];
        }
    }
}
