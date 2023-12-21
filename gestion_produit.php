<?php
include('fonction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'ajouter':
                ajouterProduit($_POST);
                break;

            case 'modifier':
                modifierProduit($_POST);
                break;

            case 'supprimer':
                supprimerProduit($_POST['id']);
                break;

            default:
                
                break;
        }
    }
}
$products = obtenirProduitsDeLaBaseDeDonnees();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        

        .product-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #81c784; /* Vert de la nature */
    border-radius: 5px;
    background-color: #b3e0f2; /* Bleu ciel */
    transition: box-shadow 0.3s ease-in-out;
}

.product-card:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-details {
    flex-grow: 1;
    margin-right: 10px;
}

.product-buttons {
    display: none;
}

.product-card:hover .product-buttons {
    display: flex;
}

.product-buttons button {
    background-color: #4caf50; /* Vert émeraude */
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    margin-right: 5px;
    transition: background-color 0.3s ease-in-out;
}

.product-buttons button:hover {
    background-color: #388e3c; /* Vert foncé */
}

    </style>
</head>

<body>
    <div class="container">
        <h2>Gestion des produits</h2>

        <?php foreach ($products as $product) : ?>
            <div class="product-card">
                <div class="product-details">
                    <p><strong>ID:</strong> <?= $product['id']; ?></p>
                    <p><strong>Nom:</strong> <?= $product['name']; ?></p>
                    <p><strong>Quantité:</strong> <?= $product['quantity']; ?></p>
                    <p><strong>Prix:</strong> <?= $product['price']; ?></p>
                    <p><strong>Description:</strong> <?= $product['description']; ?></p>
                </div>

                <div class="product-buttons">
                    <form method="post" action="gestion_produit.php">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                        <input type="hidden" name="action" value="modifier">

                        <label for="newName">Nouveau Nom:</label>
                        <input type="text" name="newName" required>

                        <label for="newQuantite">Nouvelle Quantité:</label>
                        <input type="number" name="newQuantite" required>

                        <label for="newPrix">Nouveau Prix:</label>
                        <input type="text" name="newPrix" required>

                        <button type="submit">Modifier</button>
                    </form>

                    <form method="post" action="gestion_produit.php">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                        <input type="hidden" name="action" value="supprimer">
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>

        <h2>Ajouter un produit</h2>
        <form method="post" action="ajoute.php">
            
            <label for="action">Action:</label>
            <input type="submit" value="Exécuter l'action">
        </form>
    </div>
</body>

</html>
