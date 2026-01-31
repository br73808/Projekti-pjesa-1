<?php
session_start();
require_once 'database.php';

/* ================== KLASA PRODUCT (OOP) ================== */
class Product {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getAllProducts(){
        $sql = "SELECT * FROM produkte";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id){
        $sql = "SELECT * FROM produkte WHERE produkt_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

/* ================== DB ================== */
$db = new Database();
$conn = $db->getConnection();
$productObj = new Product($conn);

/* ================== SHPORTA (SESSION) ================== */
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_POST['shto_shporte'])){
    $produkt_id = $_POST['produkt_id'];
    $produkt = $productObj->getProductById($produkt_id);

    if($produkt){
        if(isset($_SESSION['cart'][$produkt_id])){
            $_SESSION['cart'][$produkt_id]['qty']++;
        } else {
            $_SESSION['cart'][$produkt_id] = [
                'emri' => $produkt['emri'],
                'cmimi' => $produkt['cmimi'],
                'qty'   => 1
            ];
        }
    }
    header("Location: produktet.php");
    exit;
}

/* ================== PRODUKTET ================== */
$produkte = $productObj->getAllProducts();
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Produktet</title>
    <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>

<?php require_once 'header.php'; ?>

<section class="produktet-section">
    <h2>Produktet tona</h2>

    <div class="produktet-container">
        <?php if(count($produkte) > 0): ?>
            <?php foreach($produkte as $p): ?>
                <div class="produktet-card">
                    <!-- 📌 PATH I RREGULLUAR I FOTOS -->
                    <img src="../photos/<?= htmlspecialchars($p['foto']); ?>" alt="<?= htmlspecialchars($p['emri']); ?>">

                    <h3><?= htmlspecialchars($p['emri']); ?></h3>
                    <p><?= htmlspecialchars($p['pershkrimi']); ?></p>
                    <span><?= htmlspecialchars($p['cmimi']); ?> €</span>

                    <form method="POST">
                        <input type="hidden" name="produkt_id" value="<?= $p['produkt_id']; ?>">
                        <button type="submit" name="shto_shporte">Shto në shportë</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nuk ka produkte për momentin.</p>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'footer.php'; ?>

</body>
</html>
