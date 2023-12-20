

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

        .product-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
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
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .product-buttons button:hover {
            background-color: #0056b3;
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
        select {
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
        <h2>Gestion des produits</h2>

       
            <div class="product-card">
                <div class="product-details">
                    <p><strong>ID:</strong> </p>
                    <p><strong>Nom:</strong> </p>
                    <p><strong>Quantité:</strong> </p>
                    <p><strong>Prix:</strong> </p>
                    <p><strong>Description:</strong> </p>
                    
                </div>

                <div class="product-buttons">
                    
                    <form method="post" action="gestion_produit.php">
                        <input type="hidden" name="id" value="">
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
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="action" value="supprimer">
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        
      

            <h2>Ajouter un produit</h2>
        <form method="post" action="ajoute.php">
          
            <label for="action">Action:</label>
            <input type="submit" value="Exécuter l'action">
        </form>
    </div>
</body>

</html>