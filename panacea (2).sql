-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 03:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panacea`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestsellers`
--

CREATE TABLE `bestsellers` (
  `best_id` int(11) NOT NULL,
  `best_name` varchar(50) NOT NULL,
  `best_price` decimal(10,2) NOT NULL,
  `best_image` varchar(50) NOT NULL,
  `best_desc` varchar(500) NOT NULL,
  `best_tags` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bestsellers`
--

INSERT INTO `bestsellers` (`best_id`, `best_name`, `best_price`, `best_image`, `best_desc`, `best_tags`) VALUES
(1, 'Stresstabs with Iron Tablet', 225.00, 'images/best seller/stresstabs.png', 'Stresstabs Tablet is a multivitamin supplement designed to help combat stress and fatigue. Enriched with B-complex vitamins, it supports energy production and strengthens the immune system for daily wellness.', 'Anti-stress vitamin formula/Multivitamins + Iron'),
(2, 'Myra E 400 Cap S', 156.00, 'images/best seller/myrae.png', 'Myra E is a Vitamin E supplement that helps maintain healthy skin and protect cells from damage. Its antioxidant properties support overall wellness and promote a youthful glow from within.\r\n\r\n', 'Vitamin E/Skin Protection'),
(3, 'Robust Extreme Cap', 305.50, 'images/best seller/robust.png', 'Robust Extreme is a dietary supplement specially formulated for men to help enhance vitality, stamina, and overall performance. Powered by natural ingredients, it\'s designed to support energy and confidence when you need it most.', 'Dietary Supplement for Men');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Pharmacy', 'images/categories/pharmacylogo.jpg'),
(2, 'Vitamins', 'images/categories/vitaminslogo.jpg'),
(3, 'Medical Device', 'images/categories/meddevicelogo.jpg'),
(4, 'Personal Care', 'images/categories/personalcarelogo.jpg'),
(5, 'Over the Counter', 'images/categories/otclogo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `featured_id` int(11) NOT NULL,
  `featured_name` varchar(50) NOT NULL,
  `featured_price` decimal(10,2) NOT NULL,
  `featured_image` varchar(50) NOT NULL,
  `featured_desc` varchar(200) NOT NULL,
  `featured_tags` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`featured_id`, `featured_name`, `featured_price`, `featured_image`, `featured_desc`, `featured_tags`) VALUES
(1, 'Fern-C 568.18mg', 90.00, 'images/featured/fernc.png', 'FERN-C is a sodium ascorbate supplement that\'s gentle on the stomach and boosts immunity. Ideal for daily support without acidity issues.', 'Non-acidic vitamin C for daily immune support'),
(2, 'Ibuprofen Tablet 200mg', 110.25, 'images/featured/ibuprofen.png', 'Ibuprofen Tablet 200mg is a trusted pain reliever and anti-inflammatory. It helps reduce fever, muscle aches, and joint pain for fast, effective relief.', 'Pain Reliever/Fever Reducer'),
(3, 'Paracetamol 250mg / 5ml 60ml', 79.50, 'images/featured/paracetamol.png', 'Paracetamol Syrup is a fast-acting fever reducer and pain reliever, ideal for children. It soothes headaches, colds, and minor aches with a pleasant taste that’s gentle on young stomachs.', 'Analgesic/Antipyretic');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_city` varchar(400) NOT NULL,
  `user_address` varchar(400) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 0.00, 'on_hold', 1, '1234567890', 'NOOO', 'Secret', '2025-05-25 14:41:24'),
