-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2019 at 08:24 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devsland`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(6) UNSIGNED NOT NULL,
  `statement` varchar(1000) NOT NULL,
  `question` int(6) NOT NULL,
  `correct` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `statement`, `question`, `correct`) VALUES
(1, 'write in red ink', 1, 1),
(2, 'wearing black shoes on Tuesday', 1, 0),
(3, 'throwing a thumbs-up', 1, 0),
(4, 'the gravity is lower than in other parts of the world.', 2, 1),
(5, 'the temperature is -100 degrees.', 2, 0),
(6, 'you can find penguins.', 2, 0),
(7, 'wave ever surfed was as tall as a 10-story building', 3, 1),
(8, 'mountain in the world has over 8,500 metres', 3, 0),
(9, 'altitude a bird can fly is 48,000 metres', 3, 0),
(10, 'has a population of over 1.5 millions', 4, 1),
(11, 'is just 20% land', 4, 0),
(12, 'is the seventh most populous city in USA', 4, 0),
(13, '\"Toilet Paper Capital of the World\"', 5, 1),
(14, '\"The Rose Red City\"', 5, 0),
(15, '\"Iron City\"', 5, 0),
(16, 'has over 400 words for \"snow\"', 6, 1),
(17, 'has as the official animal a lion', 6, 0),
(18, 'has the highest point at 2145 metres', 6, 0),
(19, 'kissing a donkey could rellieve a toothache', 7, 1),
(20, 'a leprechaun follows them all the time', 7, 0),
(21, 'the Earth is a giant meatball', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `color` varchar(10) DEFAULT '#2f2f2f'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `color`) VALUES
(4, 'Geography', '7c7ab4'),
(5, 'Fun Facts', 'eff317'),
(6, 'Biology', '4b7ff5'),
(7, 'History', 'e80749'),
(8, 'Technology', 'bb3e51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `name`) VALUES
(1, 'users'),
(2, 'rooms'),
(3, 'userlevels'),
(5, 'categories'),
(7, 'catcolor'),
(8, 'questions'),
(9, 'answers'),
(10, 'emailverification'),
(11, 'questioncatid'),
(13, 'roomdata');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(6) UNSIGNED NOT NULL,
  `statement` varchar(1000) NOT NULL,
  `catid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `statement`, `catid`) VALUES
(1, 'It\'s considered rude in Portugal to', 4),
(2, 'There is a region in Canada where', 4),
(3, 'The highest', 4),
(4, 'San Francisco', 4),
(5, 'Green Bay, Washington is known as', 4),
(6, 'Scotland', 4),
(7, 'Some people used to believe that', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `creator_id` varchar(10) NOT NULL,
  `data` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `creator_id`, `data`) VALUES
(1, 'testroom', '1', NULL),
(2, 'testroom', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `hash` varchar(1000) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(10) DEFAULT '0',
  `everified` int(10) DEFAULT '0',
  `mailhash` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `hash`, `email`, `level`, `everified`, `mailhash`) VALUES
(1, 'Justice', '$2y$10$S7fNr47kYiMgUAgrK3Vs6OISkQOKEWZfdgsMhN.FCX25MB0YRtKcq', 'claudiu_tirisi898@yahoo.ro', 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
