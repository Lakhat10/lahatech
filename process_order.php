<?php
header('Content-Type: application/json');

// Configuration de la base de données
$host = 'localhost';
$dbname = 'lahatech';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données de la commande
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Valider les données
    if (!isset($data['customer'], $data['items'], $data['total'])) {
        throw new Exception('Données de commande invalides');
    }

    // Commencer une transaction
    $pdo->beginTransaction();

    // Insérer la commande dans la table des commandes
    $stmt = $pdo->prepare("
        INSERT INTO commandes (
            nom_client, 
            email, 
            telephone, 
            adresse, 
            montant, 
            statut, 
            methode_paiement,
            date_commande
        ) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    
    $stmt->execute([
        $data['customer']['name'],
        $data['customer']['email'],
        $data['customer']['phone'],
        $data['customer']['address'],
        $data['total'],
        'en_attente', // Statut initial
        $data['paymentMethod']
    ]);
    
    $commandeId = $pdo->lastInsertId();

    // Insérer les articles de la commande
    $stmt = $pdo->prepare("
        INSERT INTO commande_articles (
            commande_id, 
            produit_nom, 
            prix_unitaire, 
            quantite, 
            prix_total
        ) VALUES (?, ?, ?, ?, ?)
    ");
    
    foreach ($data['items'] as $item) {
        $stmt->execute([
            $commandeId,
            $item['name'],
            $item['price'],
            $item['quantity'],
            $item['price'] * $item['quantity']
        ]);
    }

    // Valider la transaction
    $pdo->commit();

    // Réponse JSON
    echo json_encode([
        'success' => true,
        'orderId' => $commandeId,
        'orderNumber' => 'CMD-' . $commandeId
    ]);

} catch (Exception $e) {
    // En cas d'erreur, annuler la transaction
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    
    // Envoyer une réponse d'erreur
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors du traitement de la commande: ' . $e->getMessage()
    ]);
}
?>