>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lahatech - Boutique en ligne de technologie</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1d4ed8;
      --primary-light: #3b82f6;
      --secondary: #10b981;
      --dark: #1e293b;
      --light: #f8fafc;
      --gray: #94a3b8;
      --danger: #ef4444;
      --success: #10b981;
      --warning: #f59e0b;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f1f5f9;
      color: var(--dark);
      line-height: 1.6;
    }
    
    /* Header */
    header {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: white;
      padding: 1rem 0;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 100;
    }
    
    .header-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .logo {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .logo i {
      color: var(--secondary);
    }
    
    /* Navigation */
    nav {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }
    
    nav a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
      padding: 0.5rem 1rem;
      border-radius: 4px;
    }
    
    nav a:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }
    
    .cart-icon {
      position: relative;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
    }
    
    .cart-count {
      position: absolute;
      top: -8px;
      right: -8px;
      background-color: var(--danger);
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.7rem;
      font-weight: bold;
    }
    
    /* Main content */
    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 2rem;
    }
    
    .hero {
      text-align: center;
      margin-bottom: 3rem;
    }
    
    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: var(--primary-dark);
      font-weight: 700;
    }
    
    .hero p {
      font-size: 1.1rem;
      color: var(--gray);
      max-width: 700px;
      margin: 0 auto;
    }
    
    /* Search bar */
    .search-container {
      display: flex;
      justify-content: center;
      margin-bottom: 2rem;
    }
    
    .search-bar {
      position: relative;
      width: 100%;
      max-width: 600px;
    }
    
    .search-bar input {
      width: 100%;
      padding: 0.8rem 1rem 0.8rem 3rem;
      border: 2px solid #e2e8f0;
      border-radius: 8px;
      font-size: 1rem;
      transition: all 0.3s ease;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }
    
    .search-bar input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
    }
    
    .search-bar i {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray);
    }
    
    /* Products grid */
    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }
    
    .product-card {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      position: relative;
    }
    
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    
    .product-badge {
      position: absolute;
      top: 1rem;
      left: 1rem;
      background-color: var(--secondary);
      color: white;
      padding: 0.3rem 0.6rem;
      border-radius: 4px;
      font-size: 0.8rem;
      font-weight: 600;
    }
    
    .product-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-bottom: 1px solid #f1f5f9;
    }
    
    .product-info {
      padding: 1.5rem;
    }
    
    .product-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: var(--dark);
    }
    
    .product-description {
      color: var(--gray);
      font-size: 0.9rem;
      margin-bottom: 1rem;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
    
    .product-price {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1rem;
    }
    
    .product-actions {
      display: flex;
      gap: 0.5rem;
    }
    
    .btn {
      padding: 0.6rem 1rem;
      border: none;
      border-radius: 6px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }
    
    .btn-primary {
      background-color: var(--primary);
      color: white;
      flex: 1;
    }
    
    .btn-primary:hover {
      background-color: var(--primary-dark);
    }
    
    .btn-secondary {
      background-color: #e2e8f0;
      color: var(--dark);
    }
    
    .btn-secondary:hover {
      background-color: #cbd5e1;
    }
    
    /* Modal */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      overflow-y: auto;
    }
    
    .modal-content {
      background-color: white;
      margin: 2rem auto;
      max-width: 800px;
      width: 90%;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      animation: modalFadeIn 0.3s ease;
    }
    
    @keyframes modalFadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .modal-header {
      padding: 1.5rem;
      border-bottom: 1px solid #f1f5f9;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .modal-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--dark);
    }
    
    .close-modal {
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      color: var(--gray);
      transition: color 0.3s ease;
    }
    
    .close-modal:hover {
      color: var(--danger);
    }
    
    .modal-body {
      padding: 1.5rem;
    }
    
    .product-details {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
    }
    
    .product-details-image {
      width: 100%;
      border-radius: 8px;
      object-fit: cover;
      height: 300px;
    }
    
    .product-details-info h3 {
      font-size: 1.8rem;
      margin-bottom: 1rem;
      color: var(--dark);
    }
    
    .product-details-price {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1rem;
    }
    
    .product-details-description {
      color: var(--gray);
      margin-bottom: 1.5rem;
      line-height: 1.7;
    }
    
    .product-details-features {
      margin-bottom: 2rem;
    }
    
    .product-details-features h4 {
      font-size: 1.2rem;
      margin-bottom: 0.8rem;
      color: var(--dark);
    }
    
    .product-details-features ul {
      list-style-type: none;
    }
    
    .product-details-features li {
      margin-bottom: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .product-details-features li i {
      color: var(--secondary);
    }
    
    .modal-footer {
      padding: 1.5rem;
      border-top: 1px solid #f1f5f9;
      display: flex;
      justify-content: flex-end;
      gap: 1rem;
    }
    
    /* Checkout modal */
    .checkout-form {
      display: grid;
      gap: 1.5rem;
    }
    
    .form-group {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
    
    .form-group label {
      font-weight: 500;
      color: var(--dark);
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
      padding: 0.8rem 1rem;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }
    
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
    }
    
    .payment-methods {
      display: grid;
      gap: 1rem;
    }
    
    .payment-method {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .payment-method:hover {
      border-color: var(--primary);
    }
    
    .payment-method.selected {
      border-color: var(--primary);
      background-color: rgba(37, 99, 235, 0.05);
    }
    
    .payment-method i {
      font-size: 1.5rem;
      color: var(--primary);
    }
    
    .payment-method-info h4 {
      font-size: 1rem;
      margin-bottom: 0.2rem;
    }
    
    .payment-method-info p {
      font-size: 0.8rem;
      color: var(--gray);
    }
    
    /* Cart modal */
    .cart-items {
      max-height: 400px;
      overflow-y: auto;
      margin-bottom: 1.5rem;
    }
    
    .cart-item {
      display: flex;
      gap: 1rem;
      padding: 1rem 0;
      border-bottom: 1px solid #f1f5f9;
    }
    
    .cart-item-image {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 6px;
    }
    
    .cart-item-details {
      flex: 1;
    }
    
    .cart-item-title {
      font-weight: 500;
      margin-bottom: 0.3rem;
    }
    
    .cart-item-price {
      color: var(--primary);
      font-weight: 600;
      margin-bottom: 0.5rem;
    }
    
    .cart-item-actions {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .quantity-control {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .quantity-btn {
      width: 30px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #e2e8f0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .quantity-btn:hover {
      background-color: #cbd5e1;
    }
    
    .quantity {
      width: 40px;
      text-align: center;
    }
    
    .remove-item {
      background: none;
      border: none;
      color: var(--danger);
      cursor: pointer;
      margin-left: 1rem;
    }
    
    .cart-summary {
      margin-top: 1.5rem;
      padding-top: 1.5rem;
      border-top: 1px solid #f1f5f9;
    }
    
    .summary-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 0.8rem;
    }
    
    .summary-total {
      font-weight: 700;
      font-size: 1.1rem;
    }
    
    /* Notification */
    .notification {
      position: fixed;
      top: 1rem;
      right: 1rem;
      padding: 1rem 1.5rem;
      border-radius: 8px;
      color: white;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      z-index: 1100;
      transform: translateX(120%);
      transition: transform 0.3s ease;
    }
    
    .notification.show {
      transform: translateX(0);
    }
    
    .notification-success {
      background-color: var(--success);
    }
    
    .notification-error {
      background-color: var(--danger);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        gap: 1rem;
      }
      
      nav {
        width: 100%;
        justify-content: space-between;
      }
      
      .product-details {
        grid-template-columns: 1fr;
      }
      
      .product-details-image {
        height: 200px;
      }
    }
    
    @media (max-width: 480px) {
      .container {
        padding: 0 1rem;
      }
      
      .hero h1 {
        font-size: 2rem;
      }
      
      .product-actions {
        flex-direction: column;
      }
      
      .modal-footer {
        flex-direction: column;
      }
      
      .btn {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="logo">
        <i class="fas fa-laptop-code"></i>
        <span>Lahatech</span>
      </div>
      <nav>
        <a href="index.html"><i class="fas fa-home"></i> Accueil</a>
        <a href="video.php"><i class="fas fa-video"></i> Vidéos</a>
        <a href="about.html"><i class="fas fa-info-circle"></i> À Propos</a>
        <div class="cart-icon" id="cartButton">
          <i class="fas fa-shopping-cart"></i>
          <span class="cart-count" id="cartCount">0</span>
        </div>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="hero">
      <h1>Découvrez nos produits technologiques</h1>
      <p>Trouvez les derniers gadgets et équipements technologiques à des prix compétitifs avec une livraison rapide.</p>
    </div>
    
    <div class="search-container">
      <div class="search-bar">
        <i class="fas fa-search"></i>
        <input type="text" id="searchInput" placeholder="Rechercher des produits...">
      </div>
    </div>
    
    <div class="products-grid" id="productContainer">
      <!-- Produit 1 -->
      <div class="product-card" data-name="Accessoires" data-description="Accessoires en gros." data-price="200000" data-delivery="3 jours">
        <span class="product-badge">Nouveau</span>
        <img src="img/globe.jpg" alt="Accessoires" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Accessoires</h3>
          <p class="product-description">Accessoires en gros pour tous vos besoins technologiques.</p>
          <p class="product-price">200.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="200000" data-livraison="3 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Type : Accessoires divers</li>
            <li>Matériau : Plastique</li>
            <li>Poids : 500g</li>
            <li>Garantie : 1 an</li>
          </ul>
        </div>
      </div>
      
      <!-- Produit 2 -->
      <div class="product-card" data-name="Disque dur" data-description="Disque dur 1000 GO." data-price="15000" data-delivery="3 jours">
        <img src="img/disque.jpg" alt="Disque dur" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Disque dur</h3>
          <p class="product-description">Disque dur externe 1000 GO pour stockage de données.</p>
          <p class="product-price">15.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="15000" data-livraison="3 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Capacité : 1000 GO</li>
            <li>Type : HDD</li>
            <li>Vitesse : 5400 RPM</li>
            <li>Interface : USB 3.0</li>
          </ul>
        </div>
      </div>
      
      <!-- Produit 3 -->
      <div class="product-card" data-name="Tablette" data-description="Tablette 10 pouces avec 128 Go de stockage." data-price="100000" data-delivery="3 jours">
        <span class="product-badge">Promo</span>
        <img src="img/tablette.jpg" alt="Tablette" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Tablette</h3>
          <p class="product-description">Tablette 10 pouces avec 128 Go de stockage et écran Full HD.</p>
          <p class="product-price">100.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="100000" data-livraison="3 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Taille : 10 pouces</li>
            <li>Stockage : 128 Go</li>
            <li>Résolution : 1920 x 1200</li>
            <li>Autonomie : 10 heures</li>
          </ul>
        </div>
      </div>
      
      <!-- Produit 4 -->
      <div class="product-card" data-name="Casque Audio" data-description="Casque sans fil avec réduction de bruit." data-price="10000" data-delivery="3 jours">
        <img src="img/casque.jpg" alt="Casque Audio" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Casque Audio</h3>
          <p class="product-description">Casque sans fil avec réduction de bruit active.</p>
          <p class="product-price">10.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="10000" data-livraison="3 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Type : Sans fil</li>
            <li>Autonomie : 20 heures</li>
            <li>Réduction de bruit : Oui</li>
            <li>Poids : 250g</li>
          </ul>
        </div>
      </div>
      
      <!-- Produit 5 -->
      <div class="product-card" data-name="Montre Connectée" data-description="Montre connectée avec suivi de la santé." data-price="10000" data-delivery="3 jours">
        <span class="product-badge">Populaire</span>
        <img src="img/montre.jpg" alt="Montre Connectée" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Montre Connectée</h3>
          <p class="product-description">Montre connectée avec suivi de la santé et notifications.</p>
          <p class="product-price">10.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="10000" data-livraison="3 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Fonctionnalités : Suivi de la santé</li>
            <li>Autonomie : 7 jours</li>
            <li>Écran : AMOLED</li>
            <li>Compatibilité : Android et iOS</li>
          </ul>
        </div>
      </div>
      
      <!-- Produit 9 -->
      <div class="product-card" data-name="Serveur Dédicacé" data-description="Serveur haute performance pour professionnels." data-price="1000000" data-delivery="5 jours">
        <span class="product-badge">Pro</span>
        <img src="img/serveur.jpg" alt="Serveur Dédicacé" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Serveur Dédicacé</h3>
          <p class="product-description">Solution serveur complète pour entreprises et professionnels.</p>
          <p class="product-price">1.000.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="1000000" data-livraison="5 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Processeur: Intel Xeon 16 cœurs</li>
            <li>RAM: 32GB DDR4</li>
            <li>Stockage: 2TB SSD + 4TB HDD</li>
            <li>Réseau: 1Gbps dédié</li>
          </ul>
        </div>
      </div>

      <!-- Produit 10 -->
      <div class="product-card" data-name="Câble HDMI" data-description="Câble haute vitesse 4K 2m." data-price="5000" data-delivery="2 jours">
        <img src="img/cable.jpg" alt="Câble HDMI" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Câble HDMI</h3>
          <p class="product-description">Câble HDMI 2.0 compatible 4K à 60Hz.</p>
          <p class="product-price">5.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="5000" data-livraison="2 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Longueur: 2 mètres</li>
            <li>Version: HDMI 2.0</li>
            <li>Résolution: 4K à 60Hz</li>
            <li>Connecteurs: Dorés 24K</li>
          </ul>
        </div>
      </div>

      <!-- Produit 11 -->
      <div class="product-card" data-name="Connecteur USB" data-description="Adaptateur USB-C vers USB-A." data-price="3000" data-delivery="2 jours">
        <img src="img/usb.jpg" alt="Connecteur USB" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Connecteur USB</h3>
          <p class="product-description">Adaptateur pour connecter vos périphériques USB-A à USB-C.</p>
          <p class="product-price">3.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="3000" data-livraison="2 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Type: USB-C vers USB-A</li>
            <li>Vitesse: USB 3.0 (5Gbps)</li>
            <li>Compatibilité: Tous appareils USB-C</li>
          </ul>
        </div>
      </div>

      <!-- Produit 12 -->
      <div class="product-card" data-name="Bracelet Connecté" data-description="Suivi d'activité et notifications." data-price="15000" data-delivery="3 jours">
        <span class="product-badge">Nouveau</span>
        <img src="img/bracelet.jpg" alt="Bracelet Connecté" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Bracelet Connecté</h3>
          <p class="product-description">Suivez votre activité quotidienne et recevez des notifications.</p>
          <p class="product-price">15.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="15000" data-livraison="3 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Écran: OLED tactile</li>
            <li>Autonomie: 7 jours</li>
            <li>Résistant à l'eau: IP68</li>
            <li>Compatibilité: Android/iOS</li>
          </ul>
        </div>
      </div>

      <!-- Produit 13 -->
      <div class="product-card" data-name="Câble Réseau" data-description="Câble Ethernet CAT6 5m." data-price="8000" data-delivery="2 jours">
        <img src="img/cablereseau.jpg" alt="Câble Réseau" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Câble Réseau</h3>
          <p class="product-description">Câble Ethernet CAT6 pour connexion haut débit.</p>
          <p class="product-price">8.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="8000" data-livraison="2 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Type: CAT6</li>
            <li>Longueur: 5 mètres</li>
            <li>Débit: Jusqu'à 10Gbps</li>
            <li>Connecteurs: RJ45 blindés</li>
          </ul>
        </div>
      </div>

      <!-- Produit 14 -->
      <div class="product-card" data-name="Caméra Surveillance" data-description="Caméra IP 1080p avec vision nocturne." data-price="45000" data-delivery="4 jours">
        <span class="product-badge">Sécurité</span>
        <img src="img/camera.jpg" alt="Caméra Surveillance" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Caméra Surveillance</h3>
          <p class="product-description">Surveillez votre domicile à distance avec cette caméra HD.</p>
          <p class="product-price">45.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="45000" data-livraison="4 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Résolution: 1080p Full HD</li>
            <li>Vision nocturne: 20m</li>
            <li>Connectivité: Wi-Fi/ETH</li>
            <li>Stockage: MicroSD jusqu'à 128GB</li>
          </ul>
        </div>
      </div>

      <!-- Produit 15 -->
      <div class="product-card" data-name="Connecteur RJ45" data-description="Connecteur réseau CAT6." data-price="2000" data-delivery="2 jours">
        <img src="img/rj45.jpg" alt="Connecteur RJ45" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Connecteur RJ45</h3>
          <p class="product-description">Connecteur Ethernet pour câbles réseau.</p>
          <p class="product-price">2.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="2000" data-livraison="2 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Type: RJ45</li>
            <li>Compatibilité: CAT5/CAT6</li>
            <li>Matériau: PVC</li>
            <li>Couleur: Transparent</li>
          </ul>
        </div>
      </div>

      <!-- Produit 16 -->
      <div class="product-card" data-name="Jeu Vidéo FIFA 23" data-description="Version standard pour PS5." data-price="50000" data-delivery="3 jours">
        <span class="product-badge">Jeu</span>
        <img src="img/fifa.jpg" alt="FIFA 23" class="product-image">
        <div class="product-info">
          <h3 class="product-title">FIFA 23</h3>
          <p class="product-description">Le dernier opus de la célèbre franchise de football.</p>
          <p class="product-price">50.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="50000" data-livraison="3 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Plateforme: PS5</li>
            <li>Genre: Sport</li>
            <li>Mode: Solo/Multijoueur</li>
            <li>Langue: Français</li>
          </ul>
        </div>
      </div>

      <!-- Produit 17 -->
      <div class="product-card" data-name="iPhone 14 Pro" data-description="128GB, Écran Super Retina XDR." data-price="900000" data-delivery="5 jours">
        <span class="product-badge">Top Vente</span>
        <img src="img/iphone.jpg" alt="iPhone 14 Pro" class="product-image">
        <div class="product-info">
          <h3 class="product-title">iPhone 14 Pro</h3>
          <p class="product-description">Le dernier smartphone haut de gamme d'Apple.</p>
          <p class="product-price">900.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="900000" data-livraison="5 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Écran: 6.1" Super Retina XDR</li>
            <li>Processeur: A16 Bionic</li>
            <li>Stockage: 128GB</li>
            <li>Caméra: Triple 48MP + 12MP + 12MP</li>
          </ul>
        </div>
      </div>

      <!-- Produit 18 -->
      <div class="product-card" data-name="Équipement Réseau" data-description="Kit complet pour réseau local." data-price="120000" data-delivery="4 jours">
        <img src="img/equipementreseau.jpg" alt="Équipement Réseau" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Équipement Réseau</h3>
          <p class="product-description">Tout le nécessaire pour créer un réseau local performant.</p>
          <p class="product-price">120.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="120000" data-livraison="4 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Contenu :</strong></p>
          <ul>
            <li>Switch 8 ports Gigabit</li>
            <li>5 câbles RJ45 CAT6 3m</li>
            <li>Routeur Wi-Fi dual band</li>
            <li>20 connecteurs RJ45</li>
          </ul>
        </div>
      </div>

      <!-- Produit 19 -->
      <div class="product-card" data-name="Ordinateur Portable" data-description="i5 11e gén, 16GB RAM, 512GB SSD." data-price="450000" data-delivery="4 jours">
        <span class="product-badge">Promo</span>
        <img src="img/pcportable.jpg" alt="Ordinateur Portable" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Ordinateur Portable</h3>
          <p class="product-description">Performant et portable pour le travail et les loisirs.</p>
          <p class="product-price">450.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="450000" data-livraison="4 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Processeur: Intel i5 11e gén</li>
            <li>RAM: 16GB DDR4</li>
            <li>Stockage: 512GB SSD</li>
            <li>Écran: 15.6" Full HD</li>
          </ul>
        </div>
      </div>

      <!-- Produit 20 -->
      <div class="product-card" data-name="Microphone Professionnel" data-description="Qualité studio pour enregistrement." data-price="35000" data-delivery="3 jours">
        <span class="product-badge">Audio</span>
        <img src="img/micro.jpg" alt="Microphone" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Microphone Pro</h3>
          <p class="product-description">Microphone à condensateur pour enregistrement studio.</p>
          <p class="product-price">35.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="35000" data-livraison="3 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Type: Condensateur</li>
            <li>Directivité: Cardioïde</li>
            <li>Fréquence: 20Hz-20kHz</li>
            <li>Connecteur: XLR</li>
          </ul>
        </div>
      </div>

      <!-- Produit 21 -->
      <div class="product-card" data-name="Micro USB" data-description="Microphone USB plug-and-play." data-price="15000" data-delivery="2 jours">
        <img src="img/microusb.jpg" alt="Micro USB" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Micro USB</h3>
          <p class="product-description">Microphone facile à utiliser pour streaming et conférences.</p>
          <p class="product-price">15.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="15000" data-livraison="2 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Type: Condensateur USB</li>
            <li>Compatibilité: Plug-and-play</li>
            <li>Fonctions: Mute, contrôle du volume</li>
            <li>Câble: 2m intégré</li>
          </ul>
        </div>
      </div>

      <!-- Produit 22 -->
      <div class="product-card" data-name="Écran 27\" 4K" data-description="Écran IPS avec HDR10." data-price="250000" data-delivery="5 jours">
        <span class="product-badge">4K</span>
        <img src="img/ecran4k.jpg" alt="Écran 4K" class="product-image">
        <div class="product-info">
          <h3 class="product-title">Écran 27" 4K</h3>
          <p class="product-description">Écran Ultra HD pour une expérience visuelle exceptionnelle.</p>
          <p class="product-price">250.000 fr</p>
          <div class="product-actions">
            <button class="btn btn-primary ajouter-panier" data-prix="250000" data-livraison="5 jours">
              <i class="fas fa-cart-plus"></i> Ajouter
            </button>
            <button class="btn btn-secondary savoir-plus">
              <i class="fas fa-info-circle"></i> Détails
            </button>
          </div>
        </div>
        <div class="details" style="display: none;">
          <p><strong>Caractéristiques :</strong></p>
          <ul>
            <li>Taille: 27 pouces</li>
            <li>Résolution: 3840x2160 (4K)</li>
            <li>Technologie: IPS</li>
            <li>HDR: HDR10</li>
          </ul>
        </div>
      </div>
    </div>
     
  <!-- Product Details Modal -->
  <div class="modal" id="productModal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="modalProductName">Détails du produit</h2>
        <button class="close-modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="product-details">
          <img src="" alt="Product Image" class="product-details-image" id="modalProductImage">
          <div class="product-details-info">
            <h3 id="modalProductTitle"></h3>
            <p class="product-details-price" id="modalProductPrice"></p>
            <p class="product-details-description" id="modalProductDescription"></p>
            <div class="product-details-features">
              <h4>Caractéristiques</h4>
              <ul id="modalProductFeatures">
              </ul>
            </div>
            <div class="product-actions">
              <button class="btn btn-primary" id="addToCartFromModal">
                <i class="fas fa-cart-plus"></i> Ajouter au panier
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cart Modal -->
  <div class="modal" id="cartModal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Votre Panier</h2>
        <button class="close-modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="cart-items" id="cartItemsContainer">
          <!-- Cart items will be added here dynamically -->
          <p class="empty-cart-message">Votre panier est vide</p>
        </div>
        <div class="cart-summary">
          <div class="summary-row">
            <span>Sous-total:</span>
            <span id="cartSubtotal">0 fr</span>
          </div>
          <div class="summary-row">
            <span>Livraison:</span>
            <span id="cartShipping">0 fr</span>
          </div>
          <div class="summary-row summary-total">
            <span>Total:</span>
            <span id="cartTotal">0 fr</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary close-modal">Continuer mes achats</button>
        <button class="btn btn-primary" id="checkoutButton">Passer la commande</button>
      </div>
    </div>
  </div>

  <!-- Checkout Modal -->
<div class="modal" id="checkoutModal">
  <div class="modal-content">
    <div class="modal-header">
      <h2 class="modal-title">Finaliser la commande</h2>
      <button class="close-modal">&times;</button>
    </div>
    <div class="modal-body">
      <form class="checkout-form" id="checkoutForm">
        <div class="form-group">
          <label for="checkoutName">Nom complet</label>
          <input type="text" id="checkoutName" required>
        </div>
        <div class="form-group">
          <label for="checkoutEmail">Email</label>
          <input type="email" id="checkoutEmail" required>
        </div>
        <div class="form-group">
          <label for="checkoutPhone">Téléphone</label>
          <input type="tel" id="checkoutPhone" required>
        </div>
        <div class="form-group">
          <label for="checkoutAddress">Adresse</label>
          <textarea id="checkoutAddress" rows="3" required></textarea>
        </div>
        
        <!-- Delivery Fees -->
        <div class="form-group">
          <label for="deliveryOption">Options de livraison</label>
          <select id="deliveryOption" required>
            <option value="">Choisissez une option</option>
            <option value="standard">Livraison standard - 2 000 FCFA (3-5 jours)</option>
            <option value="express">Livraison express - 5 000 FCFA (24h)</option>
            <option value="pickup">Retrait en magasin - Gratuit</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Méthode de paiement</label>
          <div class="payment-methods">
            <div class="payment-method" data-method="credit-card">
              <i class="fas fa-credit-card"></i>
              <div class="payment-method-info">
                <h4>Carte de crédit</h4>
                <p>Paiement sécurisé par carte</p>
              </div>
            </div>
            <div class="payment-method" data-method="mobile-money">
              <i class="fas fa-mobile-alt"></i>
              <div class="payment-method-info">
                <h4>Mobile Money</h4>
                <p>Paiement par Orange, MTN, Moov, Wave</p>
              </div>
            </div>
            <div class="payment-method" data-method="cash">
              <i class="fas fa-money-bill-wave"></i>
              <div class="payment-method-info">
                <h4>Paiement à la livraison</h4>
                <p>Payez lorsque vous recevez votre commande</p>
              </div>
            </div>
          </div>
          <input type="hidden" id="selectedPaymentMethod" required>
        </div>
        
        <!-- Credit Card Fields (shown only when credit card is selected) -->
        <div id="creditCardFields" style="display: none;">
          <div class="form-group">
            <label for="cardNumber">Numéro de carte</label>
            <div id="cardNumber" class="stripe-element"></div>
          </div>
          <div class="form-group">
            <label for="cardExpiry">Date d'expiration</label>
            <div id="cardExpiry" class="stripe-element"></div>
          </div>
          <div class="form-group">
            <label for="cardCvc">Code CVC</label>
            <div id="cardCvc" class="stripe-element"></div>
          </div>
        </div>
        
        <!-- Mobile Money Fields (shown only when mobile money is selected) -->
        <div id="mobileMoneyFields" style="display: none;">
          <div class="form-group">
            <label for="mobileMoneyProvider">Opérateur</label>
            <select id="mobileMoneyProvider" required>
              <option value="">Sélectionnez un opérateur</option>
              <option value="orange">Orange Money</option>
              <option value="mtn">MTN Mobile Money</option>
              <option value="moov">Moov Money</option>
              <option value="wave">Wave Mobile Money</option>
            </select>
          </div>
          <div class="form-group">
            <label for="mobileMoneyNumber">Numéro de téléphone</label>
            <input type="tel" id="mobileMoneyNumber" placeholder="Numéro associé à votre compte Mobile Money" required>
          </div>
          <div class="form-group">
            <label for="transferAmount">Montant total à transférer</label>
            <input type="text" id="transferAmount" readonly>
            <small class="text-muted">Inclut les frais de livraison</small>
          </div>
        </div>
        
        <!-- Order Summary -->
        <div class="order-summary">
          <h4>Récapitulatif de la commande</h4>
          <div class="summary-item">
            <span>Sous-total</span>
            <span id="cartSubtotal">0 FCFA</span>
          </div>
          <div class="summary-item">
            <span>Frais de livraison</span>
            <span id="deliveryFee">0 FCFA</span>
          </div>
          <div class="summary-item total">
            <span>Total</span>
            <span id="cartTotal">0 FCFA</span>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" id="backToCartButton">Retour au panier</button>
      <button class="btn btn-primary" id="confirmOrderButton">Confirmer la commande</button>
    </div>
  </div>
</div>

<!-- Order Confirmation Modal -->
<div class="modal" id="orderConfirmationModal">
  <div class="modal-content">
    <div class="modal-header">
      <h2 class="modal-title">Commande confirmée</h2>
      <button class="close-modal">&times;</button>
    </div>
    <div class="modal-body">
      <div style="text-align: center; padding: 2rem;">
        <i class="fas fa-check-circle" style="font-size: 4rem; color: var(--success); margin-bottom: 1rem;"></i>
        <h3 style="margin-bottom: 1rem;">Merci pour votre commande!</h3>
        <p id="orderConfirmationMessage">Votre commande #<span id="orderNumber"></span> a été passée avec succès.</p>
        <p>Montant total: <strong id="orderTotal"></strong></p>
        <p>Frais de livraison: <strong id="orderDeliveryFee"></strong></p>
        <p>Méthode de paiement: <strong id="paymentMethod"></strong></p>
        <div id="mobileMoneyConfirmation" style="display: none;">
          <p>Opérateur: <strong id="mobileMoneyOperator"></strong></p>
          <p>Numéro: <strong id="mobileMoneyNumberConfirmation"></strong></p>
        </div>
        <p>Un email de confirmation a été envoyé à <strong id="customerEmail"></strong>.</p>
        <p>Nous vous contacterons bientôt pour confirmer la livraison.</p>
      </div>
    </div>
    <div class="modal-footer" style="justify-content: center;">
      <button class="btn btn-primary close-modal">Retour à l'accueil</button>
    </div>
  </div>
</div>
  <!-- Notification -->
  <div class="notification" id="notification">
    <i class="fas fa-check-circle"></i>
    <span id="notificationMessage">Produit ajouté au panier</span>
  </div>

  <!-- Stripe.js for secure payments -->
  <script src="https://js.stripe.com/v3/"></script>
  
  <script>
    // Configuration initiale
    document.addEventListener('DOMContentLoaded', function() {
        // Initialiser le panier
        cart = JSON.parse(localStorage.getItem('lahatech_cart')) || [];
        updateCartCount();
        
        // Configurer Stripe
        initStripe();
        
        // Configurer les gestionnaires d'événements
        setupEventHandlers();
    });

    // Gestion du panier
    let cart = [];
    const cartCount = document.getElementById('cartCount');
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    const cartSubtotal = document.getElementById('cartSubtotal');
    const cartShipping = document.getElementById('cartShipping');
    const cartTotal = document.getElementById('cartTotal');

    // Mettre à jour le compteur du panier
    function updateCartCount() {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        cartCount.textContent = totalItems;
    }

    // Calculer le total du panier
    function calculateCartTotal() {
        const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
        const shipping = subtotal > 100000 ? 0 : 5000; // Livraison gratuite pour les commandes > 100,000 fr
        const total = subtotal + shipping;
        
        cartSubtotal.textContent = `${subtotal.toLocaleString('fr-FR')} fr`;
        cartShipping.textContent = `${shipping.toLocaleString('fr-FR')} fr`;
        cartTotal.textContent = `${total.toLocaleString('fr-FR')} fr`;
        
        return { subtotal, shipping, total };
    }

    // Afficher les articles du panier
    function renderCartItems() {
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p class="empty-cart-message">Votre panier est vide</p>';
            return;
        }
        
        cartItemsContainer.innerHTML = '';
        
        cart.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.className = 'cart-item';
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="cart-item-image">
                <div class="cart-item-details">
                    <h4 class="cart-item-title">${item.name}</h4>
                    <p class="cart-item-price">${item.price.toLocaleString('fr-FR')} fr</p>
                    <div class="cart-item-actions">
                        <div class="quantity-control">
                            <button class="quantity-btn decrease" data-index="${index}">-</button>
                            <input type="text" class="quantity" value="${item.quantity}" readonly>
                            <button class="quantity-btn increase" data-index="${index}">+</button>
                        </div>
                        <button class="remove-item" data-index="${index}">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </div>
                </div>
            `;
            cartItemsContainer.appendChild(cartItem);
        });
        
        // Ajouter les écouteurs d'événements pour les boutons
        document.querySelectorAll('.decrease').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const index = e.target.getAttribute('data-index');
                if (cart[index].quantity > 1) {
                    cart[index].quantity--;
                } else {
                    cart.splice(index, 1);
                }
                saveCart();
                renderCartItems();
                calculateCartTotal();
            });
        });
        
        document.querySelectorAll('.increase').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const index = e.target.getAttribute('data-index');
                cart[index].quantity++;
                saveCart();
                renderCartItems();
                calculateCartTotal();
            });
        });
        
        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const index = e.target.getAttribute('data-index');
                cart.splice(index, 1);
                saveCart();
                renderCartItems();
                calculateCartTotal();
            });
        });
    }

    function saveCart() {
        localStorage.setItem('lahatech_cart', JSON.stringify(cart));
        updateCartCount();
    }

    // Stripe Payment Integration
    let stripe;
    let cardNumber, cardExpiry, cardCvc;

    function initStripe() {
        stripe = Stripe('pk_test_votre_cle_publique_stripe'); // Remplacez par votre clé publique
        const elements = stripe.elements();
        
        const style = {
            base: {
                color: '#32325d',
                fontFamily: '"Montserrat", sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        cardNumber = elements.create('cardNumber', { style });
        cardExpiry = elements.create('cardExpiry', { style });
        cardCvc = elements.create('cardCvc', { style });

        cardNumber.mount('#cardNumber');
        cardExpiry.mount('#cardExpiry');
        cardCvc.mount('#cardCvc');
    }

    // Gestion des notifications
    function showNotification(message, type = 'success') {
        const notification = document.getElementById('notification');
        notification.className = `notification notification-${type}`;
        document.getElementById('notificationMessage').textContent = message;
        notification.classList.add('show');
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 3000);
    }

    // Gestion des commandes
    async function handleOrderConfirmation() {
        const paymentMethod = document.getElementById('selectedPaymentMethod').value;
        const name = document.getElementById('checkoutName').value;
        const email = document.getElementById('checkoutEmail').value;
        const phone = document.getElementById('checkoutPhone').value;
        const address = document.getElementById('checkoutAddress').value;
        
        // Validation
        if (!paymentMethod) {
            showNotification('Veuillez sélectionner une méthode de paiement', 'error');
            return;
        }
        
        if (!name || !email || !phone || !address) {
            showNotification('Veuillez remplir tous les champs obligatoires', 'error');
            return;
        }
        
        // Désactiver le bouton pendant le traitement
        const confirmButton = document.getElementById('confirmOrderButton');
        confirmButton.disabled = true;
        confirmButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement en cours...';
        
        try {
            // Créer les données de commande
            const orderData = createOrderData(name, email, phone, address, paymentMethod);
            
            // Envoyer la commande au serveur
            const response = await fetch('process_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(orderData)
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Afficher la confirmation
                showOrderConfirmation(orderData, email);
                // Vider le panier
                clearCart();
            } else {
                showNotification(result.message || 'Erreur lors de l\'enregistrement de la commande', 'error');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showNotification('Une erreur est survenue', 'error');
        } finally {
            confirmButton.disabled = false;
            confirmButton.innerHTML = 'Confirmer la commande';
        }
    }

    function createOrderData(name, email, phone, address, paymentMethod) {
        const { subtotal, shipping, total } = calculateCartTotal();
        return {
            orderNumber: `CMD-${Date.now()}-${Math.floor(Math.random() * 1000)}`,
            customer: { name, email, phone, address },
            items: [...cart],
            paymentMethod,
            subtotal,
            shipping,
            total,
            date: new Date().toISOString(),
            status: 'pending'
        };
    }

    function showOrderConfirmation(orderData, email) {
        document.getElementById('checkoutModal').style.display = 'none';
        document.getElementById('orderNumber').textContent = orderData.orderNumber;
        document.getElementById('customerEmail').textContent = email;
        document.getElementById('orderConfirmationModal').style.display = 'block';
    }

    function clearCart() {
        cart = [];
        saveCart();
        renderCartItems();
        calculateCartTotal();
    }

    // Gestion des événements
    function setupEventHandlers() {
        // Gestion de l'ouverture/fermeture des modales
        const modals = document.querySelectorAll('.modal');
        const openCartButton = document.getElementById('cartButton');
        const cartModal = document.getElementById('cartModal');
        const checkoutButton = document.getElementById('checkoutButton');
        const checkoutModal = document.getElementById('checkoutModal');
        const backToCartButton = document.getElementById('backToCartButton');
        const confirmOrderButton = document.getElementById('confirmOrderButton');
        const orderConfirmationModal = document.getElementById('orderConfirmationModal');
        const closeModalButtons = document.querySelectorAll('.close-modal');

        openCartButton.addEventListener('click', () => {
            cartModal.style.display = 'block';
            renderCartItems();
            calculateCartTotal();
        });

        checkoutButton.addEventListener('click', () => {
            if (cart.length === 0) {
                showNotification('Votre panier est vide', 'error');
                return;
            }
            cartModal.style.display = 'none';
            checkoutModal.style.display = 'block';
        });

        backToCartButton.addEventListener('click', () => {
            checkoutModal.style.display = 'none';
            cartModal.style.display = 'block';
        });

        confirmOrderButton.addEventListener('click', handleOrderConfirmation);

        // Sélection de la méthode de paiement
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', () => {
                document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('selected'));
                method.classList.add('selected');
                document.getElementById('selectedPaymentMethod').value = method.getAttribute('data-method');
                
                // Afficher les champs appropriés
                document.getElementById('creditCardFields').style.display = 'none';
                document.getElementById('mobileMoneyFields').style.display = 'none';
                
                if (method.getAttribute('data-method') === 'credit-card') {
                    document.getElementById('creditCardFields').style.display = 'block';
                } else if (method.getAttribute('data-method') === 'mobile-money') {
                    document.getElementById('mobileMoneyFields').style.display = 'block';
                }
            });
        });

        // Fermer les modales
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                modals.forEach(modal => modal.style.display = 'none');
            });
        });

        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal')) {
                modals.forEach(modal => modal.style.display = 'none');
            }
        });

        // Ajouter un produit au panier
        document.querySelectorAll('.ajouter-panier').forEach(button => {
            button.addEventListener('click', addToCart);
        });

        // Afficher les détails du produit
        document.querySelectorAll('.savoir-plus').forEach(button => {
            button.addEventListener('click', showProductDetails);
        });

        // Recherche de produits
        document.getElementById('searchInput').addEventListener('input', searchProducts);
    }

    function addToCart(e) {
        const productCard = e.target.closest('.product-card');
        const productName = productCard.getAttribute('data-name');
        const productPrice = parseInt(e.target.getAttribute('data-prix'));
        const productImage = productCard.querySelector('img').src;
        
        const existingItem = cart.find(item => item.name === productName);
        
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: 1
            });
        }
        
        saveCart();
        showNotification(`${productName} a été ajouté à votre panier`);
    }

    function showProductDetails(e) {
        const productCard = e.target.closest('.product-card');
        const productName = productCard.getAttribute('data-name');
        const productDescription = productCard.getAttribute('data-description');
        const productPrice = productCard.getAttribute('data-price');
        const productImage = productCard.querySelector('img').src;
        const productDetails = productCard.querySelector('.details').innerHTML;
        
        document.getElementById('modalProductTitle').textContent = productName;
        document.getElementById('modalProductDescription').textContent = productDescription;
        document.getElementById('modalProductPrice').textContent = `${parseInt(productPrice).toLocaleString('fr-FR')} fr`;
        document.getElementById('modalProductImage').src = productImage;
        document.getElementById('modalProductFeatures').innerHTML = productDetails;
        
        document.getElementById('addToCartFromModal').onclick = () => {
            const existingItem = cart.find(item => item.name === productName);
            
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({
                    name: productName,
                    price: parseInt(productPrice),
                    image: productImage,
                    quantity: 1
                });
            }
            
            saveCart();
            showNotification(`${productName} a été ajouté à votre panier`);
        };
        
        document.getElementById('productModal').style.display = 'block';
    }

    function searchProducts(e) {
        const searchTerm = e.target.value.toLowerCase();
        document.querySelectorAll('.product-card').forEach(card => {
            const productName = card.getAttribute('data-name').toLowerCase();
            card.style.display = productName.includes(searchTerm) ? '' : 'none';
        });
    }
  </script>
</body>
</html>