<?php
session_start();
require_once 'config.php';

// Vérification de la connexion admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
function tableExists($pdo, $table) {
    try {
        $pdo->query("SELECT 1 FROM $table LIMIT 1");
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

try {
    if (!tableExists($pdo, 'utilisateurs')) {
        throw new Exception("La table utilisateurs n'existe pas");
    }
    
    // Vos requêtes ici...
} catch (Exception $e) {
    die("Erreur système: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin - Lahatech</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF3D57;
            --secondary: #00C1D4;
            --accent: #FFD166;
            --dark: #2A2D34;
            --light: #F7F7F7;
            --success: #06D6A0;
            --warning: #FF9F1C;
            --danger: #EF476F;
            --sidebar-width: 280px;
            --header-height: 70px;
            --transition: all 0.3s ease;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: var(--dark);
        }
        
        /* Layout */
        .admin-container {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            grid-template-rows: var(--header-height) 1fr;
            min-height: 100vh;
        }
        
        /* Header */
        .admin-header {
            grid-column: 2;
            background: white;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .menu-toggle {
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--dark);
            cursor: pointer;
            display: none;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        .logout-btn {
            background: none;
            border: none;
            color: var(--danger);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }
        
        /* Sidebar */
        .sidebar {
            grid-row: 1 / span 2;
            background: white;
            border-right: 1px solid rgba(0,0,0,0.05);
            padding: 20px 0;
            overflow-y: auto;
        }
        
        .sidebar-brand {
            padding: 0 20px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary);
        }
        
        .sidebar-brand img {
            height: 40px;
        }
        
        .sidebar-menu {
            padding: 10px 0;
        }
        
        .menu-title {
            padding: 15px 20px 5px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--dark);
            opacity: 0.6;
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--dark);
            text-decoration: none;
            border-radius: var(--radius-sm);
            margin: 0 10px;
            transition: var(--transition);
        }
        
        .menu-item:hover {
            background: rgba(255, 61, 87, 0.1);
            color: var(--primary);
        }
        
        .menu-item.active {
            background: rgba(255, 61, 87, 0.1);
            color: var(--primary);
            font-weight: 500;
        }
        
        .menu-item i {
            width: 24px;
            margin-right: 12px;
            font-size: 1.1rem;
        }
        
        .menu-badge {
            margin-left: auto;
            background: var(--primary);
            color: white;
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 10px;
        }
        
        /* Main Content */
        .main-content {
            padding: 30px;
            background: #f5f7fa;
        }
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            text-decoration: none;
        }
        
        .btn:hover {
            background: #e63751;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }
        
        .btn i {
            font-size: 0.9rem;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: var(--radius-md);
            padding: 20px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .stat-title {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
        }
        
        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-change {
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .stat-change.positive {
            color: var(--success);
        }
        
        .stat-change.negative {
            color: var(--danger);
        }
        
        /* Tables */
        .card {
            background: white;
            border-radius: var(--radius-md);
            padding: 20px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 30px;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        .table th {
            font-weight: 500;
            color: #666;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table tr:last-child td {
            border-bottom: none;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .status-pending {
            background: rgba(255, 159, 28, 0.1);
            color: var(--warning);
        }
        
        .status-completed {
            background: rgba(6, 214, 160, 0.1);
            color: var(--success);
        }
        
        .status-cancelled {
            background: rgba(239, 71, 111, 0.1);
            color: var(--danger);
        }
        
        .action-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .admin-container {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                position: fixed;
                left: -100%;
                top: var(--header-height);
                bottom: 0;
                z-index: 90;
                transition: var(--transition);
            }
            
            .sidebar.active {
                left: 0;
            }
            
            .admin-header {
                grid-column: 1;
            }
            
            .menu-toggle {
                display: block;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .stat-card {
            animation: fadeIn 0.5s ease-out forwards;
        }
        
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
        
        .card {
            animation: fadeIn 0.5s 0.5s ease-out forwards;
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Header -->
        <header class="admin-header">
            <div class="header-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title">Tableau de bord</h1>
            </div>
            <div class="header-right">
                <div class="user-menu">
                    <div class="user-avatar">
                        <?= strtoupper(substr($_SESSION['admin_username'], 0, 1)) ?>
                    </div>
                    <span><?= $_SESSION['admin_username'] ?></span>
                    <button class="logout-btn" onclick="window.location.href='admin_logout.php'">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </div>
            </div>
        </header>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="https://via.placeholder.com/40x40?text=LT" alt="Lahatech Logo">
                <span>Lahatech Admin</span>
            </div>

            <nav class="sidebar-menu">
                <div class="menu-title">Menu Principal</div>
                <a href="admin_dashboard.php" class="menu-item active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                </a>

                <div class="menu-title">Gestion</div>
                <a href="admin_products.php" class="menu-item">
                    <i class="fas fa-box-open"></i>
                    <span>Produits</span>
                </a>
                <a href="admin_categories.php" class="menu-item">
                    <i class="fas fa-tags"></i>
                    <span>Catégories</span>
                </a>
                <a href="admin_orders.php" class="menu-item">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Commandes</span>
                    <?php if ($pending_orders > 0): ?>
                        <span class="menu-badge"><?= $pending_orders ?></span>
                    <?php endif; ?>
                </a>
                <a href="admin_users.php" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                    <span class="menu-badge"><?= $users_count ?></span>
                </a>

                <div class="menu-title">Paramètres</div>
                <a href="admin_settings.php" class="menu-item">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
                </a>
                <a href="admin_profile.php" class="menu-item">
                    <i class="fas fa-user-cog"></i>
                    <span>Profil Admin</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h2 class="page-title">Aperçu</h2>
                <div class="header-actions">
                    <a href="admin_add_product.php" class="btn">
                        <i class="fas fa-plus"></i> Ajouter produit
                    </a>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Utilisateurs</span>
                        <div class="stat-icon" style="background: rgba(0, 193, 212, 0.1); color: var(--secondary);">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <h3 class="stat-value"><?= $users_count ?></h3>
                    <span class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 5.2% ce mois
                    </span>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Commandes</span>
                        <div class="stat-icon" style="background: rgba(255, 61, 87, 0.1); color: var(--primary);">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <h3 class="stat-value"><?= $orders_count ?></h3>
                    <span class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 12.5% ce mois
                    </span>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Commandes en attente</span>
                        <div class="stat-icon" style="background: rgba(255, 159, 28, 0.1); color: var(--warning);">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <h3 class="stat-value"><?= $pending_orders ?></h3>
                    <span class="stat-change negative">
                        <i class="fas fa-arrow-down"></i> 3.2% ce mois
                    </span>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-title">Revenu total</span>
                        <div class="stat-icon" style="background: rgba(6, 214, 160, 0.1); color: var(--success);">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                    </div>
                    <h3 class="stat-value"><?= number_format($revenue ?: 0, 2, ',', ' ') ?> €</h3>
                    <span class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> 8.7% ce mois
                    </span>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dernières commandes</h3>
                    <a href="admin_orders.php" class="view-all">
                        Voir tout <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($latest_orders as $order): ?>
                        <tr>
                            <td>#<?= $order['id'] ?></td>
                            <td><?= htmlspecialchars($order['username']) ?></td>
                            <td><?= date('d/m/Y', strtotime($order['created_at'])) ?></td>
                            <td><?= number_format($order['total_amount'], 2, ',', ' ') ?> €</td>
                            <td>
                                <span class="status-badge status-<?= $order['status'] ?>">
                                    <?= ucfirst($order['status']) ?>
                                </span>
                            </td>
                            <td>
                                <a href="admin_order_details.php?id=<?= $order['id'] ?>" class="action-link">
                                    Voir <i class="fas fa-external-link-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Recent Users -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Derniers utilisateurs</h3>
                    <a href="admin_users.php" class="view-all">
                        Voir tout <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Inscription</th>
                            <th>Commandes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($latest_users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= date('d/m/Y', strtotime($user['created_at'])) ?></td>
                            <td><?= rand(0, 10) ?></td>
                            <td>
                                <a href="admin_user_details.php?id=<?= $user['id'] ?>" class="action-link">
                                    Voir <i class="fas fa-external-link-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar on mobile
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 992) {
                if (!sidebar.contains(e.target) && e.target !== menuToggle) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>