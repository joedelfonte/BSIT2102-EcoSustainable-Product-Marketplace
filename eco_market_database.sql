-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 06:17 AM
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
-- Database: `eco_market_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `Auth_id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` int(60) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(0, 'No Category'),
(1, 'Electronics'),
(2, 'Home Appliances'),
(3, 'Fashion'),
(4, 'Beauty & Personal Care'),
(5, 'Groceries'),
(6, 'Books & Media'),
(7, 'Sports & Outdoors'),
(8, 'Toys & Games'),
(9, 'Health & Wellness'),
(10, 'Office & School Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

CREATE TABLE `cookies` (
  `cookieId` int(5) NOT NULL,
  `cookieValue` char(24) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status_id` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `shipping_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `ProductName` varchar(80) NOT NULL,
  `productCode` char(7) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(4) NOT NULL,
  `store_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `imageDir` text DEFAULT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ProductName`, `productCode`, `description`, `price`, `quantity`, `store_id`, `category_id`, `status_id`, `imageDir`, `dateCreated`) VALUES
(9, 'High-Performance Laptop', 'ECP1001', 'A high-performance laptop with 16GB RAM and 512GB SSD.', 999.99, 50, 18, 1, 1, NULL, '2023-10-01 10:00:00'),
(10, 'Latest Smartphone', 'ECO2002', 'A smartphone with a stunning display and powerful camera.', 799.99, 100, 18, 1, 1, NULL, '2023-10-05 14:30:00'),
(11, 'Eco-Friendly Water Bottle', 'ECO2001', 'A reusable water bottle made from sustainable materials.', 19.99, 200, 17, 5, 1, NULL, '2023-10-02 11:00:00'),
(12, 'Reusable Grocery Bag', 'ECO6005', 'A durable grocery bag made from recycled materials.', 9.99, 300, 17, 5, 1, NULL, '2023-10-15 11:00:00'),
(13, 'Organic Cotton T-Shirt', 'ECO3002', 'A comfortable t-shirt made from 100% organic cotton.', 25.00, 150, 16, 3, 1, NULL, '2023-10-08 12:45:00'),
(14, 'Organic Face Cream', 'ECO8007', 'A natural face cream made with organic ingredients.', 29.99, 100, 18, 4, 1, NULL, '2023-10-20 13:00:00'),
(15, 'Solar-Powered Charger', 'ECO5004', 'A portable charger powered by solar energy.', 39.99, 75, 18, 1, 1, NULL, '2023-10-12 10:00:00'),
(16, 'Biodegradable Cleaning Sponges', 'ECO7006', 'Eco-friendly cleaning sponges that are biodegradable.', 7.99, 250, 18, 5, 1, NULL, '2023-10-18 12:00:00'),
(17, 'Natural Bamboo Toothbrush', 'ECO4003', 'An eco-friendly toothbrush made from natural bamboo.', 5.50, 500, 17, 5, 1, NULL, '2023-10-10 09:00:00'),
(18, 'Recycled Paper Notebooks', 'ECO9008', 'Notebooks made from 100% recycled paper.', 12.99, 400, 21, 10, 1, NULL, '2023-10-22 14:00:00'),
(24, '111', '', '1212', 122.00, 1212, 14, 0, 1, NULL, '0000-00-00 00:00:00'),
(25, '1212', '', '1212', 1.00, 12, 14, 10, 1, NULL, '0000-00-00 00:00:00'),
(26, '333', '', '33', 33.00, 333, 14, 0, 1, NULL, '0000-00-00 00:00:00'),
(27, 'Mouse', '', 'Mousy mouse', 111.00, 10, 14, 1, 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Basic User'),
(3, 'Seller'),
(4, 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `description` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `Status`, `description`) VALUES
(1, 'Active', 'The entity is currently active.'),
(2, 'Inactive', 'The item or entity is currently inactive.'),
(3, 'Pending', 'The item or entity is awaiting approval or processing.'),
(4, 'Shstatusd', 'The item has been shipped to the customer.'),
(5, 'Delivered', 'The item has been delivered to the customer.'),
(6, 'Cancelled', 'The order or process has been cancelled.'),
(7, 'Returned', 'The item has been returned by the customer.'),
(8, 'Processing', 'The item or order is currently being processed.'),
(9, 'Banned', 'Account is Banned'),
(10, 'New', 'The user account has been created and is awaiting further action.'),
(11, 'Verified', 'The user account has been verified.'),
(12, 'Suspended', 'The user account has been temporarily suspended.'),
(13, 'Deactivated', 'The user account has been deactivated by the user.'),
(14, 'Pending Activation', 'The user account is awaiting activation.');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(5) NOT NULL,
  `EcoStore_id` char(10) NOT NULL,
  `storeName` varchar(60) NOT NULL,
  `storeDescription` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `phoneNumber` char(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `storeImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `EcoStore_id`, `storeName`, `storeDescription`, `owner_id`, `phoneNumber`, `email`, `status_id`, `date_created`, `storeImage`) VALUES
