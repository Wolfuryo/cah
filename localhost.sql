-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2019 at 09:12 PM
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
CREATE DATABASE IF NOT EXISTS `devsland` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `devsland`;

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

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `color` varchar(10) DEFAULT '2f2f2f'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(6) UNSIGNED NOT NULL,
  `message` varchar(3000) NOT NULL,
  `uid` int(10) NOT NULL,
  `roomid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `uid`, `roomid`) VALUES
(1, 'test', 2, 1),
(2, 'hi', 1, 1),
(3, 'hi mate. How ru', 2, 1),
(4, 'wassup', 1, 5);

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
(4, 'categories'),
(5, 'catcolor'),
(6, 'questions'),
(7, 'answers'),
(8, 'emailverification'),
(9, 'questioncatid'),
(10, 'userroom_activ'),
(11, 'chat');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(6) UNSIGNED NOT NULL,
  `statement` varchar(1000) NOT NULL,
  `catid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `creator_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `creator_id`) VALUES
(1, 'Testroom', '1'),
(2, 'Testroom2', '1'),
(3, 'Testroom3', '1'),
(4, 'Testroom4', '1'),
(5, 'Testroom5', '1');

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
  `mailhash` int(100) DEFAULT NULL,
  `room` int(10) DEFAULT NULL,
  `roomactiv` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `hash`, `email`, `level`, `everified`, `mailhash`, `room`, `roomactiv`) VALUES
(1, 'Justice', '$2y$10$S7fNr47kYiMgUAgrK3Vs6OISkQOKEWZfdgsMhN.FCX25MB0YRtKcq', 'claudiu_tirisi898@yahoo.ro', 1, 0, NULL, 5, 1564167416),
(2, 'Testaccount', '$2y$10$90m3no6ScnsTTA6WLCB0qOUJ0INKrT6oHa9lc9xtmTJPlSe0TsT9m', 'claudiiu_tirisi89d8d@yahoo.ro', 0, 0, 6, NULL, 1564154062),
(3, 'fdsfdsf', '$2y$10$VUZBDw7QQeFivxAbvdl.YOM3gn5FwbgOFW4VMKzkZCa6osJJVaMd6', 'cds@gmail.com', 0, 0, 2776650, NULL, NULL),
(4, 'bllablab', '$2y$10$y5O8dizuZExf0.xmnU.yrekesuLMDHStV3N52yh7.iBWDh/YFCmTq', 'cfsdafds@gmail.com', 0, 0, 0, NULL, NULL);

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
