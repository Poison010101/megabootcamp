-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 12:06 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `featureimages` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `user_id`, `title`, `content`, `featureimages`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Australian global news', 'Australian global news description', 'uploads/file_1633485662.jpg', 1, '2021-10-06 02:01:02', '2021-10-06 02:01:02'),
(2, 2, 1, 'Nepal wins', 'Nepal wins description', 'uploads/file_1633485687.jpg', 1, '2021-10-06 02:01:27', '2021-10-06 02:01:27'),
(4, 2, 1, 'Nepal make it two in a row', 'Nepal defeated Sri Lanka 3-2 in their second match of the SAFF Championship at the National Football Stadium in Male today.Suman Lama, Anjan Bista and Ayush Ghalan scored one goal each for Nepal, who registered their second straight victory in the tournament. Marvin Hamilton and Dillon de Silva replied for Sri Lanka. In an early match, Bangladesh held India to a 1-1 draw. The results meant Nepal moved to the top of the table with maximum six points from two matches.Nepal had defeated hosts Maldives on Friday with Manish Dangi scoring the solitary goal of the match. Bangladesh are second on four points, while India are third with one point after their first match of the tournament ended in a draw.Maldives and Sri Lanka are yet to open their accounts in the fiveteam competition. Top two teams will advance to the final after a round robin league.Against the run of the play, Nepal opened the scoring in the 33rd minute when Suman Lama collected a pass from Nawayug Shrestha, beat past a Sri Lankan defender and fired home from inside the box despite Sri Lanka goalkeeper Sujan Perera getting his hands to the ball.Man-of-the-match Anjan Bista doubled the tally seven minutes into the second half in rebound after Nawayug Shrestha\'s initial attempt was blocked by Sri Lankan custodian Perera following a pass from Ayush Ghalan.Suman Lama made a goalline clearance in rebound moments before Marvin Hamilton converted a powerful strike from 30 yards out into a stunning goal to reduce the deficit in the 57th minute giving no chance to Nepal goalkeeper Kiran Kumar Limbu. Ghalan\'s hard work paid off in the 86th minute when he restored Nepal\'s two-goal cushion to effectively seal three points for the team. At a time when the match was coming to its end, Sri Lanka earned a penalty and Dillon de Silva beat Nepal goalkeeper Kiran Kumar Limbu to reduce the deficit. Nepal skipper Limbu said his side passed the second stage and they had a bigger test in five days. \"We passed this stage and this is not the end for us.We have tougher test against India and we will fight for another 90 minutes,\" said Limbu, who was forced to make a couple of crucial saves against Sri Lanka.Earlier, 10-man Bangladesh came from behind to play 1-1 draw with India. Skipper Sunil Chhetri put India ahead in the 26th minute and Bangladesh received a blow when they were reduced to 10 men after Bishwanath Ghosh was sent off in the 54th minute. Against the run of the play, Bangladesh levelled the scores in the 74th minute through Yeasin Arafat\'s goal in the 74the minute and they held on to walk away with one point.', 'uploads/8990.jpg_1633486591.webp', 1, '2021-10-06 02:16:31', '2021-10-06 02:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `thumbnail`, `status`) VALUES
(1, 'Political', 'Political description', 'uploads/Australian-Global-Politics-Unit-1-2-360x360_1633485029.jpg', 1),
(2, 'Sports', 'Sports description', 'uploads/file_1633485618.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `commenttext` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(20) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `blog_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'setting', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 1, 1, '2021-10-05 01:42:00', '2021-10-05 01:42:00'),
(2, 'editor', '5aee9dbd2a188839105073571bee1b1f', 'editor@admin.com', 2, 1, '2021-10-05 03:02:45', '2021-10-05 03:02:45'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@admin.com', 3, 1, '2021-10-05 03:03:09', '2021-10-05 03:03:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`value`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
