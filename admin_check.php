<?php
session_start();
require_once 'config.php';

// Vérification de l'authentification admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('HTTP/1.1 403 Forbidden');
    die("Accès interdit. Veuillez <a href='admin_login.php'>vous connecter</a>.");
}

// Protection contre les attaques CSRF
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Token CSRF invalide");
    }
}

// Génération du token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Journalisation des actions admin
function logAdminAction($action) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO admin_logs (admin_id, action, ip_address) VALUES (?, ?, ?)");
    $stmt->execute([
        $_SESSION['admin_id'],
        $action,
        $_SERVER['REMOTE_ADDR']
    ]);
}