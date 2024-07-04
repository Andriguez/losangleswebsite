-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 04, 2024 at 01:17 AM
-- Server version: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `losangles_feed`
--
CREATE DATABASE IF NOT EXISTS `losangles_feed` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `losangles_feed`;

-- --------------------------------------------------------

--
-- Table structure for table `feed_comments`
--

CREATE TABLE IF NOT EXISTS `feed_comments` (
  `comment_Id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_user` int(11) NOT NULL,
  `comment_parentpost` int(11) NOT NULL,
  `comment_text_content` varchar(125) NOT NULL,
  `comment_posted_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_Id`),
  KEY `post_FK` (`comment_parentpost`),
  KEY `comment_userId_FK` (`comment_user`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feed_comments`
--

INSERT INTO `feed_comments` (`comment_Id`, `comment_user`, `comment_parentpost`, `comment_text_content`, `comment_posted_at`) VALUES
(42, 1001, 24, 'comment for 2nd post', '2024-07-04 01:47:22'),
(43, 1001, 23, '1st post comment trial', '2024-07-04 01:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `feed_posts`
--

CREATE TABLE IF NOT EXISTS `feed_posts` (
  `post_Id` int(11) NOT NULL AUTO_INCREMENT,
  `post_user` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_picture` int(11) DEFAULT NULL,
  `post_text_content` varchar(500) NOT NULL,
  `post_topic` int(11) DEFAULT NULL,
  `post_posted_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`post_Id`),
  KEY `topic_FK` (`post_topic`),
  KEY `post_userId_FK` (`post_user`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feed_posts`
--

INSERT INTO `feed_posts` (`post_Id`, `post_user`, `post_title`, `post_picture`, `post_text_content`, `post_topic`, `post_posted_at`) VALUES
(23, 1001, 'trial post', NULL, 'first post trial in the database', 1, '2024-07-04 01:46:51'),
(24, 1001, '2nd post', NULL, 'second post trial for the database', 3, '2024-07-04 01:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `feed_topics`
--

CREATE TABLE IF NOT EXISTS `feed_topics` (
  `topic_Id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(50) NOT NULL,
  PRIMARY KEY (`topic_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feed_topics`
--

INSERT INTO `feed_topics` (`topic_Id`, `topic_name`) VALUES
(1, 'general'),
(3, 'gigs');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feed_comments`
--
ALTER TABLE `feed_comments`
  ADD CONSTRAINT `comment_userId_FK` FOREIGN KEY (`comment_user`) REFERENCES `losangles_users`.`users` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_FK` FOREIGN KEY (`comment_parentpost`) REFERENCES `feed_posts` (`post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
