<?php
session_start();
require 'db_connect.php'; // Ensure this file has the correct database connection

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["user_ID"];
            $_SESSION["username"] = $row["username"];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email or password!";
        }
    } else {
        $error = "Account not found.";
    }

    $stmt->close();
}

// Handle signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Validate input and prevent errors
    $username = trim($_POST["username"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');
    $dob = $_POST["dob"] ?? '';

    // Check if any field is empty
    if (empty($username) || empty($email) || empty($password) || empty($dob)) {
        $signup_error = "All fields are required!";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $signup_error = "Email already registered!";
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, dob) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $dob);

            if ($stmt->execute()) {
                $signup_success = "Registration successful!";
                header("Location: index.php"); // Redirect to login page after signup
                exit();
            } else {
                $signup_error = "Error: " . $stmt->error; // Debug SQL error
            }
        }

        $stmt->close();
    }
}
?>

