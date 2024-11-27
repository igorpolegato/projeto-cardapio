<!DOCTYPE html>
<html lang="pt-BR">
<?php
    include '../utils/error.php';

    $id = isset($_GET['pd']) ? intval($_GET['pd']) : null;
    if ($id === null) {
        error404();
    }

    else {
        include '../utils/database.php';
        $db = new Database();

        $product = $db -> get_product($id);

        if ($product === null) {
            error404();
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <link rel="stylesheet" href="/static/css/global.css">
    <link rel="stylesheet" href="/static/css/produto.css">
</head>
<body>
    <?php include '../templates/header.php' ?>
    <main class="product-page">
        <div class="product-container">
            <div class="product-image">
                <img src="/static/imgs/<?= htmlspecialchars($product['imagem']) ?>" alt="Produto">
            </div>
            <div class="product-details">
                <h1 class="product-title"><?= htmlspecialchars($product['nome']) ?></h1>
                <p class="product-description">
                    Delicioso arroz temperado coberto com uma fatia de salmão fresco, feito com os melhores ingredientes.
                </p>
                <p class="product-price">R$ <?= number_format($product['preco'], 2, ',', '.'); ?></p>
                <div class="product-quantity">
                    <label for="quantity">Quantidade:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                </div>
                <button class="btn add-to-cart" id="addBtn" >Adicionar ao Carrinho</button>

            </div>
        </div>
    </main>
    <script src="/static/js/novo_pedido.js"></script>
    <script>
        const btn = document.getElementById("addBtn");

        btn.addEventListener("click", function() {
            var qnt = document.getElementById("quantity").value;
            console.log(qnt)
            
            console.log("<?= $product['id'] ?>")
            novoPedido("<?= $product['id'] ?>", qnt);
        })
    </script>
</body>
</html>
