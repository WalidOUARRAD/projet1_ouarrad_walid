<?php
include('header.php');
include('connexion.php'); 


$products = mysqli_query($conn, "SELECT * FROM product ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .product-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            transition: box-shadow 0.3s ease-in-out;
        }

        .product-item:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .product-tile-footer {
            padding: 15px;
            text-align: center;
        }

        .product-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-price {
            color: #007bff;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .cart-action {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-quantity {
            width: 40px;
            padding: 5px;
            margin-right: 10px;
            text-align: center;
        }

        .btnAddAction {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btnAddAction:hover {
            background-color: #0056b3;
        }

        .no-records {
            text-align: center;
            font-size: 20px;
            color: #555;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <div class="container">

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
            echo "<div class='no-records'>No Records.</div>";
        }
        ?>

    </div>

</body>

</html>
