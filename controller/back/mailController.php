<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/src/Exception.php');
require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/SMTP.php');

require_once('model/back/AdminManager.php');


// Sends mail from contact form
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
        $mail->isSMTP();                                                // Set mailer to use SMTP
        $mail->Host       = 'smtp.ionos.com';                           // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                       // Enable SMTP authentication
        $mail->Username   = '*************';                            // SMTP username
        $mail->Password   = '*************';                            // SMTP password
        $mail->SMTPSecure = 'tls';                                      // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 25;                                         // TCP port to connect to

        //Recipients
        $mail->setFrom($senderAddress, $senderName);                    // Sender as entered in form
        $mail->addAddress($forterocheMail[0], 'Jean Forteroche');       // current Forteroche mail registered in db

        // Content
        $mail->isHTML(true);                                             // Set email format to HTML
        $mail->Subject = '[Blog Alaska] Message d\'un visiteur';
        $mail->Body    = $senderText;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        header('Refresh:4; url=index.php');
        echo 'Votre message a été envoyé avec succès.<br>Veuillez patienter, vous allez être redirigé vers la page d\'accueil...';
    }

    catch (Exception $e)
    {
        echo "Votre message n'a pas pu être envoyé. Type d'erreur: {$mail->ErrorInfo}.<br>Retour à la <a href='index.php'>page d'accueil</a>";
    }

}

// Sends mail for new password when former one forgotten
function sendTempPwd($mailtoAddress, $randomInt)
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try
    {
        //Server settings
        $mail->SMTPDebug = false;                                       // Enable verbose debug output
        $mail->isSMTP();                                                // Set mailer to use SMTP
        $mail->Host       = 'smtp.ionos.com';                           // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                       // Enable SMTP authentication
        $mail->Username   = '*************';                            // SMTP username
        $mail->Password   = '*************';                            // SMTP password
        $mail->SMTPSecure = 'tls';                                      // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 25;                                         // TCP port to connect to

        //Recipients
        $mail->setFrom('blog_admin@nusr.me', '[Blog Alaska]');          // admin address for sending new pw
        $mail->addAddress($mailtoAddress, $mailtoAddress);              // Add a recipient : current Forteroche mail

        // Content
        $mail->isHTML(true);                                            // Set email format to HTML
        $mail->Subject = '[Blog Alaska] Votre nouveau mot de passe';
        $mail->Body    = 'Bonjour, voici votre mot de passe provisoire : '. $randomInt . '<br>Pour des raisons de s&eacute;curit&eacute;, merci de bien vouloir le changer lors de votre prochaine connexion.<br>Cordialement,<br>l\'administration du site';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        header('Refresh:5; url=index.php?action=page&name=connexion');
        echo 'Votre nouveau mot de passe a été envoyé avec succès.<br>Veuillez patienter, vous allez être redirigé vers la page de connexion...';
    }

    catch (Exception $e)
    {
        echo "Votre message n'a pas pu être envoyé. Type d'erreur: {$mail->ErrorInfo}.<br>Retour à la <a href='index.php?action=page&name=newPassword'>page précédente</a>";
    }

}
