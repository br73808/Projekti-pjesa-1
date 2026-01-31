<?php
require_once 'header.php';
require_once 'database.php';

$db = new Database();
$conn = $db->getConnection();


$success = "";

if(isset($_POST['dergo'])){
    $emri = $_POST['emri'];          
    $email = $_POST['email'];
    $subject = $_POST['subject'];    
    $mesazhi = $_POST['mesazhi'];

   
    $sql = "INSERT INTO kontakti (emri_mbiemri, email, subjekti, mesazhi) 
            VALUES (:emri, :email, :subject, :mesazhi)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':emri' => $emri,
        ':email' => $email,
        ':subject' => $subject,
        ':mesazhi' => $mesazhi
    ]);

    $success = "Mesazhi u dërgua me sukses!";
}
?>

<section class="kontakt-section">
    <h2>Na Kontaktoni</h2>
    <p>Na shkruani dhe do t'ju përgjigjemi sa më shpejt</p>

    <div class="kontakt-container">
        <form method="POST" class="kontakt-form">
            <input type="text" name="emri" placeholder="Emri dhe Mbiemri">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="subject" placeholder="Subjekti">
            <textarea name="mesazhi" placeholder="Mesazhi juaj..." rows="5"></textarea>

            <button type="submit" name="dergo">Dërgo Mesazhin</button>
            <?php if($success): ?>
                <p class="success"><?= $success ?></p>
            <?php endif; ?>
        </form>

        <div class="kontakt-info">
            <h3>Informacionet tona</h3>
            <p><i class="fa-solid fa-envelope"></i> info@elektrohome.com</p>
            <p><i class="fa-solid fa-phone"></i> +383 44 000 800</p>
            <p><i class="fa-solid fa-location-dot"></i> Str.Adem Jashari, Ferizaj, Kosovë</p>
        </div>
    </div>
</section>

<?php
require_once 'footer.php';
?>
