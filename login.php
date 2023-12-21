<?php
require('header.php'); 
?>
<style>
body, h2, form, label, input, button, a {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
}

a {
    text-decoration: none;
    color: #3498db;
    margin-right: 20px;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

/* Responsive styles */
@media screen and (max-width: 600px) {
    .container {
        width: 90%;
    }
}
</style>
<h2>Se connecter</h2>
<a href="../">Accueil</a>
<a href="signup.php">S'enregistrer</a>

<form method="post" action="loginResult.php">
    <label for="user_name">Nom d'utilisateur</label>
    <input id="user_name" type="text" name="user_name" value="">
    <label for="pwd">Mot de passe</label>
    <input id="pwd" type="password" name="pwd" value="">
    <button type="submit">Me connecter</button>
</form>
