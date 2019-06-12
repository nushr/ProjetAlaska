<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/src/Exception.php');
require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/SMTP.php');

require_once('model/back/AdminManager.php');

function sendContactMail($senderName, $senderAddress, $senderText)
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $adminManager = new AdminManager();
    $forterocheMail = $adminManager->getForterocheMail();

    try
    {
        //Server settings
        $mail->SMTPDebug = false;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.ionos.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'admin@nusr.me';                     // SMTP username
        $mail->Password   = 'pHpoZk#x1000';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 25;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($senderAddress, $senderName);       // admin
        $mail->addAddress($forterocheMail[0], 'Jean Forteroche');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '[Blog Alaska] Message d\'un visiteur';
        $mail->Body    = $senderText;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        header('Refresh:4; url=index.php');
        echo 'Votre message a été envoyé avec succès.<br>Veuillez patienter, vous allez être redirigé vers la page d\'accueil...';
    }

    catch (Exception $e)
    {
        echo "Votre message n'a pas pu être envoyé. Type d'erreur: {$mail->ErrorInfo}";
    }

}
