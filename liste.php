<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des produits</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .action-btns a {
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }
        .edit-btn { background: #28a745; }
        .delete-btn { background: #dc3545; }
        .add-btn {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="main-content">
        <h1>Gestion des produits</h1>
        
        <a href="ajouter.php" class="add-btn"><i class="fas fa-plus"></i> Ajouter un produit</a>
        
        <table id="productsTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM produits");
                while ($row = $stmt->fetch()):
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><img src="../../<?= $row['image'] ?>" width="50"></td>
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['categorie'] ?></td>
                    <td><?= number_format($row['prix'], 0, ',', ' ') ?> FCFA</td>
                    <td><?= $row['stock'] ?></td>
                    <td class="action-btns">
                        <a href="modifier.php?id=<?= $row['id'] ?>" class="edit-btn"><i class="fas fa-edit"></i></a>
                        <a href="supprimer.php?id=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Confirmer la suppression ?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json'
                }
            });
        });
    </script>
</body>
</html>