<?php
require_once 'admin_header.php';

if (!isset($_GET['id'])) {
    header('Location: admin_messages.php');
    exit;
}

// Marquer comme lu
$pdo->prepare("UPDATE messages SET lu = TRUE WHERE id = ?")
    ->execute([$_GET['id']]);

// Récupérer le message
$stmt = $pdo->prepare("SELECT m.*, u.nom AS user_name 
                      FROM messages m
                      LEFT JOIN utilisateurs u ON m.utilisateur_id = u.id
                      WHERE m.id = ?");
$stmt->execute([$_GET['id']]);
$message = $stmt->fetch();

if (!$message) {
    header('Location: admin_messages.php');
    exit;
}
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between mb-4">
        <h2>Message #<?= $message['id'] ?></h2>
        <a href="admin_messages.php" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <div class="d-flex justify-content-between">
                <h4 class="mb-0"><?= htmlspecialchars($message['sujet']) ?></h4>
                <span class="badge bg-<?= $message['priorite'] === 'high' ? 'danger' : ($message['priorite'] === 'medium' ? 'warning' : 'success') ?>">
                    <?= ucfirst($message['priorite']) ?>
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Expéditeur:</strong> 
                        <?= $message['user_name'] 
                            ? htmlspecialchars($message['user_name'])
                            : '<em>Visiteur</em>' ?>
                    </p>
                    <p><strong>Email:</strong> 
                        <a href="mailto:<?= htmlspecialchars($message['email']) ?>">
                            <?= htmlspecialchars($message['email']) ?>
                        </a>
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p><strong>Date:</strong> 
                        <?= date('d/m/Y H:i', strtotime($message['date_envoi'])) ?>
                    </p>
                    <p><strong>Statut:</strong> 
                        <?= $message['lu'] 
                            ? '<span class="text-success">Lu</span>'
                            : '<span class="text-warning">Non lu</span>' ?>
                    </p>
                </div>
            </div>

            <div class="message-content p-3 bg-light rounded">
                <?= nl2br(htmlspecialchars($message['contenu'])) ?>
            </div>

            <div class="mt-4">
                <a href="mailto:<?= htmlspecialchars($message['email']) ?>" 
                   class="btn btn-primary me-2">
                    <i class="fas fa-reply"></i> Répondre
                </a>
                <a href="admin_message_delete.php?id=<?= $message['id'] ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Supprimer ce message?')">
                    <i class="fas fa-trash"></i> Supprimer
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'admin_footer.php'; ?>