-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 12:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `descrption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forums_comments`
--

CREATE TABLE `forums_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `release_date` date NOT NULL,
  `difficulty` varchar(20) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `rating_Age` int(11) NOT NULL,
  `ratings` double NOT NULL,
  `covers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `release_date`, `difficulty`, `publisher_id`, `rating_Age`, `ratings`, `covers`) VALUES
(1, 'Free Fire', 'Frefire adalah game fps', '2021-06-10', 'Easy', 1, 13, 4, '1.jpg'),
(2, 'Genshin Impact', 'Default', '2021-06-10', 'Medium', 1, 15, 4, '2.jpg'),
(3, 'Minecraft', 'Default', '2021-06-10', 'Medium', 1, 15, 4, 'dummy.jpg'),
(4, 'Dota 2', 'Default', '2021-06-10', 'Hard', 1, 15, 4, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `game_categories`
--

CREATE TABLE `game_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `game_category`
--

CREATE TABLE `game_category` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `game_publisher`
--

CREATE TABLE `game_publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `country` varchar(30) DEFAULT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_publisher`
--

INSERT INTO `game_publisher` (`id`, `name`, `description`, `country`, `cover`) VALUES
(1, 'None', 'This is default', NULL, 'dummy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('AKTIF','NONAKTIF') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `nama`, `password`, `status`) VALUES
(1, 'spongebob', 'spongebob@gmail.com', '', '$2y$10$sfy6pvnX5zNTPgSPgW40weyLEEM29rbP7MG7.9gBqqa/LT2iayNmy', 'AKTIF'),
(2, 'patrik', 'patrik@gmail.com', 'Patrik Star', '$2y$10$v8fVsBmmavzjdsQlniJPc.EZvB71rR.EOMnWlULwmv20JNS6uRJDy', NULL),
(3, 'squidword', 'squid@gmail.com', 'Squidword Tentacles', '$2y$10$/LID3Jlo2zdbjX3gf1U82OTxCRf20xmSVzxw9GWe1uvVY8JdoVRZ6', NULL),
(4, 'mrcrab', 'crab@gmail.com', 'Tuan Crab', '$2y$10$TEhjoG3YH/GbxC/lfKspEumpZPNMo1xviuN919zPmLanzaz7/xG3e', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `forums_comments`
--
ALTER TABLE `forums_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_category`
--
ALTER TABLE `game_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `game_id_2` (`game_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `game_publisher`
--
ALTER TABLE `game_publisher`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums_comments`
--
ALTER TABLE `forums_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_category`
--
ALTER TABLE `game_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_publisher`
--
ALTER TABLE `game_publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `forums_comments`
--
ALTER TABLE `forums_comments`
  ADD CONSTRAINT `forums_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `forums_comments_ibfk_2` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `game_publisher` (`id`);

--
-- Constraints for table `game_category`
--
ALTER TABLE `game_category`
  ADD CONSTRAINT `game_category_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `game_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `game_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
