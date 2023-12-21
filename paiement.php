<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <style>
        
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: linear-gradient(to bottom right, #cfd8dc, #90a4ae); /* Couleurs inspirées de la nature */
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    max-width: 400px;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

.payment-form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.payment-button {
    padding: 10px 20px;
    background-color: #4caf50; /* Vert inspiré de la nature */
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
    transition: background-color 0.3s ease-in-out;
}

.payment-button:hover {
    background-color: #388e3c; /* Vert foncé inspiré de la nature */
}

label {
    margin-top: 10px;
    font-size: 14px;
    color: #333;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 14px;
}

input[type="text"]:focus {
    outline: none;
    border-color: #4caf50; /* Vert inspiré de la nature */
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

p {
    margin-bottom: 15px;
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

    </style>
</head>

<body>
    <div class="container">
        <h2>Paiement</h2>
        <div class="payment-form">
            <p>Montant total à payer: $XX.XX</p>
            

            
            <form action="process_payment.php" method="post">
                <label for="card_number">Numéro de carte de crédit:</label>
                <input type="text" id="card_number" name="card_number" required>

                <label for="expiry_date">Date d'expiration:</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>

                <button type="submit" class="payment-button">Payer maintenant</button>
            </form>
        </div>
    </div>
</body>

</html>
