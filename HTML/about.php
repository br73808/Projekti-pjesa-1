<?php
require_once 'database.php';
require_once 'header.php';

$db = new Database();
$conn = $db->getConnection();


$stmtAbout = $conn->prepare("SELECT * FROM about_content ORDER BY id ASC");
$stmtAbout->execute();
$aboutItems = $stmtAbout->fetchAll(PDO::FETCH_ASSOC);


$stmtValues = $conn->prepare("SELECT * FROM about_values ORDER BY id ASC");
$stmtValues->execute();
$valuesItems = $stmtValues->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="about-section">
    <div class="about-container">
        <?php foreach($aboutItems as $item): ?>
        <div class="about-text">
            <h2><?= htmlspecialchars($item['title']) ?></h2>
            <p><?= nl2br(htmlspecialchars($item['content'])) ?></p>

            <?php if(!empty($item['features'])): ?>
            <div class="aboutt">
                <?php 
                $features = explode(",", $item['features']); 
                foreach($features as $feature): ?>
                    <div><i class="fa-solid fa-check"></i> <?= htmlspecialchars(trim($feature)) ?></div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
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
    <?php foreach($valuesItems as $value): ?>
    <div class="values-box">
        <?php if(!empty($value['icon_class'])): ?>
            <i class="<?= htmlspecialchars($value['icon_class']) ?>"></i>
        <?php elseif(!empty($value['image'])): ?>
            <img src="../photos/<?= htmlspecialchars($value['image']) ?>" alt="<?= htmlspecialchars($value['title']) ?>">
        <?php endif; ?>
        <h3><?= htmlspecialchars($value['title']) ?></h3>
        <p><?= htmlspecialchars($value['description']) ?></p>
    </div>
    <?php endforeach; ?>
</section>

<section class="patnerët-section">
    <h2>Patnerët Tanë</h2>
    <p>Ne bashkëpunojmë me kompani të besueshme dhe lider në teknologji</p>

    <div class="patnerët-container">
        <?php
        $partners = [
            ['image'=>'HikVision_1.jpg','alt'=>'Patner 1'],
            ['image'=>'images.png','alt'=>'Patner 2'],
            ['image'=>'images 88.png','alt'=>'Patner 3'],
            ['image'=>'images (666.jpg','alt'=>'Patner 4']
        ];
        foreach($partners as $p): ?>
        <div class="partner">
            <img src="../photos/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['alt']) ?>">
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
require_once 'footer.php';
?>
