<?php
session_start();
require_once '../HTML/database.php';

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) {
    header("Location: ../login.php");
    exit;
}


$db = new Database();
$conn = $db->getConnection();


$sqlProducts = "SELECT p.*, u.emri, u.mbiemri 
                FROM produkte p 
                LEFT JOIN user u ON p.user_id = u.user_id
                ORDER BY p.produkt_id DESC";
$stmt = $conn->prepare($sqlProducts);
$stmt->execute();
$produkte = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sqlMessages = "SELECT * FROM kontakti ORDER BY kontakti_id DESC";
$stmt2 = $conn->prepare($sqlMessages);
$stmt2->execute();
$messages = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <style>
        table { border-collapse: collapse; width: 95%; margin: 20px auto; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #076bbd; color: #fff; }
        img { max-width: 80px; }
        h1, h2 { text-align: center; margin-top: 20px; }
        a { color: #076bbd; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<h1>Admin Dashboard </h1>

<p style="text-align:center;">
    Mirësevjen Admin! Vetëm ti ke qasje këtu.
</p>

<p style="text-align:center;">
    <a href="../index.php">Kthehu në faqe kryesore</a>
</p>


<h2>Produktet e shtuara</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Emri</th>
        <th>Përdoruesi</th>
        <th>Pershkrimi</th>
        <th>Cmimi</th>
        <th>Foto</th>
        <th>PDF</th>
    </tr>
    <?php foreach($produkte as $p): ?>
    <tr>
        <td><?= htmlspecialchars($p['produkt_id']) ?></td>
        <td><?= htmlspecialchars($p['emri']) ?></td>
        <td><?= htmlspecialchars($p['emri'] . ' ' . $p['mbiemri']) ?></td>
        <td><?= htmlspecialchars($p['pershkrimi']) ?></td>
        <td><?= htmlspecialchars($p['cmimi']) ?> €</td>
        <td>
            <?php if(!empty($p['foto'])): ?>
                <img src="../photos/<?= htmlspecialchars($p['foto']) ?>" alt="<?= htmlspecialchars($p['emri']) ?>">
            <?php endif; ?>
        </td>
        <td>
            <?php if(!empty($p['pdf'])): ?>
                <a href="../uploads/<?= htmlspecialchars($p['pdf']) ?>" target="_blank">Shiko PDF</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Mesazhet nga Kontakti</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Emri dhe Mbiemri</th>
        <th>Email</th>
        <th>Subjekti</th>
        <th>Mesazhi</th>
    </tr>
    <?php foreach($messages as $m): ?>
    <tr>
        <td><?= htmlspecialchars($m['kontakti_id']) ?></td>
        <td><?= htmlspecialchars($m['emri_mbiemri']) ?></td>
        <td><?= htmlspecialchars($m['email']) ?></td>
        <td><?= htmlspecialchars($m['subjekti']) ?></td>
        <td><?= htmlspecialchars($m['mesazhi']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
