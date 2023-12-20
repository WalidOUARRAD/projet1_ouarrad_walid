

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <style>
        .product-item {
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
        }

        .product-image img {
            max-width: 100px;
            max-height: 100px;
        }

        .btnAddAction {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btnAddAction:hover {
            background-color: #218838;
        }

        .tbl-cart {
            margin-top: 30px;
        }

        .tbl-cart th,
        .tbl-cart td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .btnRemoveAction {
            color: #ff0000;
        }

        .no-records {
            text-align: center;
            margin-top: 20px;
        }
        .btnPayer {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 20px;
}

.btnPayer:hover {
    background-color: #0056b3;
}
        .success-message {
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>

<body>

    
            <div class="product-item">
                <div class="product-image">
                    <img src="" alt="Product Image" />
                </div>
                <div class="product-details">
                    <div class="product-title"></div>
                    <div class="product-price"></div>
                    <div class="product-quantity">Quantity: </div>
                </div>
            </div>
    
            <div class="product-item">
                <form method="post" action="panier.php?action=add&id=">
                    <div class="product-image">
                        
                            <img src="" alt="">
                       
                    </div>
                    <div class="product-tile-footer">
                        <div class="product-title"></div>
                        <div class="product-price"></div>
                        <div class="cart-action">
                            <input type="hidden" name="id_produit" value="">
                            <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                            <input type="submit" value="Add to Cart" class="btnAddAction" />
                        </div>
                    </div>
                </form>
            </div>
    

    <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>
        <a id="btnEmpty" href="panier.php?action=empty">Empty Cart</a>

       
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:right;">Quantity</th>
                        <th style="text-align:right;">Price</th>
                        <th style="text-align:right;">Action</th>
                    </tr>
                    
                        <tr>
                            <td><?php echo $item["name"]; ?></td>
                            <td style="text-align:right;"></td>
                            <td style="text-align:right;"></td>
                            <td style="text-align:right;">
                                <a href="panier.php?action=remove&id=" class="btnRemoveAction">
                                    Remove Item
                                </a>
                            </td>
                        </tr>
                    
                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"></td>
                        <td align="right" colspan="2"><strong></strong></td>
                    </tr>
                </tbody>
            </table>

           
            <a href="paiement.php" class="payment-button">Payer</a>

       
            <div class="no-records">Your Cart is Empty</div>
        
    </div>

    
</body>

</html>
