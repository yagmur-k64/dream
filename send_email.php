<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Haal gegevens op uit het formulier
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $event_type = htmlspecialchars($_POST['event_type']);
    $services = isset($_POST['services']) ? implode(', ', $_POST['services']) : 'Geen services geselecteerd';
    $help_needed = htmlspecialchars($_POST['help_needed']);
    $extra_info = htmlspecialchars($_POST['extra_info']);

    // Controleer of het e-mailadres geldig is
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Ongeldig e-mailadres. Vul een correct e-mailadres in.');
    }

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

        // Verzender en ontvanger
        $mail->setFrom('yagmur64.karabulut@gmail.com', 'Dream Organization');
        $mail->addReplyTo($email, $name);
        $mail->addAddress('yagmur64.karabulut@gmail.com'); // Ontvanger (Dream)

        // Inhoud van de e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Nieuwe Offerte Aanvraag';
        $mail->Body = "
            <h2>Nieuwe offerte-aanvraag</h2>
            <p><strong>Naam:</strong> {$name}</p>
            <p><strong>E-mailadres:</strong> {$email}</p>
            <p><strong>Telefoonnummer:</strong> {$phone}</p>
            <p><strong>Type Event:</strong> {$event_type}</p>
            <p><strong>Benodigde Services:</strong> {$services}</p>
            <p><strong>Hulp nodig bij:</strong><br>{$help_needed}</p>
            <p><strong>Extra informatie:</strong><br>{$extra_info}</p>
        ";

        $mail->send();
        // Redirect naar de homepage
        header('Location: index.html');
        exit(); // Stop verdere uitvoering na de redirect
    } catch (Exception $e) {
        echo "E-mail kon niet worden verzonden. Fout: {$mail->ErrorInfo}";
    }
} else {
    echo 'Ongeldige aanvraagmethode.';
}
?>
