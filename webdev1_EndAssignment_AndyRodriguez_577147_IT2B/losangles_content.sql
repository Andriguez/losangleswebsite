-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 04, 2024 at 01:18 AM
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
-- Database: `losangles_content`
--
CREATE DATABASE IF NOT EXISTS `losangles_content` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `losangles_content`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_content`
--

CREATE TABLE IF NOT EXISTS `admin_content` (
  `admin_Id` int(11) NOT NULL,
  `admin_name_link` varchar(150) NOT NULL,
  `admin_titles` varchar(50) NOT NULL,
  `admin_description` varchar(500) NOT NULL,
  `admin_picture` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_Id`),
  KEY `media_FK` (`admin_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_content`
--

INSERT INTO `admin_content` (`admin_Id`, `admin_name_link`, `admin_titles`, `admin_description`, `admin_picture`) VALUES
(1002, 'https://www.instagram.com/valdechev', 'curator/writer/new picture', 'Is your local dance queen and doll of many trades. When she&#039;s not giving it all on the dancefloor (or making you give it all with her DJ skills), she&#039;s a communications girlboss at a cultural fund, a freelance writer,', 129),
(1057, 'https://www.instagram.com/youngw0man/', 'none', 'Is an Egyptian-born transfemme dj/producer, founder of &lt;a href=&quot;#&quot;&gt;&lt;strong&gt;@dontgowewillfundthem&lt;/strong&gt;&lt;/a&gt; 😌 As a being in transition, she’s always interested in being at the intersection of several marginalized communities where archiving is overlooked, her artistic and life practice are dedicated to documenting, celebrating and protecting her experience and those who might share a similar one ♥️', 93),
(2522, 'https://www.instagram.com/mmariawalhout/', 'none', 'Is an Amsterdam-based artist, writer and researcher interested in all things trans and sacred, especially the many ways these overlap. She works across different media, always looking for the instability of identity and the impossibilities of language.', 94);

-- --------------------------------------------------------

--
-- Table structure for table `artist_content`
--

CREATE TABLE IF NOT EXISTS `artist_content` (
  `artist_Id` int(11) NOT NULL,
  `artist_description` varchar(500) NOT NULL,
  `artist_extralink` varchar(100) DEFAULT NULL,
  `artist_discipline` int(11) NOT NULL,
  `artist_email` varchar(50) NOT NULL,
  `artist_soundcloud_url` mediumtext DEFAULT NULL,
  `artist_socialmedia` varchar(50) DEFAULT NULL,
  `artist_stagename` varchar(25) DEFAULT NULL,
  `artist_picture` int(11) DEFAULT NULL,
  `artist_location` varchar(50) NOT NULL,
  PRIMARY KEY (`artist_Id`),
  KEY `artist_Id_FK` (`artist_Id`),
  KEY `artist_discipline_detailpageFK` (`artist_discipline`),
  KEY `artist_picture_detailpageFK` (`artist_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist_content`
--

INSERT INTO `artist_content` (`artist_Id`, `artist_description`, `artist_extralink`, `artist_discipline`, `artist_email`, `artist_soundcloud_url`, `artist_socialmedia`, `artist_stagename`, `artist_picture`, `artist_location`) VALUES
(1357, 'Angelboy’s power lies in mixing diverse genres and rhythms - with a focus on uptempo and high energy - their signature sound aims to uplift and get the crowd moving. They have graced well-established queer parties and have a monthly radio show on the Amsterdam radiostation Echobox Radio. Besides dj&#039;ing, they are an educator in gender, sexuality, consent and speaking up against discrimination.', ' ', 9, 'zoah@momanager.nl', ' https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1773536244&amp;color=%23101010&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true', 'https://www.instagram.com/angelboy', 'Angelboy', 122, 'Amsterdam, NL'),
(2423, 'LYZZA is a Brazilian artist and DJ based in the Netherlands. As a teenager she enrolled in a DJ workshop class by Jarreau Vandal, who encouraged her to keep pursuing music. She started as a Ballroom DJ in Amsterdam and eventually started touring around the club scene in Europe. As an electronic pop artist, she released three EPs and a mixtape and has been associated with the avant-pop genre as well as &quot;post-PC Music&quot;.', '', 9, 'artist5@outlook.com', '', '#', 'LYZZA', 123, 'Amsterdam/Berlin'),
(2433, 'Ada is an artist and writer based between Barbados, London, Amsterdam and Rotterdam. She works with masquerade, music, performance, poetry, textiles and video, looking at how storytelling can make identity formation both possible and impossible. Her recent work considers the connections between transformation, crisis, grief, rage, disappearance, discretion, self-defence and survival.', '', 29, 'info@adampatterson.co.uk', '', '#', 'AdaPatterson', 124, 'Amsterdam'),
(2617, 'DIORA, a Cape Townian gem, who currently resides in Amsterdam, is a multi-disciplinary artist. She blends techno, hardcore, drum and industrial sounds with strings of vocals to amplify the vibrancy in the air. Captivating is a word that could be used to describe her presence on the decks. Get ready to grind and flip your hair!', 'none', 9, 'daniidiorbookings@gmail.com', '', 'https://www.instagram.com/daniiidiora', 'diora', 125, 'Amsterdam, NL'),
(4894, 'Trans Non-binary performance artist and Drag-esque creature. Drowning in substances until we reach the place of the in-between. Living and performing in alternative spaces in Amsterdam, ReX&#039;s research is an exploration of the idea of disruption. An action that holds a political and critical activism in the queer body/community towards this capitalistic heteronormative society.', '', 28, 'rexcollins@gmail.com', '', '#', 'Rex', 126, 'Amsterdam'),
(5173, 'ZOBAYDA is an Egyptian transdisciplinary artist &amp; DJ living between Rotterdam &amp; Amsterdam. They are known for their live experimentation and eclectic mixing style, drawing influences from Tabla, Gqom, Bass and Ballroom.', '', 9, 'zobayda.elbatanoni@gmail.com', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1848291981&amp;color=%23101010&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true', 'https://www.instagram.com/zobayda__', 'zobayda', 127, 'Rotterdam, nl'),
(6887, 'Through scripting different voices and scenarios, Anto lip-syncs to their own pieces, for the self to be understood as an ever changing subject on set. “I see on lip-syncing to my own and other peoples’ voices a possible embodiment of a multiple consciousness. Performing my work allows me to simultaneously locate myself both in the future and in the past, in the so called ‘real’ and in a dream. ', '', 28, 'anto@gmail.com', '', '#', 'AntoLopez', 128, 'Amsterdam, NL');

-- --------------------------------------------------------

--
-- Table structure for table `artist_disciplines`
--

CREATE TABLE IF NOT EXISTS `artist_disciplines` (
  `artist_discipline_Id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_discipline_name` varchar(50) NOT NULL,
  PRIMARY KEY (`artist_discipline_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist_disciplines`
--

INSERT INTO `artist_disciplines` (`artist_discipline_Id`, `artist_discipline_name`) VALUES
(9, 'dj'),
(28, 'performer'),
(29, 'multidiciplinary');

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

CREATE TABLE IF NOT EXISTS `content_types` (
  `content_type_Id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type_name` varchar(25) NOT NULL,
  PRIMARY KEY (`content_type_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_types`
--

INSERT INTO `content_types` (`content_type_Id`, `content_type_name`) VALUES
(1, 'img'),
(2, 'button'),
(3, 'text'),
(4, 'link');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_Id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(25) NOT NULL,
  `event_datetime` datetime NOT NULL,
  `event_location` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_poster` int(11) DEFAULT NULL,
  `event_description` varchar(500) NOT NULL,
  `event_ticketbtn_text` varchar(20) NOT NULL,
  `event_ticketbtn_url` varchar(250) NOT NULL,
  PRIMARY KEY (`event_Id`),
  KEY `event_poster_FK` (`event_poster`),
  KEY `event_location_FK` (`event_location`),
  KEY `event_type_FK` (`event_type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_Id`, `event_name`, `event_datetime`, `event_location`, `event_type`, `event_poster`, `event_description`, `event_ticketbtn_text`, `event_ticketbtn_url`) VALUES
(2, 'POING PRIDE', '2024-01-27 22:00:00', 2, 3, 77, 'party night in Rotterdam. This is a trial event for displaying in the event page', 'SOLD OUT', '#'),
(3, 'Club Angles XXX', '2024-02-21 22:35:00', 8, 3, 80, 'For Pride 2023, three of the hottest queer collectives in Amsterdam—Club Transmission, Los Angles Collective, and X3—throw a trans-centred 12-hour bash at Garage Noord. Expect DJs, live acts, performances, and more.', 'BUY TICKETS', '#'),
(4, 'another trial', '2024-06-09 22:36:00', 2, 3, 78, 'trial trial trial', 'tickets', '#'),
(7, 'ARVI’s Angles ', '2024-02-14 06:23:00', 2, 3, 79, 'Lisbon&#039;s underground queer collective ARVI teams up with local trans-femme collective Los Angles for a night of live music, performances and DJ sets.', 'BUY TICKET', '#'),
(8, 'last picture trial', '2023-06-23 06:25:00', 2, 2, 103, 'more trial trials', 'sold out', '#'),
(10, 'Parish x Los Angles', '2024-05-08 18:33:00', 9, 3, 130, 'Amsterdam’s Los Angles joins forces with The Hague’s Parish for a steamy alien-themed club night at PIP Den Haag filled with music, clothes sale, tooth gems, tattoos, live acts and more.', 'SOLD OUT', '#');

-- --------------------------------------------------------

--
-- Table structure for table `event_lineups`
--

CREATE TABLE IF NOT EXISTS `event_lineups` (
  `lineup_Id` int(11) NOT NULL AUTO_INCREMENT,
  `lineup_event` int(11) NOT NULL,
  `lineup_category` varchar(20) NOT NULL,
  `lineup_artists` text NOT NULL,
  PRIMARY KEY (`lineup_Id`),
  UNIQUE KEY `lineup_category` (`lineup_category`),
  KEY `event_FK` (`lineup_event`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_lineups`
--

INSERT INTO `event_lineups` (`lineup_Id`, `lineup_event`, `lineup_category`, `lineup_artists`) VALUES
(3, 10, 'djs', 'Mavi Veloso;smother;YoungWoman;angelboy;xD Eric;Mavi Veloso'),
(4, 2, 'exhibits', 'Siofra;Augusteijn;Tild Greene;Linus van der Mass'),
(5, 10, 'models', 'Naomi Campbell;Bella Hadid;Anok Yaoi;'),
(7, 3, 'performers', 'BABYNYMPH;DIORA;Maudio'),
(10, 3, 'exhibition', 'Rah Naqvi;Chinnamasta;La Uyi');

-- --------------------------------------------------------

--
-- Table structure for table `event_locations`
--

CREATE TABLE IF NOT EXISTS `event_locations` (
  `location_Id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) NOT NULL,
  `location_address` varchar(50) NOT NULL,
  `location_city` varchar(25) NOT NULL,
  `location_country` varchar(25) NOT NULL,
  `location_map_url` varchar(250) NOT NULL,
  PRIMARY KEY (`location_Id`),
  UNIQUE KEY `location_name` (`location_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_locations`
--

INSERT INTO `event_locations` (`location_Id`, `location_name`, `location_address`, `location_city`, `location_country`, `location_map_url`) VALUES
(2, 'Kanaal 40', 'new trial', 'Amsterdam', 'NL', 'www.idk.com'),
(4, 'Bar Bario', 'idk idk idk', 'Amsterdam', 'USA', '#'),
(8, 'Garage Noor', 'idk', 'Amsterdam', 'NL', '#'),
(9, 'PIP Den Haag', 'idk', 'Den Haag', 'NL', '#');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `event_type_Id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_name` varchar(35) NOT NULL,
  PRIMARY KEY (`event_type_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`event_type_Id`, `event_type_name`) VALUES
(2, 'art exhibition'),
(3, 'club night');

-- --------------------------------------------------------

--
-- Table structure for table `file_directory`
--

CREATE TABLE IF NOT EXISTS `file_directory` (
  `path_Id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `directory_name` varchar(25) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`path_Id`),
  UNIQUE KEY `unique_type_path` (`type`,`path`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_directory`
--

INSERT INTO `file_directory` (`path_Id`, `type`, `directory_name`, `path`) VALUES
(1, 'media', 'media', 'media/placeholders/'),
(2, 'page', 'about', '/../views/about/index2.php'),
(3, 'page', 'home', '/../views/home/index.php'),
(44, 'media', 'homepage', 'media/homepage/'),
(65, 'media', 'homepage', '../views/homepage/media/'),
(69, 'media', 'homepage', '/app/views/homepage/media/'),
(76, 'media', 'home', '/app/views/home/media/'),
(78, 'media', 'artists', '/app/views/artists/media/'),
(81, 'media', 'events', '/app/views/events/media/'),
(89, 'media', 'about', '/app/views/about/media/'),
(91, 'media', 'connect', '/app/views/connect/media/users/');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media_Id` int(11) NOT NULL AUTO_INCREMENT,
  `media_filename` varchar(100) NOT NULL,
  `media_type` varchar(50) NOT NULL,
  `media_path` int(11) NOT NULL,
  PRIMARY KEY (`media_Id`),
  KEY `media_path_FK` (`media_path`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_Id`, `media_filename`, `media_type`, `media_path`) VALUES
(1, 'user-picture-placeholder.png', 'placeholder', 1),
(2, 'picture-placeholder.png', 'placeholder', 1),
(74, '65aadbbe3eb6c.png', 'artistpicture', 78),
(77, '65aaec515537a.png', 'eventposter', 81),
(78, '65aaecab834b1.png', 'eventposter', 81),
(79, '65aaecbaa8c0f.png', 'eventposter', 81),
(80, '65aaece1d02e4.png', 'eventposter', 81),
(89, '65ab0c4346adb.png', 'userpicture', 91),
(90, '65ab0c547485d.png', 'userpicture', 91),
(93, '65ab26c03b3f3.jpg', 'anglepicture', 89),
(94, '65ab27bec414a.jpg', 'anglepicture', 89),
(103, '65abb673022e8.jpeg', 'eventposter', 81),
(113, '65ad7810e924c.jpg', 'userpicture', 91),
(114, '65ad7866186da.jpg', 'userpicture', 91),
(115, '65ad78705ac26.jpg', 'userpicture', 91),
(122, '65ad947e6095b.jpg', 'artistpicture', 78),
(123, '65ad94bac0f49.jpg', 'artistpicture', 78),
(124, '65ad94cad5452.jpg', 'artistpicture', 78),
(125, '65ad94d6512b8.jpg', 'artistpicture', 78),
(126, '65ad94fb2a1d5.jpg', 'artistpicture', 78),
(127, '65ad95096d390.jpg', 'artistpicture', 78),
(128, '65ad952224e8b.jpg', 'artistpicture', 78),
(129, '65ad9544a8dee.jpg', 'anglepicture', 89),
(130, '65ad96ceaf63d.png', 'eventposter', 81),
(131, '65ad9beb307f8.jpg', 'userpicture', 91),
(139, '6685f41bd4c13.jpg', 'homepagePicture', 76);

-- --------------------------------------------------------

--
-- Table structure for table `navbar_content`
--

CREATE TABLE IF NOT EXISTS `navbar_content` (
  `navbar_content_Id` int(11) NOT NULL AUTO_INCREMENT,
  `navbar_content_type` int(11) NOT NULL,
  `navbar_content_media` int(11) DEFAULT NULL,
  `navbar_content_page` int(11) DEFAULT NULL,
  `navbar_content_text` varchar(25) DEFAULT NULL,
  `navbar_content_url` varchar(250) NOT NULL,
  PRIMARY KEY (`navbar_content_Id`),
  KEY `navbar_content_media_FK` (`navbar_content_media`),
  KEY `navbar_content_page_FK` (`navbar_content_page`),
  KEY `navbar_content_type_FK` (`navbar_content_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_Id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(100) NOT NULL,
  `page_displayname` varchar(100) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_directory` int(11) NOT NULL,
  `page_inNavbar` bit(1) NOT NULL,
  PRIMARY KEY (`page_Id`),
  KEY `page_directory_FK` (`page_directory`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_Id`, `page_title`, `page_displayname`, `page_url`, `page_directory`, `page_inNavbar`) VALUES
(1, 'aboutpage', 'about', '/about', 2, b'1'),
(2, 'Home', 'Home', '/', 3, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE IF NOT EXISTS `page_content` (
  `page_content_Id` int(11) NOT NULL AUTO_INCREMENT,
  `element_Id` varchar(50) NOT NULL,
  `page_content_text` varchar(750) DEFAULT NULL,
  `page_content_type` int(11) NOT NULL,
  `page_content_media` int(11) DEFAULT NULL,
  `parent_page` int(11) NOT NULL,
  PRIMARY KEY (`page_content_Id`),
  KEY `page_content_type_FK` (`page_content_type`),
  KEY `page_content_media_FK` (`page_content_media`),
  KEY `page_content_parent_page_FK` (`parent_page`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`page_content_Id`, `element_Id`, `page_content_text`, `page_content_type`, `page_content_media`, `parent_page`) VALUES
(1, 'title-text', 'Meet Los Angles', 3, NULL, 1),
(2, 'title-link', 'https://www.instagram.com/losanglescollective', 4, NULL, 1),
(3, 'about-description', 'Out of frustration with the status quo and hope for a better future, the LOS ANGLES collective\nwas founded in December 2022 by 3 trans women: Alma, Maria, and Val. Our collective aims to\ncontinuously showcase and nurture TRANS talent. Being active members of the community (organising fundraisers, curating exhibitions featuring\ntrans artists) and also frequent party girls, we have noticed that even though the “T” has its rightful\nplace within the queer community, our presence is often marginalised all over the cultural sector\nand nightlife. We’ve also noticed that often individual efforts usually lose momentum quite fast.', 3, NULL, 1),
(4, 'footer-link', 'mailto:val@losanglescollective.com', 4, NULL, 1),
(5, 'footer-text', 'mail us', 3, NULL, 1),
(7, 'homepagePicture', 'none', 1, 139, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_content`
--
ALTER TABLE `admin_content`
  ADD CONSTRAINT `media_FK` FOREIGN KEY (`admin_picture`) REFERENCES `media` (`media_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `userId_FK` FOREIGN KEY (`admin_Id`) REFERENCES `losangles_users`.`users` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artist_content`
--
ALTER TABLE `artist_content`
  ADD CONSTRAINT `artist_Id_FK` FOREIGN KEY (`artist_Id`) REFERENCES `losangles_users`.`users` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artist_discipline_detailpageFK` FOREIGN KEY (`artist_discipline`) REFERENCES `artist_disciplines` (`artist_discipline_Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `artist_picture_detailpageFK` FOREIGN KEY (`artist_picture`) REFERENCES `media` (`media_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `event_location_FK` FOREIGN KEY (`event_location`) REFERENCES `event_locations` (`location_Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `event_poster_FK` FOREIGN KEY (`event_poster`) REFERENCES `media` (`media_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `event_type_FK` FOREIGN KEY (`event_type`) REFERENCES `event_types` (`event_type_Id`);

--
-- Constraints for table `event_lineups`
--
ALTER TABLE `event_lineups`
  ADD CONSTRAINT `event_FK` FOREIGN KEY (`lineup_event`) REFERENCES `events` (`event_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_path_FK` FOREIGN KEY (`media_path`) REFERENCES `file_directory` (`path_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `navbar_content`
--
ALTER TABLE `navbar_content`
  ADD CONSTRAINT `navbar_content_media_FK` FOREIGN KEY (`navbar_content_media`) REFERENCES `media` (`media_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `navbar_content_page_FK` FOREIGN KEY (`navbar_content_page`) REFERENCES `pages` (`page_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `navbar_content_type_FK` FOREIGN KEY (`navbar_content_type`) REFERENCES `content_types` (`content_type_Id`) ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `page_directory_FK` FOREIGN KEY (`page_directory`) REFERENCES `file_directory` (`path_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_content`
--
ALTER TABLE `page_content`
  ADD CONSTRAINT `page_content_media_FK` FOREIGN KEY (`page_content_media`) REFERENCES `media` (`media_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `page_content_parent_page_FK` FOREIGN KEY (`parent_page`) REFERENCES `pages` (`page_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `page_content_type_FK` FOREIGN KEY (`page_content_type`) REFERENCES `content_types` (`content_type_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
