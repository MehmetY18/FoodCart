-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 07:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; 
--NO_AUTO_VALUE_ON_ZERO modu, otomatik artan (auto-increment) sütunlarda "0" değeri verildiğinde, yeni satır eklendiğinde otomatik artan değerin 0'dan başlamayacağını belirtir. Yani, bu modda, otomatik artan bir sütuna 0 değeri verildiğinde, değer otomatik olarak artmaz.
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opd`
--

-- --------------------------------------------------------

--
-- 'categories' Tablosu Oluşturuluyor
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  -- Depolama Motoru      Karakter Seti
--
-- `categories` Tablosu için veri girişi
--

  INSERT INTO `categories` (`categorieId`, `categorieName`) 
  VALUES
  (1, 'ETVETAVUKYEMEKLERI'),
  (2, 'SEBZEYEMEKLERI'),
  (3, 'ZEYTINYAGLIYEMEKLER'),
  (4, 'CORBALAR'),
  (5, 'BALIKVEDENIZURUNLERI'),
  (6, 'TATLIVEKEK');

-- ----------------------------------------------

--
-- `contact` Tablosu Oluşturuluyor
--

CREATE TABLE `contact` (
  `contactId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `orderId` int(21) NOT NULL DEFAULT 0 COMMENT 'If problem is not related to the order then order id = 0',
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--`contactreply` Tablosu Oluşturuluyor
--

