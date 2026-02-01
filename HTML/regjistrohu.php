<?php
require_once "database.php";
require_once "user.php";

$error = "";
$emri = $mbiemri = $email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $emri     = trim($_POST['emri'] ?? '');
    $mbiemri  = trim($_POST['mbiemri'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($emri) || empty($mbiemri) || empty($email) || empty($password)) {
        $error = "Ju lutem plotësoni të gjitha fushat.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Ju lutem shkruani një email valid.";
    }
    elseif (strlen($password) < 6) {
        $error = "Password duhet të ketë të paktën 6 karaktere.";
    }
    else {
        try {
            $db = new Database();
            $conn = $db->getConnection();

            $user = new User($conn);

            if ($user->register($emri, $mbiemri, $email, $password, 0)) {
                header("Location: login.php?registered=success");
                exit;
            } else {
                $error = "Ky email ekziston tashmë.";
            }

        } catch (PDOException $e) {
            $error = "Gabim në server. Provoni më vonë.";
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
    <form method="POST" novalidate class="regjister-form">
        <h2>Regjistrohu</h2>

        <label>Emri</label>
        <input type="text" name="emri" class="input" required
               value="<?= htmlspecialchars($emri) ?>">

        <label>Mbiemri</label>
        <input type="text" name="mbiemri" class="input" required
               value="<?= htmlspecialchars($mbiemri) ?>">

        <label>Email</label>
        <input type="email" name="email" class="input" required
               value="<?= htmlspecialchars($email) ?>">

        <label>Password</label>
        <input type="password" name="password" class="input" required>

        <button type="submit" id="buttoni">Regjistrohu</button>

        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

    </form>
</div>

</body>
</html>
