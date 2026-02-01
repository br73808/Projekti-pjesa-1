<?php
require_once 'header.php';
require_once 'database.php';

$db = new Database();
$conn = $db->getConnection();

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dergo'])) {

    $emri    = trim($_POST['emri'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $mesazhi = trim($_POST['mesazhi'] ?? '');

    /* ===== VALIDIM BACK-END ===== */
    if (empty($emri) || empty($email) || empty($subject) || empty($mesazhi)) {
        $error = "Ju lutem plotësoni të gjitha fushat.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email nuk është valid.";
    } else {

        /* ===== INSERT NË DB ===== */
        $sql = "INSERT INTO kontakti (emri_mbiemri, email, subjekti, mesazhi)
                VALUES (:emri, :email, :subject, :mesazhi)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':emri'    => $emri,
            ':email'   => $email,
            ':subject' => $subject,
            ':mesazhi' => $mesazhi
        ]);

        $success = "Mesazhi u dërgua me sukses!";
    }
}
?>

<section class="kontakt-section">
    <h2>Na Kontaktoni</h2>
    <p>Na shkruani dhe do t'ju përgjigjemi sa më shpejt</p>

    <div class="kontakt-container">
        <form method="POST" class="kontakt-form">

            <?php if ($error): ?>
                <div class="form-error"><?= htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="form-success"><?= htmlspecialchars($success); ?></div>
            <?php endif; ?>

            <input 
                type="text" 
                name="emri" 
                placeholder="Emri dhe Mbiemri"
                value="<?= htmlspecialchars($emri ?? '') ?>">

            <input 
                type="email" 
                name="email" 
                placeholder="Email"
                value="<?= htmlspecialchars($email ?? '') ?>">

            <input 
                type="text" 
                name="subject" 
                placeholder="Subjekti"
                value="<?= htmlspecialchars($subject ?? '') ?>">

            <textarea 
                name="mesazhi" 
                placeholder="Mesazhi juaj..." 
                rows="5"><?= htmlspecialchars($mesazhi ?? '') ?></textarea>

            <button type="submit" name="dergo">Dërgo Mesazhin</button>
        </form>

        <div class="kontakt-info">
            <h3>Informacionet tona</h3>
            <p>📧 info@elektrohome.com</p>
            <p>📞 +383 44 000 800</p>
            <p>📍 Str. Adem Jashari, Ferizaj, Kosovë</p>
        </div>
    </div>
</section>

<?php require_once 'footer.php'; ?>
