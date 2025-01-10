<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Haal gegevens op uit het formulier
    $name = htmlspecialchars($_POST['name']); // Naam van de gebruiker
    $email = htmlspecialchars($_POST['email']); // E-mailadres van de gebruiker
    $message = htmlspecialchars($_POST['message']); // Bericht van de gebruiker

    $mail = new PHPMailer(true);

    try {
        // Serverinstellingen
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gebruik de SMTP-server van Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'yagmur64.karabulut@gmail.com'; // Jouw Gmail-adres
        $mail->Password = 'auqb prvl cjuz attn'; // Jouw Gmail-app-wachtwoord
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('yagmur64.karabulut@gmail.com', 'Dream Organization'); // Standaard verzender
        $mail->addReplyTo($email, $name); // Stel het Reply-To adres in met de ingevoerde gegevens

        // Ontvanger en verzender
        $mail->addAddress('yagmur64.karabulut@gmail.com'); // Ontvanger (Dream)

        // Inhoud van de e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Nieuwe Offerte Aanvraag';
        $mail->Body = "
            <h2>Nieuwe offerte-aanvraag</h2>
            <p><strong>Naam:</strong> {$name}</p>
            <p><strong>E-mailadres:</strong> {$email}</p>
            <p><strong>Bericht:</strong><br>{$message}</p>
        ";

        $mail->send();
        echo 'Uw aanvraag is succesvol verzonden! Bedankt voor uw interesse.';
    } catch (Exception $e) {
        echo "E-mail kon niet worden verzonden. Fout: {$mail->ErrorInfo}";
    }
} else {
    echo 'Ongeldige aanvraagmethode.';
}
?>
