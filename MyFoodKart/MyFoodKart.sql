-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 02:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyFoodKart`
--

-- --------------------------------------------------------

--
-- `users` Tablosu Oluşturuluyor
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `joinDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    
-- Depolama Motoru      Karakter Seti

--int = sayısal, varchar = string için kullanılıyor


-- `users` tablosu için veri girişi

INSERT INTO `users` (`userid`, `username`, `firstName`, `lastName`, `email`, `phone`, `password`, `joinDate`) 
VALUES
(3, 'golsrushti1', 'srushti', 'gol', 'golsrushti1@gmail.com', 2147483647, '$2y$10$8', '2022-05-12'),
(4, 'uhi', 'joj', 'jojk;', 'joljln@gmail.com', 1234567890, '$2y$10$H', '2022-05-12');


--
-- 
--
ALTER TABLE `users`  --değiştirilecek tablo 
  ADD PRIMARY KEY (`userid`);   --'userid'sütunu birincil anahtar olarak tanımlandı ve benzersiz oldu
  
  --amaç her bir kullanıcının benzersiz bir id numarasına sahip olmasını sağlamak için.

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`  --değiştirilecek tablo
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

-- MODIFY 'userid' özelliklerini değiştir, int(11)sütunun veri tipini ve boyutunu belirtir. 
-- NOT NULL boş değer kabul etmeyeceğini, AUTO_INCREMENT ise sütuna otomatik artan (auto-increment) özelliğini ekler.
-- AUTO_INCREMENT=5; Bu, otomatik artan değerin başlangıç değerini belirtir. Yani, yeni satırlar eklenirken, 'userid' sütununda otomatik artan değerin 5'ten başlaması sağlanır.

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
