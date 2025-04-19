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
      --success: #06D6A0;
      --menu-bg: rgba(42, 45, 52, 0.95);
      --menu-text: #FFFFFF;
      --menu-hover: rgba(255, 61, 87, 0.8);
      --dropdown-bg: #FFFFFF;
    }

    /* Barre de menu moderne */
    header {
      background: var(--menu-bg);
      color: var(--menu-text);
      padding: 0;
      position: sticky;
      top: 0;
      z-index: 1000;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 80px;
    }

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
    }

    .logo-text {
      font-size: 1.8rem;
      font-weight: 700;
      letter-spacing: 1px;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
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
      transition: all 0.3s ease;
      position: relative;
      opacity: 0.9;
    }

    .nav-link:hover {
      opacity: 1;
      color: white;
      background: var(--menu-hover);
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 3px;
      background: var(--accent);
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 70%;
    }

    /* Menu déroulant */
    .dropdown {
      position: relative;
    }

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
      transition: all 0.3s ease;
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
      display: block;
      transition: all 0.2s ease;
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
    }

    /* Bouton de connexion spécial */
    .nav-cta {
      margin-left: 15px;
    }

    .nav-cta .nav-link {
      background: var(--primary);
      border-radius: 30px;
      padding: 10px 25px;
      height: auto;
      margin-left: 10px;
    }

    .nav-cta .nav-link:hover {
      background: #FF2D4A;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255, 61, 87, 0.4);
    }

    .nav-cta .nav-link::after {
      display: none;
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
      transition: all 0.3s ease;
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

    /* Responsive */
    @media (max-width: 1024px) {
      .header-container {
        padding: 0 20px;
      }
      
      .nav-link {
        padding: 0 15px;
      }
    }

    @media (max-width: 768px) {
      .main-nav {
        display: none;
      }
      
      .mobile-menu-btn {
        display: block;
      }
      
      .header-container {
        height: 70px;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="header-container">
      <div class="logo">
        <img src="https://via.placeholder.com/40x40?text=LT" alt="Lahatech Logo">
        <span class="logo-text">Lahatech</span>
      </div>
      
      <nav class="main-nav">
        <ul class="nav-list">
          <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
          
          <li class="nav-item dropdown">
            <a href="presentation.php" class="nav-link">Présentation <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-content">
              <a href="presentation.php#histoire" class="dropdown-link"><i class="fas fa-landmark"></i> Notre histoire</a>
              <a href="presentation.php#equipe" class="dropdown-link"><i class="fas fa-users"></i> Notre équipe</a>
              <a href="presentation.php#valeurs" class="dropdown-link"><i class="fas fa-heart"></i> Nos valeurs</a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a href="services.php" class="nav-link">Services <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-content">
              <a href="services.php#maintenance" class="dropdown-link"><i class="fas fa-tools"></i> Maintenance</a>
              <a href="services.php#installation" class="dropdown-link"><i class="fas fa-cogs"></i> Installation</a>
              <a href="services.php#web" class="dropdown-link"><i class="fas fa-code"></i> Développement Web</a>
              <a href="services.php#publicite" class="dropdown-link"><i class="fas fa-bullhorn"></i> Publicité</a>
              <a href="services.php#formation" class="dropdown-link"><i class="fas fa-graduation-cap"></i> Formation</a>
            </div>
          </li>
          
          <li class="nav-item"><a href="produits.php" class="nav-link">Produits</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
        
        <div class="search-bar">
          <button class="search-btn"><i class="fas fa-search"></i></button>
          <input type="text" placeholder="Rechercher..." class="search-input">
        </div>
        
        <div class="nav-cta">
          <a href="connexion.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Connexion</a>
          <a href="inscription.php" class="nav-link"><i class="fas fa-user-plus"></i> S'inscrire</a>
        </div>
      </nav>
      
      <button class="mobile-menu-btn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </header>

  <!-- Le reste de votre contenu HTML... -->

  <script>
    // Menu mobile
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mainNav = document.querySelector('.main-nav');
    
    mobileMenuBtn.addEventListener('click', () => {
      mainNav.style.display = mainNav.style.display === 'block' ? 'none' : 'block';
      mobileMenuBtn.innerHTML = mainNav.style.display === 'block' 
        ? '<i class="fas fa-times"></i>' 
        : '<i class="fas fa-bars"></i>';
    });

    // Animation du menu au scroll
    window.addEventListener('scroll', () => {
      const header = document.querySelector('header');
      if (window.scrollY > 50) {
        header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
        header.style.background = 'rgba(42, 45, 52, 0.98)';
      } else {
        header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
        header.style.background = 'rgba(42, 45, 52, 0.95)';
      }
    });

    // Menu déroulant amélioré
    const dropdowns = document.querySelectorAll('.dropdown');
    
    dropdowns.forEach(dropdown => {
      const link = dropdown.querySelector('.nav-link');
      const content = dropdown.querySelector('.dropdown-content');
      
      // Fermer les autres dropdowns quand on ouvre celui-ci
      link.addEventListener('click', (e) => {
        if (window.innerWidth > 768) {
          e.preventDefault();
          document.querySelectorAll('.dropdown-content').forEach(d => {
            if (d !== content) d.style.opacity = '0';
          });
          content.style.opacity = content.style.opacity === '1' ? '0' : '1';
          content.style.visibility = content.style.visibility === 'visible' ? 'hidden' : 'visible';
          content.style.transform = content.style.transform === 'translateY(0px)' ? 'translateY(10px)' : 'translateY(0)';
        }
      });
    });

    // Fermer les dropdowns quand on clique ailleurs
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.dropdown') && window.innerWidth > 768) {
        document.querySelectorAll('.dropdown-content').forEach(d => {
          d.style.opacity = '0';
          d.style.visibility = 'hidden';
          d.style.transform = 'translateY(10px)';
        });
      }
    });
  </script>
</body>
</html>