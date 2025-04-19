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
  --menu-bg: rgba(226, 152, 152, 0.95); /* Rose terracotta moderne */
  --menu-text: #FFFFFF;
  --menu-hover: rgba(210, 140, 140, 0.9);
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
  
    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
    }

    .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                  url('https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      padding: 0 20px;
    }

    .hero-content {
      max-width: 800px;
      animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero h2 {
      font-size: 3rem;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      opacity: 0.9;
    }

    .btn {
      display: inline-block;
      padding: 12px 30px;
      background: var(--primary);
      color: white;
      text-decoration: none;
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(255, 61, 87, 0.4);
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(255, 61, 87, 0.5);
      background: #FF2D4A;
    }

    .btn-outline {
      background: transparent;
      border: 2px solid white;
      margin-left: 15px;
      box-shadow: none;
    }

    .btn-outline:hover {
      background: white;
      color: var(--primary);
    }

    .slideshow-container {
      max-width: 1000px;
      margin: 50px auto;
      position: relative;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .slides {
      display: none;
    }

    .slides img {
      width: 100%;
      height: 500px;
      object-fit: cover;
      transition: opacity 1s ease-in-out;
    }

    .slideshow-nav {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
      padding: 0 20px;
    }

    .slideshow-nav button {
      background: rgba(255, 255, 255, 0.3);
      border: none;
      color: white;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      font-size: 1.5rem;
      cursor: pointer;
      transition: all 0.3s ease;
      backdrop-filter: blur(5px);
    }

    .slideshow-nav button:hover {
      background: rgba(255, 255, 255, 0.5);
    }

    .section {
      padding: 80px 20px;
      text-align: center;
    }

    .section-title {
      margin-bottom: 50px;
      position: relative;
    }

    .section-title h2 {
      font-size: 2.5rem;
      color: var(--dark);
      display: inline-block;
    }

    .section-title h2::after {
      content: '';
      display: block;
      width: 80px;
      height: 4px;
      background: var(--primary);
      margin: 15px auto;
      border-radius: 2px;
    }

    .services-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .service-card {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      text-align: center;
    }

    .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .service-img {
      height: 200px;
      overflow: hidden;
    }

    .service-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .service-card:hover .service-img img {
      transform: scale(1.1);
    }

    .service-content {
      padding: 25px;
    }

    .service-content h3 {
      font-size: 1.5rem;
      margin-bottom: 15px;
      color: var(--dark);
    }

    .service-content p {
      color: #666;
      margin-bottom: 20px;
    }

    .service-details {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.5s ease;
      background: var(--light);
      border-radius: 0 0 15px 15px;
    }

    .service-details p {
      padding: 20px;
      text-align: left;
    }

    .service-card.active .service-details {
      max-height: 500px;
    }

    footer {
      background: var(--dark);
      color: white;
      padding: 60px 0 20px;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
    }

    .footer-col h3 {
      font-size: 1.3rem;
      margin-bottom: 20px;
      position: relative;
      padding-bottom: 10px;
    }

    .footer-col h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 3px;
      background: var(--primary);
    }

    .footer-col p {
      margin-bottom: 15px;
      opacity: 0.8;
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      color: white;
      transition: all 0.3s ease;
    }

    .social-links a:hover {
      background: var(--primary);
      transform: translateY(-3px);
    }

    .quick-links li {
      margin-bottom: 10px;
      list-style: none;
    }

    .quick-links a {
      color: white;
      opacity: 0.8;
      text-decoration: none;
      transition: all 0.3s ease;
      display: block;
    }

    .quick-links a:hover {
      opacity: 1;
      color: var(--accent);
      padding-left: 5px;
    }

    .newsletter-form {
      display: flex;
      margin-top: 20px;
    }

    .newsletter-input {
      flex: 1;
      padding: 12px;
      border: none;
      border-radius: 30px 0 0 30px;
      outline: none;
    }

    .newsletter-btn {
      background: var(--primary);
      color: white;
      border: none;
      padding: 0 20px;
      border-radius: 0 30px 30px 0;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .newsletter-btn:hover {
      background: #FF2D4A;
    }

    .copyright {
      text-align: center;
      padding-top: 40px;
      margin-top: 40px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      opacity: 0.7;
    }

    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        gap: 15px;
      }

      nav {
        width: 100%;
        flex-direction: column;
        gap: 10px;
      }

      .search-bar {
        width: 100%;
      }

      .hero h2 {
        font-size: 2.2rem;
      }

      .btn-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
      }

      .btn-outline {
        margin-left: 0;
      }
    }

    /* Animation for text color change */
    @keyframes colorChange {
      0% { color: var(--primary); }
      25% { color: var(--secondary); }
      50% { color: var(--accent); }
      75% { color: var(--success); }
      100% { color: var(--primary); }
    }

    .color-animate {
      animation: colorChange 8s infinite;
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
            <a href="presentation.php" class="nav-link">Présentationa <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-content">
              <a href="presentation.php#histoire" class="dropdown-link"><i class="fas fa-landmark"></i> Notre histoire</a>
              <a href="presentation.php#equipe" class="dropdown-link"><i class="fas fa-users"></i> Notre équipe</a>
              <a href="presentation.php#valeurs" class="dropdown-link"><i class="fas fa-heart"></i> Nos valeurs</a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a href="services.php" class="nav-link">Services <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown-content">
              <a href="maintenance.php" class="dropdown-link"><i class="fas fa-tools"></i> Maintenance</a>
              <a href="services.php#installation" class="dropdown-link"><i class="fas fa-cogs"></i> Installation</a>
              <a href="services.php#web" class="dropdown-link"><i class="fas fa-code"></i> Développement Web</a>
              <a href="services.php#publicite" class="dropdown-link"><i class="fas fa-bullhorn"></i> Publicité</a>
              <a href="services.php#formation" class="dropdown-link"><i class="fas fa-graduation-cap"></i> Formation</a>
            </div>
          </li>
          
        
        </ul>
        
        <div class="search-bar">
          <button class="search-btn"><i class="fas fa-search"></i></button>
          <input type="text" placeholder="Rechercher..." class="search-input">
        </div>
        
        <div class="nav-cta">
          <a href="connexion.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Connexion</a>
      
        </div>
        <div class="nav-cta">
      
          <a href="inscription.php" class="nav-link"><i class="fas fa-user-plus"></i> S'inscrire</a>
        </div>
      </nav>
      
      <button class="mobile-menu-btn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </header>

  <section class="hero">
    <div class="hero-content">
      <h2 class="color-animate">Votre Boutique Électronique Moderne</h2>
      <p class="color-animate">Découvrez notre large gamme de produits électroniques à des prix compétitifs.</p>
      <div class="btn-group">
        <a href="produits.php" class="btn">Nos Produits</a>
        <a href="contact.php" class="btn btn-outline">Nous Contacter</a>
      </div>
    </div>
  </section>

  <div class="slideshow-container">
    <div class="slides active">
      <img src="img/b.jpg" alt="Produits électroniques">
    </div>
    <div class="slides">
      <img src="img/lat.png" alt="Équipements high-tech">
    </div>
    <div class="slideshow-nav">
      <button class="prev" onclick="plusSlides(-1)"><i class="fas fa-chevron-left"></i></button>
      <button class="next" onclick="plusSlides(1)"><i class="fas fa-chevron-right"></i></button>
    </div>
  </div>

  <section class="section" id="presentation">
    <div class="section-title">
      <h2>À Propos de Nous</h2>
    </div>
    <p class="color-animate">Lahatech est une boutique en ligne spécialisée dans la vente de matériels électroniques. Nous offrons une large gamme de produits de qualité à des prix compétitifs, avec un service client exceptionnel.</p>
  </section>

  <section class="section" id="services">
    <div class="section-title">
      <h2>Nos Services</h2>
    </div>
    <div class="services-grid">
      <div class="service-card">
        <div class="service-img">
          <img src="img/disque.jpg" alt="Maintenance">
        </div>
        <div class="service-content">
          <h3>Maintenance</h3>
          <p>Réparation et entretien de vos appareils électroniques.</p>
          <button class="btn" onclick="toggleService(this)">Savoir plus</button>
        </div>
        <div class="service-details">
          <p>Nous offrons des services de maintenance pour tous types d'appareils électroniques. Nos techniciens certifiés utilisent des outils de pointe pour diagnostiquer et réparer rapidement vos équipements, avec une garantie sur toutes nos interventions.</p>
        </div>
      </div>

      <div class="service-card">
        <div class="service-img">
          <img src="img/cables.jpg" alt="Installation">
        </div>
        <div class="service-content">
          <h3>Installation</h3>
          <p>Installation professionnelle de matériels électroniques.</p>
          <button class="btn" onclick="toggleService(this)">Savoir plus</button>
        </div>
        <div class="service-details">
          <p>Nos techniciens qualifiés assurent l'installation optimale de vos équipements électroniques à domicile ou en entreprise. Nous couvrons tous types d'installations : systèmes audio/vidéo, réseaux informatiques, domotique et bien plus encore.</p>
        </div>
      </div>

      <div class="service-card">
        <div class="service-img">
          <img src="img/pcs.jpg" alt="Sites Web">
        </div>
        <div class="service-content">
          <h3>Création de Sites Web</h3>
          <p>Développement de sites web sur mesure.</p>
          <button class="btn" onclick="toggleService(this)">Savoir plus</button>
        </div>
        <div class="service-details">
          <p>Notre équipe de développeurs crée des sites web modernes et performants, adaptés à vos besoins spécifiques. Nous proposons des solutions complètes incluant design responsive, référencement SEO, hébergement et maintenance.</p>
        </div>
      </div>

      <div class="service-card">
        <div class="service-img">
          <img src="img/k.jpg" alt="Publicité">
        </div>
        <div class="service-content">
          <h3>Publicités</h3>
          <p>Stratégies publicitaires digitales efficaces.</p>
          <button class="btn" onclick="toggleService(this)">Savoir plus</button>
        </div>
        <div class="service-details">
          <p>Nous concevons et gérons des campagnes publicitaires performantes sur les principaux canaux digitaux. Notre approche data-driven maximise votre ROI avec un suivi précis des performances et des ajustements en temps réel.</p>
        </div>
      </div>

      <div class="service-card">
        <div class="service-img">
          <img src="img/c.jpg" alt="Formation">
        </div>
        <div class="service-content">
          <h3>Formation</h3>
          <p>Formations technologiques sur mesure.</p>
          <button class="btn" onclick="toggleService(this)">Savoir plus</button>
        </div>
        <div class="service-details">
          <p>Nos formations couvrent un large éventail de sujets technologiques, des bases de l'informatique aux technologies avancées. Adaptées à tous niveaux, elles sont dispensées par des experts pédagogues en présentiel ou à distance.</p>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-container">
      <div class="footer-col">
        <h3>Lahatech</h3>
        <p>Votre partenaire de confiance pour tous vos besoins en matériels électroniques et services technologiques.</p>
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <div class="footer-col">
        <h3>Liens Rapides</h3>
        <ul class="quick-links">
          <li><a href="presentation.php">Présentation</a></li>
          <li><a href="produits.php">Produits</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="inscription.php">S'inscrire</a></li>
          <li><a href="connexion.php">Connexion</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h3>Contact</h3>
        <p><i class="fas fa-map-marker-alt"></i> Hlm route de bambey , Diourbel</p>
        <p><i class="fas fa-phone"></i> +221 772652898</p>
        <p><i class="fas fa-envelope"></i> abdoulahat10@lahatech.com</p>
      </div>

      <div class="footer-col">
        <h3>Newsletter</h3>
        <p>Abonnez-vous pour recevoir nos offres spéciales et actualités.</p>
        <form class="newsletter-form">
          <input type="email" placeholder="Votre email" class="newsletter-input" required>
          <button type="submit" class="newsletter-btn"><i class="fas fa-paper-plane"></i></button>
        </form>
      </div>
    </div>

    <div class="copyright">
      <p>&copy; 2025 Lahatech. Tous droits réservés.</p>
    </div>
  </footer>

  <script>
    // Slideshow functionality
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function showSlides(n) {
      let slides = document.getElementsByClassName("slides");
      if (n > slides.length) { slideIndex = 1; }
      if (n < 1) { slideIndex = slides.length; }
      for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slides[slideIndex-1].style.display = "block";
    }

    // Auto-rotate slideshow
    setInterval(() => {
      plusSlides(1);
    }, 5000);

    // Toggle service details
    function toggleService(button) {
      const serviceCard = button.closest('.service-card');
      serviceCard.classList.toggle('active');
      
      if (serviceCard.classList.contains('active')) {
        button.textContent = 'Réduire';
      } else {
        button.textContent = 'Savoir plus';
      }
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // Animation on scroll
    const animateOnScroll = function() {
      const elements = document.querySelectorAll('.service-card, .section-title');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        
        if (elementPosition < screenPosition) {
          element.style.opacity = '1';
          element.style.transform = 'translateY(0)';
        }
      });
    };

    // Set initial state for animated elements
    window.addEventListener('load', () => {
      document.querySelectorAll('.service-card, .section-title').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
      });
      
      animateOnScroll();
    });

    window.addEventListener('scroll', animateOnScroll);
  </script>
</body>
</html>
