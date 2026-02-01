<?php
require_once 'database.php';

class Order {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function saveOrder($userId, $cart) {
        if(empty($cart)) return false;

     
        $total = 0;
        foreach($cart as $item){
            $total += $item['cmimi'] * $item['qty'];
        }

        try {
        
            $this->conn->beginTransaction();

           
            $stmt = $this->conn->prepare("
                INSERT INTO porosi (user_id, total) 
                VALUES (:user_id, :total)
            ");
            $stmt->execute([
                ':user_id' => $userId,
                ':total' => $total
            ]);

            $porosi_id = $this->conn->lastInsertId();

            $stmtItem = $this->conn->prepare("
                INSERT INTO porosi_items 
                (porosi_id, produkt_id, emri, cmimi, qty, subtotal, foto) 
                VALUES (:porosi_id, :produkt_id, :emri, :cmimi, :qty, :subtotal, :foto)
            ");

            foreach($cart as $produkt_id => $item){
                $subtotal = $item['cmimi'] * $item['qty'];
                $stmtItem->execute([
                    ':porosi_id' => $porosi_id,
                    ':produkt_id' => $produkt_id,
                    ':emri' => $item['emri'],
                    ':cmimi' => $item['cmimi'],
                    ':qty' => $item['qty'],
                    ':subtotal' => $subtotal,
                    ':foto' => $item['foto']
                ]);
            }

            $this->conn->commit();

            return $porosi_id;

        } catch(PDOException $e) {
           
            $this->conn->rollBack();
            return false;
        }
    }
}
?>
