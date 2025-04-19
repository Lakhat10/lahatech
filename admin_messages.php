<?php
require_once 'admin_header.php';

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 15;
$offset = ($page - 1) * $perPage;

// Filtres
$filters = [
    'search' => $_GET['search'] ?? '',
    'read' => $_GET['read'] ?? '',
    'priority' => $_GET['priority'] ?? ''
];

// Requête de base
$query = "SELECT m.*, u.nom AS user_name 
          FROM messages m
          LEFT JOIN utilisateurs u ON m.utilisateur_id = u.id
          WHERE 1=1";

$params = [];

// Application des filtres
if (!empty($filters['search'])) {
    $query .= " AND (m.sujet LIKE ? OR m.contenu LIKE ? OR m.email LIKE ?)";
    $params = array_merge($params, 
        ["%{$filters['search']}%", "%{$filters['search']}%", "%{$filters['search']}%"]);
}

if ($filters['read'] === 'unread') {
    $query .= " AND m.lu = FALSE";
} elseif ($filters['read'] === 'read') {
    $query .= " AND m.lu = TRUE";
}

if (!empty($filters['priority'])) {
    $query .= " AND m.priorite = ?";
    $params[] = $filters['priority'];
}

// Comptage total
$totalQuery = "SELECT COUNT(*) FROM ($query) AS total";
$total = $pdo->prepare($totalQuery);
$total->execute($params);
$totalMessages = $total->fetchColumn();

// Requête paginée
$query .= " ORDER BY m.date_envoi DESC LIMIT $offset, $perPage";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$messages = $stmt->fetchAll();
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between mb-4">
        <h2>Gestion des Messages</h2>
        <div>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="fas fa-filter"></i> Filtres
            </button>
        </div>
    </div>

    <!-- Filtres -->
    <div class="modal fade" id="filterModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="get">
                    <div class="modal-header">
                        <h5 class="modal-title">Filtrer les messages</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Recherche</label>
                            <input type="text" name="search" class="form-control" 
                                   value="<?= htmlspecialchars($filters['search']) ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Statut</label>
                            <select name="read" class="form-select">
                                <option value="">Tous</option>
                                <option value="unread" <?= $filters['read'] === 'unread' ? 'selected' : '' ?>>Non lus</option>
                                <option value="read" <?= $filters['read'] === 'read' ? 'selected' : '' ?>>Lus</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Priorité</label>
                            <select name="priority" class="form-select">
                                <option value="">Toutes</option>
                                <option value="low" <?= $filters['priority'] === 'low' ? 'selected' : '' ?>>Basse</option>
                                <option value="medium" <?= $filters['priority'] === 'medium' ? 'selected' : '' ?>>Moyenne</option>
                                <option value="high" <?= $filters['priority'] === 'high' ? 'selected' : '' ?>>Haute</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Appliquer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Liste des messages -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Sujet</th>
                            <th width="15%">Expéditeur</th>
                            <th width="15%">Email</th>
                            <th width="10%">Priorité</th>
                            <th width="15%">Date</th>
                            <th width="10%">Statut</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $message): ?>
                        <tr class="<?= !$message['lu'] ? 'table-primary' : '' ?>">
                            <td><?= $message['id'] ?></td>
                            <td>
                                <a href="admin_message_view.php?id=<?= $message['id'] ?>">
                                    <?= htmlspecialchars($message['sujet']) ?>
                                </a>
                            </td>
                            <td>
                                <?= $message['user_name'] 
                                    ? htmlspecialchars($message['user_name'])
                                    : '<em>Visiteur</em>' ?>
                            </td>
                            <td><?= htmlspecialchars($message['email']) ?></td>
                            <td>
                                <?php 
                                $priorityClass = [
                                    'low' => 'text-success',
                                    'medium' => 'text-warning',
                                    'high' => 'text-danger'
                                ];
                                ?>
                                <span class="<?= $priorityClass[$message['priorite']] ?>">
                                    <?= ucfirst($message['priorite']) ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($message['date_envoi'])) ?></td>
                            <td>
                                <?= $message['lu'] 
                                    ? '<span class="badge bg-success">Lu</span>'
                                    : '<span class="badge bg-warning text-dark">Non lu</span>' ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="admin_message_view.php?id=<?= $message['id'] ?>" 
                                       class="btn btn-sm btn-outline-primary" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="admin_message_delete.php?id=<?= $message['id'] ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Supprimer ce message?')"
                                       title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" 
                               href="?page=<?= $page-1 ?>&<?= http_build_query($filters) ?>">
                                Précédent
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= ceil($totalMessages / $perPage); $i++): ?>
                        <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                            <a class="page-link" 
                               href="?page=<?= $i ?>&<?= http_build_query($filters) ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < ceil($totalMessages / $perPage)): ?>
                        <li class="page-item">
                            <a class="page-link" 
                               href="?page=<?= $page+1 ?>&<?= http_build_query($filters) ?>">
                                Suivant
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php require_once 'admin_footer.php'; ?>