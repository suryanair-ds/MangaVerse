-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 08:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `Id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`Id`, `post_id`, `user_id`, `status`) VALUES
(12, 1, 33, 'like'),
(13, 1, 20, 'dislike'),
(19, 10, 20, 'like'),
(23, 2, 20, 'like'),
(25, 8, 20, 'like'),
(27, 2, 34, 'dislike'),
(30, 6, 34, 'like'),
(32, 13, 34, 'dislike'),
(33, 5, 34, 'like'),
(34, 2, 35, 'dislike');

-- --------------------------------------------------------

--
-- Table structure for table `mangas`
--

CREATE TABLE `mangas` (
  `Id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `site` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mangas`
--

INSERT INTO `mangas` (`Id`, `name`, `image`, `site`) VALUES
(1, 'tokyo ghoul', 'icons/ghoul.jpg', 'ok/tokyo.php'),
(2, 'berserk', 'icons/berserk.jpg', 'ok/berserk.php'),
(3, 'shigurui', 'icons/shig.jpg', 'ok/shigu.php'),
(4, 'hitorijime my hero', 'icons/hitorijime.jpg', 'ok/myhero.php'),
(5, 'sasaki and miyano', 'icons/sasaki.webp', 'ok/sasaki.php'),
(6, 'given', 'icons/given.jpg', 'ok/given.php'),
(7, 'kamisama kiss', 'icons/kamisama.jpg', 'ok/kami.php'),
(8, 'fruit basket', 'icons/maid.webp', 'ok/each.php'),
(9, 'love is hard for otaku', 'icons/lov.jpg', 'ok/otaku.php'),
(10, 'attack on titan', 'icons/aot.jpg', 'ok/attack.php'),
(11, 'one piece', 'icons/onep.jpg', 'ok/onep.php'),
(12, 'naruto', 'icons/naruto.webp', 'ok/naruto.php'),
(13, 'demon slayer', 'icons/ds.jpg', 'ok/demon.php'),
(14, 'deathnote', 'icons/death.jpg', 'ok/death.php'),
(15, 'your name', 'icons/your.jpg', 'ok/name.php');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `user_id` int(11) NOT NULL,
  `sugg` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`user_id`, `sugg`, `email`) VALUES
(33, 'hi', 'surya.drishya@gmail.com'),
(33, 'damn', 'surya.drishya@gmail.com'),
(33, 'hi\r\n', 'surya.drishya@gmail.com'),
(20, 'good', 'drishyanair0011@gmail.com'),
(20, 'good', 'drishyanair0011@gmail.com'),
(35, 'good', 'tapasyayadav40@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `user_img` varchar(400) NOT NULL DEFAULT 'icons/profile.jpg',
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Contact` int(10) DEFAULT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Verify` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `user_img`, `Name`, `Email`, `Contact`, `Username`, `Password`, `Verify`) VALUES
(34, 'images/death.jpg', 'surya', 'surya.drishya@gmail.com', 123345678, 'mikaasaaa', '12', '138c79'),
(35, 'images/aot.jpg', 'tapasyaaa', 'tapasyayadav40@gmail.com', 12343, 'tap', '1234', '95d2d8');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `Id` int(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Verify` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`Id`, `Name`, `Contact`, `Username`, `Password`, `Email`, `Verify`) VALUES
(4, 'surya', 23456, 'mika', '1234', 'surya.drishya@gmail.com', '7cc092'),
(5, 'surya', 123345678, 'mikaasaaa', '12', 'surya.drishya@gmail.com', '138c79'),
(6, 'tapasya', 12343, 'tap', '1234', 'tapasyayadav40@gmail.com', '95d2d8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mangas`
--
ALTER TABLE `mangas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
