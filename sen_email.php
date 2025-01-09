<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang de ingevoerde gegevens
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Ontvanger e-mailadres (eigenaar van de website)
    $to = "yagmur.karabulut@live.nl"; // Vervang dit met het e-mailadres van de eigenaar
    $subject = "Nieuwe Offerte Aanvraag van $name";

    // Opbouw van de e-mail
    $emailBody = "Naam: $name\n";
    $emailBody .= "E-mail: $email\n";
    $emailBody .= "Telefoonnummer: $phone\n";
    $emailBody .= "Bericht:\n$message\n";

    $headers = "From: $email";

    // Verstuur de e-mail
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "<script>alert('Uw aanvraag is succesvol verzonden!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Er is iets misgegaan. Probeer het opnieuw.'); window.history.back();</script>";
    }
}
?>
