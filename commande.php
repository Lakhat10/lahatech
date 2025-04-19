<?php
// confirmation.php

// Vérifiez si les données ont été envoyées via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $produit = htmlspecialchars($_POST['produit']);
    $quantite = htmlspecialchars($_POST['quantite']);
    $date = htmlspecialchars($_POST['date']);
    $heure = htmlspecialchars($_POST['heure']);
    $montant = htmlspecialchars($_POST['montant']);
    $payment = htmlspecialchars($_POST['payment']);
} else {
    // Rediriger vers la page de commande si l'accès est direct
    header("Location: services.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Commande - Lahatech</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            color: #333;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirmation de votre Commande</h2>
        <p><strong>Nom :</strong> <?php echo $nom; ?></p>
        <p><strong>Email :</strong> <?php echo $email; ?></p>
        <p><strong>Adresse :</strong> <?php echo $adresse; ?></p>
        <p><strong>Produit :</strong> <?php echo $produit; ?></p>
        <p><strong>Quantité :</strong> <?php echo $quantite; ?></p>
        <p><strong>Date de Livraison :</strong> <?php echo $date; ?></p>
        <p><strong>Heure de Livraison :</strong> <?php echo $heure; ?></p>
        <p><strong>Montant à Payer :</strong> <?php echo $montant; ?> FCFA</p>
        <p><strong>Méthode de Paiement :</strong> <?php echo $payment; ?></p>
        
        <a href="boutique.php" class="btn">Retour à l'Accueil</a>
    </div>
    <footer>
        <p>&copy; Lahatech 2025 - Tous droits réservés.</p>
    </footer>
</body>
</html>
