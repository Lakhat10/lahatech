<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services de Maintenance | TechSolutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --light-color: #f8fafc;
            --dark-color: #1e293b;
            --text-color: #334155;
            --gray-light: #e2e8f0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f1f5f9;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        
        .logo i {
            margin-right: 10px;
            color: var(--accent-color);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 2rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }
        
        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .hero {
            background: url('img/maintenance-hero.jpg') no-repeat center center/cover;
            height: 500px;
            display: flex;
            align-items: center;
            position: relative;
            color: white;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 600px;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            padding: 0.8rem 1.8rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .maintenance-section {
            padding: 5rem 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            color: var(--text-color);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .service-detail {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }
        
        .service-card-detail {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .service-card-detail:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .service-img-detail img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .service-content-detail {
            padding: 2rem;
        }
        
        .service-content-detail h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }
        
        .service-content-detail p {
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }
        
        .features {
            margin-top: 2rem;
        }
        
        .features h4 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }
        
        .features ul {
            list-style: none;
        }
        
        .features ul li {
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 1.5rem;
        }
        
        .features ul li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--primary-color);
        }
        
        .process {
            background-color: white;
            padding: 4rem 0;
        }
        
        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .step {
            text-align: center;
            padding: 2rem;
            border-radius: 8px;
            background-color: var(--light-color);
            transition: all 0.3s ease;
        }
        
        .step:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .step:hover .step-icon {
            background-color: white;
            color: var(--primary-color);
        }
        
        .step-icon {
            width: 70px;
            height: 70px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1.5rem;
            transition: all 0.3s ease;
        }
        
        .step h3 {
            margin-bottom: 1rem;
        }
        
        .cta {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-align: center;
            padding: 5rem 0;
        }
        
        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .cta p {
            max-width: 700px;
            margin: 0 auto 2rem;
            font-size: 1.1rem;
        }
        
        .btn-light {
            background-color: white;
            color: var(--primary-color);
        }
        
        .btn-light:hover {
            background-color: var(--light-color);
            color: var(--secondary-color);
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 4rem 0 2rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: var(--accent-color);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-column ul li a {
            color: var(--gray-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-column ul li a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-links a {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gray-light);
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            nav ul {
                margin-top: 1.5rem;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0 0.5rem;
            }
            
            .hero {
                height: 400px;
                text-align: center;
            }
            
            .hero-content {
                padding: 0 20px;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo">
                <i class="fas fa-cogs"></i>
                <span>TechSolutions</span>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="about.html">À propos</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container hero-content">
            <h1>Maintenance professionnelle de vos appareils</h1>
            <p>Nos techniciens certifiés offrent des services de réparation et d'entretien de qualité pour prolonger la durée de vie de vos équipements électroniques.</p>
            <a href="#contact" class="btn">Contactez-nous</a>
        </div>
    </section>

    <section class="maintenance-section">
        <div class="container">
            <div class="section-title">
                <h2>Nos Services de Maintenance</h2>
                <p>Nous proposons une gamme complète de services de maintenance pour répondre à tous vos besoins en matière de réparation et d'entretien d'appareils électroniques.</p>
            </div>

            <div class="service-detail">
                <div class="service-card-detail">
                    <div class="service-img-detail">
                        <img src="img/computer-repair.jpg" alt="Maintenance informatique">
                    </div>
                    <div class="service-content-detail">
                        <h3>Maintenance Informatique</h3>
                        <p>Réparation et optimisation de vos ordinateurs, portables et tablettes pour des performances optimales.</p>
                        <div class="features">
                            <h4>Nos interventions incluent :</h4>
                            <ul>
                                <li>Diagnostic complet du système</li>
                                <li>Nettoyage et remplacement des composants</li>
                                <li>Installation et mise à jour des logiciels</li>
                                <li>Récupération de données</li>
                                <li>Optimisation des performances</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-card-detail">
                    <div class="service-img-detail">
                        <img src="img/phone-repair.jpg" alt="Réparation mobile">
                    </div>
                    <div class="service-content-detail">
                        <h3>Réparation de Smartphones</h3>
                        <p>Services spécialisés pour tous les modèles de smartphones, avec des pièces de rechange de qualité.</p>
                        <div class="features">
                            <h4>Nos interventions incluent :</h4>
                            <ul>
                                <li>Remplacement d'écran cassé</li>
                                <li>Changement de batterie</li>
                                <li>Réparation des problèmes de charge</li>
                                <li>Dépannage logiciel</li>
                                <li>Récupération de données</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service-detail">
                <div class="service-card-detail">
                    <div class="service-img-detail">
                        <img src="img/network.jpg" alt="Maintenance réseau">
                    </div>
                    <div class="service-content-detail">
                        <h3>Maintenance Réseau</h3>
                        <p>Configuration, dépannage et optimisation de vos infrastructures réseau pour une connectivité fiable.</p>
                        <div class="features">
                            <h4>Nos interventions incluent :</h4>
                            <ul>
                                <li>Installation et configuration de routeurs</li>
                                <li>Dépannage de connexion</li>
                                <li>Sécurisation du réseau</li>
                                <li>Optimisation des performances</li>
                                <li>Maintenance préventive</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-card-detail">
                    <div class="service-img-detail">
                        <img src="img/preventive.jpg" alt="Maintenance préventive">
                    </div>
                    <div class="service-content-detail">
                        <h3>Maintenance Préventive</h3>
                        <p>Programmes de maintenance régulière pour éviter les pannes et prolonger la durée de vie de vos équipements.</p>
                        <div class="features">
                            <h4>Nos interventions incluent :</h4>
                            <ul>
                                <li>Nettoyage interne des appareils</li>
                                <li>Vérification des composants</li>
                                <li>Mise à jour des logiciels</li>
                                <li>Tests de performance</li>
                                <li>Rapport détaillé d'intervention</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="process">
        <div class="container">
            <div class="section-title">
                <h2>Notre Processus de Maintenance</h2>
                <p>Une méthodologie claire et efficace pour garantir des résultats optimaux à chaque intervention.</p>
            </div>

            <div class="process-steps">
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Diagnostic</h3>
                    <p>Analyse approfondie pour identifier la source du problème avec des outils professionnels.</p>
                </div>

                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h3>Devis Gratuit</h3>
                    <p>Évaluation transparente des coûts et validation avec le client avant toute intervention.</p>
                </div>

                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Réparation</h3>
                    <p>Intervention par des techniciens qualifiés utilisant des pièces de qualité.</p>
                </div>

                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Test & Validation</h3>
                    <p>Vérification complète du bon fonctionnement avant remise au client.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta" id="contact">
        <div class="container">
            <h2>Prêt à redonner vie à vos appareils ?</h2>
            <p>Contactez-nous dès aujourd'hui pour un diagnostic gratuit ou pour programmer une intervention de maintenance.</p>
            <a href="contact.html" class="btn btn-light">Contactez notre équipe</a>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>TechSolutions</h3>
                    <p>Votre partenaire de confiance pour tous vos besoins en maintenance électronique et informatique.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="footer-column">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Maintenance Informatique</a></li>
                        <li><a href="#">Réparation Smartphones</a></li>
                        <li><a href="#">Maintenance Réseau</a></li>
                        <li><a href="#">Maintenance Préventive</a></li>
                        <li><a href="#">Récupération de Données</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Liens Utiles</h3>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="about.html">À propos</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Contact</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> 123 Rue Technologique, Paris</li>
                        <li><i class="fas fa-phone"></i> +33 1 23 45 67 89</li>
                        <li><i class="fas fa-envelope"></i> contact@techsolutions.fr</li>
                        <li><i class="fas fa-clock"></i> Lun-Ven: 9h-18h</li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2023 TechSolutions. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Animation pour les étapes de processus
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step');
            
            steps.forEach((step, index) => {
                // Délai d'animation pour chaque étape
                setTimeout(() => {
                    step.style.opacity = '1';
                    step.style.transform = 'translateY(0)';
                }, 300 * index);
            });
            
            // Initial state for animation
            steps.forEach(step => {
                step.style.opacity = '0';
                step.style.transform = 'translateY(20px)';
                step.style.transition = 'all 0.5s ease';
            });
        });
    </script>
</body>
</html>