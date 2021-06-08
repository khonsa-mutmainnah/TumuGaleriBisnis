<?php
class Lokasi extends Connection{
    private $id_lokasi;
    private $kecamatan;
    private $kota;
    private $provinsi;
    private $hasil = false;
    private $message;

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

    public function AddLokasi()
    {
        $sql = "INSERT INTO lokasi (kecamatan, kota, provinsi)
        VALUES ('$this->kecamatan', '$this->kota', '$this->provinsi')";
        $this->hasil = mysqli_query($this->connection, $sql);

        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan';
        else
            $this->message = 'Data gagal ditambahkan';
    }

    public function UpdateLokasi()
    {
        $sql = "UPDATE lokasi
        SET kecamatan ='$this->kecamatan', kota = '$this->kota', provinsi = '$this->provinsi' 
        WHERE id_lokasi = '$this->id_lokasi'";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = 'Data berhasil diubah!';
        else
            $this->message = 'Data gagal diubah!';
    }


    public function DeleteLokasi()
    {
        $sql = "DELETE FROM lokasi WHERE id_lokasi = '$this->id_lokasi'";

        $this->hasil = mysqli_query($this->connection, $sql);

        if ($this->hasil)
            $this->message = 'Data berhasil dihapus';
        else
            $this->message = 'Data gagal dihapus';
    }
    public function SelectAllLokasi()
    {
        $sql = "SELECT * FROM lokasi";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = array();
        $cnt = 0;

        if (mysqli_num_rows($result) > 0) {
         
            while ($data = mysqli_fetch_array($result)) {
                $objLokasi = new Lokasi();
                $objLokasi->id_lokasi = $data['id_lokasi'];
                $objLokasi->kecamatan = $data['kecamatan'];
                $objLokasi->kota = $data['kota'];
                $objLokasi->provinsi = $data['provinsi'];
                $arrResult[$cnt] = $objLokasi;
                $cnt++;
            }
        }
        return $arrResult;
    }
    public function SelectOneLokasi()
    {
        $sql = "SELECT * FROM lokasi WHERE id_lokasi='$this->id_lokasi'";
        $resultOne = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;

            $data = mysqli_fetch_assoc($resultOne);
            $this->kecamatan = $data['kecamatan'];
            $this->kota = $data['kota'];
            $this->provinsi = $data['provinsi'];
        }
    }
}

?>