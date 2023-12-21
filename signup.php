<?php
require('header.php'); 
?>
<h2>S'enregistrer</h2>
<a href="../">Accueil</a>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: linear-gradient(to bottom right, #cfd8dc, #90a4ae); /* Couleurs inspirées de la nature */
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    max-width: 400px;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

label {
    display: block;
    margin-top: 10px;
    font-size: 14px;
    color: #333;
}

input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 14px;
}

input:focus {
    outline: none;
    border-color: #4caf50; /* Vert inspiré de la nature */
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4caf50; /* Vert inspiré de la nature */
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
    transition: background-color 0.3s ease-in-out;
}

button:hover {
    background-color: #388e3c; /* Vert foncé inspiré de la nature */
}

    </style>
<form method="post" action="signupResult.php">
    <label for="user_name">Nom d'utilisateur</label>
    <input id="user_name" type="text" name="user_name" value="">
    <label for="email">Courriel</label>
    <input id="email" type="text" name="email" value="">
    <label for="pwd">Mot de passe</label>
    <input id="pwd" type="password" name="pwd" value="">
    <button type="submit">Soumettre mon enregistrement</button>
</form>
