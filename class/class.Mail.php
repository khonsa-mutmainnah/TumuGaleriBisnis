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
        $bodyContent = '<p>ini adalah isi dari email : </p>';
        $mail->Body = $bodyContent;

        $mail->send();
    }
}