CREATE TABLE `contactreply` (
  `id` int(21) NOT NULL,
  `contactId` int(21) NOT NULL,
  `userId` int(23) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--`deliverydetails` Tablosu Oluşturuluyor
--

CREATE TABLE `deliverydetails` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `deliveryBoyName` varchar(35) NOT NULL,
  `deliveryBoyPhoneNo` bigint(25) NOT NULL,
  `deliveryTime` int(200) NOT NULL COMMENT 'Time in minutes',
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- `orderitems` Tablosu Oluşturuluyor
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `itemId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- `orders` Tablosu Oluşturuluyor
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--`item` Tablosu Oluşturuluyor
--

CREATE TABLE `item` (
  `itemId` int(12) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemPrice` int(12) NOT NULL,
  `itemCategorieId` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--`item` Tablosu için veri girişi
--

INSERT INTO `item` (`itemId`, `itemName`, `itemPrice`, `itemCategorieId`) 
VALUES
(1, 'Enginarlı arpa şehriyeli tavuk', 120, 1),
(2, 'Fırında Fasulyeli Tavuk', 20, 1),
(3, 'Patlıcan Kebabı', 50, 1),
(4, 'Fırında Domatesli Tavuk', 50, 1),
(5, 'Portakal Soslu Tavuk Şinitzel', 40, 1),
(6, 'Tepsi Kebabı', 60, 1),
(7, 'Alinazik', 60, 1),
(8, 'Otlu Kremalı Tavuk', 70, 1),
(9, 'Bezelyeli Baklalı Tavuklu Pilav', 60, 1),
(10, 'Kuru Fasule', 120, 2),
(11, 'Portakallı Zeytinyağlı Kereviz', 180, 2),
(12, 'Soya Soslu Fırında Mantar', 50, 2),
(13, 'Fırınlanmış Avokado Dolması', 25, 2),
(14, 'Kıymalı Karnabahar Pilavı', 160, 2),
(15, 'Zeytinyağlı Taze Fasulye', 180, 2),
(16, 'Lahanalı Patates Püresi', 150, 2),
(17, 'Sarımsaklı Karışık Etli Dolma', 200, 2),
(18, 'Bamya Tempura', 190, 2),
(19, 'Barbunya Pilaki', 120, 3),
(20, 'Tempura İstiridye Mantarı', 60, 3),
(21, 'Zeytinyağlı Karamelize Enginar', 80, 3),
(22, 'Yoğurtlu Kabak Mücveri', 80, 3),
(23, 'Zeytinyağlı Lahana Sarma', 120, 3),
(24, 'Fırında Portakallı Kereviz Cipsi', 100, 3),
(25, 'Domates Soslu Kızartma', 70, 3),
(26, 'Yoğurtlu Şakşuka', 120, 3),
(27, 'Zeytinyağlı Bamya', 180, 3),
(28, 'Sebzeli Kurutulmuş Mantar Çorbası', 180, 4),
(29, 'Karnabaharlı Mercimek Çorbası', 99, 4),
(30, 'Lazanya Çorbası', 140, 4),
(31, 'Mercimekli Mantar Çorbası', 150, 4),
(32, 'Yoğurtlu Pazı Çorbası', 120, 4),
(33, 'Kırmızı Mercimekli Karnabahar Çorbası', 120, 4),
(34, 'Bal Kabaklı Minestrone Çorbası', 150, 4),
(35, 'Tavuklu Avokado Çorbası', 190, 4),
(36, 'Elmalı Havuç Çorbası', 150, 4),
(37, 'Somon Gravlax', 40, 5),
(38, 'Marine Sardalya', 20, 5),
(39, 'Hamsi Çıtlatma', 40, 5),
(40, 'Sardalya Turşusu', 120, 5),
(41, 'Haşhaşlı Rezeneli Somon Izgara', 40, 5),
(42, 'Levrek Marine', 40, 5),
(43, 'Fırında Soslu Sardalya Balığı', 40, 5),
(44, 'Buharda Balık', 40, 5),
(45, 'Fırında Tekir (barbun) Balığı', 40, 5),
(46, 'Yulaflı Badem Unlu Çilekli Tart', 120, 6),
(47, 'Badem Unlu Elmalı Kek', 180, 6),
(48, 'Şekersiz Mini Cheesecake', 150, 6),
(49, 'Portakallı Tepsi Keki', 70, 6),
(50, 'Tahinli Karamel Soslu Çikolatalı Kek', 50, 6),
(51, 'Pancarlı Brownie', 70, 6),
(52, 'Cupcake', 50, 6),
(53, 'Tutys Cakes Çikolatalı Cupcake', 50, 6),
(54, 'Cheesecake Tart', 100, 6);


-- --------------------------------------------------------

--
-- `sitedetail` Tablosu Oluşturuluyor
--

CREATE TABLE `sitedetail` (
  `tempId` int(11) NOT NULL,
  `systemName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` bigint(21) NOT NULL,
  `contact2` bigint(21) DEFAULT NULL COMMENT 'Optional',
  `address` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--`sitedetail` Tablosu için veri girişi
--

  INSERT INTO `sitedetail` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) 
  VALUES
  (1, 'Pizza World', 'darshanparmar263@gmail.com', 2515469442, 6304468851, '601 Sherwood Ave.<br> San Bernandino', '2021-03-23 19:56:25');

-- --------------------------------------------------------

--
--`users` Tablosu Oluşturuluyor
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- `users` Tablosu için veri girişi
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) 
VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1111111111, '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i', '2021-04-11 11:40:58'),
(2, 'golsrushti1', 'srushti', 'gol', 'golsrushti1@gmail.com', 9722473324, '0', '$2y$10$SmPBuHfkV3pG.3E7HI5yJerTH9R9xXHHdJuzBMFrq4tB22Xt6riCG', '2022-05-13 21:18:47'),
(3, 'hina1', 'afhsdh', 'afasfshdd', 'affa@gmail.com', 9722473324, '0', '$2y$10$lEM9QXaIN6q0pMVBjqaSXeNnFlc/gmbxarn9o4uDsDaAaMjsnJ24a', '2022-05-13 22:17:56');

-- --------------------------------------------------------

--
-- `viewcart` Tablosu Oluşturuluyor
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories` --değiştirilecek tablo adı
  ADD PRIMARY KEY (`categorieId`); --birincil anahtar
ALTER TABLE `categories` ADD FULLTEXT KEY `categorieName` (`categorieName`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `contactreply`
--
ALTER TABLE `contactreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`); --orderId adlı sütuna benzersiz bir anahtar eklenir. Bu, orderId sütununda bulunan değerlerin her birinin yalnızca bir kez kullanılabileceğini belirtir.

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);
ALTER TABLE `item` ADD FULLTEXT KEY `itemName` (`itemName`);

--
-- Indexes for table `sitedetail`
--
ALTER TABLE `sitedetail`
  ADD PRIMARY KEY (`tempId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorieId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactreply`
--
ALTER TABLE `contactreply`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `item`
  MODIFY `itemId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sitedetail`
--
ALTER TABLE `sitedetail`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
