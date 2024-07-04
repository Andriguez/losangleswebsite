-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 04, 2024 at 01:16 AM
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
-- Database: `losangles_users`
--
CREATE DATABASE IF NOT EXISTS `losangles_users` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `losangles_users`;

-- --------------------------------------------------------

--
-- Table structure for table `artists_applications`
--

CREATE TABLE IF NOT EXISTS `artists_applications` (
  `application_Id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_name` varchar(25) NOT NULL,
  `applicant_stagename` varchar(25) DEFAULT NULL,
  `applicant_email` varchar(50) NOT NULL,
  `applicant_pronouns` varchar(15) NOT NULL,
  `applicant_gender` varchar(15) NOT NULL,
  `applicant_location` varchar(25) NOT NULL,
  `applicant_discipline` varchar(50) NOT NULL,
  `applicant_message` varchar(111) NOT NULL,
  `applicant_socialmedia` varchar(50) NOT NULL,
  `application_submissiondate` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`application_Id`),
  UNIQUE KEY `applicant_email` (`applicant_email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists_applications`
--

INSERT INTO `artists_applications` (`application_Id`, `applicant_name`, `applicant_stagename`, `applicant_email`, `applicant_pronouns`, `applicant_gender`, `applicant_location`, `applicant_discipline`, `applicant_message`, `applicant_socialmedia`, `application_submissiondate`) VALUES
(4, 'Carmen Macuace', 'lana', 'carmen@hotmail.com', 'she/her', 'woman', 'Cali, COL', 'singer', 'this is a trial for editing the application after trying to do it on the user side', '@carmen', '2024-01-17'),
(5, 'Stephanie Germanotta', 'Lady Gaga', 'gaga@hotmail.com', 'she/her', 'woman', 'New York, USA', 'multidiciplinary', 'this the submission on consequential download of applications for the website.', '@ladygaga', '2024-01-17'),
(6, 'beyonce knowless', 'beyoncé', 'beyonce@ivypark.com', 'she/her', 'woman', 'Houston, USA', 'vocalist', 'this the submission on consequential download of applications for the website.', '@beyonce', '2024-01-17'),
(10, 'this is a trial', 'for', 'sjbj@hotmail.com', 'the ', 'creation', 'of ', 'bjbjh', 'bjkbbjbjb', 'kskbn', '2024-01-19'),
(12, 'trial from', 'it girl', 'ndiknd@email.com', 'she/her', 'nb', 'amsterdam', 'multidisciplinary', 'nknjrlknintirphyrnipnhrvc oit oc o cih ceidhgeoi cic igjeop ciepj cojpoj ejg iji ioj', '@me', '2024-01-20'),
(15, 'Val', 'smother', 'val@losanglescollective.com', 'she/her', 'none', 'Amsterdam', 'multidisciplinary', 'mnne', '@valdechev', '2024-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_Id` int(11) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pronouns` varchar(25) NOT NULL,
  `user_picture` int(11) NOT NULL DEFAULT 1,
  `user_type` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL DEFAULT 'password',
  PRIMARY KEY (`user_Id`) USING BTREE,
  UNIQUE KEY `user_email` (`user_email`) USING BTREE,
  KEY `usertype_FK` (`user_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `user_firstname`, `user_lastname`, `user_email`, `user_pronouns`, `user_picture`, `user_type`, `user_password`) VALUES
(1001, 'Andy', 'Rodriguez', 'andhriguez@outlook.com', 'they/them', 89, 1, '$2y$12$Pa7B0PTKmNJysl.3D9dTwuz6x18IgwaGBjJ/Tu2g9FaOWwUWotkJi'),
(1002, 'Val', 'Dechev', 'admin1@email.com', 'she/her', 90, 2, '$2y$12$FQ/mQhvJC81XpaZfWlSrvOen/HMmgyg1pucJKqEt/Oe5UxQYpYAEq'),
(1057, 'Alma', 'Noor', 'admin2@outlook.com', 'she//her', 114, 2, '$2y$12$LzVhxboAunbebojsJgiXQO4D0mK5p4zjEW/KdheRn7SBIMIX2QjSi'),
(1357, 'Dorien', 'Lastname', 'artist3@hotmail.com', 'they/them', 1, 3, '$2y$12$kFpplkEQeBSkrkJdNolFV.BeEl5fN3.H2iNUgVgEkD7XxKdTqOZOW'),
(2423, 'Lyzza', 'lastname', 'artist5@outlook.com', 'she/her', 1, 3, '$2y$12$0fjXqHeTK77NeXRbXDz2xOtzFcGf8x0.Uk2BWJ5APzyCDcrAS18SW'),
(2433, 'Ada', 'Patterson', 'artist8@outlook.com', 'she/her', 1, 3, '$2y$12$AKKAZRIzvFcOb/KXQ1gLTu5gH6kOj0gT8jJZMsxWXvSwL2VW.YjKq'),
(2522, 'Maria', 'Walhout', 'admin3@outlook.com', 'she/her', 115, 2, '$2y$12$HOmuEleiREoMWU7dzhpBW.Yo3uKe.xuCwes7.cf151vg52ZGIMppm'),
(2617, 'Dani', 'Diora', 'artist1@outlook.com', 'she/her', 113, 3, '$2y$12$KrVes822tdDwjeJdcOLFweIgVSvE7Vj/LgYYFDRN0qfahSSqicVUa'),
(4894, 'rex', 'lastname', 'artist7@outlook.com', 'they/them', 1, 3, '$2y$12$f2LiOeWY0IGEcr5okjgeXe1SFOVjn/L.n/v4.nld0at6ro534mAu2'),
(5173, 'Siad', 'lastname', 'artist4@outlook.com', 'they/them', 131, 3, '$2y$12$yETOQNZKpjPfKJg43FLmxeKu4gkLdc9uA0.NfwqlKx0klAYW7Ia7C'),
(6887, 'Anto', 'Lopez', 'artist6@outlook.com', 'they/them', 1, 3, '$2y$12$mAeVxOxW4gEpLYuo8KWlhe6sbNuUzGku7thmd8U9UTBOcJB.eFohK');

-- --------------------------------------------------------

--
-- Table structure for table `users_usertypes`
--

CREATE TABLE IF NOT EXISTS `users_usertypes` (
  `usertype_Id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_name` varchar(50) NOT NULL,
  PRIMARY KEY (`usertype_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_usertypes`
--

INSERT INTO `users_usertypes` (`usertype_Id`, `usertype_name`) VALUES
(1, 'developer'),
(2, 'admin'),
(3, 'artist'),
(4, 'collaborator');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
