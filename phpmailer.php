<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// initialisation phpmailer et definissez comme protocole de messagerie
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
// definissez les parametres
$mail->SMTPDebug =1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->Username = "isepdd197@gmail.com";
$mail->Password = "isep2020";
//etape 6
$mail->IsHTML(true);
$mail->AddAddress("isepdd197@gmail.com","ISEPDD");
$mail->SetFrom("isepdd197@gmail.com", "from-name");
// $mail->AddReplyTo("reply-to-em@","name");
// $mail->AddCC("cc-recipient-em@","name");
$mail->Subject = "le test est  un e-mail de test envoye via le serceur SMTP de Gmail a la";
$content = "<b>ceci est </b>";
//etape 7 envoie mail et detectez les exceptions requises
$mail->MsgHTML($content);
if(!$mail->Send()){
    echo "Error lors de l'envoi";
    var_dump($mail);
}else{
    echo "Email envoye avec succes";
}


