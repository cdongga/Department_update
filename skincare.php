<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Page</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/skincare.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<div>
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
            <li><a href="index.php">Home Page</a></li>
            <li class="dropdown">
                <a href="homeStore.php">Home</a>
                <ul class="dropdown-menu">
                    <li><a href="HOMEPAGES/kitchen.php">Kitchen</a></li>
                    <li><a href="HOMEPAGES/couches.php">Couches</a></li>
                    <li><a href="HOMEPAGES/bedding.php">Bedding</a></li>
                    <li><a href="HOMEPAGES/decor.php">Decor</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="technology.php">Technology</a>
                <ul class="dropdown-menu">
                    <li><a href="TECHNOLOGYPAGES/Phones.php">Phones</a></li>
                    <li><a href="TECHNOLOGYPAGES/Laptops.php">Laptops</a></li>
                    <li><a href="TECHNOLOGYPAGES/Smartwatches.php">Smart Watches</a></li>
                    <li><a href="TECHNOLOGYPAGES/Sound.php">Sound</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="skincare.php">Skincare</a>
                <ul class="dropdown-menu">
                    <li><a href="SKINCAREPAGES/Moisturisers.php">Moisturisers</a></li>
                    <li><a href="SKINCAREPAGES/serums.php">Serums</a></li>
                    <li><a href="SKINCAREPAGES/facemasks.php">Face Masks</a></li>
                    <li><a href="SKINCAREPAGES/facialwash.php">Facial Wash</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="makeup.php">Makeup</a>
                <ul class="dropdown-menu">
                    <li><a href="MAKEUPPAGES/Lipsticks.php">Lipsticks</a></li>
                    <li><a href="MAKEUPPAGES/lipglosses.php">Lipglosses</a></li>
                    <li><a href="MAKEUPPAGES/Foundation.php">Foundation</a></li>
                    <li><a href="MAKEUPPAGES/Eyeshadow.php">Eyeshadow</a></li>
                </ul>
            </li>
        </ul>

        <form action="search.php" method="get" class="search-bar">
            <input type="text" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" required>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <div class="header-icons">
            <div class="country-selector">
                <img src="IMG/eu-flag.png" alt="EU Flag">
            </div>
            
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
            
            <a href="wishlist.php" class="wishlist-icon"><i class="fas fa-heart"></i></a>
            
            <div class="cart-icon-container">
                <a href="cart.php" class="cart-icon-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">
                        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                    </span>
                </a>
            </div>
            
            <div class="admin-dropdown">
                <i class="fas fa-user-shield admin-icon" title="Admin Access"></i>
                <div class="admin-dropdown-content">
                    <?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
                        <p>Logged in as Admin</p>
                        <a href="CRUD/admin.php" class="admin-link">Dashboard</a><br>
                        <a href="CRUD/admin.php?logout" class="admin-link">Logout</a>
                    <?php else: ?>
                        <p>Admin Access</p>
                        <a href="CRUD/login.php" class="admin-link">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    
        <div class="banner">
        <img src="IMG/skincare_banner1.jpg" alt="Skincare Products" class="banner-image">
        <div class="text">
       
        </div>
        </div>
            
    <!-- PRODUCT CONTAINER -->
    <div class="product-container">
    <?php
include 'db_connect.php'; // Ensure database connection is included


$category_id = 2; 
$sql = "SELECT * FROM Products WHERE category_id = $category_id LIMIT 13"; // Fetch 4 featured products in a specific category
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<div class='product-image'>";
        echo "<img src='IMG/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
        echo "</div>";
        echo "<div class='product-details'>";
        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
        echo "<p class='product-price'>€" . htmlspecialchars($row['price']) . "</p>";
        echo "<button class='add-to-bag' data-product-id='" . htmlspecialchars($row['product_id']) . "'>Add to Bag</button>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>No products found.</p>";
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
                <h3>Meet Your Owners</h3>
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
