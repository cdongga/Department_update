<?php
session_start();
require '../db_connect.php';

if (!isset($_GET["id"])) {
    die("Product ID is missing.");
}

$product_id = $_GET["id"];
$sql = "DELETE FROM products WHERE product_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);

if ($stmt->execute()) {
    header("Location: view_products.php");
    exit();
} else {
    echo "Error deleting product.";
}
?>
