<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="index.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">ElektroHome</div>
        <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">Rreth Nesh</a></li>
            <li><a href="produktet.html" class="active">Produktet</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="shporta.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul>
    </nav>

    <div class="card">
        <h2>Kyçu</h2>
        <form id="loginForm" novalidate>
            <label for="email">Email</label>
            <input type="email" id="email" class="input">
            <div id="emailError" class="error" aria-live="polite"></div>

            <label for="password">Password</label>
            <input type="password" id="password" class="input">
            <div id="passwordError" class="error" aria-live="polite"></div>

            <button type="submit">Login</button>
            <div id="formSuccess" class="success" role="status" aria-live="polite"></div>

            <p style="text-align:center; margin-top:10px;">
                Nuk ke llogari? <a href="regjistrohu.html">Regjistrohu</a>
            </p>
        </form>
    </div>
    
    <script src="app.js"></script>
</body>
</html>