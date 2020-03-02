-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 08:15 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(1, 'smartphones', 'Smartphone'),
(2, 'laptops', 'Laptops'),
(3, 'game-console', 'Game Console'),
(4, 'personal-computer', 'Personal Computer'),
(5, 'shoes', 'Shoes'),
(6, 'games', 'Games');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('waiting','paid','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `phone`, `status`) VALUES
(1, 4, '2020-01-26', '420200126125029', 14500000, 'Fatur', 'sdasdasdsad', '8739274893', 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `orders_confirm`
--

CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `id_orders`, `id_product`, `qty`, `subtotal`) VALUES
(1, 1, 6, 1, 14500000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `price`, `is_available`, `image`) VALUES
(2, 1, 'smartphone-asus', 'Smartphone Asus', 'Smartphone dari Asus', 5000000, 1, 'smartphone.jpg'),
(3, 5, 'sepatu-asus-sneakers', 'Sepatu Asus Sneakers', 'Ini adalah sepatu asus sneakers terbaru', 500000, 1, 'sepatu-asus-sneakers-20200121214602.jpg'),
(4, 3, 'playstation-5', 'Playstation 5', 'Most of the important details of the PlayStation 5 are unconfirmed, such as its price and lineup of launch games, but if the rumor about a February event is true, it will not be long before PlayStation fans find out how the new console stacks up against i', 10000000, 1, 'playstation-5-20200125121655.jpg'),
(5, 1, 'iphone-x', 'iPhone X', 'Visi Apple sejak awal adalah menciptakan iPhone yang sepenuhnya layar. Yang begitu menghanyutkan sehingga tak ada lagi batasan antara perangkat dan pengalaman. Dan begitu cerdas sehingga dapat merespons dengan sekali sentuh, atau bahkan sekali pandang. De', 18000000, 1, 'iphone-x-20200125121816.jpg'),
(6, 4, 'pc-gaming-setup', 'PC Gaming Setup', 'Rakitan budget PC Gaming selanjutnya adalah Kelas High-End, pada kelas ini kita menggunakan prosesor Intel Core i5-9600K dan VGA RTX 2060. Dengan kedua monster ini kita bisa memainkan semua game dengan settingan ultra tanpa lag dan tanpa gangguan sedikutp', 14500000, 1, 'pc-gaming-setup-20200125121932.jpg'),
(7, 3, 'x-box-one-x', 'X Box One X', 'Project Scorpio has finally reached its apotheosis as the Xbox One X. Microsoft calls this heavily upgraded version of the Xbox One the world\'s most powerful console, and discounting gaming PCs, this seems to be the case. It follows the same logic as the ', 8000000, 1, 'x-box-one-x-20200126135704.jpg'),
(8, 6, 'pes-2020', 'PES 2020', 'Farewell, then, Trad Brick Stadium. The PES staple is gone, replaced by a meticulously detailed recreation of Old Trafford, as part of a partnership of as-yet-undetermined length between Konami and the team series veterans have come to know as Man Red. Th', 750000, 1, 'pes-2020-20200126135822.jpg'),
(9, 6, 'fifa-2020', 'FIFA 2020', 'Made the following changes:\r\n\r\nGoalkeepers will be more likely to push the ball further away from the net when they make a save that would result in a rebound.\r\n\r\nImproved the responsiveness of dribbling, when not using any dribbling modifiers or skill mo', 800000, 1, 'fifa-2020-20200126140003.jpg'),
(10, 1, 'samsung-galaxy-s10', 'Samsung Galaxy S10', 'Processor : Octa-core (2.7GHz Dual + 2.3GHz Dual + 1.9GHz Quad)\r\nOS : Android 9.0\r\nUkuran Layar : 6.1 Inch\r\nKamera (Utama) : 12MP OIS (F1.5/F2.4 Dual Pixel, Dual Aperture) + 16MP (F2.2) + 12MP OIS (F2.4) with LED flash Kamera (Depan) : Dual Pixel, 10MP, F', 11000000, 1, 'samsung-galaxy-s10-20200126140119.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `is_active`, `image`) VALUES
(1, 'Fatur', 'muqiit@mail.com', '$2y$10$zwsA2J0X88TeP3FvxCeNjOiyxL97NBREed0I0/M6s59rIH6FF.2ve', 'member', 1, 'muqiit-20200125115149.jpg'),
(3, 'Admin', 'admin@mail.com', '$2y$10$/ZTnwDMLDSdJ5RJ0l3C3sOjC2lpC0oK5tj0vxahmTrDyzSH.x0lAS', 'admin', 1, 'default.jpg'),
(4, 'Anto', 'anto@mail.com', '$2y$10$lPWOVevohC9dK1kvGejPuOrC1K.J0cuUkFLQMzoHZ9nAFRsplSZCa', 'member', 1, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
