<?php 
require('header.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon projet</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #4CAF50; /* Couleur de fond de la page en vert */
        }

        header {
            background-color: #d3d3d3; /* Couleur du header en gris moyen */
            color: #333; /* Couleur du texte en gris foncé */
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #e0e0e0; /* Couleur de fond de la barre de navigation en gris */
            padding: 10px;
        }

        nav a {
            text-decoration: none;
            color: #333; /* Couleur du texte en gris foncé */
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #c0c0c0; /* Couleur de fond au survol des liens en gris plus clair */
        }
    </style>
</head>

<body>
    <h1>welcome</h1>

    <?php if (isset($_SESSION['user_name'])) : ?>
        <p>Welcome, <?php echo $_SESSION['user_name']; ?>!</p>
        <a href="login.php">Logout</a>
    <?php else : ?>
        <a href="signup.php">S'enregistrer</a>
        <a href="login.php">Se connecter</a>
    <?php endif; ?>
</body>
</html>
