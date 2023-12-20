<?php

include('header.php');

include('fonction.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    ajouterProduit($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Product</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      label {
        display: block;
        margin-bottom: 8px;
      }

      input {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
      }

      input[type="submit"] {
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 12px;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        background-color: #218838;
      }
    </style>
  </head>
  <body>
    <div>
      <h2>Add Product</h2>
      <form method="post" action="ajoute_produit.php">
        <label for="Nom">Nom:</label>
        <input type="text" name="Nom" required /><br />

        <label for="Quantite">Quantite:</label>
        <input type="number" name="Quantite" required /><br />

        <label for="Prix">Prix:</label>
        <input type="text" name="Prix" required /><br />
        <form method="post" action="" enctype="multipart/form-data">
          <label for="imageFile">Image:</label>
          <input type="file" name="imageFile" /><br />
          <input type="submit" value="Télécharger" />
        </form>

        <label for="Description">Description:</label>
        <textarea name="Description" rows="4"></textarea><br />

        <input type="submit" value="Add Product" />
      </form>
    </div>
  </body>
</html>
