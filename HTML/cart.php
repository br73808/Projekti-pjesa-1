<?php

class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }


    public function add($produkt) {
        $id = $produkt['produkt_id'];
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty']++;
        } else {
            $_SESSION['cart'][$id] = [
                'emri'  => $produkt['emri'],
                'cmimi' => $produkt['cmimi'],
                'qty'   => 1,
                'foto'  => $produkt['foto']
            ];
        }
    }


    public function remove($produktId) {
        if(isset($_SESSION['cart'][$produktId])) {
            unset($_SESSION['cart'][$produktId]);
        }
    }

    public function getItems() {
        return $_SESSION['cart'];
    }

    public function getTotal() {
        $total = 0;
        foreach($_SESSION['cart'] as $item) {
            $total += $item['cmimi'] * $item['qty'];
        }
        return $total;
    }

    public function isEmpty() {
        return empty($_SESSION['cart']);
    }
}
?>
