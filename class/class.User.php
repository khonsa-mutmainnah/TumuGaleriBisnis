<?php 

class User extends connection{
    private $username = "";
    private $password = "";
    private $nama = "";
    private $email = "";
    private $no_hp = "";
    private $kota = "";
    private $role = "";
    private $hasil=false;
    private $message= "";

    // //User Contructor
    // public function __construct(){
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->nama = $nama;
    //     $this->email = $email;
    //     $this->no_hp = $no_hp;
    //     $this->kota = $kota;
    //     $this->role = $role;
    // }

    //Get Automatic
    public function __get($atribute){
        if(property_exists($this, $atribute))
        {
            return $this->$atribute;
        }
    }

    public function __set($atribute, $value){
        if(property_exists($this,$atribute)){
            $this->atribut=$value;
        }
    }

    public function AddUser(){
        $sql = "INSERT INTO user(username, password, nama, email, no_hp, kota, role)
                VALUES ('$this->username', '$this->password', '$this->nama', '$this->email', '$this->no_hp', '$this->kota', '$this->role')";
                $this->hasil=mysqli_query($this->connection, $sql);
        if($this->hasil)
            $this->message='user berhasil ditambahkan!';
        else
            $this->message='user gagal ditambahkan';
    }

    public function UpdateUser(){
        $sql = "UPDATE user
                SET '$this->username', '$this->password', '$this->nama', '$this->email', '$this->no_hp', '$this->kota', '$this->role'
                WHERE username = '$this->username'";
        
        if($this->hasil)
            $this->message='toko berhasil diupdate!';
        else
            $this->message='toko gagal diupdate';
    }

    public function DeleteUser(){
        $sql = "DELETE FROM user WHERE username='$this->username'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='user berhasil dihapus!';
        else
            $this->message='user gagal dihapus';
    }

    public function SelectAllUser(){
        $sql="SELECT * FROM user";
        $result = mysqli_query($this->connection, $sql);
        $arrResult= Array();
        $cnt=0;

        if(mysqli_num_rows($result)>0){
            while ($data=mysqli_fetch_Array($result)){
                $objUser = new User();
                $objUser->username = $data['username'];
                $objUser->password = $data['password'];
                $objUser->nama = $data['nama'];
                $objUser->email = $data['email'];
                $objUser->no_hp = $data['no_hp'];
                $objUser->kota = $data['kota'];
                $objUser->role = $data['role'];
                $arrResult[$cnt]=$objUser;
                $cnt++;
            }
        }
        return $arrResult;
    }

    public function SelectOneUser(){
        $sql="SELECT* FROM user WHERE username='$this->username'";
        $resultOne = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($resultOne)==1){
            $this->hasil=true;

            $objUser->username = $data['username'];
            $objUser->password = $data['password'];
            $objUser->nama = $data['nama'];
            $objUser->email = $data['email'];
            $objUser->no_hp = $data['no_hp'];
            $objUser->kota = $data['kota'];
            $objUser->role = $data['role'];
        }
    }
}
?>