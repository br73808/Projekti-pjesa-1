<?php
session_start();

require_once 'cart.php';
require_once 'order.php';
require_once 'header.php';

$cart = new Cart();
$order = new Order();
$success = $error = "";

if(isset($_POST['remove'])){
    $cart->remove($_POST['produkt_id']);
    header("Location: shporta.php");
    exit;
}

if(isset($_POST['checkout'])){
    if(!isset($_SESSION['user_id'])){
        $error = "Ju duhet të jeni të loguar për të vazhduar pagesën.";
    } else {
        $userId = $_SESSION['user_id'];
        $porosi_id = $order->saveOrder($userId, $cart->getItems());

        if($porosi_id){
            
            foreach(array_keys($cart->getItems()) as $pid){
                $cart->remove($pid);
            }
            $success = "Porosia u krye me sukses! ID: " . $porosi_id;
        } else {
            $error = "Ka ndodhur një gabim gjatë ruajtjes së porosisë.";
        }
    }
}
?>

<section class="shporta-section">
    <h2>Shporta ime</h2>

    <div class="shporta-container">

        <?php if(!$cart->isEmpty()): ?>
            <?php foreach($cart->getItems() as $id => $item): 
                $subtotal = $item['cmimi'] * $item['qty'];
            ?>
                <div class="shporta-item">
                    <img src="../photos/<?= htmlspecialchars($item['foto']); ?>" alt="<?= htmlspecialchars($item['emri']); ?>">

                    <div>
                        <h4><?= htmlspecialchars($item['emri']); ?></h4>
                        <p><?= $item['cmimi']; ?> € × <?= $item['qty']; ?></p>
                        <strong><?= $subtotal; ?> €</strong>
                    </div>

                    <form method="POST">
                        <input type="hidden" name="produkt_id" value="<?= $id; ?>">
                        <button type="submit" name="remove" class="remove">✖</button>
                    </form>
                </div>
            <?php endforeach; ?>

            <div class="shporta-total">
                <h3>Totali: <?= $cart->getTotal(); ?> €</h3>
                <form method="POST">
                    <button type="submit" name="checkout" class="checkout">Vazhdo Pagesën</button>
                </form>
            </div>

        <?php else: ?>
            <p>Shporta është bosh 🛒</p>
        <?php endif; ?>

        <?php if($success) echo "<p class='success'>$success</p>"; ?>
        <?php if($error) echo "<p class='error'>$error</p>"; ?>

    </div>
</section>

<?php require_once 'footer.php'; ?>
</body>
</html>