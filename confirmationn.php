<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Votre Panier</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
  }
  h1 {
    color: #007bff; /* Couleur vive */
    text-align: center;
    margin-bottom: 20px;
  }
  .cart-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    background-color: white;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
  }
  .cart-item:hover {
    transform: scale(1.02); /* Effet de zoom au survol */
  }
  .cart-item p {
    margin: 0;
    color: #333;
  }
  .cart-total {
    text-align: right;
    font-size: 20px;
    font-weight: bold;
    color: #28a745; /* Couleur vive pour le total */
  }
  .checkout-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: #28a745; /* Couleur vive */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s, transform 0.2s;
    font-size: 18px;
    margin-top: 20px;
  }
  .checkout-btn:hover {
    background-color: #218838; /* Couleur au survol */
    transform: scale(1.05); /* Effet de zoom au survol */
  }
</style>
</head>
<body>

<h1>Votre Panier</h1>

<div id="cart-items"></div>
<p class="cart-total">Total : 0 FCFA</p>
<a href="identification.php" class="checkout-btn">Passer à la caisse</a>

<script>
  const cartItemsContainer = document.getElementById('cart-items');
  const cartTotalElement = document.querySelector('.cart-total');

  document.addEventListener('DOMContentLoaded', function() {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    let total = 0;

    cartItems.forEach(function(item) {
      const cartItem = document.createElement('div');
      cartItem.classList.add('cart-item');
      cartItem.innerHTML = `<p>${item.name}</p><p>${item.price} FCFA</p>`;
      cartItemsContainer.appendChild(cartItem);
      total += item.price;
    });

    cartTotalElement.textContent = `Total : ${total.toFixed(2)} FCFA`;
  });
</script>
</body>
</html>