<nav class="admin-sidebar bg-white">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="admin_dashboard.php">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin_products.php">
                <i class="fas fa-box-open me-2"></i> Produits
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin_orders.php">
                <i class="fas fa-shopping-cart me-2"></i> Commandes
                <?php if($unreadOrders > 0): ?>
                    <span class="badge bg-danger float-end"><?= $unreadOrders ?></span>
                <?php endif; ?>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin_users.php">
                <i class="fas fa-users me-2"></i> Utilisateurs
            </a>
        </li>
    </ul>
</nav>