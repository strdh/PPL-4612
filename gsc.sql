-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 07:46 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$gredDXNhGHrq5nBuHETnhOUDhgYBs1R1TsSK2fc12rZGdofV4DlPS');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `game_id` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `descrption` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `name`, `game_id`, `date_created`, `descrption`) VALUES
(1, 'Free Fire', 11, '2021-06-20', ''),
(5, 'Valorant', 9, '2021-07-08', NULL),
(6, 'Apex Legends', 12, '2021-07-08', NULL),
(7, 'Point Blank', 10, '2021-07-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id_comment` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`id_comment`, `id_forum`, `username`, `comment`, `time`) VALUES
(1, 1, 'mrcrab', 'Mana pintunya', '2021-07-07 14:25:53'),
(2, 1, 'mrcrab', 'fadsf', '2021-07-07 14:42:11'),
(3, 1, 'plankton', 'Diam kau crab', '2021-07-07 14:43:31'),
(4, 1, 'mrcrab', 'Chum bucket cupu', '2021-07-07 15:20:34'),
(5, 1, 'plankton', 'By One Bos', '2021-07-07 15:22:13'),
(6, 1, 'mrcrab', 'Mantap', '2021-07-07 16:00:43'),
(7, 5, 'plankton', 'Hai Halo', '2021-07-07 17:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(800) NOT NULL,
  `release_date` date NOT NULL,
  `categories` varchar(500) DEFAULT NULL,
  `difficulty` varchar(20) DEFAULT NULL,
  `publisher_id` int(11) NOT NULL,
  `rating_age` int(11) DEFAULT NULL,
  `ratings` double DEFAULT 0,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `release_date`, `categories`, `difficulty`, `publisher_id`, `rating_age`, `ratings`, `cover`) VALUES
(9, 'Valorant', '<p>Valorant adalah penembak pahlawan orang pertama taktis multipemain gratis untuk dimainkan yang dikembangkan dan diterbitkan oleh Riot Games, untuk Microsoft Windows</p>', '2020-06-22', 'FPS', 'MEDIUM', 19, 13, 0, '21062021173714.jpg'),
(10, 'Point Blank', '<p>Point Blank adalah sebuah permainan komputer ber-genre FPS yang dimainkan secara online. Permainan ini dikembangkan oleh Zepetto dari Korea Selatan dan dipublikasikan oleh Zepetto</p>', '2021-06-21', 'FPS Adventure Action', 'MEDIUM', 1, 13, 0, '21062021174158.jpg'),
(11, 'Free Fire', '<p>Garena Free Fire atau biasa disebut Free Fire (sering disingkat FF) adalah permainan battle royale yang dikembangkan oleh 111 Dots Studio dan diterbitkan oleh Garena untuk Android dan iOS. Itu menjadi permainan seluler yang paling banyak diunduh secara global pada tahun 2019. Karena popularitasnya, permainan ini menerima penghargaan untuk &quot;Best Popular Vote Game&quot; oleh Google Play Store</p>', '2017-09-30', 'Battle Royale', 'EASY', 20, 13, 0, '22062021092039.jpg'),
(12, 'Apex Legends', '<p>Apex Legends is an&nbsp;<strong>online multiplayer battle royale game</strong>&nbsp;featuring squads of three players using pre-made characters (called &quot;Legends&quot;), similar to those of hero shooters. Alternate modes have been introduced allowing for single and for two-player squads since the game&#39;s release.</p>', '2019-02-01', 'Battle Royale FPS', 'MEDIUM', 21, 15, 8, '24062021012648.jpg'),
(14, 'Gensin Impact', '<p>Genshin Impact adalah permainan free-to-play action RPG dunia terbuka yang dikembangkan oleh miHoYo. Genshin Impact juga merupakan IP kedua yang dibesut oleh miHoYo setelah Honkai Impact 3.</p>', '2020-09-28', 'MMRPG', 'MEDIUM', 18, 12, 15, '24062021012617.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `game_categories`
--

CREATE TABLE `game_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_categories`
--

INSERT INTO `game_categories` (`id`, `name`) VALUES
(2, 'RPG'),
(3, 'Adventure Action'),
(5, 'FPS'),
(6, 'MMRPG'),
(7, 'Battle Royale');

-- --------------------------------------------------------

--
-- Table structure for table `game_players`
--

CREATE TABLE `game_players` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `user_game_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_players`
--

INSERT INTO `game_players` (`id`, `id_user`, `id_game`, `user_game_id`) VALUES
(1, 4, 14, 'rmrcrab455'),
(2, 4, 12, 'mrcrab555'),
(3, 5, 14, 'whatzit'),
(4, 6, 14, 'plankton');

-- --------------------------------------------------------

--
-- Table structure for table `game_publisher`
--

CREATE TABLE `game_publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(800) NOT NULL,
  `country` varchar(30) DEFAULT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_publisher`
--

INSERT INTO `game_publisher` (`id`, `name`, `description`, `country`, `cover`) VALUES
(1, 'None', 'This is default', NULL, ''),
(18, 'Mihoyo', '<p><em>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Ad&nbsp;dignissimos&nbsp;quos&nbsp;assumenda&nbsp;veritatis,&nbsp;quasi&nbsp;hic,&nbsp;accusamus&nbsp;ipsam&nbsp;a&nbsp;ipsum&nbsp;dolorem&nbsp;distinctio&nbsp;nihil&nbsp;nobis&nbsp;quaerat&nbsp;eum&nbsp;iste&nbsp;minus&nbsp;excepturi,&nbsp;exercitationem&nbsp;placea</em></p>', 'China', '17062021090505.png'),
(19, 'Riot Games', '<p><em>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Ad&nbsp;dignissimos&nbsp;quos&nbsp;assumenda&nbsp;veritatis,&nbsp;quasi&nbsp;hic,&nbsp;accusamus&nbsp;ipsam&nbsp;a&nbsp;ipsum&nbsp;dolorem&nbsp;distinctio&nbsp;nihil&nbsp;nobis&nbsp;quaerat&nbsp;eum&nbsp;iste&nbsp;minus&nbsp;excepturi,&nbsp;exercitationem&nbsp;placea</em></p>', 'US', '17062021090718.png'),
(20, 'Garena', '<p><em>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Ad&nbsp;dignissimos&nbsp;quos&nbsp;assumenda&nbsp;veritatis,&nbsp;quasi&nbsp;hic,&nbsp;accusamus&nbsp;ipsam&nbsp;a&nbsp;ipsum&nbsp;dolorem&nbsp;distinctio&nbsp;nihil&nbsp;nobis&nbsp;quaerat&nbsp;eum&nbsp;iste&nbsp;minus&nbsp;excepturi,&nbsp;exercitationem&nbsp;placea</em></p>', 'China', '17062021090816.jpg'),
(21, 'Epic Games', '<p><em>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Ad&nbsp;dignissimos&nbsp;quos&nbsp;assumenda&nbsp;veritatis,&nbsp;quasi&nbsp;hic,&nbsp;accusamus&nbsp;ipsam&nbsp;a&nbsp;ipsum&nbsp;dolorem&nbsp;distinctio&nbsp;nihil&nbsp;nobis&nbsp;quaerat&nbsp;eum&nbsp;iste&nbsp;minus&nbsp;excepturi,&nbsp;exercitationem&nbsp;placea</em></p>', '', '17062021090835.jpeg'),
(22, 'Valve', '<p>Valve Corporation, juga dikenal sebagai Valve Software, adalah pengembang permainan video Amerika, penerbit, dan perusahaan distribusi digital yang berkantor pusat di Bellevue, Washington. Ini adalah pengembang platform aplikasi perangkat lunak Steam dan Half-Life, Counter-Strike, Portal, Day of Defeat, Team Fortress, Left 4 Dead, dan seri Dota.</p>', 'US', '22062021121230.png');

-- --------------------------------------------------------

--
-- Table structure for table `game_ratings`
--

CREATE TABLE `game_ratings` (
  `id` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_ratings`
--

INSERT INTO `game_ratings` (`id`, `id_game`, `id_user`, `value`) VALUES
(1, 14, 4, 1),
(2, 14, 4, 1),
(3, 14, 4, 5),
(4, 12, 4, 5),
(5, 12, 5, 3),
(6, 14, 5, 5),
(7, 14, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `id_user`, `activity`, `url`, `time`) VALUES
(1, 4, 'Melakukan edit profil', NULL, '2021-07-02 23:06:58'),
(2, 4, 'Memberi rating bintang 5 Kepada game 14', NULL, '2021-07-03 01:01:21'),
(3, 4, 'Memberi rating bintang 5 Kepada game 12', NULL, '2021-07-07 08:34:03'),
(4, 4, 'Melakukan edit profil', NULL, '2021-07-07 08:36:34'),
(5, 4, 'Melakukan edit profil', NULL, '2021-07-07 08:37:27'),
(6, 5, 'Memberi rating bintang 3 Kepada game 12', NULL, '2021-07-07 08:57:58'),
(7, 5, 'Memberi rating bintang 5 Kepada game 14', NULL, '2021-07-07 12:45:48'),
(8, 6, 'Memberi rating bintang 4 Kepada game 14', NULL, '2021-07-07 12:46:56'),
(9, 4, 'Berkomentar di forum 1,mrcrab', NULL, '2021-07-07 14:25:53'),
(10, 4, 'Berkomentar di forum 1', NULL, '2021-07-07 14:42:11'),
(11, 6, 'Berkomentar di forum 1', NULL, '2021-07-07 14:43:31'),
(12, 4, 'Berkomentar di forum 1', NULL, '2021-07-07 15:20:35'),
(13, 6, 'Berkomentar di forum 1', NULL, '2021-07-07 15:22:14'),
(14, 4, 'Berkomentar di forum 1', NULL, '2021-07-07 16:00:44'),
(15, 6, 'Berkomentar di forum 5', NULL, '2021-07-07 17:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL,
  `avatar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`, `status`, `avatar`) VALUES
(1, 'spongebob', 'spongebob@gmail.com', 'Spongebob Squarepant Pant', '$2y$10$sfy6pvnX5zNTPgSPgW40weyLEEM29rbP7MG7.9gBqqa/LT2iayNmy', 'AKTIF', '22062021185548.jpg'),
(2, 'patrik', 'patrik@gmail.com', 'Patrik Star', '$2y$10$v8fVsBmmavzjdsQlniJPc.EZvB71rR.EOMnWlULwmv20JNS6uRJDy', 'AKTIF', '23062021140710.jpg'),
(3, 'squidword', 'squid@gmail.com', 'Squidword Tentacles', '$2y$10$/LID3Jlo2zdbjX3gf1U82OTxCRf20xmSVzxw9GWe1uvVY8JdoVRZ6', 'AKTIF', '23062021140453.jpg'),
(4, 'mrcrab', 'crab@gmail.com', 'Tuan Crab Yujin', '$2y$10$TEhjoG3YH/GbxC/lfKspEumpZPNMo1xviuN919zPmLanzaz7/xG3e', 'AKTIF', ''),
(5, 'whatzit', 'whzt@cgs.com', 'What Zit Tooya', '$2y$10$unVYZ8E9h5lzUWSB8VmYdur0Dg60MwNRs7kFrHMNTkHO9JowZQ3YS', 'AKTIF', '24062021012834.jpg'),
(6, 'plankton', 'plankton@gsc.com', 'Sheldon J Plankton', '$2y$10$c02Le8gFBY8qfPe/7dn7MeW2qY7xYPqMgddGXvcvwo2Fi9d.o015W', 'AKTIF', '01072021195533.jpg'),
(7, 'shandy', 'shandy@gsc.com', 'Shandy Cheeks', '$2y$10$liFzghQb24KKofdJ4.rvkuDsZUcUxDV5/WGDh8NNsQf77WDbZNbkq', 'AKTIF', '01072021195632.png');

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
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_forum` (`id_forum`);

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
-- Indexes for table `game_players`
--
ALTER TABLE `game_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_game` (`id_game`);

--
-- Indexes for table `game_publisher`
--
ALTER TABLE `game_publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_ratings`
--
ALTER TABLE `game_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game` (`id_game`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game_players`
--
ALTER TABLE `game_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game_publisher`
--
ALTER TABLE `game_publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `game_ratings`
--
ALTER TABLE `game_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `game_publisher` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
