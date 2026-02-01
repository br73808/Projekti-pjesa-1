<?php
require_once "database.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $emri = trim($_POST['emri']);
    $mbiemri = trim($_POST['mbiemri']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($emri) || empty($mbiemri) || empty($email) || empty($password)) {
        $error = "Ju lutem plotësoni të gjitha fushat.";
    } else {
        try {
            $db = new Database();
            $conn = $db->getConnection();

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (emri, mbiemri, email, password, isAdmin)
                    VALUES (:emri, :mbiemri, :email, :password, 0)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':emri' => $emri,
                ':mbiemri' => $mbiemri,
                ':email' => $email,
                ':password' => $hashedPassword
            ]);

          
            header("Location: login.php?registered=success");
            exit;

        } catch (PDOException $e) {
            $error = "Email ekziston ose gabim në regjistrim.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regjistrohu</title>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>

<div class="regjistrohu-container">
    <form method="POST" novalidate>
        <h2>Regjistrohu</h2>

        <label>Emri</label>
        <input type="text" name="emri" class="input" required>

        <label>Mbiemri</label>
        <input type="text" name="mbiemri" class="input" required>

        <label>Email</label>
        <input type="email" name="email" class="input" required>

        <label>Password</label>
        <input type="password" name="password" class="input" required>

        <input type="submit" value="Regjistrohu" class="input">

        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
