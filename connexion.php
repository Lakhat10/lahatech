<?php
require_once 'config.php';
require_once 'functions.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification du token CSRF
    if (!verify_csrf_token($_POST['csrf_token'])) {
        die('Erreur de sécurité CSRF');
    }

    $email = !empty($_POST['email']) ? secure_input($_POST['email']) : null;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;
    $remember = isset($_POST['remember']);

    if (empty($email) || empty($password)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "L'adresse email n'est pas valide.";
    } else {
        try {
            $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                // Vérifier si le compte est confirmé
                if (isset($user['is_confirmed']) && !$user['is_confirmed']) {
                    $error = "Votre compte n'est pas encore confirmé. Veuillez vérifier vos emails.";
                } else {
                    // Connexion réussie
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    
                    // Mise à jour de la dernière connexion
                    $update = $db->prepare('UPDATE users SET last_login = NOW() WHERE id = ?');
                    $update->execute([$user['id']]);
                    
                    // Cookie "Se souvenir de moi"
                    if ($remember) {
                        $remember_token = bin2hex(random_bytes(32));
                        $expire = time() + 60 * 60 * 24 * 30; // 30 jours
                        
                        setcookie('remember_token', $remember_token, $expire, '/', '', true, true);
                        
                        $stmt = $db->prepare('UPDATE users SET remember_token = ?, remember_token_expire = ? WHERE id = ?');
                        $stmt->execute([$remember_token, date('Y-m-d H:i:s', $expire), $user['id']]);
                    }
                    
                    header('Location: compte.php');
                    exit();
                }
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            $error = "Erreur de connexion : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Lahatech</title>
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
        .remember-me {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }
        .remember-me input {
            width: auto;
            margin: 0 10px 0 0;
        }
        .forgot-password {
            text-align: right;
            margin-bottom: 1rem;
        }
        .forgot-password a {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .forgot-password a:hover {
            color: #4361ee;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
            
            <label for="email">Adresse email</label>
            <input type="email" name="email" placeholder="Votre adresse email" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Votre mot de passe" required>
            
            <div class="forgot-password">
                <a href="motdepasse-oublie.php">Mot de passe oublié ?</a>
            </div>
            
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>
            
            <button type="submit">Se connecter</button>
        </form>
        
        <div class="form-footer">
            Pas encore membre ? <a href="inscription.php">Créer un compte</a>
        </div>
    </div>
</body>
</html>