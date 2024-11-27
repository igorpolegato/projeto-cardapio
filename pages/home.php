<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="/static/css/global.css">
    <link rel="stylesheet" href="/static/css/home.css">
</head>
<body>
    <?php include '../templates/header.php' ?>
    <main class="product-section">
        <?php
            include '../utils/database.php';
            $db = new Database();
            $categories = $db -> get_categories();

            foreach ($categories as $cat):
        ?>
            <?php
            $products = $db->get_products_by_cat($cat['id']);
            ?>
            <div class="category">
                <h2 class="category-title"><?= htmlspecialchars($cat['nome']); ?></h2>
                <div class="product-list">
                    <?php while ($pd = $products -> fetch_assoc()): ?>
                        <div class="product-item">
                            <a href="/pages/produto.php?pd=<?= $pd['id'] ?>">
                                <img src="<?= htmlspecialchars('/static/imgs/' . $pd['imagem']); ?>"
                                    alt="<?= htmlspecialchars($pd['nome']); ?>"
                                    class="product-image">
                            </a>
                                <div class="product-info">
                                <a href="/pages/produto.php?<?= $pd['id'] ?>">
                                    <h3 class="product-name"><?= htmlspecialchars($pd['nome']); ?></h3>
                                    <p class="product-price">R$ <?= number_format($pd['preco'], 2, ',', '.'); ?></p>
                                </a>
                                </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
    <script>


    </script>
</body>
</html>
