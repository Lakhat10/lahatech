<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Lahatech - Mon Compte</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="produits.php">Produits</a>
            <a href="services.php">Services</a>
            <a href="contact.php">Contact</a>
            <a href="inscription.php">S'inscrire</a>
            <a href="connexion.php">Connexion</a>
            <a href="panier.php">Panier</a>
        </nav>
    </header>
    <main>
        <h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>
        <p>Voici vos informations de compte.</p>
        <a href="panier.php">Voir mon panier</a>
    </main>
</body>
</html>
