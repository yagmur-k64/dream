<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang gegevens
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $event_type = htmlspecialchars($_POST['event_type']);
    $services = isset($_POST['services']) ? implode(", ", $_POST['services']) : "Geen gekozen";
    $help_needed = htmlspecialchars($_POST['help_needed']);
    $extra_info = htmlspecialchars($_POST['extra_info']);

    // E-maildetails
    $to = "yagmur64.karabulut@gmail.com"; // Verander dit naar jouw e-mailadres
    $subject = "Nieuwe Offerte Aanvraag van $name";
    $message = "Naam: $name\n";
    $message .= "E-mail: $email\n";
    $message .= "Telefoonnummer: $phone\n";
    $message .= "Type event: $event_type\n";
    $message .= "Benodigde services: $services\n";
    $message .= "Waar hulp nodig is: $help_needed\n";
    $message .= "Extra informatie: $extra_info\n";

    $headers = "From: $email";

    // Verstuur e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Offerte succesvol verzonden!";
    } else {
        echo "Er is een fout opgetreden bij het verzenden.";
    }
}
?>
