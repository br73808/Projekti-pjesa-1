<?php
session_start();

require_once "database.php";
require_once "../classes/Auth.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $db = new Database();
    $conn = $db->getConnection();

    $auth = new Auth($conn);
    $result = $auth->login($email, $password);

    if ($result['success']) {
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['isAdmin'] = $result['isAdmin'];

        if ((int)$result['isAdmin'] === 1) {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $error = $result['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kyçu</title>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>

<?php require_once "header.php"; ?>

<div class="card">
    <h2>Kyçu</h2>

    <?php if (isset($_GET['registered'])): ?>
        <p class="success">
            Regjistrimi u krye me sukses! Kyçu tani ✅
        </p>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" novalidate>
        <label>Email</label>
        <input type="email" name="email" class="input" required>

        <label>Password</label>
        <input type="password" name="password" class="input" required>

        <button type="submit">Login</button>

        <p style="text-align:center; margin-top:10px;">
            Nuk ke llogari? <a href="regjistrohu.php">Regjistrohu</a>
        </p>
    </form>
</div>

</body>
</html>
