<?php
$host = 'localhost'; // ou l'adresse de votre serveur
$db = 'lahatech';
$user = 'root'; // Votre nom d'utilisateur MySQL
$pass = ''; // Votre mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


