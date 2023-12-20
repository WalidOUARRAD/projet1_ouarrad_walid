<?php
include('../admin/header.php');
include('fonction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'ajouter':
                ajouterProduit($_POST);
                break;
        }
    }
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ajouter un produit</h2>
        <form method="post" action="gestion_produit.php" enctype="multipart/form-data">
    <label for="newName">Nom:</label>
    <input type="text" name="newName" required>

    <label for="newQuantite">Quantité:</label>
    <input type="number" name="newQuantite" required>

    <label for="newPrix">Prix:</label>
    <input type="text" name="newPrix" required>

    <label for="newDescription">Description:</label>
    <textarea name="newDescription" rows="4"></textarea>

    
    <label for="newImage">Nouvelle image:</label>
    <input type="file" name="newImage" accept="image/*" required>

    <input type="hidden" name="action" value="ajouter">
    <input type="submit" value="Ajouter le produit">
</form>

    </div>
</body>

</html>
