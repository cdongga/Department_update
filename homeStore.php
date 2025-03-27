<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Products - Shopaholics</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/HomeStore.css">
    <link rel="stylesheet" href="CSS/cart.css">
    <link rel="stylesheet" href="CSS/reviews.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<?php
session_start();
include 'db_connect.php';
?>

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

        <form action="search.php" method="get" class="search-bar">
            <input type="text" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" required>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <div class="header-icons">
            <div class="country-selector">
                <img src="IMG/eu-flag.png" alt="EU Flag">
            </div>
            
            <!-- User Dropdown (keeping this as requested) -->
            <div class="user-dropdown">
                <i class="fas fa-user"></i>
                <div class="user-dropdown-content">
                    <div class="form-box" id="login-box">
                        <h2>Login</h2>
                        <form action="signup_login.php" method="post">
                            <?php if(isset($_SESSION['login_error'])): ?>
                                <p class="error"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
                            <?php endif; ?>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <button type="submit" name="login" class="auth-button">Login</button>
                        </form>
                        <p>Don't have an account? <a href="#" onclick="showSignup(); return false;">Sign Up</a></p>
                    </div>

                    <div class="form-box hidden" id="signup-box">
                        <h2>Sign Up</h2>
                        <form action="signup_login.php" method="post">
                            <?php if(isset($_SESSION['signup_error'])): ?>
                                <p class="error"><?php echo $_SESSION['signup_error']; unset($_SESSION['signup_error']); ?></p>
                            <?php endif; ?>
                            <?php if(isset($_SESSION['signup_success'])): ?>
                                <p class="success"><?php echo $_SESSION['signup_success']; unset($_SESSION['signup_success']); ?></p>
                            <?php endif; ?>
                            <input type="text" name="username" placeholder="Full Name" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="date" name="dob" placeholder="Date of Birth" required>
                            <button type="submit" name="signup" class="auth-button">Sign Up</button>
                        </form>
                        <p>Already have an account? <a href="#" onclick="showLogin(); return false;">Login</a></p>
                    </div>
                </div>
            </div>
            
            <i class="fas fa-heart"></i>
            
            <!-- Cart Dropdown -->
            <div class="cart-dropdown">
                <div class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
                </div>
                <div class="cart-content">
                    <p class="empty-cart">Your cart is empty.</p>
                    <ul id="cart-items"></ul>
                    <a href="checkout.php" class="checkout-btn">Checkout</a>
                </div>
            </div>
            
            <!-- Admin Icon -->
            <div class="admin-dropdown">
                <i class="fas fa-user-shield admin-icon" title="Admin Access"></i>
                <div class="admin-dropdown-content">
                    <?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
                        <p>Logged in as Admin</p>
                        <a href="CRUD/admin.php" class="admin-link">Dashboard</a>
                        <a href="CRUD/admin.php?logout" class="admin-link">Logout</a>
                    <?php else: ?>
                        <p>Admin Access</p>
                        <a href="CRUD/login.php" class="admin-link">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <img src="IMG/Homebanner.jpg" alt="Home Banner" class="banner-image">
    
    <!-- PRODUCT CONTAINER -->
    <div class="product-container">
        <?php
        // Check if search was performed
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $searchParam = "%$searchTerm%";
            
            $sql = "SELECT * FROM products 
                    WHERE name LIKE ? OR description LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $searchParam, $searchParam);
            $stmt->execute();
            $result = $stmt->get_result();
            
            echo "<h2 class='search-results-title'>Search Results for '" . htmlspecialchars($searchTerm) . "'</h2>";
        } else {
            $sql = "SELECT * FROM products WHERE category_id = 4";
            $result = $conn->query($sql);
        }

        if ($result->num_rows > 0) {
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
                echo "<p class='product-brand'>$category</p>";
                echo "<h3 class='product-title'>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p class='product-price'>€" . htmlspecialchars($row['price']) . "</p>";
                echo "<form action='cart.php' method='get' style='display:inline;'>";
                echo "<input type='hidden' name='add_to_cart' value='" . htmlspecialchars($row['product_id']) . "'>";
                echo "<button type='submit' class='add-to-bag'>ADD TO BAG</button>";
                echo "</form>";
                echo "<a href='homeStore.php?product_id=" . htmlspecialchars($row['product_id']) . "#reviews' class='view-reviews'>View Reviews</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            if (isset($_GET['search'])) {
                echo "<p class='no-results'>No products found matching your search.</p>";
            } else {
                echo "<p>No products found in this category.</p>";
            }
        }
        ?>
    </div>
    
    <!-- REVIEW SECTION (updated to not require login) -->
    <div class="review-section" id="reviews">
        <?php if(isset($_GET['product_id'])): ?>
            <h2>Product Reviews</h2>
            
            <?php if(isset($_SESSION['review_error'])): ?>
                <div class="error-message"><?php echo $_SESSION['review_error']; unset($_SESSION['review_error']); ?></div>
            <?php endif; ?>
            
            <?php if(isset($_SESSION['review_success'])): ?>
                <div class="success-message"><?php echo $_SESSION['review_success']; unset($_SESSION['review_success']); ?></div>
            <?php endif; ?>
            
            <div class="reviews-container">
                <?php
                $product_id = intval($_GET['product_id']);
                $review_sql = "SELECT r.*, COALESCE(u.username, r.reviewer_name) as display_name 
                              FROM reviews r 
                              LEFT JOIN users u ON r.user_ID = u.user_ID 
                              WHERE r.product_id = ? 
                              ORDER BY r.review_date DESC";
                $stmt = $conn->prepare($review_sql);
                $stmt->bind_param("i", $product_id);
                $stmt->execute();
                $reviews = $stmt->get_result();

                if ($reviews->num_rows > 0) {
                    while ($review = $reviews->fetch_assoc()) {
                        echo '<div class="review">';
                        echo '<h4>' . htmlspecialchars($review['display_name']) . '</h4>';
                        echo '<div class="rating-stars">';
                        for ($i = 1; $i <= 5; $i++) {
                            echo $i <= $review['rating'] ? '★' : '☆';
                        }
                        echo '</div>';
                        echo '<p>' . nl2br(htmlspecialchars($review['review_text'])) . '</p>';
                        echo '<small>' . date('M j, Y', strtotime($review['review_date'])) . '</small>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No reviews yet. Be the first to review!</p>';
                }
                ?>
            </div>

            <!-- Review Form (no login required) -->
            <div class="review-form">
                <h3>Write a Review</h3>
                <form action="submit_review.php" method="post">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($_GET['product_id']) ?>">
                    
                    <div class="form-group">
                        <label for="reviewer_name">Your Name:</label>
                        <input type="text" id="reviewer_name" name="reviewer_name" required>
                    </div>
                    
                    <div class="rating-input">
                        <label>Rating:</label>
                        <select name="rating" required>
                            <option value="">Select rating</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="review_text">Your Review:</label>
                        <textarea id="review_text" name="review_text" rows="4" required></textarea>
                    </div>
                    
                    <button type="submit" class="add-to-bag">Submit Review</button>
                </form>
            </div>
        <?php endif; ?>
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

    <script src="JS/auth.js"></script>
    <script src="JS/cart.js"></script>
</body>
</html>