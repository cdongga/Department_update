<?php
session_start();
require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = $_POST["name"];
        $category_id = $_POST["category_id"];
        $price = $_POST["price"];
        $stock_quantity = $_POST["stock_quantity"];
        $description = $_POST["description"];
        $image = $_POST["image"]; 

        $sql = "INSERT INTO products (name, category_id, price, stock_quantity, description, image) 
                VALUES (:name, :category_id, :price, :stock_quantity, :description, :image)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock_quantity', $stock_quantity, PDO::PARAM_INT);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);

        if ($stmt->execute()) {
            echo "Product added successfully!";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../CSS/admin.css">

</head>
<body>
    <h2>Add New Product</h2>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" name="category_id" placeholder="Category ID" required>
        <input type="number" step="0.01" name="price" placeholder="Price (€)" required>
        <input type="number" name="stock_quantity" placeholder="Stock Quantity" required>
        <input type="text" name="image" placeholder="Image Filename (e.g., product.jpg)" required>
        <textarea name="description" placeholder="Product Description"></textarea>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
