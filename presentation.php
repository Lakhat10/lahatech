<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lahatech - Présentation</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #e9f7ef; /* Couleur de fond douce */
    margin: 0;
    padding: 20px;
  }
  h1, h2, h3 {
    color: #ffcc00; /* Couleur vive pour le texte */
    animation: colorChange 5s infinite; /* Animation de changement de couleur */
  }
  @keyframes colorChange {
    0% { color: #ffcc00; } /* Jaune vif */
    25% { color: #ff5733; } /* Rouge vif */
    50% { color: #33ccff; } /* Bleu vif */
    75% { color: #28a745; } /* Vert vif */
    100% { color: #ffcc00; } /* Retour au jaune */
  }
  h1:hover, h2:hover, h3:hover {
    color: #ff6f61; /* Couleur vive au survol */
  }
  .logo {
    margin-bottom: 20px;
    animation: bounce 1s infinite; /* Animation de rebond */
  }
  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0);
    }
    40% {
      transform: translateY(-10px);
    }
    60% {
      transform: translateY(-5px);
    }
  }
  p {
    color: #34495e; /* Couleur de texte douce */
    line-height: 1.6; /* Amélioration de la lisibilité */
    transition: color 0.3s; /* Animation de changement de couleur */
  }
  p:hover {
    color: #ff6f61; /* Changement de couleur au survol */
  }
  ul {
    list-style-type: square; /* Changer le style des puces */
    padding-left: 20px;
  }
  li {
    margin: 10px 0; /* Espacement entre les éléments de la liste */
    color: #2c3e50; /* Couleur des éléments de liste */
    transition: color 0.3s; /* Animation de changement de couleur */
  }
  li:hover {
    color: #ff6f61; /* Changement de couleur au survol */
  }
  .animated-text {
    display: inline-block;
    transition: transform 0.3s, color 0.3s; /* Animation de zoom et de couleur */
  }
  .animated-text:hover {
    transform: scale(1.1); /* Effet de zoom au survol */
    color: #ff6f61; /* Changement de couleur au survol */
  }
  .image-container {
    display: flex;
    justify-content: center;
    margin: 20px 0;
    overflow: hidden; /* Masquer le débordement pour un effet propre */
  }
  .image-container img {
    width: 150px;
    height: auto;
    margin: 0 10px;
    border-radius: 10px;
    transition: transform 0.3s; /* Animation de zoom sur l'image */
    animation: move 5s linear infinite; /* Animation de déplacement */
  }
  @keyframes move {
    0% {
      transform: translateX(0); /* Position de départ */
    }
    50% {
      transform: translateX(20px); /* Déplacement vers la droite */
    }
    100% {
      transform: translateX(0); /* Retour à la position de départ */
    }
  }
</style>
</head>
<body>

<!-- Logo -->
<div class="logo">
  <svg xmlns="http://www.w3.org/2000/svg" width="300" height="100" viewBox="0 0 300 100">
    <rect width="300" height="100" fill="#ff6f61"/>
    <text x="10" y="60" font-family="Arial" font-size="40" fill="white">Lahatech</text>
    <path d="M250 30 L270 50 L250 70 L250 50 Z" fill="#28a745"/>
    <circle cx="250" cy="50" r="10" fill="white"/>
    <line x1="250" y1="50" x2="270" y2="50" stroke="#28a745" stroke-width="2"/>
  </svg>
</div>

<h1 class="animated-text">Qui sommes-nous ?</h1>
<p><strong>Lahatech</strong> est une boutique en ligne spécialisée dans la vente de matériels électroniques. Notre mission est de fournir à nos clients une large gamme de produits de qualité, allant des ordinateurs portables aux smartphones, en passant par les tablettes et divers accessoires électroniques.</p>

<h2 class="animated-text">Notre offre</h2>
<ul>
  <li><strong>Produits Variés :</strong> Nous proposons une sélection diversifiée de produits électroniques, adaptés à tous les besoins et budgets.</li>
  <li><strong>Qualité et Fiabilité :</strong> Chaque produit est soigneusement sélectionné pour garantir sa qualité et sa durabilité.</li>
  <li><strong>Prix Compétitifs :</strong> Nous nous engageons à offrir les meilleurs prix sur le marché, sans compromettre la qualité.</li>
</ul>

<h2 class="animated-text">Pourquoi choisir Lahatech ?</h2>
<ul>
  <li><strong>Expérience Utilisateur :</strong> Notre site est conçu pour être convivial, avec une navigation intuitive et des descriptions détaillées des produits.</li>
  <li><strong>Service Client :</strong> Notre équipe est disponible pour répondre à toutes vos questions et vous aider dans votre choix.</li>
  <li><strong>Facilité de Commande :</strong> Avec un processus de commande simple et sécurisé, vous pouvez acheter vos produits préférés en quelques clics.</li>
</ul>

<h2 class="animated-text">Engagement envers nos clients</h2>
<p>Nous valorisons la satisfaction de nos clients et nous nous efforçons de dépasser leurs attentes à chaque étape de leur expérience d'achat. Que ce soit pour des conseils sur un produit ou pour un suivi après-vente, nous sommes là pour vous accompagner.</p>

<h2 class="animated-text">Explorez notre site</h2>
<p>Visitez notre site pour découvrir notre gamme de produits, profiter de nos offres spéciales et bénéficier d'une expérience d'achat inégalée !</p>

<!-- Images animées -->
<div class="image-container">
  <img src="https://via.placeholder.com/150" alt="Produit 1" />
  <img src="https://via.placeholder.com/150" alt="Produit 2" />
  <img src="https://via.placeholder.com/150" alt="Produit 3" />
</div>

</body>
</html>
