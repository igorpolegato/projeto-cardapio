<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/global.css">
    <link rel="stylesheet" href="/static/css/carrinho.css">
    <title>Carrinho</title>
</head>
<body>
    <?php include '../templates/header.php' ?>
    <main class="cart-page">
    <?php
        include '../utils/database.php';
        session_start();
        $db = new Database();
        $total = 0;

        $products = $db->get_cart_products($_SESSION['user_id']);
    ?>
        <div class="cart-container">
        <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
        <div class="cart-item">
            <img src="/static/imgs/<?php echo $product['imagem']; ?>" alt="<?php echo $product['nome']; ?>" class="cart-item-image">
            <div class="cart-item-details">
                <h2 class="cart-item-title"><?php echo $product['nome']; ?></h2>
                <p class="cart-item-price">R$ <?php echo number_format($product['preco'], 2, ',', '.'); ?></p>
            </div>
            <div class="cart-item-actions">
                <input type="number" class="item-quantity" value="<?php echo $product['quantidade']; ?>" min="1">
                <button class="btn-remove" data-id="<?php echo $product['id']; ?>">Remover</button>
            </div>
        </div>
        <?php
            $total += $product['preco'] * $product['quantidade'];
        ?>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Seu carrinho está vazio.</p>
        <?php endif; ?>
            <div class="cart-summary">
                <p>Total: <span><?= number_format($total, 2, ',', '.') ?></span></p>
                <div class="total-price">
                </div>
                <button class="btn-conclude-order">Concluir Pedido</button>
            </div>
        </div>
    </main>
    <script src="/static/js/novo_pedido.js"></script>
    <script src="/static/js/remover_pedido.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var btns = document.getElementsByClassName('btn-remove');

    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', function(event) {
            var productId = event.target.getAttribute('data-id');
            var cartItem = event.target.closest('.cart-item')

            removerPedido(productId);
            cartItem.remove();
        });
    }});

    </script>
</body>
</html>
