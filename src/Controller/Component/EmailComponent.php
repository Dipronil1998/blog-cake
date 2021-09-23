<?php
namespace App\Controller;

use Cake\Controller\Component;
use Cake\Core\App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require ROOT. '/vendor/phpmailer/phpmailer/src/Exception.php';
require ROOT. '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require ROOT. '/vendor/phpmailer/phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
class EmailComponent extends Component{

    public function send_mail($to,$subject,$msg){
        $sender="";

        $header="X-Mailer: PHP/".phpversion()."Return-Path: $sender";
        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";// IP address or domain name
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";

        $mail->Port = 467;  //Email Port
        $mail->Username = "dipronildas8961228208@gmail.com";// Email address of your server
        $mail->Password = "";// Email password

        $mail->From = "dipronildas8961228208@gmail.com"; //email address
        // $mail->FromName = "your username email";
        $mail->AddAddress($to);
        //$mail->AddReplyTo("mail@mail.com");

        $mail->IsHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $msg;

        //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->send()){
            return 0;
        }
        else
        {
            return 1;
        }

    }
}
