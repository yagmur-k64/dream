<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Serverinstellingen
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Gebruik de SMTP-server van Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'yagmur64.karabulut@gmail.com'; // Jouw Gmail-adres
    $mail->Password = 'auqb prvl cjuz attn'; // Jouw Gmail-wachtwoord of app-wachtwoord
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Ontvanger en verzender
    $mail->setFrom('yagmur64.karabulut@gmail.com', 'Dream Organization');
    $mail->addAddress('yagmur64.karabulut@gmail.com'); // E-mailadres van de ontvanger

    // Inhoud van de e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Nieuwe Offerte Aanvraag';
    $mail->Body = 'Dit is een testmail voor een offerte-aanvraag.';
    
    $mail->send();
    echo 'E-mail is succesvol verzonden!';
} catch (Exception $e) {
    echo "E-mail kon niet worden verzonden. Fout: {$mail->ErrorInfo}";
}
?>
