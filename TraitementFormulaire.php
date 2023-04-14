<?php
session_start();

// Vérifier que la requête est une méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier le jeton CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Erreur CSRF !');
    }

    // Récupérer les données envoyées par le formulaire
    $taskText = trim($_POST['task-text']);

    // Vérifier que la tâche n'est pas vide
    if (!empty($taskText)) {
        // Se connecter à la base de données
        $db = new mysqli('localhost', 'utilisateur', 'mot_de_passe', 'ma_base_de_donnees');

        // Vérifier si la tâche existe déjà dans la base de données
        $stmt = $db->prepare('SELECT COUNT(*) FROM tasks WHERE text = ?');
        $stmt->bind_param('s', $taskText);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            die('La tâche existe déjà !');
        }

        // Ajouter la tâche à la base de données
        $stmt = $db->prepare('INSERT INTO tasks (text) VALUES (?)');
        $stmt->bind_param('s', $taskText);
        $stmt->execute();
        $stmt->close();

        // Fermer la connexion à la base de données
        $db->close();
    }
}

// Générer un nouveau jeton CSRF pour éviter les attaques CSRF
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
