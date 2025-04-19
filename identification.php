<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Passer à la Caisse</title>
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
  .checkout-form {
    max-width: 400px;
    margin: 0 auto;
    background-color: white;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  .checkout-form input,
  .checkout-form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s;
  }
  .checkout-form input:focus,
  .checkout-form select:focus {
    border-color: #007bff; /* Couleur vive au focus */
    outline: none;
  }
  .checkout-form button {
    background-color: #28a745; /* Couleur vive */
    color: white;
    border: none;
    padding: 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    width: 100%;
    font-size: 16px;
  }
  .checkout-form button:hover {
    background-color: #218838; /* Couleur au survol */
    transform: scale(1.05); /* Effet de zoom au survol */
  }
  .checkout-form h3 {
    color: #333;
    margin-bottom: 15px;
    text-align: center;
  }
</style>
</head>
<body>

<h1>Passer à la Caisse</h1>

<div class="checkout-form">
  <h3>Informations de livraison</h3>
  <input type="text" id="name" placeholder="Nom complet" required>
  <input type="email" id="email" placeholder="Email" required>
  <input type="tel" id="phone" placeholder="Téléphone" required>
  <input type="date" id="date" placeholder="Date de livraison" required>
  <input type="time" id="time" placeholder="Heure de livraison" required>
  <select id="payment-method" required>
    <option value="" disabled selected>Méthode de paiement</option>
    <option value="orange_money">Orange Money</option>
    <option value="wave">Wave</option>
    <option value="paypal">PayPal</option>
  </select>
  <select id="city" required>
    <option value="" disabled selected>Ville</option>
    <option value="diourbel">Diourbel</option>
    <option value="bambey">Bambey</option>
    <option value="mbacke">Mbacké</option>
    <option value="thies">Thiès</option>
    <option value="dakar">Dakar</option>
  </select>
  <button class="confirm-order-btn">Confirmer la commande</button>
</div>

<script>
  const confirmOrderBtn = document.querySelector('.confirm-order-btn');
  let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

  confirmOrderBtn.addEventListener('click', function() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const paymentMethod = document.getElementById('payment-method').value;
    const city = document.getElementById('city').value;

    if (name && email && phone && date && time && paymentMethod && city) {
      let transportFee = 0;
      if (city === "bambey" || city === "mbacke") {
        transportFee = 500;
      } else if (city === "thies") {
        transportFee = 1000;
      } else if (city === "dakar") {
        transportFee = 1500;
      }
      
      let total = cartItems.reduce((sum, item) => sum + item.price, 0) + transportFee;
      
      let orderDetails = cartItems.map(item => `${item.name} - ${item.price} FCFA`).join('\n');
      
      alert(`Commande confirmée ! \nNom : ${name}\nEmail : ${email}\nTéléphone : ${phone}\nDate de livraison : ${date}\nHeure de livraison : ${time}\nMéthode de paiement : ${paymentMethod}\nVille : ${city}\nFrais de transport : ${transportFee} FCFA\nTotal : ${total.toFixed(2)} FCFA\n\nDétails de la commande :\n${orderDetails}`);
      
      localStorage.removeItem('cartItems');
      window.location.href = 'boutique.php';
    } else {
      alert('Veuillez remplir tous les champs.');
    }
  });
</script>
</body>
</html>