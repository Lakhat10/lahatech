<?php
// admin_header.php

require_once 'config.php';
require_once 'admin_check.php';

// Récupérer les notifications
$unreadOrders = $pdo->query("SELECT COUNT(*) FROM commandes WHERE statut = 'en_attente'")->fetchColumn();
$unreadMessages = $pdo->query("SELECT COUNT(*) FROM messages WHERE lu = 0")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin - Lahatech</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
    
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/admin.js" defer></script>
    
    <style>
        :root {
            --primary: #FF3D57;
            --secondary: #00C1D4;
            --accent: #FFD166;
            --dark: #2A2D34;
            --light: #F7F7F7;
        }
        
        .admin-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 0 2rem;
            height: 70px;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 0.6rem;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="admin-header sticky-top d-flex justify-content-between align-items-center">
        <!-- Menu Toggle (Mobile) -->
        <button class="btn d-lg-none" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Logo -->
        <a href="admin_dashboard.php" class="navbar-brand d-none d-lg-block">
            <img src="../assets/images/logo-lahatech.png" height="30" alt="Lahatech Admin">
        </a>
        
        <!-- Right Side -->
        <div class="d-flex align-items-center">
            <!-- Notifications -->
            <div class="dropdown me-3">
                <button class="btn position-relative" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                    <?php if($unreadOrders > 0 || $unreadMessages > 0): ?>
                        <span class="notification-badge badge bg-danger rounded-pill">
                            <?= ($unreadOrders + $unreadMessages) ?>
                        </span>
                    <?php endif; ?>
                </button>
                
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><h6 class="dropdown-header">Notifications</h6></li>
                    <?php if($unreadOrders > 0): ?>
                        <li>
                            <a class="dropdown-item" href="admin_orders.php?filter=en_attente">
                                <i class="fas fa-shopping-cart text-primary me-2"></i>
                                <?= $unreadOrders ?> commande(s) en attente
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if($unreadMessages > 0): ?>
                        <li>
                            <a class="dropdown-item" href="admin_messages.php">
                                <i class="fas fa-envelope text-success me-2"></i>
                                <?= $unreadMessages ?> nouveau(x) message(s)
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="admin_notifications.php">Voir toutes</a></li>
                </ul>
            </div>
            
            <!-- User Menu -->
            <div class="dropdown">
                <button class="btn dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <div class="avatar me-2" style="background-color: var(--primary); width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                        <?= strtoupper(substr($_SESSION['admin_email'], 0, 1)) ?>
                    </div>
                    <span class="d-none d-md-inline"><?= $_SESSION['admin_messages'] ?></span>
                </button>
                
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <h6 class="dropdown-header">Connecté en tant que Admin</h6>
                    </li>
                    <li>
                        <a class="dropdown-item" href="admin_profile.php">
                            <i class="fas fa-user-cog me-2"></i> Mon profil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="admin_settings.php">
                            <i class="fas fa-cog me-2"></i> Paramètres
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="admin_logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    
    <!-- Main Content Wrapper -->
    <div class="d-flex">
        <?php include 'admin_sidebar.php'; ?>
        
        <main class="main-content flex-grow-1 p-4">
            <!-- Le contenu spécifique à chaque page sera inséré ici -->