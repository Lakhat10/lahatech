<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Paramètres du serveur
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com'; // Indique le serveur SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ton_email@example.com'; // Ton adresse e-mail
    $mail->Password   = 'ton_mot_de_passe'; // Ton mot de passe
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Destinataires
    $mail->setFrom('ton_email@example.com', 'Ton Nom');
    $mail->addAddress('destinataire@example.com', 'Nom Destinataire');

    // Contenu de l'e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Voici le sujet';
    $mail->Body    = 'Ceci est le contenu de l\'e-mail en <b>HTML</b>';
    $mail->AltBody = 'Ceci est le contenu de l\'e-mail en texte brut';

    $mail->send();
    echo 'L\'e-mail a été envoyé avec succès';
} catch (Exception $e) {
    echo "L'e-mail n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
}
