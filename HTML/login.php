<?php
session_start();
require_once "database.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Plotësoni email dhe password.";
    } else {
        $db = new Database();
        $conn = $db->getConnection();

        $sql = "SELECT user_id, password, isAdmin FROM user WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['isAdmin'] = $user['isAdmin'];

            if ((int)$user['isAdmin'] === 1) {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit;
        } else {
            $error = "Email ose password i pasaktë.";
        }
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
        <p style="color: green; text-align:center;">
            Regjistrimi u krye me sukses! Kyçu tani ✅
        </p>
    <?php endif; ?>

    
    <?php if (!empty($error)): ?>
        <p class="error" style="text-align:center;"><?= $error ?></p>
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
