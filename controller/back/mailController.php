<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/src/Exception.php');
require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/SMTP.php');

function sendContactMail($recipientMail, $senderMail, $senderName, $messageContent)
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try
    {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.ionos.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'admin@nusr.me';                     // SMTP username
        $mail->Password   = 'pHpoZk#x1000';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('admin@nusr.me', '[Blog Alaska]');       // admin
        $mail->addAddress($recipientMail, 'Jean Forteroche');     // Add a recipient
        $mail->addReplyTo($senderMail, $senderName);  // Reply to message sender

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Message d\'un visiteur';
        $mail->Body    = $messageContent;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        echo 'Message has been sent';
        header('Location:index.php?action=page&name=contact');
    }

    catch (Exception $e)
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
