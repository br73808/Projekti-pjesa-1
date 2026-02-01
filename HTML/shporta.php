<?php
session_start();
require_once 'header.php';

if(isset($_POST['remove'])){
    $id = $_POST['produkt_id'];
    unset($_SESSION['cart'][$id]);
    header("Location: shporta.php");
    exit;
}

$total = 0;
?>

<section class="shporta-section">
    <h2>Shporta ime</h2>

    <div class="shporta-container">

        <?php if(!empty($_SESSION['cart'])): ?>

            <?php foreach($_SESSION['cart'] as $id => $item): 
                $subtotal = $item['cmimi'] * $item['qty'];
                $total += $subtotal;
            ?>
                <div class="shporta-item">
                    <img src="../photos/<?= htmlspecialchars($item['foto']); ?>" alt="<?= htmlspecialchars($item['emri']); ?>">

                    <div>
                        <h4><?= htmlspecialchars($item['emri']); ?></h4>
                        <p>
                            <?= $item['cmimi']; ?> € × <?= $item['qty']; ?>
                        </p>
                        <strong><?= $subtotal; ?> €</strong>
                    </div>

                    <form method="POST">
                        <input type="hidden" name="produkt_id" value="<?= $id; ?>">
                        <button type="submit" name="remove" class="remove">✖</button>
                    </form>
                </div>
            <?php endforeach; ?>

            <div class="shporta-total">
                <h3>Totali: <?= $total; ?> €</h3>
                <button class="checkout">Vazhdo Pagesën</button>
            </div>

        <?php else: ?>
            <p>Shporta është bosh 🛒</p>
        <?php endif; ?>

    </div>
</section>

<?php require_once 'footer.php'; ?>
</body>
</html>
