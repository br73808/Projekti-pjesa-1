<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

    <section class="kontakt-section">
        <h2>Na Kontaktoni</h2>
        <p>Na shkruani dhe do t'ju përgjigjemi sa më shpejt</p>
    <div class="kontakt-container">
        <form class="kontakt-form">
            <input type="text" placeholder="Emri dhe Mbiemri" required>
            <input type="email" placeholder="Email" required>
            <input type="text" placeholder="Subjekti" required>
            <textarea placeholder="Mesazhi juaj..." rows="5" required></textarea>
            <button type="submit">Dërgo Mesazhin</button>
        </form>

        <div class="kontakt-info">
            <h3>Informacionet tona</h3>
            <p><i class="fa-solid fa-envelope"></i> info@elektrahome.com</p>
            <p><i class="fa-solid fa-phonee"></i> +383 44 000 800</p>
            <p><i class="fa-solid fa-location-dot"></i>Str.Adem Jashari, Ferizaj, Kosovë</p>
        </div>
    </div>
 </section>

<?php
    require_once 'footer.php'
?>
    
</body>
</html> 