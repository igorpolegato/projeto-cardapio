<?php
    include '../utils/database.php';
    $db = new Database();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();

        $user_id = $_SESSION['user_id'];
        $pedido_id = $_POST['pedido_id'];

        $db ->  delete_cart($pedido_id);

    }
?>
