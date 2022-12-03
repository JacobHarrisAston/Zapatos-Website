-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2022 at 01:41 PM
-- Server version: 8.0.31-0ubuntu0.20.04.2
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_220036425_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_email`, `a_username`, `a_pass`) VALUES
(2, 'admin@gmail.com', 'adminA', 'admin321');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_pass` varchar(100) NOT NULL,
  `c_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_email`, `c_pass`, `c_username`) VALUES
(17, 'johndoe@gmail.com', 'a000786c761a773029f71e5d52cc3c7d', 'johnD'),
(18, 'customer1@gmail.com', '055ca2cf5d92defc5dcdd39ffd62e382', 'customer1');

-- --------------------------------------------------------

--
-- Table structure for table `kids_items`
--

CREATE TABLE `kids_items` (
  `article_no` varchar(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL,
  `cost` float NOT NULL,
  `photo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kids_items`
--

INSERT INTO `kids_items` (`article_no`, `product_name`, `type`, `colour`, `description`, `cost`, `photo`) VALUES
('k-1', 'NEON PINK HIGH BOOTS', 'kids', 'pink', 'With a comfortable padding, these boots will put the young kids toes cosy. Flexible fitment is made possible by the shoe straps.', 24, 'k-1.png'),
('k-10', 'FLOWERY LACED SHOES', 'kids', 'black', 'These brand-new black sneakers with a quirky sunflower design are available for kids! Comprised of an outsole with stability and a white leather top with distinctive branding.  ', 24, 'k-10.png'),
('k-2', 'YELLOW BASKETBALL SHOES', 'kids', 'yellow', 'These stylish elevated sneakers are ideal for wearing on the weekends. They feature comfortable twin rip tape fastenings for simple access and removal. \r\n\r\n ', 39, 'k-2.png'),
('k-3', 'TURQUISE CROCS', 'kids', 'blue', 'Crocs are trendy, so don\'t panic. Particularly with this kid\'s favourite turquoise blue Traditional Shoe. These truly stand out thanks to their timeless branding and convenient ankle band. ', 14, 'k-3.png'),
('k-4', 'DINO LACED SHOES', 'kids', 'black', 'Our premier character design specialist created our sports shoes. These sneakers have a cool dinosaur graphic on a black and grey background. ', 19, 'k-4.png'),
('k-5', 'SCHOOL LACED SHOES', 'kids', 'black', 'Your kid\'s school uniform would look great with these lace-up new shoes. Made with the best fabric to stop microorganisms that cause odours, so toes remain refreshing. ', 24, 'k-5.png'),
('k-6', 'BABY BLUE SHOES', 'kids', 'blue', 'Our latest baby blue children\'s sneaker is made where convenience and attractiveness converge. As kids explore the mysteries of life, gripping soles and ventilated liners keep feet refreshed and stabl', 19, 'k-6.png'),
('k-7', 'BEIGE WINTER BOOTS', 'kids', 'brown', 'This miniature version of our traditional beige winter boots was created using supple sandy brogues. Classic characteristics like brogue stitching and a simple lace-up closure are combined with outsta', 29, 'k-7.png'),
('k-8', 'GREEN LEAF FLIPFLOPS', 'kids', 'green', 'The adjustable bands on the green flip-flops guarantee a precisely moulded fit, and they are quick drying for immediate ease. These shoes will make the beach the ideal playroom, allowing you to run on', 9, 'k-8.png'),
('k-9', 'NAVY BLUE SNEAKERS', 'kids', 'blue', 'These sneakers are sleek and useful option for weekend trips. They have double lace-up fastenings for simple access and removal. ', 24, 'k-9.png');

-- --------------------------------------------------------

--
-- Table structure for table `men_items`
--

CREATE TABLE `men_items` (
  `article_no` varchar(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL,
  `cost` float NOT NULL,
  `photo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `men_items`
--

INSERT INTO `men_items` (`article_no`, `product_name`, `type`, `colour`, `description`, `cost`, `photo`) VALUES
('m-1', 'NEON BLUE CROCS', 'male', 'blue', 'Slide on and go with this water-friendly, personalised experience that has a vented front, a bottom that has been specially moulded to provide superior ankle support, and a collar band. ', 29, 'm-1.png'),
('m-10', 'WHITE CASUAL SNEAKERS', 'male', 'white', 'The familiar and beloved style, but with a striking platform sole. Double-layered  fabric highlights the raised forefoot further to draw attention to the contours. ', 54, 'm-10.png'),
('m-2', 'BLACK STRIPED SLIDES', 'male', 'black', 'A distinctive look for slippery surfaces. These quick-drying slides is embellished with 3-Stripes. The footbed\'s plush padding offers the highest level of comfort both inside and outside. ', 24, 'm-2.png'),
('m-3', 'BEIGE FORMAL SHOES ', 'male', 'brown', 'With a natural durable velvet outsole for solid grip both inside and out, these elegant men\'s velvet brogues may be worn up or down for any events. ', 59, 'm-3.png'),
('m-4', 'GREEN ANKLE BOOTS ', 'male', 'green', 'They have a supple synthetic lining that makes them feel as nice as they look, and an inner zip makes access simple. ', 44, 'm-4.png'),
('m-5', 'MONTONE SNEAKERS', 'male', 'white', 'This season, get a tennis kick from your preferred retailer. These monotone comfort sneakers have a straightforward style and is made of perforated white and black fabric to keep you cool all day. ', 49, 'm-5.png'),
('m-6', 'BLACK AIR SNEAKERS ', 'male', 'black', 'This premium Fabric men\'s sneaker\'s upper is created in a sustainable abattoir that has earned a silver rating for its environmental practises. ', 44, 'm-6.png'),
('m-7', 'MAROON CANVAS SHOES', 'male', 'red', 'These burgundy men\'s slip-on canvas shoes are fashionable and the perfect finishing touch for an ensemble because they are made for ease of wear and convenience. They feature rubber soles and detachab', 49, 'm-7.png'),
('m-8', 'BEIGE ANKLE BOOTS ', 'male', 'yellow', 'These classic ankle boots in beige are both fashionable and functional. Featuring low block pumps with a pull-on style. Antibacterial cushioning and blemish features to keep your feet pleasant and you', 54, 'm-8.png'),
('m-9', 'FORMAL BROWN BROGUES', 'male', 'brown', 'With these formal brown Brogue, your formal attire will be upgraded. With embroidered seams and a brown upper fabric, this shoe exudes luxury. A small heel raises, and a tulle closure fulfils the look', 59, 'm-9.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int NOT NULL,
  `article_no` varchar(11) NOT NULL,
  `c_username` varchar(50) NOT NULL,
  `size` int NOT NULL,
  `quantity` int NOT NULL,
  `type` varchar(30) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `article_no`, `c_username`, `size`, `quantity`, `type`, `cost`) VALUES
(8, 'm-2', 'johnD', 8, 1, 'male', 24);

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `order_no` int NOT NULL,
  `article` varchar(20) NOT NULL,
  `temp_size` int NOT NULL,
  `temp_quantity` int NOT NULL,
  `temp_cost` float NOT NULL,
  `temp_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `women_items`
--

CREATE TABLE `women_items` (
  `article_no` varchar(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL,
  `cost` int NOT NULL,
  `photo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `women_items`
--

INSERT INTO `women_items` (`article_no`, `product_name`, `type`, `colour`, `description`, `cost`, `photo`) VALUES
('w-1', 'CASUAL STRIPED SNEAKER ', 'female', 'black', 'Want something classic? You\'ve discovered it when you walk outside wearing these adidas Casual Striped Sneakers.  It\'s hard to resist wearing them all the time when they have 3-Stripes. Don\'t pass up ', 49, 'w-1.png'),
('w-10', 'RED CANVAS SHOES', 'female', 'red', 'This timeless shoe has a basic flat top, lace-up design with strong canvas uppers and distinctive rubber soled shoes.', 39, 'w-10.png'),
('w-2', 'RETRO SHINY BOOTS', 'female', 'black', 'Retro Shiny Boot ensures that your foot is properly positioned inside of your shoes and enhances the natural rotary motion of the heel of the foot, making walking in boots more pleasant. ', 34, 'w-2.png'),
('w-3', 'NUDE COMFORT TRAINERS', 'female', 'brown', 'A moderate walking shoe with a soft-landing spot to reduce discomfort, a curved base shape, and a firm front to aid improve walking efficiency so you can go farther for more.', 59, 'w-3.png'),
('w-4', 'PINK STRIPED SLIDES', 'female', 'pink', 'A distinctive look for slippery surfaces. These pink quick-drying slides is embellished with 3-Stripes. The footbed\'s plush padding offers the highest level of comfort both inside and outside. ', 24, 'w-4.png'),
('w-5', 'LACED HIGH TOPS  ', 'female', 'white', 'Your shoe collection will be enhanced by the white Laced High Tops!  Featuring a white canvas top, traditional patched logo.  Finished with a robust outsole, this vintage high top looks great! ', 49, 'w-5.png'),
('w-6', 'BASKETBALL SNEAKERS', 'female', 'blue', 'These legendary shoes have a leather upper and Jordan Air padding for all-day comfort. With these Jordans, you can have an on-court appearance that matches your skill level. ', 79, 'w-6.png'),
('w-7', 'CLASSIC NUDE HEELS ', 'female', 'pink', 'With these heels, revamp your weekend outfit. Fall in love with these shoes, since they have a pointy toe and a dual sole base.', 54, 'w-7.png'),
('w-8', 'PINK ANKLE BOOTS ', 'female', 'pink', 'A contemporary style with a crepe-effect and natural rubber sole for casual elegance. ', 29, 'w-8.png'),
('w-9', 'POINTED WHITE HEELS ', 'female', 'white', 'If you want the perfect weekend look or something for the workplace, get yourself these pointed white heels. This style comes with an upper composed of white material that has a sassy front and lots o', 59, 'w-9.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `kids_items`
--
ALTER TABLE `kids_items`
  ADD PRIMARY KEY (`article_no`);

--
-- Indexes for table `men_items`
--
ALTER TABLE `men_items`
  ADD PRIMARY KEY (`article_no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `c_id` (`c_username`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `women_items`
--
ALTER TABLE `women_items`
  ADD PRIMARY KEY (`article_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `order_no` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
