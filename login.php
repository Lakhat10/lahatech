<?php
session_start();

// Configuration des identifiants admin (à changer en production)
$config = [
    'admin_username' => 'admin@lahatech.com',
    'admin_password' => password_hash('MotDePasseComplexe123!', PASSWORD_DEFAULT)
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération sécurisée des données du formulaire
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validation des champs
    if (empty($username) || empty($password)) {
        $error = "Tous les champs sont obligatoires";
    } else {
        // Vérification des identifiants
        if ($username === $config['admin_username'] && password_verify($password, $config['admin_password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            
            // Régénération de l'ID de session pour prévenir les attaques de fixation
            session_regenerate_id(true);
            
            header('Location: tab.php');
            exit;
        } else {
            $error = "Identifiants incorrects";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Lahatech</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-title {
            text-align: center;
            color: #FF3D57;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background: #FF3D57;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login-btn:hover {
            background: #FF2D4A;
        }
        .error {
            color: #FF3D57;
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            background: rgba(255, 61, 87, 0.1);
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Espace Administrateur</h1>
        
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required 
                       value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="login-btn">Se connecter</button>
        </form>
    </div>
</body>
</html>