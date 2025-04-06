<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['review_error'] = "You must be logged in to submit a review";
        header("Location: homeStore.php?product_id=" . intval($_POST['product_id']) . "#reviews");
        exit();
    }

    $product_id = intval($_POST['product_id']);
    $reviewer_name = htmlspecialchars(trim($_POST['reviewer_name']));
    $rating = intval($_POST['rating']);
    $review_text = htmlspecialchars(trim($_POST['review_text']));
    $user_ID = $_SESSION['user_id'];

    // Validate input
    if ($rating < 1 || $rating > 5) {
        $_SESSION['review_error'] = "Please select a valid rating (1-5 stars)";
        header("Location: homeStore.php?product_id=$product_id#reviews");
        exit();
    }

    if (empty($review_text)) {
        $_SESSION['review_error'] = "Please write your review";
        header("Location: homeStore.php?product_id=$product_id#reviews");
        exit();
    }

    // Insert review
    $sql = "INSERT INTO reviews (user_ID, reviewer_name, product_id, rating, review_text) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("isiss", $user_ID, $reviewer_name, $product_id, $rating, $review_text);

    if ($stmt->execute()) {
        $_SESSION['review_success'] = "Thank you for your review!";
    } else {
        $_SESSION['review_error'] = "Error submitting review. Please try again.";
    }

    header("Location: homeStore.php?product_id=$product_id#reviews");
    exit();
} else {
    header("Location: homeStore.php");
    exit();
}