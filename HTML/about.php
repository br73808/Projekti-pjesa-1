<?php
require_once 'database.php';
require_once 'header.php';

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT * FROM about_content ORDER BY id ASC");
$stmt->execute();
$aboutItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="about-section">
    <div class="about-container">
        <?php foreach($aboutItems as $item): ?>
        <div class="about-text">
            <h2><?= htmlspecialchars($item['title']) ?></h2>
            <p><?= nl2br(htmlspecialchars($item['content'])) ?></p>
        </div>
        <?php if(!empty($item['image'])): ?>
        <div class="about-img">
            <img src="../photos/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="values-container">
    <div class="values-box">
        <i class="fa-solid fa-bullseye"></i>
        <h3>Misioni</h3>
        <p>Ofrojmë produkte sigurie moderne dhe të besueshme për çdo klient.</p>
    </div>
    <div class="values-box">
        <i class="fa-solid fa-eye"></i>
        <h3>Vizioni</h3>
        <p>Të jemi lider në tregun e sigurisë dhe teknologjisë intelegjente.</p>
    </div>
    <div class="values-box">
        <h3>Besimi</h3>
        <p>Ndërtojmë marrëdhënie afatgjata me klientët tanë.</p>
    </div>
</section>

<section class="patnerët-section">
    <h2>Patnerët Tanë</h2>
    <p>Ne bashkëpunojmë me kompani të besueshme dhe lider në teknologji</p>

    <div class="patnerët-container">
        <div class="partner"><img src="../photos/HikVision_1.jpg" alt="Patner 1"></div>
        <div class="partner"><img src="../photos/images.png" alt="Patner 2"></div>
        <div class="partner"><img src="../photos/images 88.png" alt="Patner 3"></div>
        <div class="partner"><img src="../photos/images (666).jpg" alt="Patner 4"></div>
    </div>
</section>

<?php
require_once 'footer.php';
?>