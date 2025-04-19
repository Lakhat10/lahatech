<?php
require_once 'admin_check.php';

// Traitement du formulaire d'ajout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = sanitize($_POST['name']);
    $price = (float)$_POST['price'];
    $stock = (int)$_POST['stock'];
    $category = sanitize($_POST['category']);
    $description = sanitize($_POST['description']);

    // Gestion de l'upload d'image
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/products/';
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = uniqid().'.'.$ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$filename);
        $image = $uploadDir.$filename;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO produits (nom, description, prix, stock, categorie, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $stock, $category, $image]);
        logAdminAction("Ajout produit: $name");
        $_SESSION['success'] = "Produit ajouté avec succès";
        redirect('admin_produits.php');
    } catch (PDOException $e) {
        die("Erreur d'ajout de produit");
    }
}

// Récupération des produits
$products = $pdo->query("SELECT * FROM produits ORDER BY date_ajout DESC")->fetchAll();
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
            <h2 class="page-title">Gestion des Produits</h2>
            <button class="btn" id="addProductBtn">
                <i class="fas fa-plus"></i> Ajouter un produit
            </button>
        </div>

        <!-- Formulaire d'ajout (caché par défaut) -->
        <div class="card" id="addProductForm" style="display: none;">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                
                <div class="form-group">
                    <label>Nom du produit</label>
                    <input type="text" name="name" required>
                </div>
                
                <div class="form-group">
                    <label>Prix (€)</label>
                    <input type="number" name="price" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" min="0" required>
                </div>
                
                <div class="form-group">
                    <label>Catégorie</label>
                    <input type="text" name="category" required>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" accept="image/*">
                </div>
                
                <button type="submit" name="add_product" class="btn">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
            </form>
        </div>

        <!-- Liste des produits -->
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td>
                            <?php if ($product['image']): ?>
                                <img src="<?= $product['image'] ?>" width="50">
                            <?php endif; ?>
                        </td>
                        <td><?= sanitize($product['nom']) ?></td>
                        <td><?= number_format($product['prix'], 2, ',', ' ') ?> €</td>
                        <td><?= $product['stock'] ?></td>
                        <td><?= sanitize($product['categorie']) ?></td>
                        <td>
                            <a href="admin_product_edit.php?id=<?= $product['id'] ?>" class="action-link">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <a href="admin_product_delete.php?id=<?= $product['id'] ?>" class="action-link text-danger" onclick="return confirm('Confirmer la suppression?')">
                                <i class="fas fa-trash"></i> Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        // Afficher/masquer le formulaire d'ajout
        document.getElementById('addProductBtn').addEventListener('click', function() {
            const form = document.getElementById('addProductForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>
</html>