<?php
require_once dirname(__FILE__) . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail extends Connection
{

    private $mailUser;
    private $linkemail;

    //auto get
    public function __get($atribute)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
    }

    //auto set
    public function __set($atribut, $value)
    {
        if (property_exists($this, $atribut)) {
            $this->$atribut = $value;
        }
    }


    public function sendMailAction()
    {
    //     <div class="button-end">
    //     <input class="btn col-lg-4" type="submit" value="Save" name="btnReset">
    //   </div>
        $link = "<a href = '$this->linkemail'>Klik Link Disini</a>";
        // '
        // <div class="container log-in col-lg-4">
        //     <div class="button-end">
        //         <a href= http://localhost/kuliah/Final%20Project/TumuGaleriBisnis/?p=reset-new-pw> Klik Disini Untuk Mengganti Password </a>
        //     </div>
        // </div>';

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        //ini adalah autentication untuk email pengirim
        $mail->Username = 'galeribisnisa@gmail.com';
        $mail->Password = 'Admingb01';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //sesuaikan dengan email yang digunakan 
        $mail->setFrom('galeribisnisa@gmail.com', 'Admin Galeri Bisnis');
        $mail->addAddress($this->mailUser);

        $mail->isHTML(true);
        $mail->addEmbeddedImage('./gambar/mailOpen.png', 'image_cid1');
        $mail->Subject = "Konfirmasi Link";

        $bodyContent = '
        <div class="card text-center" style="text-align: center">
            <div class="card-header">
                <img src="cid:image_cid1">
                <h4 class="title text-center fs-1 fw-bolder" >TUMU GALERI BISNIS<br>Hello, Berikut Link Konfirmasimu</h4>
                <p>Isi Email<br></p>' . $link .
            '</div>';
        $mail->Body = $bodyContent;

        $mail->send();
    }
}
