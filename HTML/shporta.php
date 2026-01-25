<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<?php
    require_once 'header.php'
?>
    <section class="shporta-section">
        <h2>Shporta ime</h2>
        <div class="shporta-container">
            <div class="shporta-item">
                <img src="images (2).jpg">
            </div>
            <div>
                <h4>Kamerë Sigurie</h4>
                <p>120€</p>
            </div>
            <button class="remove">✖</button>

            <div class="cart-item">
                <img src="images (1).jpg">
                <div>
                    <h4>Alarm Shtëpie</h4>
                    <p>180€</p>
                </div>
                <button class="remove">✖</button>
            </div>
            <div class="cart-total">
                <h3>Totali: 300€</h3>
                <button class="checkout">Vazhdo Pagesën</button>
            </div>
        </div>
    </section>
</body>
</html>