(14, 'ECO1001', 'EcoMarket Electronics', 'A store specializing in eco-friendly electronics.', 1, '09123456789', 'eco.electronics@example.com', 1, '2024-11-22 10:00:00', ''),
(15, 'ECO1002', 'Green Home Goods', 'Your one-stop shop for sustainable home goods.', 2, '09234567890', 'green.homegoods@example.com', 1, '2024-11-22 11:00:00', ''),
(16, 'ECO1003', 'Organic Fashion', 'Eco-friendly clothing made from organic materials.', 3, '09345678901', 'organic.fashion@example.com', 1, '2024-11-22 12:00:00', ''),
(17, 'ECO1004', 'Natural Beauty', 'Natural and organic beauty products.', 4, '09456789012', 'natural.beauty@example.com', 1, '2024-11-22 13:00:00', ''),
(18, 'ECO1005', 'Sustainable Living', 'Products for a sustainable and eco-friendly lifestyle.', 5, '09567890123', 'sustainable.living@example.com', 1, '2024-11-22 14:00:00', ''),
(19, 'ECO1006', 'Eco-Friendly Kids', 'Eco-friendly products for kids and babies.', 6, '09678901234', 'eco.kids@example.com', 1, '2024-11-22 15:00:00', ''),
(20, 'ECO1007', 'Zero Waste Supplies', 'Supplies and products to help you live a zero-waste lifestyle.', 7, '09789012345', 'zero.waste@example.com', 1, '2024-11-22 16:00:00', ''),
(21, 'ECO1008', 'Recycled Paper Goods', 'Recycled paper products for home and office.', 8, '09890123456', 'recycled.paper@example.com', 1, '2024-11-22 17:00:00', ''),
(22, 'ECO1009', 'Eco-Friendly Pet Supplies', 'Eco-friendly products for pets.', 9, '09901234567', 'eco.pets@example.com', 1, '2024-11-22 18:00:00', ''),
(23, 'ECO1010', 'Green Energy Solutions', 'Products and services for green energy solutions.', 10, '09012345678', 'green.energy@example.com', 1, '2024-11-22 19:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `EcoId` char(8) NOT NULL COMMENT 'In php automatic assign value ',
  `Name` varchar(80) NOT NULL,
  `nickname` varchar(60) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `role_id` int(3) NOT NULL,
  `email` varchar(120) NOT NULL,
  `status_id` int(3) NOT NULL,
  `profileImage` text DEFAULT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `Auth_id` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `Eco_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table For User Information';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `EcoId`, `Name`, `nickname`, `gender`, `role_id`, `email`, `status_id`, `profileImage`, `DateCreated`, `Auth_id`, `username`, `Eco_password`) VALUES
(1, 'ECO0001', 'John Doe', 'Johnny', 'Male', 1, 'johndoe@example.com', 1, 'images/john_doe.jpg', '2024-11-23 01:19:36', 1, '', ''),
(2, 'ECO0002', 'Jane Smith', 'Janey', 'Female', 2, 'janesmith@example.com', 1, 'images/jane_smith.jpg', '2024-11-23 01:19:36', 0, '', ''),
(3, 'ECO0003', 'Robert Brown', 'Rob', 'Male', 2, 'robertbrown@example.com', 1, 'images/robert_brown.jpg', '2024-11-23 01:19:36', 0, '', ''),
(4, 'ECO0004', 'Emily Davis', 'Em', 'Female', 3, 'emilydavis@example.com', 1, 'images/emily_davis.jpg', '2024-11-23 01:19:36', 0, '', ''),
(5, 'ECO0005', 'Michael Johnson', 'Mike', 'Male', 1, 'michaeljohnson@example.com', 1, 'images/michael_johnson.jpg', '2024-11-23 01:19:36', 0, '', ''),
(6, 'ECO0006', 'Jessica Lee', 'Jess', 'Female', 2, 'jessicalee@example.com', 1, 'images/jessica_lee.jpg', '2024-11-23 01:19:36', 0, '', ''),
(7, 'ECO0007', 'David Wilson', 'Dave', 'Male', 3, 'davidwilson@example.com', 1, 'images/david_wilson.jpg', '2024-11-23 01:19:36', 0, '', ''),
(8, 'ECO0008', 'Sophia Martinez', 'Sophie', 'Female', 1, 'sophiamartinez@example.com', 1, 'images/sophia_martinez.jpg', '2024-11-23 01:19:36', 0, '', ''),
(9, 'ECO0009', 'Daniel Garcia', 'Dan', 'Male', 2, 'danielgarcia@example.com', 1, 'images/daniel_garcia.jpg', '2024-11-23 01:19:36', 0, '', ''),
(10, 'ECO0010', 'Mia Hernandez', 'Mimi', 'Female', 3, 'miahernandez@example.com', 1, 'images/mia_hernandez.jpg', '2024-11-23 01:19:36', 0, '', ''),
(11, 'ECO4878', 'John Doe', 'Johnny', 'Male', 1, 'johndoe@example.com', 1, NULL, '2023-10-01 10:00:00', NULL, 'johndoe', 'password123'),
(12, 'ECO5376', 'Jane Smith', 'Janey', 'Female', 2, 'janesmith@example.com', 1, NULL, '2023-10-05 14:30:00', NULL, 'janesmith', 'password456'),
(13, 'ECO2246', 'Robert Brown', 'Rob', 'Male', 2, 'robertbrown@example.com', 1, NULL, '2023-10-08 12:45:00', NULL, 'robertbrown', 'password789'),
(14, 'ECO3102', 'Emily Davis', 'Em', 'Female', 3, 'emilydavis@example.com', 1, NULL, '2023-10-10 09:00:00', NULL, 'emilydavis', 'passwordabc'),
(15, 'ECO7775', 'Michael Johnson', 'Mike', 'Male', 1, 'michaeljohnson@example.com', 1, NULL, '2023-10-12 10:00:00', NULL, 'michaeljohnson', 'passworddef'),
(16, 'ECO1567', 'Jessica Lee', 'Jess', 'Female', 2, 'jessicalee@example.com', 1, NULL, '2023-10-15 11:00:00', NULL, 'jessicalee', 'passwordghi'),
(17, 'ECO1513', 'David Wilson', 'Dave', 'Male', 3, 'davidwilson@example.com', 1, NULL, '2023-10-18 12:00:00', NULL, 'davidwilson', 'passwordjkl'),
(18, 'ECO1864', 'Sophia Martinez', 'Sophie', 'Female', 1, 'sophiamartinez@example.com', 1, NULL, '2023-10-20 13:00:00', NULL, 'sophiamartinez', 'passwordmno'),
(19, 'ECO3780', 'Daniel Garcia', 'Dan', 'Male', 2, 'danielgarcia@example.com', 1, NULL, '2023-10-22 14:00:00', NULL, 'danielgarcia', 'passwordpqr'),
(20, 'ECO3310', 'Mia Hernandez', 'Mimi', 'Female', 3, 'miahernandez@example.com', 1, NULL, '2023-10-25 15:00:00', NULL, 'miahernandez', 'passwordstu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`Auth_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`cookieId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `Auth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cookies`
--
ALTER TABLE `cookies`
  MODIFY `cookieId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cookies`
--
ALTER TABLE `cookies`
  ADD CONSTRAINT `cookies_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `store_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;