-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2026 at 11:43 PM
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
-- Database: `elektrohome`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `features` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`id`, `title`, `content`, `image`, `features`) VALUES
(1, 'Kush jemi ne', 'ElektroHome është kompani e specializuar në ofrimin e zgjidhjeve moderne për sigurinë dhe automatizimin e shtëpive dhe bisneseve. Ne ofrojmë produkte cilësore si kamera sigurie, alarme dhe pajisje intelegjente.', 'images (5).jpg', 'Siguri Maksimale,Mbështetje 24/7,Cilësi e garantuar');

-- --------------------------------------------------------

--
-- Table structure for table `about_values`
--

CREATE TABLE `about_values` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_values`
--

INSERT INTO `about_values` (`id`, `title`, `description`, `icon_class`, `image`) VALUES
(1, 'Misioni', 'Ofrojmë produkte sigurie moderne dhe të besueshme për çdo klient.', 'fa-solid fa-bullseye', NULL),
(2, 'Vizioni', 'Të jemi lider në tregun e sigurisë dhe teknologjisë intelegjente.', 'fa-solid fa-eye', NULL),
(3, 'Besimi', 'Ndërtojmë marrëdhënie afatgjata me klientët tanë.', 'fa-solid fa-star', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE `home_content` (
  `id` int(11) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_content`
--

INSERT INTO `home_content` (`id`, `section`, `title`, `description`) VALUES
(1, 'slider', 'Siguro shtëpinë tënde sot', 'Siguria më e mirë, çmimet më të mira'),
(2, 'slider', 'Teknologji e avancuar', 'Kamera dhe pajisje për mbrojtje të plotë'),
(3, 'slider', 'Mbështetje 24/7', 'Gjithmonë në dispozicion për çdo pyetje'),
(4, 'why', 'Siguri Maksimale', 'Pajisje orgjinale dhe teknologji e avancuar për mbrojtje totale'),
(5, 'why', 'Instalim Profesional', 'Teknikët tanë sigurojnë montim të shpejtë dhe të pastër'),
(6, 'why', 'Mbështetje 24/7', 'Gjithmonë në dispozicion për çdo pyetje ose problem');

-- --------------------------------------------------------

--
-- Table structure for table `kontakti`
--

