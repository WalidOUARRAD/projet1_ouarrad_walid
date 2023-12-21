
<!DOCTYPE html>
<html>
<head>
    <style>
        
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #3498db; /* Bleu clair */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    width: 50%;
    margin: 50px auto;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    padding: 20px;
}

h2 {
    text-align: center;
    color: #2c3e50; /* Bleu foncé */
}

form {
    display: flex;
    flex-direction: column;
    padding: 20px;
}

label {
    margin-bottom: 8px;
    color: #34495e; /* Bleu moyen */
}

input[type="text"],
input[type="password"],
input[type="email"],
input[type="submit"] {
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #3498db; /* Bleu clair */
    border-radius: 4px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #2980b9; /* Bleu foncé */
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #21618c; /* Bleu foncé plus foncé */
}

p {
    text-align: center;
    margin-top: 15px;
    color: #2c3e50; /* Bleu foncé */
}


    </style>
</head>
<body>
    <div class="container">
        <h2>Modifier les informations</h2>
        <form action="compte.php" method="post">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" name="username" value="" required><br>

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" value="" required><br>

            <label for="email">Adresse e-mail:</label>
            <input type="email" name="email" value="" required><br>

            <label for="phone_number">Numéro de téléphone:</label>
            <input type="text" name="phone_number" value=""><br>

            <label for="address">Adresse domicile:</label>
            <input type="text" name="address"><br>

            <input type="submit" value="Mettre à jour"><br>
        </form>
    </div>
</body>
</html>