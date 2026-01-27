<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>
  <?php
    require_once 'header.php'
?>


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
    
    <script src="../JS/app.js"></script>
</body>
</html>