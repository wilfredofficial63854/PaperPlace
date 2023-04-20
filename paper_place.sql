-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 11:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paper_place`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email_address` text NOT NULL,
  `pass_word` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email_address`, `pass_word`) VALUES
(1, 'admin', 'admin@paperplace.com', '$2y$10$ZXbMFhBiV1tf1gsQqBAbwei0NMNxXZpFeMDT828LSmw1QCOYVAkmy');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` text NOT NULL,
  `product_name` text NOT NULL,
  `quantity` text NOT NULL DEFAULT '1',
  `amount` text NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `quantity`, `amount`, `user_id`) VALUES
(1, '6', 'Apples', '1', '150', ''),
(2, '6', 'Apples', '1', '150', ''),
(3, '6', 'Apples', '1', '150', ''),
(4, '6', 'Apples', '1', '150', '0201144293'),
(5, '6', 'Apples', '17', '2550', '0201144293'),
(6, '4', 'Salad', '1', '200', '0201144293');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `product_id` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_description` text NOT NULL,
  `product_category` text NOT NULL,
  `unit_price` text NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_category`, `unit_price`, `product_image`) VALUES
(33, 'Hghlighter Pen', 'This pen features a chisel tip that allows you to easily highlight important text in a variety of colors. With its smooth and consistent ink flow, you can quickly and efficiently highlight information in books, notes, and other documents. ', 'Writing Instruments', '20', '6441ad30b7a89_6-1238605__480.jpg'),
(34, 'Ballpoint Pen', 'This pen features a retractable tip that protects the ink and prevents it from drying out, ensuring that your writing experience is smooth and consistent every time. ', 'Writing Instruments', '10', '6441ad9418a68_ballpoint-pen-342291__480.jpg'),
(35, 'Attachement Pins', 'These pins are perfect for securely attaching documents, notes, and other items together. ', 'Filing and Storage', '10', '6441ae4eb5e9d_paperclip-7027609__480.jpg'),
(37, 'Stapler', 'This stapler is perfect for securely attaching documents, notes, and other items together. With its durable construction and easy-to-use design, you can quickly and efficiently staple multiple pages together.', 'Desc Accessories', '10', '6441af0f7e283_vintage-stapler-2350695__480.jpg'),
(39, 'Binders', 'These binders are perfect for organizing and stori...', 'Filing and Storage', '20', '6441b113a69a0_stationary-4855771__480.jpg'),
(40, 'Highlighter', 'This pen features a chisel tip that allows you to easily highlight important text in a variety of colors. With its smooth and consistent ink flow, you can quickly and efficiently highlight information in books, notes, and other documents. ', 'Writing Instruments', '15', '6441b1682092c_artistic-1238606__480.jpg'),
(42, 'Ballpoint Pen', 'This pen features a retractable tip that protects the ink and prevents it from drying out, ensuring that your writing experience is smooth and consistent every time. ', 'Writing Instruments', '5', '6441b1ca7c692_composition-3288396__480.jpg'),
(43, 'Attachement Pins', 'These pins are perfect for securely attaching documents, notes, and other items together. ', 'Filing and Storage', '18', '6441b1ef7266b_composition-3288398__480.jpg'),
(44, 'Colourd Pencils', 'Introducing our high-quality colored pencils! These pencils are perfect for artists, designers, and anyone who loves to draw or color. With their vibrant colors and smooth application, they allow you to bring your artwork to life.', 'Writing Instruments', '15', '6441b22527c36_art-1238602__480.jpg'),
(45, 'Note Books', 'These notebooks are perfect for students, professionals, and anyone who loves to jot down notes and ideas. ', 'Paper Products', '30', '6441b2598452e_notebook-5370028__480.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email_address` text NOT NULL,
  `pass_word` text NOT NULL,
  `city` text NOT NULL,
  `region` text NOT NULL,
  `phone_number` text NOT NULL,
  `dob` date NOT NULL,
  `sex` text NOT NULL,
  `photo` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email_address`, `pass_word`, `city`, `region`, `phone_number`, `dob`, `sex`, `photo`, `country`) VALUES
(2, 'Wilfred Baduommie Wubonto', 'wilfredofficial63854@gmail.com', '$2y$10$ZcnD0QUORVJOUojMJernoexk3ExbLraSHPb17n2Yp8gbBv/KuOfsG', 'Tumu', 'Upper West', '0201144293', '2000-10-12', 'Male', '64405102ab6e6_img2.webp', 'Ghana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
