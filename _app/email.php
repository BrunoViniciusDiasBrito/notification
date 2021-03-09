<?php 

namespace proj1;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use stdClass;

class Email {

    private $mail = \stdClass::class;

    public function __construct ($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName) {
        $this->mail = new PHPMailer(exceptions: true);
        //Server settings
        $this->mail->SMTPDebug = $smtpDebug;
        $this->mail->isSMTP();
        $this->mail->Host       = $host;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $user;
        $this->mail->Password   = $pass;
        $this->mail->SMTPSecure = $smtpSecure;
        $this->mail->Port       = $port;
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage(langcode: 'br');
        $this->mail->isHTML(isHtml:true);
        $this->mail->setFrom($setFromEmail, $setFromName);

    }
    public function sendMail ($subject, $body, $replayEmail, $replayName, $addressEmail, $addressName) {

        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->addReplyTo($replayEmail, $replayName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro no envio! {$this->mail->ErroInfo} {$e->getMessage()} ";
        }

        echo 'E-mail enviado!';
    }
}