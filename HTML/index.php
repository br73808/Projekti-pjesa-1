<?php
require_once 'database.php';
$db = new Database();
$conn = $db->getConnection();


$stmtWhy = $conn->prepare("SELECT * FROM home_content WHERE section = 'why'");
$stmtWhy->execute();
$whyItems = $stmtWhy->fetchAll(PDO::FETCH_ASSOC);


$stmtProducts = $conn->prepare("SELECT * FROM produkte ORDER BY produkt_id DESC LIMIT 4");
$stmtProducts->execute();
$produkte = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

require_once 'header.php';
?>


<section class="slider">
    <div class="slide active">
        <img src="../photos/hikvision-box-bullet-fisheye-pan-tilt-zoom-dome-cameras-sm.jpg" alt="Kamera">
        <div class="slidee">
            <h1>Siguro shtëpinë tënde sot</h1>
            <p>Siguria më e mirë, çmimet më të mira</p>
            <a href="#" class="btn">Shiko Produktet</a>
        </div>
    </div>
    <div class="slide">
        <img src="../photos/55.jpg" alt="Kamera">
        <div class="slidee">
            <h1>Teknologji e avancuar</h1>
            <p>Kamera dhe pajisje për mbrojtje të plotë</p>
            <a href="#" class="btn">Shiko Produktet</a>
        </div>
    </div>
    <div class="slide">
        <img src="../photos/hikvision-CCTV.jpg" alt="Kamera">
        <div class="slidee">
            <h1>Mbështetje 24/7</h1>
            <p>Gjithmon në dispozicion për çdo pyetje</p>
            <a href="#" class="btn">Shiko Produktet</a>
        </div>
    </div>
    <button class="prev" onclick="prevSlide()"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="next" onclick="nextSlide()"><i class="fa-solid fa-chevron-right"></i></button>
</section>


<section class="elektro-card">
    <h2>Pse të zgjidhni ElektroHome</h2>
    <div class="pse-te-zgjedhim">
        <?php foreach($whyItems as $item): ?>
            <div class="pse">
                <h3><?= htmlspecialchars($item['title']); ?></h3>
                <p><?= htmlspecialchars($item['description']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<section class="produktet-slider">
    <h2>Produktet më të kërkuara</h2>
    <div class="produktett">
        <?php foreach($produkte as $p): ?>
            <div class="produktet-card">
                <img src="../photos/<?= htmlspecialchars($p['foto']); ?>" alt="<?= htmlspecialchars($p['emri']); ?>">
                <h3><?= htmlspecialchars($p['emri']); ?></h3>
                <p><?= htmlspecialchars($p['cmimi']); ?>€</p>
                <a href="produktet.php" class="prod-btn">Shiko</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
require_once 'footer.php';
?>
