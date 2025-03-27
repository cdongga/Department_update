<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Shopaholics</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/search_results.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <!-- HEADER & NAVIGATION -->
    <header>
        <h3 class="promo"> USE CODE [NEW2025] FOR EXTRA UP TO 20% SKINCARE PRODUCTS </h3>
    </header>
    
    <!-- NAVIGATION MENU WITH SEARCH BAR -->
    <nav>
        <div class="logo">
            <h1><a href="index.php">SHOPAHOLICS</a></h1>
        </div>
        
        <ul class="nav-menu">
            <?php
            $menu_items = [
                "Home Page" => "index.php",
                "Home" => "homeStore.php",
                "Technology" => "technology.php",
                "Skincare" => "skincare.php",
                "Makeup" => "makeup.php"
            ];
            foreach ($menu_items as $name => $link) {
                echo "<li><a href='" . htmlspecialchars($link) . "'>" . htmlspecialchars($name) . "</a></li>";
            }
            ?>
        </ul>

        <div class="nav-right">
            <form action="search_results.php" method="get" class="search-bar">
                <input type="text" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" required>
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

            <div class="header-icons">
                <div class="country-selector">
                    <img src="IMG/eu-flag.png" alt="EU Flag">
                </div>
                <a href="signup_login.php">
                    <i class="fas fa-user"></i>
                </a>
                <i class="fas fa-heart"></i>
                <div class="cart-dropdown">
                    <div class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </div>
                    <div class="cart-content">
                        <p class="empty-cart">Your cart is empty.</p>
                        <ul id="cart-items"></ul>
                        <a href="checkout.php" class="checkout-btn">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- SEARCH RESULTS SECTION -->
    <div class="search-results-container">
        <?php
        include 'db_connect.php';
        
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $searchParam = "%$searchTerm%";
            
            echo "<h1>Search Results for '" . htmlspecialchars($searchTerm) . "'</h1>";
            
            $sql = "SELECT * FROM products 
                    WHERE name LIKE ? OR description LIKE ?
                    ORDER BY category_id, name";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $searchParam, $searchParam);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<div class='product-grid'>";
                while ($row = $result->fetch_assoc()) {
                    $category = '';
                    switch($row['category_id']) {
                        case 1: $category = 'Technology'; break;
                        case 2: $category = 'Skincare'; break;
                        case 3: $category = 'Makeup'; break;
                        case 4: $category = 'Home'; break;
                        default: $category = 'Other';
                    }
                    
                    echo "<div class='product-card'>";
                    echo "<div class='product-image'>";
                    echo "<img src='IMG/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
                    echo "<i class='fa-regular fa-heart wishlist-icon'></i>";
                    echo "</div>";
                    echo "<div class='product-details'>";
                    echo "<p class='product-category'>$category</p>";
                    echo "<h3 class='product-title'>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p class='product-price'>€" . htmlspecialchars($row['price']) . "</p>";
                    echo "<button class='add-to-bag' data-product-id='" . htmlspecialchars($row['product_id']) . "'>ADD TO BAG</button>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p class='no-results'>No products found matching your search.</p>";
                echo "<p>Try different keywords or browse our <a href='index.php'>categories</a>.</p>";
            }
        } else {
            header("Location: index.php");
            exit();
        }
        ?>
    </div>
    
    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Shopaholics - Your go-to store for tech, skincare, and more.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="technology.php">Technology</a></li>
                    <li><a href="skincare.php">Skincare</a></li>
                    <li><a href="makeup.php">Makeup</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Meet your Owners</h3>
                <p>Cheryl Donga</p>
                <p>Mireille Aka</p>
                <p>Vivien Obi</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>
        <p class="footer-bottom">&copy; 2025 Shopaholics. All rights reserved.</p>
    </footer>
    <script src="JS/cart.js"></script>
</body>
</html>