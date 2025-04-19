<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lahatech - Boutique Électronique Moderne</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    :root {
      --primary: #FF3D57;
      --secondary: #00C1D4;
      --accent: #FFD166;
      --dark: #2A2D34;
      --light: #F7F7F7;
      --menu-bg: rgba(42, 45, 52, 0.98);
      --menu-text: #FFFFFF;
      --menu-hover: rgba(255, 61, 87, 0.9);
      --dropdown-bg: #FFFFFF;
      --transition: all 0.3s ease;
    }

    /* Reset et base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      color: var(--dark);
    }

    /* Header principal */
    header {
      background: var(--menu-bg);
      color: var(--menu-text);
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      transition: var(--transition);
    }

    /* Container du header */
    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 80px;
      transition: var(--transition);
    }

    /* Logo */
    .logo {
      display: flex;
      align-items: center;
      gap: 12px;
      transition: transform 0.3s ease;
    }

    .logo:hover {
      transform: scale(1.03);
    }

    .logo img {
      height: 40px;
      width: auto;
      transition: var(--transition);
    }

    .logo-text {
      font-size: 1.8rem;
      font-weight: 700;
      letter-spacing: 1px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      transition: var(--transition);
    }

    /* Navigation principale */
    .main-nav {
      display: flex;
      align-items: center;
      height: 100%;
    }

    .nav-list {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
      height: 100%;
    }

    .nav-item {
      position: relative;
      height: 100%;
      display: flex;
      align-items: center;
    }

    .nav-link {
      color: var(--menu-text);
      text-decoration: none;
      font-weight: 500;
      padding: 0 20px;
      height: 100%;
      display: flex;
      align-items: center;
      transition: var(--transition);
      position: relative;
      opacity: 0.9;
      font-size: 1rem;
    }

    .nav-link:hover {
      opacity: 1;
      color: white;
      background: var(--menu-hover);
    }

    .nav-link i {
      margin-left: 8px;
      font-size: 0.8rem;
    }

    /* Menu déroulant */
    .dropdown-content {
      position: absolute;
      top: 100%;
      left: 0;
      background: var(--dropdown-bg);
      min-width: 220px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border-radius: 0 0 8px 8px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(10px);
      transition: var(--transition);
      z-index: 100;
    }

    .dropdown:hover .dropdown-content {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .dropdown-link {
      color: var(--dark);
      padding: 12px 20px;
      display: flex;
      align-items: center;
      transition: var(--transition);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .dropdown-link:hover {
      background: rgba(255, 61, 87, 0.1);
      color: var(--primary);
      padding-left: 25px;
    }

    .dropdown-link i {
      margin-right: 10px;
      width: 20px;
      text-align: center;
      color: var(--primary);
    }

    /* Barre de recherche */
    .search-bar {
      position: relative;
      margin-left: 20px;
    }

    .search-input {
      padding: 10px 15px 10px 40px;
      border-radius: 30px;
      border: none;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      width: 200px;
      transition: var(--transition);
      font-size: 0.9rem;
    }

    .search-input:focus {
      outline: none;
      width: 250px;
      background: rgba(255, 255, 255, 0.2);
    }

    .search-input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .search-btn {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: rgba(255, 255, 255, 0.7);
      cursor: pointer;
    }

    /* Boutons CTA */
    .nav-cta {
      margin-left: 15px;
      display: flex;
      gap: 10px;
    }

    .nav-cta .nav-link {
      background: var(--primary);
      border-radius: 30px;
      padding: 10px 25px;
      height: auto;
      display: flex;
      align-items: center;
    }

    .nav-cta .nav-link:hover {
      background: #FF2D4A;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255, 61, 87, 0.4);
    }

    .nav-cta .nav-link::after {
      display: none;
    }

    .nav-cta .nav-link i {
      margin-right: 8px;
      margin-left: 0;
    }

    /* Menu mobile */
    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
      margin-left: 20px;
    }

    /* Panier et compte */
    .cart-count {
      position: absolute;
      top: -5px;
      right: -5px;
      background: var(--accent);
      color: var(--dark);
      width: 20px;
      height: 20px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.7rem;
      font-weight: bold;
    }

    /* Header scroll effect */
    header.scrolled {
      height: 70px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    header.scrolled .header-container {
      height: 70px;
    }

    /* Responsive */
    @media (max-width: 1200px) {
      .header-container {
        padding: 0 20px;
      }
      
      .nav-link {
        padding: 0 15px;
        font-size: 0.95rem;
      }
      
      .search-input {
        width: 180px;
      }
      
      .search-input:focus {
        width: 220px;
      }
    }

    @media (max-width: 992px) {
      .main-nav {
        position: fixed;
        top: 80px;
        left: 0;
        width: 100%;
        background: var(--menu-bg);
        flex-direction: column;
        align-items: flex-start;
        padding: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-150%);
        transition: transform 0.4s ease;
      }
      
      .main-nav.active {
        transform: translateY(0);
      }
      
      .nav-list {
        flex-direction: column;
        width: 100%;
        height: auto;
      }
      
      .nav-item {
        height: auto;
        width: 100%;
      }
      
      .nav-link {
        padding: 15px 0;
        width: 100%;
      }
      
      .dropdown-content {
        position: static;
        box-shadow: none;
        opacity: 1;
        visibility: visible;
        transform: none;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease;
        background: rgba(0, 0, 0, 0.1);
        margin-left: 15px;
        border-radius: 5px;
      }
      
      .dropdown:hover .dropdown-content {
        max-height: 500px;
      }
      
      .dropdown-link {
        color: white;
        padding: 12px 15px;
      }
      
      .search-bar {
        margin: 20px 0;
        width: 100%;
      }
      
      .search-input {
        width: 100%;
      }
      
      .search-input:focus {
        width: 100%;
      }
      
      .nav-cta {
        margin: 20px 0 0;
        width: 100%;
        flex-direction: column;
      }
      
      .mobile-menu-btn {
        display: block;
      }
    }

    @media (max-width: 576px) {
      .logo-text {
        font-size: 1.5rem;
      }
      
      .header-container {
        height: 70px;
      }
    }
  </style>
</head>
<body>
  <header id="mainHeader">
    <div class="header-container">
      <a href="index.php" class="logo">
        <img src="images/logo.png" alt="Lahatech Logo">
        <span class="logo-text">Lahatech</span>
      </a>
      
      <nav class="main-nav">
        <ul class="nav-list">
          <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
          
          <li class="nav-item dropdown">
            <a href="produits.php" class="nav-link">Produits <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-content">
              <a href="produits.php?categorie=ordinateurs" class="dropdown-link"><i class="fas fa-laptop"></i> Ordinateurs</a>
              <a href="produits.php?categorie=telephones" class="dropdown-link"><i class="fas fa-mobile-alt"></i> Téléphones</a>
              <a href="produits.php?categorie=accessoires" class="dropdown-link"><i class="fas fa-headphones"></i> Accessoires</a>
              <a href="produits.php?categorie=composants" class="dropdown-link"><i class="fas fa-microchip"></i> Composants</a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a href="services.php" class="nav-link">Services <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-content">
              <a href="services.php#reparation" class="dropdown-link"><i class="fas fa-tools"></i> Réparation</a>
              <a href="services.php#installation" class="dropdown-link"><i class="fas fa-cogs"></i> Installation</a>
              <a href="services.php#conseil" class="dropdown-link"><i class="fas fa-lightbulb"></i> Conseil</a>
            </div>
          </li>
          
          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
        
        <div class="search-bar">
          <button class="search-btn"><i class="fas fa-search"></i></button>
          <input type="text" placeholder="Rechercher un produit..." class="search-input">
        </div>
        
        <div class="nav-cta">
          <a href="mon-compte.php" class="nav-link"><i class="fas fa-user"></i> Mon compte</a>
          <a href="panier.php" class="nav-link">
            <i class="fas fa-shopping-cart"></i> Panier
            <span class="cart-count">3</span>
          </a>
        </div>
      </nav>
      
      <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </header>

  <script>
    // Menu mobile
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mainNav = document.querySelector('.main-nav');
    
    mobileMenuBtn.addEventListener('click', () => {
      mainNav.classList.toggle('active');
      mobileMenuBtn.innerHTML = mainNav.classList.contains('active') 
        ? '<i class="fas fa-times"></i>' 
        : '<i class="fas fa-bars"></i>';
    });
    
    // Header scroll effect
    window.addEventListener('scroll', () => {
      const header = document.getElementById('mainHeader');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
    
    // Fermer le menu mobile quand on clique sur un lien
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        if (window.innerWidth <= 992) {
          mainNav.classList.remove('active');
          mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
        }
      });
    });
  </script>
</body>
</html>