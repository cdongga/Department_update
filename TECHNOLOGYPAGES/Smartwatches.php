<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopaholics - Home</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<?php
include 'db_connect.php'; // This file connects to MySQL
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
                    <li><a href="#">Phones</a></li>
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Smart Watches</a></li>
                    <li><a href="#">Sound</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="skincare.php">Skincare</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Moisturisers</a></li>
                    <li><a href="#">Serums</a></li>
                    <li><a href="#">Face Masks</a></li>
                    <li><a href="#">Facial Wash</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="makeup.php">Makeup</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Lipsticks</a></li>
                    <li><a href="#">Lipglosses</a></li>
                    <li><a href="#">Foundation</a></li>
                    <li><a href="#">Eyeshadow</a></li>
                </ul>
            </li>
        </ul>

        <!-- Search Bar Inside Nav -->
        <form action="#" method="get" class="search-bar">
            <input type="text" name="q" placeholder="Search" required>
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <div class="nav-right">
            <div class="header-icons">
                <div class="country-selector">
                    <img src="IMG/eu-flag.png" alt="EU Flag">
                </div>
                <a href="signup_login.php">
                    <i class="fas fa-user"></i>
                </a>
                <i class="fas fa-heart"></i>
                <div class="cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
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
                <div class="slide"><img src="HOMEIMG/hp3_banner.jpg" alt="Slide 3"></div>
                <div class="slide"><img src="HOMEIMG/HP_BANNER.jpg" alt="Slide 4"></div>
            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
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

    <script src="JS/imageslider.js"></script>
</body>
</html>
