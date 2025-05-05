-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2025 at 01:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `department_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$gVqsFObOU2OcKBvQB.SnIe//wNsv5.FYkerVhECoBZJwT4xcR2Hdu', '2025-05-03 21:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(4, 'Home '),
(3, 'Makeup'),
(2, 'Skincare'),
(1, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `shipping_city` varchar(200) NOT NULL,
  `shipping_zip` varchar(200) NOT NULL,
  `shipping_country` varchar(200) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `total_amount`, `shipping_address`, `shipping_city`, `shipping_zip`, `shipping_country`, `customer_name`, `customer_email`) VALUES
(11, NULL, '2025-03-27 02:35:50', '358.46', '35 Hillview drive', 'sligo', 'F56 VR84', 'Ireland', 'cheryl donga', 'cheryldonga1@icloud.com'),
(12, NULL, '2025-03-27 02:44:05', '801.46', '35 Hillview drive', 'sligo', 'F56 VR84', 'Ireland', 'cheryl donga', 'cheryldonga1@icloud.com'),
(13, NULL, '2025-03-27 02:59:26', '118.97', '35 Hillview drive', 'sligo', 'F56 VR84', 'Ireland', 'cheryl donga', 'cheryldonga1@icloud.com'),
(14, NULL, '2025-03-27 03:13:39', '45.99', '35 Hillview drive', 'sligo', 'F56 VR84', 'Ireland', 'cheryl donga', 'cheryldonga1@icloud.com'),
(15, NULL, '2025-03-27 05:02:23', '45.99', '6 millrace court saggart co.dublin', 'saggart', 'D24WK83', 'Ireland', 'cheryl donga', 'dongacheryl@gmail.com'),
(16, NULL, '2025-03-27 10:33:45', '381.49', '35 Hillview drive', 'sligo', 'F56 VR84', 'Ireland', 'cheryl donga', 'cheryldonga1@icloud.com'),
(17, NULL, '2025-04-06 18:47:35', '35.99', '6 millrace court saggart co.dublin', 'saggart', 'D24WK83', 'Ireland', 'cheryl donga', 'dongacheryl@gmail.com'),
(18, NULL, '2025-04-06 18:48:00', '35.99', '6 millrace court saggart co.dublin', 'saggart', 'D24WK83', 'Ireland', 'cheryl donga', 'dongacheryl@gmail.com'),
(19, NULL, '2025-04-08 21:10:05', '20.00', '22 Bayview mountmellick, Co. Laoise', 'Portlaoise', 'R32 X054', 'Ireland', 'Vivien Obi', 'obijiakuvivien@gmail.com'),
(20, NULL, '2025-04-08 21:11:47', '825.00', '22 Bayview mountmellick, Co. Laoise', 'Portlaoise', 'R32 X054', 'Ireland', 'Vivien Obi', 'obijiakuvivien@gmail.com'),
(21, NULL, '2025-04-08 21:25:28', '29.99', '22 Bayview mountmellick, Co. Laoise', 'Portlaoise', 'R32 X054', 'Ireland', 'Vivien Obi', 'obijiakuvivien@gmail.com'),
(22, NULL, '2025-04-08 21:41:57', '3602.97', '22 Bayview mountmellick, Co. Laoise', 'Portlaoise', 'R32 X054', 'Ireland', 'Vivien Obi', 'obijiakuvivien@gmail.com'),
(23, NULL, '2025-04-08 21:48:33', '25.00', '22 Bayview mountmellick, Co. Laoise', 'Portlaoise', 'R32 X054', 'Ireland', 'Vivien Obi', 'obijiakuvivien@gmail.com'),
(24, NULL, '2025-04-30 21:10:36', '1458.49', '6 millrace court saggart co.dublin', 'saggart', 'D24WK83', 'Ireland', 'cheryl donga', 'dongacheryl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 12, 24, 4, '139.99'),
(2, 12, 25, 3, '80.50'),
(3, 13, 22, 2, '45.99'),
(4, 13, 25, 1, '26.99'),
(5, 14, 22, 1, '45.99'),
(6, 15, 22, 1, '45.99'),
(7, 16, 21, 3, '80.50'),
(8, 16, 23, 1, '139.99'),
(9, 18, 45, 1, '35.99'),
(10, 19, 31, 1, '20.00'),
(11, 20, 30, 1, '650.00'),
(12, 20, 27, 1, '175.00'),
(13, 21, 6, 1, '29.99'),
(14, 22, 5, 3, '1200.99'),
(15, 23, 8, 2, '12.50'),
(16, 24, 33, 1, '128.75'),
(17, 24, 5, 1, '1200.99'),
(18, 24, 39, 1, '128.75');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `subcategory_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category_id`, `price`, `stock_quantity`, `image`, `description`, `subcategory_id`) VALUES
(4, 'Skincare Set', 2, '30.99', 50, 'Skincare_pack.jpg', 'A high-quality skincare set', NULL),
(5, 'Gold iPhone 16 Pro Max', 1, '1200.99', 20, '16iphone.jpg', 'Latest model with top features', 9),
(6, 'Makeup Essentials Lip Kit', 3, '29.99', 100, 'lipstick.jpg', 'A luxury makeup kit', NULL),
(8, 'Advanced snail allinone cream', 2, '12.50', 20, 'cosrxadvancedsnailallinonecream.jpg', 'A multi-purpose cream containing snail mucin to hydrate, repair and rejuvenate the skin.', 13),
(9, 'carrotene clearing solution', 2, '15.99', 100, 'aprilskincarroteneipmpclearingsolution20ml.jpg\r\n', 'A clearing solution designed to balance and soothe troubled skin with carrot extract.', NULL),
(10, 'niacinamide', 2, '35.95', 50, 'anua-niacinamide.jpg', 'A brightening serum with Niacinamide, known for its ability to fade dark spots and uneven skin tone.', 14),
(11, 'aloe hydro formula', 2, '19.99', 50, 'holikaholikaaloehydroformula96soothinggel.jpg', 'A soothing gel with aloe vera to calm and hydrate the skin.', NULL),
(12, 'Collagen jelly cream', 2, '20.99', 40, 'medicubecollagenjellycream110ml.jpg', 'A jelly-textured cream formulated with collagen to firm and rejuvenate the skin.', 13),
(14, 'Soothing gel', 2, '25.00', 120, 'prettyskinaloeverasoothinggel250ml.jpg', 'A cooling gel to soothe and hydrate the skin with aloe vera extract.', NULL),
(15, 'Serum', 2, '15.00', 80, 'skin1004madagascarcentellaampoule100ml.jpg', 'A serum designed to calm sensitive skin and reduce redness with Centella Asiatica.', 14),
(16, 'brightening capsule ampoule', 2, '23.00', 90, 'skin1004madagascarcentellatonebrighteningcapsuleampoule100ml.jpg', 'A brightening ampoule to even out skin tone and enhance skin radiance.', 14),
(17, 'soothing toner', 2, '45.00', 30, 'anuaheartleaf77soothingtoner250ml.jpg', 'A toner that hydrates and soothes the skin with Heartleaf extract.', NULL),
(18, 'Foaming Cleanser', 2, '35.00', 70, 'skin1004madagascarentellaampoulefoam125ml.jpg', 'A gentle foaming cleanser formulated to clean and refresh the skin.', 16),
(19, 'Miracle toner', 2, '20.00', 110, 'somebymiahabhapha30daysmiracletoner150ml.jpg', 'A toner that brightens, clarifies, and balances the skin.', NULL),
(20, 'Baxio Sofa', 4, '128.75', 50, 'sofa.jpg', 'A stylish and comfortable Baxio Sofa.', 6),
(21, 'Wooden Table', 4, '80.50', 40, 'woodentable.jpg', 'A durable wooden table with modern design.', 8),
(22, 'Mini Palm Tree', 4, '45.99', 120, 'plant.jpg', 'A decorative mini palm tree for home or office.', 8),
(23, '2pcs Round Couches', 4, '139.99', 80, 'roundcouch.jpg', 'Two-piece round couches for a modern look.', 6),
(24, 'Stand Alone Chair', 4, '51.99', 90, 'chair.jpg', 'A comfortable and elegant stand-alone chair.', 6),
(25, 'Gold Mirror', 4, '26.99', 30, 'goldmirror.jpg', 'A decorative gold-framed mirror.', 8),
(26, 'Grey Family Couch', 4, '250.00', 70, 'greycouch.jpg', 'Spacious and comfortable grey family couch.', 6),
(27, 'Luca Coffee Table', 4, '175.00', 110, 'lucacoffeetable.jpg', 'Modern white coffee table for living rooms.', 8),
(28, 'Pot Set', 4, '55.00', 90, 'whitepot.jpg', 'High-quality cream pot set for cooking.', 5),
(29, 'Black & Gold Table Set', 4, '450.00', 50, 'dinningtablesetgoldnblack.jpg', 'Luxury black and gold dining table set.', 8),
(30, 'Queen Size Bed', 4, '650.00', 20, 'creamsidestoragebed.jpg', 'Comfortable queen-sized bed with storage.', 7),
(31, 'White Plate Set', 4, '20.00', 100, 'plainwhiteplates.jpg', 'A classic white plate set for any occasion.', 5),
(32, 'iPad Pro', 1, '128.75', 50, 'iPadproblack.jpg', 'Apple iPad Pro with M2 chip, ideal for productivity and creativity.', NULL),
(33, 'MacBook Air', 1, '128.75', 40, 'macbookairsilver.jpeg', 'Sleek and powerful MacBook Air with Apple M1 chip.', 10),
(34, 'Samsung TV', 1, '128.75', 30, 'SamsungTv.jpg', 'Crystal-clear Samsung Smart TV with UHD display.', NULL),
(35, 'Huawei P30', 1, '128.75', 60, 'huaweip30.jpg', 'Huawei P30 with advanced camera technology.', 9),
(37, 'Huawei Watch', 1, '128.75', 45, 'HuaweiWatch.jpg', 'Smartwatch with fitness tracking and health monitoring.', 11),
(38, 'Galaxy Tab A9', 1, '128.75', 55, 'GalaxytabA9.jpg', 'Samsung Galaxy Tab A9 with powerful battery life.', 9),
(39, 'Galaxy Book 3', 1, '128.75', 40, 'GalaxyBook3.jpg', 'Samsung Galaxy Book 3 laptop for seamless multitasking.', 10),
(40, 'Apple Headphones', 1, '128.75', 70, 'appleheadphones.jpg', 'Apple’s latest noise-canceling over-ear headphones.', 12),
(41, 'Samsung Watch', 1, '128.75', 65, 'SamsungWatch.jpg', 'Samsung smartwatch with premium features and design.', 11),
(42, 'AirPods Pro 2', 1, '128.75', 90, 'airpodspro-2.jpg', 'Apple AirPods Pro 2 with active noise cancellation.', 12),
(43, 'Huawei Tablet', 1, '128.75', 50, 'HuaweiTablet.jpg', 'Huawei tablet with a large screen and powerful performance.', NULL),
(44, 'Foundation Shade 1', 3, '55.00', 50, 'Foundation1.jpg', 'Long-lasting foundation for a flawless finish.', 19),
(45, 'Pink Lipstick', 3, '35.99', 40, 'Lipstickpink.jpg', 'Moisturizing pink lipstick with a smooth finish.', 17),
(46, 'Palette n3', 3, '21.00', 60, 'palette3.jpg', 'Eyeshadow palette with rich and blendable colors.', 20),
(47, 'Black Eyeliner', 3, '19.46', 80, 'eyeliner.jpg', 'Waterproof black eyeliner for precise lines.', 20),
(48, 'Pink Lipgloss', 3, '19.95', 70, 'pinklipgloss.jpg', 'Glossy pink lip gloss for a radiant shine.', 18),
(49, 'Purple Lipgloss', 3, '16.95', 90, 'purplelipgloss.jpg', 'Lightweight and hydrating purple lip gloss.', 18),
(50, 'Foundation Shade 3', 3, '27.55', 55, 'foundation2.jpg', 'High-coverage foundation for a natural look.', 19),
(51, 'Palette n2', 3, '25.00', 60, 'palette.jpg', 'Matte and shimmer eyeshadow palette.', 20),
(52, 'Red Eyeliner', 3, '17.99', 45, 'redeyeliner.jpg', 'Bold red eyeliner for dramatic eye looks.', 20),
(53, 'Foundation Shade 6', 3, '45.55', 40, 'foundation3.jpg', 'Long-wear foundation with a semi-matte finish.', 19),
(54, 'Red Lipgloss', 3, '18.75', 65, 'redlipgloss.jpg', 'Glossy red lip gloss for a plump effect.', 18),
(55, 'Palette n1', 3, '26.90', 50, 'palette1.jpg', 'Vibrant color eyeshadow palette.', 20),
(57, 'Blue Eyeliner', 3, '15.00', 80, 'blueeyeliner.jpg', 'Deep blue eyeliner for bold eye makeup.', 20),
(58, 'Red Lipstick', 3, '55.35', 90, 'Redlipstick.jpg', 'Classic red lipstick with long-lasting wear.', 17),
(59, 'Foundation Shade 2', 3, '37.99', 50, 'foundation4.jpg', 'Moisturizing and full-coverage foundation.', 19);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `user_ID` int DEFAULT NULL,
  `reviewer_name` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `rating` int DEFAULT NULL,
  `review_text` text,
  `review_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_ID`, `reviewer_name`, `product_id`, `rating`, `review_text`, `review_date`) VALUES
(2, NULL, 'katie', 21, 5, 'its rly nice', '2025-03-27 04:35:15'),
(3, 5, 'cheryl Donga', 22, 5, 'i Love it !!!', '2025-04-06 14:57:32'),
(4, NULL, 'katie', 20, 4, 'very good', '2025-05-01 09:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategory_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `subcategory_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(5, 4, 'Kitchen'),
(6, 4, 'Couches'),
(7, 4, 'Bedding'),
(8, 4, 'Decor'),
(9, 1, 'Phones'),
(10, 1, 'Laptops'),
(11, 1, 'Smart Watches'),
(12, 1, 'Sound'),
(13, 2, 'Moisturisers'),
(14, 2, 'Serums'),
(15, 2, 'Face Masks'),
(16, 2, 'Facial Wash'),
(17, 3, 'Lipsticks'),
(18, 3, 'Lipglosses'),
(19, 3, 'Foundation'),
(20, 3, 'Eyeshadow');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int NOT NULL,
  `user_ID` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `transaction_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Completed','Cancelled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `email`, `password`, `dob`) VALUES
(1, 'cheryl', 'dongacheryl@gmail.com', '$2y$10$yAK3oV.nISVOFtwjOljwVehDnPNPghc8PiruD21DKZv1nGaMNsRX6', '2005-09-01'),
(2, 'cherylstar55', 'cheryldonga1@icloud.com', '$2y$10$jw2dNjj6Mb0xBeAwA8QcROe3SbW1pz9oo6iOWEV74HYK.SNouEhMW', '2000-09-09'),
(3, 'kelly', 'B00163311@mytudublin.ie', '$2y$10$hZJOdjHb3A47i7ngHW4qvORZJpIQba7PAUfXBvQrhPD69ihSPPiHi', '1920-09-09'),
(4, 'alica', 'alicai@gmail.com', '$2y$10$4jPtlCSAdj5FsfTOiPPvO.Bi7rp2Oxe2ZVYQyu./Jx.ihGRxM.KGy', '2999-12-09'),
(5, 'cheryl Donga', 'donga@gmail.com', '$2y$10$pYdQhSJygl1St9peGxyTvuYEgnyKFyy.oh1J/6P/3MhLLYqfO2D5e', '2003-09-09'),
(6, 'Vivien', 'obijiakuvivien@gmail.com', '$2y$10$cFJk5XH.QGaJZEjjknM8wekdLfO5BGWYLmaAkzmcRdzsGspYprMvC', '2004-10-14'),
(7, 'kaylee', 'kaylee1@gmail.com', '$2y$10$RGMvFSwxc2oO4yJJAKKoNOND4WOP6Ur2n4vMhwf/S.4I1Kpl8RXd.', '2000-09-01'),
(8, 'jane', 'jane123@gmail.com', '$2y$10$VskMJ4mMBoh4vRg2Dr75LuHnSr.vu/blOPxHlNrcRpruP86nBUlQG', '2000-09-09'),
(9, 'laura odowd', 'laura123@gmail.com', '$2y$10$y9MeFny06WUJ91Q2xBhrgOYqmm2hYnDyAbwbDH2QUadVUN.D0m1d2', '2000-09-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `idx_order_customer` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `idx_product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `idx_category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `idx_review_user` (`user_ID`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategory_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcategory_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
