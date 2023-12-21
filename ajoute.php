<?php
include('header.php');
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


$images = obtenirImagesDeLaBaseDeDonnees();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        body {
    font-family: 'Lato', sans-serif;
    background-color: #e0f7fa;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border: 1px solid #aed581;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.product-item {
    display: flex;
    border-bottom: 1px solid #aed581;
    padding: 20px;
}

.product-image img {
    max-width: 80px;
    max-height: 80px;
    border-radius: 4px;
    margin-right: 20px;
    border: 1px solid #81c784;
}

.product-details {
    flex-grow: 1;
}

.tbl-cart {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.tbl-cart th, .tbl-cart td {
    border: 1px solid #aed581;
    padding: 15px;
    text-align: left;
}

.tbl-cart th {
    background-color: #4caf50;
    color: #fff;
}

.payment-button {
    display: inline-block;
    padding: 15px 30px;
    background-color: #4caf50;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    margin-top: 30px;
    transition: background-color 0.3s ease;
}

.payment-button:hover {
    background-color: #388e3c;
}

.no-records {
    text-align: center;
    margin-top: 20px;
    color: #777;
    font-size: 18px;
}

.success-message {
    background-color: #dcedc8;
    color: #689f38;
    border: 1px solid #c5e1a5;
    border-radius: 4px;
    padding: 15px;
    margin-bottom: 20px;
}

.btnRemoveAction {
    color: #e53935;
    text-decoration: none;
    cursor: pointer;
    transition: color 0.3s ease;
}

.btnRemoveAction:hover {
    color: #c62828;
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
