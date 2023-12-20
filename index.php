<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon projet</title>
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
