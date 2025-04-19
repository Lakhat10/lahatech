<?php
require_once 'config.php';

// Fonction pour enregistrer une commande
function saveOrderToDatabase($orderData) {
    global $pdo;
    
    try {
        // Commencer une transaction
        $pdo->beginTransaction();
        
        // 1. Enregistrer les informations client
        $stmt = $pdo->prepare("INSERT INTO customers (name, email, phone, address) 
                              VALUES (:name, :email, :phone, :address)");
        $stmt->execute([
            ':name' => $orderData['customer']['name'],
            ':email' => $orderData['customer']['email'],
            ':phone' => $orderData['customer']['phone'],
            ':address' => $orderData['customer']['address']
        ]);
        $customerId = $pdo->lastInsertId();
        
        // 2. Enregistrer la commande principale
        $stmt = $pdo->prepare("INSERT INTO orders (order_number, customer_id, subtotal, shipping, total, 
                              payment_method, status, created_at) 
                              VALUES (:order_number, :customer_id, :subtotal, :shipping, :total, 
                              :payment_method, :status, NOW())");
        $stmt->execute([
            ':order_number' => $orderData['orderNumber'],
            ':customer_id' => $customerId,
            ':subtotal' => $orderData['subtotal'],
            ':shipping' => $orderData['shipping'],
            ':total' => $orderData['total'],
            ':payment_method' => $orderData['paymentMethod'],
            ':status' => $orderData['status']
        ]);
        $orderId = $pdo->lastInsertId();
        
        // 3. Enregistrer les produits de la commande
        foreach ($orderData['items'] as $item) {
            $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_name, product_price, quantity)
                                  VALUES (:order_id, :product_name, :product_price, :quantity)");
            $stmt->execute([
                ':order_id' => $orderId,
                ':product_name' => $item['name'],
                ':product_price' => $item['price'],
                ':quantity' => $item['quantity']
            ]);
        }
        
        // Valider la transaction
        $pdo->commit();
        
        return [
            'success' => true,
            'orderId' => $orderId,
            'orderNumber' => $orderData['orderNumber']
        ];
        
    } catch (PDOException $e) {
        // Annuler la transaction en cas d'erreur
        $pdo->rollBack();
        return [
            'success' => false,
            'error' => $e->getMessage()
        ];
    }
}

// Fonction pour récupérer les produits
function getProductsFromDatabase() {
    global $pdo;
    
    try {
        $stmt = $pdo->query("SELECT * FROM products WHERE active = 1");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [
            'error' => $e->getMessage()
        ];
    }
}
?>