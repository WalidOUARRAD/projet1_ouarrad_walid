<?php
include('../admin/header.php');
include('../admin/fonction.php');


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

        .products-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-image {
            width: 100%;
            height: 200px;
            margin-bottom: 15px;
            overflow: hidden;
            border-radius: 5px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        h3 {
            margin-top: 0;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 10px;
            font-size: 0.9em;
        }

        button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        button:hover {
            color: darkblue;
        }
    </style>
</head>
<body>
    <button onclick="window.location.href='panier.php';">Mon Panier</button>

    <div class="products-container">
       
            <div class="product-item">
                <div class="product-image">
                    <img src="" alt="">
                </div>
                <h3></h3>
                <p>Prix: </p>
                <p>Description: </p>
                <form method="post" action="panier.php?action=add&pid=">
                    <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                    <input type="hidden" name="id_produit" value="">
                    <label for="taille">Taille :</label>
                    <select name="taille" id="taille">
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                    <input type="submit" value="Ajouter au panier" class="btnAddAction" />
                </form>
            </div>
       

        
    </div>
</body>
</html>
