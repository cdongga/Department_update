<?php
session_start();
require '../db_connect.php';

if (!isset($_GET["id"])) {
    die("Product ID not provided.");
}

$product_id = $_GET["id"];
$sql = "SELECT * FROM products WHERE product_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $category_id = $_POST["category_id"];
    $price = $_POST["price"];
    $stock_quantity = $_POST["stock_quantity"];
    $description = $_POST["description"];

    $sql = "UPDATE products SET name=?, category_id=?, price=?, stock_quantity=?, description=? WHERE product_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sidisi", $name, $category_id, $price, $stock_quantity, $description, $product_id);

    if ($stmt->execute()) {
        header("Location: view_products.php");
        exit();
    } else {
        echo "Error updating product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="../CSS/admin.css">

</head>
<body>
    <h2>Edit Product</h2>
    <form action="" method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        <input type="number" name="category_id" value="<?= htmlspecialchars($product['category_id']) ?>" required>
        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
        <input type="number" name="stock_quantity" value="<?= htmlspecialchars($product['stock_quantity']) ?>" required>
        <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea>
        <button type="submit">Update</button>
    </form>
</body>
</html>
