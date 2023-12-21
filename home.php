<?php
include('header.php');
include('connexion.php'); // Include your database connection file

// Get products from the database
$products = mysqli_query($conn, "SELECT * FROM product ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        /* Your CSS Styles */
    </style>
</head>

<body>

    <?php
    if (!empty($products)) {
        while ($row = mysqli_fetch_array($products)) {
    ?>
            <div class="product-item">
                <form method="post" action="panier.php?action=add&id=<?php echo $row["id"]; ?>">
                    <div class="product-image">
                        <?php if (isset($row["img_url"])) : ?>
                            <img src="<?php echo $row["img_url"]; ?>" alt="<?php echo $row["name"]; ?>">
                        <?php endif; ?>
                    </div>
                    <div class="product-tile-footer">
                        <div class="product-title"><?php echo $row["name"]; ?></div>
                        <div class="product-price"><?php echo "$" . $row["price"]; ?></div>
                        <div class="cart-action">
                            <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                            <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                            <input type="submit" value="Add to Cart" class="btnAddAction" />
                        </div>
                    </div>
                </form>
            </div>
    <?php
        }
    } else {
        echo "No Records.";
    }
    ?>

</body>

</html>