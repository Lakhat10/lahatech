<?php
function secure_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Vous pouvez ajouter d'autres fonctions utilitaires ici
?>