<?php
include('header.php');
$con = mysqli_connect("localhost", "root", "", "ecom1_projet");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


session_start([
    'use_only_cookies' => 1,
    'cookie_secure' => 1,
    'cookie_httponly' => 1,
    'use_strict_mode' => 1
]);

$products = mysqli_query($con, "SELECT * FROM product ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <style>
        body {
    font-family: 'Montserrat', sans-serif;
    background-color: #1a1a1a;
    color: #fff;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #333;
    border: 1px solid #444;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

.product-item {
    display: flex;
    border-bottom: 1px solid #555;
    padding: 20px;
}

.product-image img {
    max-width: 80px;
    max-height: 80px;
    border-radius: 4px;
    margin-right: 20px;
    border: 2px solid #777;
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
    border: 1px solid #444;
    padding: 15px;
    text-align: left;
}

.tbl-cart th {
    background-color: #2c2c2c;
}

.payment-button {
    display: inline-block;
    padding: 15px 30px;
    background-color: #e74c3c;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    margin-top: 30px;
    transition: background-color 0.3s ease;
}

.payment-button:hover {
    background-color: #c0392b;
}

.no-records {
    text-align: center;
    margin-top: 20px;
    color: #888;
    font-size: 18px;
}

.success-message {
    background-color: #27ae60;
    color: #fff;
    border: 1px solid #2ecc71;
    border-radius: 4px;
    padding: 15px;
    margin-bottom: 20px;
}

.btnRemoveAction {
    color: #e74c3c;
    text-decoration: none;
    cursor: pointer;
    transition: color 0.3s ease;
}

.btnRemoveAction:hover {
    color: #c0392b;
}

        
    </style>
</head>

<body>

    <?php
    
    if (!empty($_SESSION["cart_item"])) {
        echo "<div class='success-message'>Produit ajouté au panier avec succès.</div>";
    }

    if (isset($_SESSION["cart_item"]) && !empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $item) {
    ?>
            <div class="product-item">
                <div class="product-image">
                    <img src="<?php echo $item["img_url"]; ?>" alt="Product Image" />
                </div>
                <div class="product-details">
                    <div class="product-title"><?php echo $item["name"]; ?></div>
                    <div class="product-price"><?php echo "$" . $item["price"]; ?></div>
                    <div class="product-quantity">Quantity: <?php echo $item["quantity"]; ?></div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "Votre panier est vide.";
    }
    ?>

<?php
    if (!empty($products)) {
        while ($row = mysqli_fetch_array($products)) {
    ?>
            <div class="product-item">
                <form method="post" action="panier.php?action=add&id=<?php echo $row["id"]; ?>">
                    <div class="product-image">
                        <?php if (isset($row["image"])) : ?>
                            <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"]; ?>">
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

    <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>
        <a id="btnEmpty" href="panier.php?action=empty">Empty Cart</a>

        <?php
        if (isset($_SESSION["cart_item"]) && !empty($_SESSION["cart_item"])) {
            $total_quantity = 0;
            $total_price = 0;
        ?>
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:right;">Quantity</th>
                        <th style="text-align:right;">Price</th>
                        <th style="text-align:right;">Action</th>
                    </tr>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item) {
                        $item_price = $item["quantity"] * $item["price"];
                    ?>
                        <tr>
                            <td><?php echo $item["name"]; ?></td>
                            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                            <td style="text-align:right;"><?php echo "$" . number_format($item_price, 2); ?></td>
                            <td style="text-align:right;">
                                <a href="panier.php?action=remove&id=<?php echo $item["code"]; ?>" class="btnRemoveAction">
                                    Remove Item
                                </a>
                            </td>
                        </tr>
                    <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["price"] * $item["quantity"]);
                    }
                    ?>
                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
                    </tr>
                </tbody>
            </table>

           
            <a href="paiement.php" class="payment-button">Payer</a>

        <?php
        } else {
        ?>
            <div class="no-records">Your Cart is Empty</div>
        <?php
        }
        ?>
    </div>

    <?php
    if (isset($_GET["action"])) {
        switch ($_GET["action"]) {
            case "add":
                if (!empty($_POST["quantity"])) {
                    $id = $_GET["id"];
                    $result = mysqli_query($con, "SELECT * FROM product WHERE id='$id'");
                    if ($productByCode = mysqli_fetch_array($result)) {
                        $itemArray = array(
                            $productByCode["id"] => array(
                                'name' => $productByCode["name"],
                                'code' => $productByCode["id"],
                                'quantity' => $_POST["quantity"],
                                'price' => $productByCode["price"],
                                'img_url' => $productByCode["img_url"]
                            )
                        );
                        if (!empty($_SESSION["cart_item"])) {
                            if (array_key_exists($productByCode["id"], $_SESSION["cart_item"])) {
                                $_SESSION["cart_item"][$productByCode["id"]]["quantity"] += $_POST["quantity"];
                            } else {
                                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                            }
                        } else {
                            $_SESSION["cart_item"] = $itemArray;
                        }
                    }
                }
                break;

            case "remove":
                if (!empty($_SESSION["cart_item"])) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($_GET["id"] == $k) {
                            unset($_SESSION["cart_item"][$k]);
                            if (empty($_SESSION["cart_item"])) {
                                unset($_SESSION["cart_item"]);
                            }
                        }
                    }
                }
                break;

            case "empty":
                unset($_SESSION["cart_item"]);
                break;
        }
    }
    ?>
</body>

</html>