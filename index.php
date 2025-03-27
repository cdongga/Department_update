<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopaholics - Home</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/cart.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<?php
include 'db_connect.php';
session_start();
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
        <div class="nav-right">
        <form action="search.php" method="get" class="search-bar">
            <input type="text" name="search" placeholder="Search products..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" required>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
        
        <div class="header-icons">
            <div class="country-selector">
                <img src="IMG/eu-flag.png" alt="EU Flag" width="30" height="20">
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
    </div>
</nav>
    
    <!-- HERO SECTION -->
    <section class="hero">
        <img src="IMG/homepage_banner.jpg" alt="Shop the Best Products" class="hero-image">
        <div class="hero-content">
            <h2>Discover Your Favorites</h2>
            <p>Shop the best in Home, skincare, makeup, and tech today!</p>
        </div>
    </section>
    
    <!-- IMAGE SLIDER SECTION -->
    <section class="image-slider">
        <div class="slider-container">
            <div class="slider">
                <div class="slide"><img src="HomeIMG/hp7_banner.jpg" alt="Slide 1"></div>
                <div class="slide"><img src="HOMEIMG/hp6_banner.jpg" alt="Slide 2"></div>
                <div class="slide"><img src="HOMEIMG/hp3_banner.jpg" alt="Slide 2"></div>
                <div class="slide"><img src="HOMEIMG/HP_BANNER.jpg" alt="Slide 2"></div>
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </section>

    <!-- CATEGORY SECTION -->
    <section class="categories">
        <h2>Shop by Category</h2>
        <div class="category-container">
            <div class="category">
                <a href="technology.php">
                    <img src="IMG/tech_banner3.jpg" alt="Technology"><p>Technology</p>
                </a>
            </div>
            <div class="category">
                <a href="skincare.php"> 
                    <img src="IMG/skincare_banner1.jpg" alt="Skincare"><p>Skincare</p> 
                </a>    
            </div>
            <div class="category">
                <a href="homeStore.php"> 
                    <img src="IMG/home_banner2.jpg" alt="Home"><p>Home</p>
                </a>
            </div>
            <div class="category">
                <a href="makeup.php"> 
                    <img src="HOMEIMG/makeup_banner.jpg" alt="Home"><p>Makeup</p>
                </a>
            </div>
        </div>
    </section>
    
    <!-- FEATURED PRODUCTS -->
    <section class="featured-products" id="featured">
        <h2>
            <?php 
            if (isset($_GET['search'])) {
                echo "Search Results for '" . htmlspecialchars($_GET['search']) . "'";
            } else {
                echo "Featured Products";
            }
            ?>
        </h2>
        <hr style="border-color: brown; border-width: 5px;">
        <div class="product-container">
            <?php
            // Check if search was performed
            if (isset($_GET['search'])) {
                $searchTerm = $_GET['search'];
                $searchParam = "%$searchTerm%";
                
                // Search query (across all products)
                $sql = "SELECT * FROM products 
                        WHERE name LIKE ? OR description LIKE ?
                        ORDER BY name";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $searchParam, $searchParam);
                $stmt->execute();
                $result = $stmt->get_result();
            } else {
                // Default query (4 featured products)
                $sql = "SELECT * FROM Products LIMIT 4";
                $result = $conn->query($sql);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-card'>";
                    echo "<img src='IMG/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p class='product-price'>€" . htmlspecialchars($row['price']) . "</p>";
                    echo "<button class='add-to-bag' data-product-id='" . htmlspecialchars($row['product_id']) . "'>Add to bag</button>";
                    echo "</div>";
                }
            } else {
                if (isset($_GET['search'])) {
                    echo "<p class='no-results'>No products found matching your search.</p>";
                } else {
                    echo "<p>No products found.</p>";
                }
            }
            ?>
        </div>
    </section>

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
    <script src="JS/imageslider.js"></script>
    <script src="JS/cart.js"></script>
    <script src="JS/auth.js"></script>
</body>
</html>