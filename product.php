<?php
include 'db_connect.php';
include 'Productclass.php';

$product = new Product($conn);
$products = $product->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <header>
        <h1>Shopaholics Products</h1>
    </header>

    <div class="product-container">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $row): ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="IMG/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                    </div>
                    <div class="product-details">
                        <h3><?= htmlspecialchars($row['name']) ?></h3>
                        <p>€<?= htmlspecialchars($row['price']) ?></p>
                        <p><?= htmlspecialchars($row['description']) ?></p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
