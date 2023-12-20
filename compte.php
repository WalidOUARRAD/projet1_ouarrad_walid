

<!DOCTYPE html>
<html>
<head>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/free-vector/green-curve-abstract-background_53876-99569.jpg?t=st=1701994785~exp=1701995385~hmac=d92abb1a06a551175afe70d30979caf35053447e185b27463882cd62cf7b678f');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        label {
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 15px;
            color: #333;
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