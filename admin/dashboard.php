<?php
session_start();

// Nëse nuk është admin → s’ka qasje
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>

<h1 style="text-align:center;">Admin Dashboard 👑</h1>

<p style="text-align:center;">
    Mirësevjen Admin! Vetëm ti ke qasje këtu.
</p>

<p style="text-align:center;">
    <a href="../index.php">Kthehu në faqe kryesore</a>
</p>

</body>
</html>
