<?php
include('header.php');
include('fonction.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    
</head>

<body>
    <?php if (!empty($products)) : ?>
        <?php foreach ($products as $product) : ?>
            <div class="product-item">
                <div class="product-image">
                    <img src="<?php echo $product['Image']; ?>" alt="<?php echo $product['Nom']; ?>">
                </div>
                <h3><?php echo $product['Nom']; ?></h3>
                <p>Prix: <?php echo $product['Prix']; ?></p>
                <p>Description: <?php echo $product['Description']; ?></p>
                <form method="post" action="panier.php?action=add&pid=<?php echo $product['ID']; ?>">
                    <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                    <input type="hidden" name="id_produit" value="<?php echo $product['ID']; ?>">
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
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun produit trouvé.</p>
    <?php endif; ?>
</body>

</html>