CREATE TABLE `kontakti` (
  `kontakti_id` int(11) NOT NULL,
  `emri_mbiemri` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `subjekti` varchar(100) NOT NULL,
  `mesazhi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontakti`
--

INSERT INTO `kontakti` (`kontakti_id`, `emri_mbiemri`, `email`, `subjekti`, `mesazhi`) VALUES
(1, 'Bledi Ramadani', 'ramadanibledi20@gmail.com', 'test', 'Testim'),
(2, 'Bledi Ramadani', 'ramadanibledi20@gmail.com', 'test', 'testim'),
(3, 'Bledi Ramadani', 'ramadanibledi20@gmail.com', 'test', 'testim'),
(9, 'Sharr Ismaili', 'sharri12@gmail.com', 'Pyetje', 'Shume bukur projekti, urime!');

-- --------------------------------------------------------

--
-- Table structure for table `porosi`
--

CREATE TABLE `porosi` (
  `porosi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `porosi`
--

INSERT INTO `porosi` (`porosi_id`, `user_id`, `total`, `data`) VALUES
(1, 7, 900.00, '2026-02-01 19:50:04'),
(2, 7, 120.00, '2026-02-01 19:53:06'),
(3, 3, 150.00, '2026-02-01 19:56:28'),
(4, 10, 285.00, '2026-02-01 20:29:46'),
(5, 3, 435.00, '2026-02-01 21:25:07'),
(6, 11, 330.00, '2026-02-01 22:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `porosi_items`
--

CREATE TABLE `porosi_items` (
  `item_id` int(11) NOT NULL,
  `porosi_id` int(11) NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `cmimi` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `porosi_items`
--

INSERT INTO `porosi_items` (`item_id`, `porosi_id`, `produkt_id`, `emri`, `cmimi`, `qty`, `subtotal`, `foto`) VALUES
(1, 1, 2, 'Alarm Shtëpie', 180.00, 1, 180.00, 'alarm.jpg'),
(2, 1, 5, 'Hikivision DVR', 285.00, 2, 570.00, 'hikivision.jpg'),
(3, 1, 4, 'Kamerë Sigurie ', 150.00, 1, 150.00, 'kamera3.jpg'),
(4, 2, 1, 'Kamerë Sigurie HD', 120.00, 1, 120.00, 'kamera1.jpg'),
(5, 3, 4, 'Kamerë Sigurie ', 150.00, 1, 150.00, 'kamera3.jpg'),
(6, 4, 5, 'Hikivision DVR', 285.00, 1, 285.00, 'hikivision.jpg'),
(7, 5, 4, 'Kamerë Sigurie ', 150.00, 1, 150.00, 'kamera3.jpg'),
(8, 5, 5, 'Hikivision DVR', 285.00, 1, 285.00, 'hikivision.jpg'),
(9, 6, 4, 'Kamerë Sigurie ', 150.00, 1, 150.00, 'kamera3.jpg'),
(10, 6, 2, 'Alarm Shtëpie', 180.00, 1, 180.00, 'alarm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produkte`
--

CREATE TABLE `produkte` (
  `produkt_id` int(11) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `pershkrimi` varchar(60) NOT NULL,
  `cmimi` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkte`
--

INSERT INTO `produkte` (`produkt_id`, `emri`, `pershkrimi`, `cmimi`, `user_id`, `foto`, `pdf`) VALUES
(1, 'Kamerë Sigurie HD', 'Kamera sigurie 1080p, IR', 120, 1, 'kamera1.jpg', NULL),
(2, 'Alarm Shtëpie', 'Sistem sigurie modern', 180, 1, 'alarm.jpg', NULL),
(4, 'Kamerë Sigurie ', 'Rezulcion HD', 150, 2, 'kamera3.jpg', NULL),
(5, 'Hikivision DVR', 'Hikivision DVR 4-Channel HD 1080p TVI', 285, 1, 'hikivision.jpg', NULL),
(6, 'Alarm Shtëpie', 'Sistem modern sigurie', 160, 3, 'alarm1.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `mbiemri` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `emri`, `mbiemri`, `email`, `password`, `isAdmin`) VALUES
(1, 'Bledi', 'ramadani', 'ramadanibledi20@gmail.com', '$2y$10$EwC2j03NExfmTVuqhdn8AOCyUc16OG.EljFkZqLYtPg5BSptYWM1e', 0),
(2, 'Ledi', 'ledi', 'ledi21@gmail.com', '$2y$10$Kf6y34AKTz8SvUaqhChXCueo5dejg15kY3nfHaKBfnsSH/pbk5X0u', 0),
(3, 'Admin', 'Test', 'admin@21.com', '$2y$10$SoICbqMKU2sQqnBRkf4BP.gdY95L3vIpL3j5R4a8c6TOJZdI5Ww1.', 1),
(4, 'user', 'useri1', 'user@gmail.com', '$2y$10$z/wA1kqguAQtEykurEufJ.iDUZ93DnZOxEzYta5D6n/TXDHOVh2SS', 0),
(5, 'ensar', 'loki', 'ensari@gmail.com', '$2y$10$jax5kih7JU3/xQD3X2PxNuNFCgDE3BNVepQT3K.fd2fb10kPsjxdu', 0),
(7, 'trim', 'trimi', 'trim12@gmail.com', '$2y$10$cZMxVGcauaRAK.8G0GJTM.MzIhQjtmZEwK4FpCc92nUpzwBC09pwG', 0),
(10, 'bledi', 'ramadani', 'bledi14@gmail.com', '$2y$10$FxH3htxJwrhSblpsyX8wk.I3fZTQWXlWJj.4jfzRPXkQ8fijMUHeO', 0),
(11, 'sharri', 'Ismaili', 'sharri12@gmail.com', '$2y$10$KJgSI2/rIniSnNtn7E4k8.t8FaUTgjpLIKOj9QZn17ICdFENfuwJe', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_content`
--
ALTER TABLE `about_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_values`
--
ALTER TABLE `about_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_content`
--
ALTER TABLE `home_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakti`
--
ALTER TABLE `kontakti`
  ADD PRIMARY KEY (`kontakti_id`);

--
-- Indexes for table `porosi`
--
ALTER TABLE `porosi`
  ADD PRIMARY KEY (`porosi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `porosi_items`
--
ALTER TABLE `porosi_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `porosi_id` (`porosi_id`);

--
-- Indexes for table `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`produkt_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_content`
--
ALTER TABLE `about_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_values`
--
ALTER TABLE `about_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_content`
--
ALTER TABLE `home_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kontakti`
--
ALTER TABLE `kontakti`
  MODIFY `kontakti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `porosi`
--
ALTER TABLE `porosi`
  MODIFY `porosi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `porosi_items`
--
ALTER TABLE `porosi_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produkte`
--
ALTER TABLE `produkte`
  MODIFY `produkt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `porosi`
--
ALTER TABLE `porosi`
  ADD CONSTRAINT `porosi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `porosi_items`
--
ALTER TABLE `porosi_items`
  ADD CONSTRAINT `porosi_items_ibfk_1` FOREIGN KEY (`porosi_id`) REFERENCES `porosi` (`porosi_id`);

--
-- Constraints for table `produkte`
--
ALTER TABLE `produkte`
  ADD CONSTRAINT `produkte_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
