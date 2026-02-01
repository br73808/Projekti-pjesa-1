<?php
session_start();

if(isset($_POST['produkt_id'])){
    $id = $_POST['produkt_id'];
    unset($_SESSION['cart'][$id]);
}

header("Location: shporta.php");
exit;
