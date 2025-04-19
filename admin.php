<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Connexion à la base de données
$host = 'localhost';
$dbname = 'lahatech';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Fonction de sécurité
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
?>