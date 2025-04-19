<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commande en Ligne - Lahatech</title>
  <link rel="stylesheet" href="style.css">
  <style>
      body {
          font-family: 'Arial', sans-serif;
          background-color: #f8f9fa;
          margin: 0;
          padding: 0;
          overflow-x: hidden;
      }
      header {
          background-color: #333;
          color: white;
          text-align: center;
          padding: 20px 0;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          position: sticky;
          top: 0;
          z-index: 1000;
      }
      header h1 {
          margin: 0;
      }
      nav {
          display: flex;
          justify-content: center;
          padding: 10px 0;
          background-color: #ff6347; /* Couleur vive */
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      nav a {
          color: white;
          margin: 0 15px;
          text-decoration: none;
          padding: 8px 15px;
          transition: background-color 0.3s, transform 0.3s;
      }
      nav a:hover {
          background-color: #333333;
          transform: scale(1.1);
      }
      .container {
          max-width: 800px;
          margin: 20px auto;
          padding: 20px;
          background-color: white;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
      }
      .container h2 {
          margin-bottom: 20px;
          color: #333;
      }
      .form-group {
          margin-bottom: 15px;
      }
      .form-group label {
          display: block;
          margin-bottom: 5px;
          color: #666;
      }
      .form-group input,
      .form-group select,
      .form-group textarea {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 1rem;
          transition: border-color 0.3s;
      }
      .form-group input:focus,
      .form-group select:focus,
      .form-group textarea:focus {
          border-color: #ff6347; /* Couleur vive au focus */
          outline: none;
      }
      .form-group textarea {
          resize: vertical;
      }
      .btn {
          display: inline-block;
          padding: 10px 20px;
          background-color: #28a745; /* Couleur vive */
          color: white;
          text-decoration: none;
          border-radius: 5px;
          transition: background 0.3s, transform 0.3s;
          cursor: pointer;
          font-size: 1.1rem;
      }
      .btn:hover {
          background-color: #218838; /* Couleur au survol */
          transform: scale(1.05);
      }
      footer {
          background-color: #343a40;
          color: white;
          text-align: center;
          padding: 20px 0;
          margin-top: 20px;
      }
      .payment-options {
          margin-top: 20px;
      }
      .payment-options label {
          display: block;
          margin: 5px 0;
          color: #666;
      }
  </style>
</head>
<body>
  <header>
      <h1>Commande en Ligne - Lahatech</h1>
      <nav>
          <a href="accueil.php">Accueil</a>
          <a href="produits.php">Produits</a>
          <a href="boutique.php">Services</a>
          <a href="contact.php">Contact</a>
      </nav>
  </header>
  <div class="container">
      <h2>Passer une Commande</h2>
      <form action="commande.php" method="POST">
          <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" id="nom" name="nom" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
              <label for="adresse">Adresse</label>
              <input type="text" id="adresse" name="adresse" required>
          </div>
          <div class="form-group">
              <label for="produit">Produit</label>
              <select id="produit" name="produit" required>
                  <option value="ordinateur">Ordinateur Portable</option>
                  <option value="smartphone">Smartphone</option>
                  <option value="tablette">Tablette</option>
                  <option value="accessoires">Accessoires</option>
              </select>
          </div>
          <div class="form-group">
              <label for="quantite">Quantité</label>
              <input type="number" id="quantite" name="quantite" min="1" required>
          </div>
          <div class="form-group">
              <label for="date">Date de Livraison</label>
              <input type="date" id="date" name="date" required>
          </div>
          <div class="form-group">
              <label for="heure">Heure de Livraison</label>
              <input type="time" id="heure" name="heure" required>
          </div>
          <div class="form-group">
              <label for="montant">Montant à Payer (en FCFA)</label>
              <input type="number" id="montant" name="montant" required>
          </div>
          <div class="payment-options">
              <h3>Méthode de Paiement</h3>
              <label>
                  <input type="radio" name="payment" value="orange_money" required> Orange Money
              </label>
              <label>
                  <input type="radio" name="payment" value="paypal" required> PayPal
              </label>
          </div>
          <button type="submit" class="btn">Commander</button>
      </form>
  </div>
  
  <footer>
      <p>&copy; Lahatech 2025 - Tous droits réservés.</p>
  </footer