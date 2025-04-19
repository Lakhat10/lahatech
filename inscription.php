<?php
require_once 'config.php';
require_once 'functions.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification du token CSRF
    if (!verify_csrf_token($_POST['csrf_token'])) {
        die('Erreur de sécurité CSRF');
    }

    $username = !empty($_POST['username']) ? secure_input($_POST['username']) : null;
    $email = !empty($_POST['email']) ? secure_input($_POST['email']) : null;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;
    $confirm_password = !empty($_POST['confirm_password']) ? $_POST['confirm_password'] : null;
    $role = 'client';
    $confirmation_code = bin2hex(random_bytes(16));

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "L'adresse email n'est pas valide.";
    } elseif (strlen($password) < 8) {
        $error = "Le mot de passe doit contenir au moins 8 caractères.";
    } elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        try {
            // Vérification si l'email existe déjà
            $check = $db->prepare('SELECT email FROM users WHERE email = ?');
            $check->execute([$email]);
            
            if ($check->rowCount() > 0) {
                $error = "Cet email est déjà utilisé.";
            } else {
                // Hash du mot de passe
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                
                // Insertion du nouvel utilisateur
                $stmt = $db->prepare('INSERT INTO users (username, email, password, role, confirmation_code) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([$username, $email, $password_hash, $role, $confirmation_code]);
                
                // Ici vous pouvez ajouter l'envoi d'email de confirmation
                // send_confirmation_email($email, $confirmation_code);
                
                $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                header('Refresh: 3; URL=connexion.php');
            }
        } catch (PDOException $e) {
            $error = "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | Lahatech</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 400px;
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        h1 { 
            text-align: center; 
            color: #4361ee;
            margin-bottom: 1.5rem;
        }
        .error { 
            color: #FF3D57;
            background: #FFEEF0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
        }
        .success {
            color: #06D6A0;
            background: #E8F9F5;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
        }
        input {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0 1rem 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1rem;
        }
        input:focus {
            outline: none;
            border-color: #4361ee;
            box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
        }
        button {
            width: 100%;
            padding: 0.8rem;
            background: #4361ee;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 0.5rem;
            transition: background 0.3s;
        }
        button:hover { 
            background: #3f37c9; 
        }
        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }
        .form-footer a {
            color: #4361ee;
            text-decoration: none;
            font-weight: 600;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
        .password-hint {
            font-size: 0.8rem;
            color: #666;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Créer un compte</h1>
        
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if (!empty($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
            
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" placeholder="Votre nom d'utilisateur" required>
            
            <label for="email">Adresse email</label>
            <input type="email" name="email" placeholder="Votre adresse email" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Créez un mot de passe" required>
            <div class="password-hint">Minimum 8 caractères</div>
            
            <label for="confirm_password">Confirmez le mot de passe</label>
            <input type="password" name="confirm_password" placeholder="Retapez votre mot de passe" required>
            
            <button type="submit">S'inscrire</button>
        </form>
        
        <div class="form-footer">
            Déjà membre ? <a href="connexion.php">Connectez-vous</a>
        </div>
    </div>
</body>
</html>