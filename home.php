<?php
include('../admin/header.php');
include('fonction.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['imageFile'])) {
    
    $nomFichier = $_FILES['imageFile']['name'];
    $destination = $imageDirectory . $nomFichier;

    if (move_uploaded_file($cheminTemporaire, $destination)) {
        echo 'Le fichier a été téléchargé avec succès.';
    } else {
        echo 'Erreur lors du téléchargement du fichier.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    
</head>

<body>
    <button onclick="window.location.href='panier.php';">Mon Panier</button>

    <div class="products-container">
        <form method="post" action="" enctype="multipart/form-data">
            <label for="imageFile">Image:</label>
            <input type="file" name="imageFile"><br>
            <input type="submit" value="Télécharger">
        </form>

        
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
        
            <p>Aucun produit trouvé.</p>
       
    </div>
</body>

</html>