(2, 0.00, 'on_hold', 1, '1234567890', 'YESS', 'Secret', '2025-05-25 15:10:15'),
(3, 0.00, 'on_hold', 1, '1234567890', 'NOOO', 'Secret', '2025-05-25 15:12:13'),
(4, 0.00, 'on_hold', 1, '1234567890', 'NOOO', 'Secret', '2025-05-25 15:12:47'),
(5, 110.25, 'on_hold', 1, '1234567890', 'NOOO', 'Secret', '2025-05-25 15:19:04'),
(6, 110.25, 'on_hold', 1, '1234567890', 'NOOO', 'Secret', '2025-05-25 15:24:54'),
(7, 189.75, 'on_hold', 1, '1234567890', 'NOOO', 'Secret', '2025-05-25 15:25:11'),
(8, 90.00, 'on_hold', 1, '1234567890', 'NOOO', 'Secret', '2025-05-25 15:32:34'),
(9, 110.25, 'on_hold', 1, '1234567890', 'NOOO', 'Secret', '2025-05-25 15:33:01'),
(10, 79.50, 'on_hold', 1, '1234567890', 'tryyyyyyy', 'IDKKKK', '2025-05-25 15:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 4, 2, 'Ibuprofen Tablet 200mg', 'images/featured/ibuprofen.png', 110.25, 1, 1, '2025-05-25 15:12:47'),
(2, 5, 2, 'Ibuprofen Tablet 200mg', 'images/featured/ibuprofen.png', 110.25, 1, 1, '2025-05-25 15:19:04'),
(3, 6, 2, 'Ibuprofen Tablet 200mg', 'images/featured/ibuprofen.png', 110.25, 1, 1, '2025-05-25 15:24:54'),
(4, 7, 2, 'Ibuprofen Tablet 200mg', 'images/featured/ibuprofen.png', 110.25, 1, 1, '2025-05-25 15:25:11'),
(5, 7, 3, 'Paracetamol 250mg / 5ml 60ml', 'images/featured/paracetamol.png', 79.50, 1, 1, '2025-05-25 15:25:11'),
(6, 8, 1, 'Fern-C 568.18mg', 'images/featured/fernc.png', 90.00, 1, 1, '2025-05-25 15:32:34'),
(7, 9, 2, 'Ibuprofen Tablet 200mg', 'images/featured/ibuprofen.png', 110.25, 1, 1, '2025-05-25 15:33:01'),
(8, 10, 3, 'Paracetamol 250mg / 5ml 60ml', 'images/featured/paracetamol.png', 79.50, 1, 1, '2025-05-25 15:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_category` int(50) NOT NULL,
  `product_tags` varchar(100) NOT NULL,
  `product_sub` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_desc`, `product_image`, `product_category`, `product_tags`, `product_sub`) VALUES
(1, 'Fern-C 568.18mg', 90.00, 'FERN-C is a sodium ascorbate supplement that\'s gentle on the stomach and boosts immunity. Ideal for daily support without acidity issues.', 'images/pharmacy/fernc.png', 1, 'BACK TO SCHOOL, HEALTH CARE, IMMUNE SUPPORT', 'Non-acidic vitamin C for daily immune support'),
(2, 'Cetirizine 10mg Tablet', 115.00, 'Cetirizine Tablet 10mg is a fast-acting antihistamine that relieves allergy symptoms such as sneezing, runny nose, itchy eyes, and skin rashes. Non-drowsy and effective for all-day relief.', 'images/pharmacy/cetirizine.png', 1, 'ALLERGIES, SUPPLEMENTS, COLD RELIEF', 'Antihistamine'),
(3, 'Koi Herbal Capsule 550mg', 250.00, 'Koi Herbal Capsule is a natural dietary supplement formulated with traditional herbs to support overall wellness. It helps boost immunity, improve vitality, and maintain daily balance through plant-based healing.', 'images/pharmacy/koi.png', 1, 'HERBAL REMEDIES, NATURAL SUPPLEMENTS, IMMUNE SUPPORT', 'Herbal food supplement'),
(4, 'Supracid 650mg Tablet', 2.25, 'Supracid is an antacid formulation designed to provide fast relief from heartburn, acid indigestion, and upset stomach. It helps neutralize excess stomach acid for lasting comfort and digestive ease.', 'images/pharmacy/supracid.png', 1, 'ANTACIDS, DIGESTIVE HEALTH, ACID RELIEF', 'Antacid'),
(5, 'Omega 3 Q10 Food Supplement Capsule', 28.25, 'Omega 3 supports heart health and energy with essential fatty acids and CoQ10. Ideal for daily wellness and vitality.', 'images/vitamins/omega3.png', 2, 'IMMUNE BOOST, WELLNESS CARE', 'Food Supplement/Vitamin E/EPA & DHA'),
(6, 'Pharmaton Energy + FC Tab 100', 278.50, 'Pharmaton Energy+ is a multivitamin and mineral supplement with Ginseng G115, designed to boost energy, reduce fatigue, and support mental performance. Ideal for daily vitality and overall wellness.', 'images/vitamins/pharmaton.png', 2, 'ENERGY BOOSTER, DAILY VITAMINS, IMMUNE SUPPORT', 'Vitamin/Food Supplement'),
(7, 'Centrum Kids Vitamins + Zinc Gummies Apple Flavor', 499.00, 'Centrum Kids Vitamins + Zinc Gummies are specially formulated to support children’s immune health, growth, and development. With a tasty apple flavor, they make daily nutrition fun and easy.', 'images/vitamins/centrum.png', 2, 'IMMUNE SUPPORT, KIDS HEALTH', 'Multivitamin + Zinc'),
(8, 'Myra E 400 Cap S', 156.00, 'Myra E is a Vitamin E supplement that helps maintain healthy skin and protect cells from damage. Its antioxidant properties support overall wellness and promote a youthful glow from within.', 'images/vitamins/myrae.png', 2, 'VITAMIN E, SKIN HEALTH, CELL PROTECTION SUPPORT', 'Vitamin E/Skin Protection'),
(9, 'Omron Digital Thermometer Mc 246', 298.25, 'The Omron Digital Thermometer MC-246 provides fast, accurate temperature readings for reliable health monitoring. It\'s easy to use, safe for all ages, and suitable for oral, rectal, or underarm use.', 'images/meddevice/digital th.png', 3, 'DIGITAL, ORAL, THERMOMETER', ''),
(10, 'Omron Forehead Thermometer Mc 720', 3480.00, 'The Omron Forehead Thermometer MC-720 offers quick, contactless temperature readings in just one second. Ideal for infants and adults, it ensures hygiene, ease of use, and reliable results with a gentle forehead scan.', 'images/meddevice/forehead th.png', 3, 'INFRARED, NON-CONTACT', ''),
(11, 'Nebulizer Best Neb with Trigger Cup', 2465.00, 'The Best Neb Nebulizer with Trigger Cup delivers fast and efficient respiratory relief. Designed for ease of use and portability, it provides consistent medication delivery for asthma, bronchitis, and other breathing conditions.', 'images/meddevice/nebulizer.png', 3, 'MEDICAL, ASTHMA, NEBULIZER', ''),
(12, 'One Touch Select Strips 25x1s', 932.25, 'OneTouch Select Strips (25x1s) provide accurate and reliable blood glucose readings. Designed for use with OneTouch Select meters, they ensure quick, easy testing to help manage diabetes effectively.', 'images/meddevice/strips.png', 3, 'GLUCOSE, TEST, STRIPS', ''),
(13, 'Axe Body Spray Dark Temptation 150ml', 272.00, 'Axe is a long-lasting body spray with a rich, sweet scent designed to keep you feeling fresh and confident all day.', 'images/personal/axe.png', 4, 'BODY SPRAY, FRAGRANCE, FRESHNESS', 'Body Spray, Perfume\r\n\r\n'),
(14, 'Modess All Night Wings 41xs ', 60.25, 'Modess is a sanitary pad designed for overnight protection with extra coverage to keep you dry and comfortable.', 'images/personal/modess.png', 4, 'SANITARY PADS, OVERNIGHT COMFORT', 'Personal Care, Women Comfort'),
(15, 'Head & Shoulders Cool Menthol Shampoo 170ml', 198.00, 'Head & Shoudlers is a refreshing shampoo with cooling menthol that helps fight dandruff and leaves your scalp feeling invigorated.', 'images/personal/head.png', 4, 'SHAMPOO, COOLING, DANDRUFF', 'Hair Care, Beauty'),
(16, 'Bactidol Liquid 60ml', 110.75, 'Bactidol Liquid is an antibacterial mouthwash that helps relieve sore throat and reduce oral bacteria for fast-acting relief.', 'images/personal/bactidol.png', 4, 'MOUTHWASH, ANTISEPTIC, RELIEF', 'Oral Care, Mouthwash'),
(17, 'Neurobion Tablet', 24.75, 'Neurobion tablet supports nerve health and helps relieve symptoms of B-vitamin deficiency such as numbness, tingling, and muscle weakness. Ideal for daily nerve care.', 'images/otc/neurobion.png', 5, 'NERVES, ENERGY, WELLNESS', 'Multivitamins B'),
(18, 'Paracetamol 250mg/5ml 60ml', 79.50, 'Paracetamol Syrup is a fast-acting fever reducer and pain reliever, ideal for children. It soothes headaches, colds, and minor aches with a pleasant taste that’s gentle on young stomachs.', 'images/otc/paracetamol.png', 5, 'FEVER, PAIN, RELIEF', 'Analgesic/Antipyretic'),
(19, 'Stresstabs with Iron Tablet', 225.00, 'Stresstabs Tablet is a multivitamin supplement designed to help combat stress and fatigue. Enriched with B-complex vitamins, it supports energy production and strengthens the immune system for daily wellness.', 'images/otc/stresstabs.png', 5, 'STRESS, IMMUNITY, ENERGY', 'Anti-stress vitamin formula/Multivitamins + Iron'),
(20, 'Robust Extreme Cap', 305.50, 'Robust Extreme is a dietary supplement specially formulated for men to help enhance vitality, stamina, and overall performance. Powered by natural ingredients, it\'s designed to support energy and confidence when you need it most.', 'images/otc/robust.png', 5, 'INCREASE STAMINA, VITALITY, PERFORMANCE', 'Dietary Supplement for Men');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Joshua', 'joshobana462@gmail.com', '378041508fcb2574e1724f8917369be9'),
(2, 'another test', 'jadowoa@gmail.com', '0fe2979682e071b223cd5869ea7206b1'),
(3, 'pepsi', 'pespi@gmail.com', '38eeb316a059aa8ab6d375db275bd49c'),
(4, 'Khian', 'khian@gmail.com', 'b9d2c5febc5c6c305cbc55621e65dc17'),
(5, 'onelast try', 'yessir@gmail.com', 'c689b998ff2ba47ef2dc0aeb8bd869a1'),
(6, 'tryyy', 'yesyes@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f'),
(7, 'unique', 'unique@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestsellers`
--
ALTER TABLE `bestsellers`
  ADD PRIMARY KEY (`best_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`featured_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_products_category` (`product_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestsellers`
--
ALTER TABLE `bestsellers`
  MODIFY `best_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `featured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`product_category`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
