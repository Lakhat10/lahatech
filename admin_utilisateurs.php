<?php
require_once 'admin_check.php';

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;
$offset = ($page - 1) * $perPage;

// Recherche/filtrage
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
$where = '';
$params = [];

if ($search) {
    $where = "WHERE nom LIKE ? OR email LIKE ?";
    $params = ["%$search%", "%$search%"];
}

// Récupération des utilisateurs
try {
    $total = $pdo->query("SELECT COUNT(*) FROM utilisateurs $where")->fetchColumn();
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs $where ORDER BY date_inscription DESC LIMIT $offset, $perPage");
    $stmt->execute($params);
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur de base de données");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Même head que dashboard -->
</head>
<body>
    <?php include 'admin_header.php'; ?>
    
    <main class="main-content">
        <div class="page-header">
            <h2 class="page-title">Gestion des Utilisateurs</h2>
            <div class="header-actions">
                <form method="GET" class="search-form">
                    <input type="text" name="search" placeholder="Rechercher..." value="<?= $search ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($utilisateurs as $utilisateurs): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= sanitize($user['nom']) ?></td>
                        <td><?= sanitize($user['email']) ?></td>
                        <td><?= $user['role'] ?></td>
                        <td><?= date('d/m/Y', strtotime($user['date_inscription'])) ?></td>
                        <td>
                            <a href="admin_user_edit.php?id=<?= $user['id'] ?>" class="action-link">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <a href="admin_user_delete.php?id=<?= $user['id'] ?>" class="action-link text-danger" onclick="return confirm('Confirmer la suppression?')">
                                <i class="fas fa-trash"></i> Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page-1 ?>&search=<?= $search ?>">Précédent</a>
                <?php endif; ?>
                
                <span>Page <?= $page ?> sur <?= ceil($total/$perPage) ?></span>
                
                <?php if ($page * $perPage < $total): ?>
                    <a href="?page=<?= $page+1 ?>&search=<?= $search ?>">Suivant</a>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>