<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElektroHome</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">ElektroHome</div>


        <!-- <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">Rreth Nesh</a></li>
            <li><a href="produktet.php">Produktet</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="shporta.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul> -->
    </nav>

    <ul class="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="about.php">Rreth Nesh</a></li>
    <li><a href="produktet.php">Produktet</a></li>
    <li><a href="kontakt.php">Kontakt</a></li>

    <?php if(isset($_SESSION['user_id'])): ?>
        <li><a href="logout.php">Logout</a></li>
    <?php else: ?>
        <li><a href="login.php">Login</a></li>
    <?php endif; ?>

    <li><a href="shporta.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
</ul>

</body>
</html>
