<?php
    require __DIR__ . '\...\lib_ext\autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use proj1\Email;

    // $email = new PHPMailer(); -> debug da classe PHPMailer

    // var_dump($email);

    $novoEmail = new Email(2, 'smtp.gmail.com', 'Bruno Roxie', 'laksjdhfg@1','ssl','587', "bruno@roxie.com.br", "squad Delta" );
    $novoEmail->sendMail(subject: "assunto teste", body:"<p>teste message</p>", replayEmail:"brunovinicius31121995@gmail.com", replayName: "Bruno", addressEmail:"bruno@roxie.com.br", addressName:"Bruno 2");
    var_dump(($novoEmail));

