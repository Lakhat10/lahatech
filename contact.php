<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contactez-nous</title>
  <style>
      body {
          font-family: Arial, sans-serif;
          background: linear-gradient(to right, #ff7e5f, #feb47b); /* Dégradé de couleurs */
          margin: 0;
          padding: 0;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          height: 100vh;
      }
      header {
          background-color: rgba(255, 255, 255, 0.9); /* Fond léger */
          color: #4CAF50; /* Couleur vive */
          width: 100%;
          text-align: center;
          padding: 20px 0;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
          border-bottom: 5px solid #388E3C; /* Bordure décorative */
      }
      h1 {
          margin: 0;
          font-size: 2.5em; /* Taille de police plus grande */
      }
      .container {
          background-color: white;
          border-radius: 10px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
          padding: 30px;
          width: 90%;
          max-width: 600px;
          text-align: center;
          animation: fadeIn 1s ease-in-out;
          margin-top: 20px; /* Ajout de marge */
      }
      @keyframes fadeIn {
          from {
              opacity: 0;
          }
          to {
              opacity: 1;
          }
      }
      .contact-link {
          display: inline-block;
          background-color: #FF5722; /* Couleur vive */
          color: white;
          padding: 15px 25px;
          margin: 10px;
          border-radius: 5px;
          text-decoration: none;
          font-size: 1.2em;
          transition: background-color 0.3s, transform 0.3s;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      }
      .contact-link:hover {
          background-color: #E64A19; /* Couleur au survol */
          transform: scale(1.05);
      }
      .concierge-service {
          max-width: 600px;
          margin: auto;
          background-color: rgba(255, 255, 255, 0.9); /* Fond léger */
          padding: 30px;
          border-radius: 10px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
          margin-top: 20px;
      }
      .concierge-service h3 {
          color: #4CAF50; /* Couleur vive */
          margin-bottom: 10px;
      }
      .concierge-service p {
          color: #666;
          margin-bottom: 20px;
      }
      .concierge-service input,
      .concierge-service select,
      .concierge-service textarea {
          width: 100%;
          padding: 12px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 5px;
          transition: border-color 0.3s;
      }
      .concierge-service input:focus,
      .concierge-service select:focus,
      .concierge-service textarea:focus {
          border-color: #4CAF50; /* Couleur au focus */
          outline: none;
      }
      .concierge-service button {
          background-color: #FF5722; /* Couleur vive */
          color: white;
          border: none;
          padding: 12px;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s;
          width: 100%;
          font-size: 1.1em; /* Taille de police plus grande */
      }
      .concierge-service button:hover {
          background-color: #E64A19; /* Couleur au survol */
      }
      footer {
          margin-top: 20px;
          color: #777;
          font-size: 0.9em;
      }
  </style>
</head>
<body>
  <header>
      <h1>Contactez-nous</h1>
  </header>
  <div class="container">
      <a href="https://wa.me/your-number" class="contact-link">
          <i class="fab fa-whatsapp"></i> WhatsApp
      </a>
      <a href="https://www.facebook.com/your-page" class="contact-link">
          <i class="fab fa-facebook"></i> Facebook
      </a>
      <a href="https://www.instagram.com/your-profile" class="contact-link">
          <i class="fab fa-instagram"></i> Instagram
      </a>
      <a href="mailto:your-email@example.com" class="contact-link">
          <i class="fas fa-envelope"></i> Email
      </a>
  </div>

  <div class="concierge-service">
      <h3>Besoin d'aide pour vos achats ?</h3>
      <p>Notre service de conciergerie vous aide à trouver les produits rares, à organiser vos commandes spéciales, et à assurer une expérience d'achat exceptionnelle.</p>
      <input type="text" placeholder="Nom complet" required>
      <input type="email" placeholder="Email" required>
      <input type="tel" placeholder="Téléphone" required>
      <textarea placeholder="Détails de votre demande" required></textarea>
      <button>Soumettre</button>
  </div>

  <footer>
      &copy; 2025 Lahatech. Tous droits réservés.
  </footer>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
