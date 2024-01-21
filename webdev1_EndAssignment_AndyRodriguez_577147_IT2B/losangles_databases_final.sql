-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 02, 2023 at 02:35 AM
-- Server version: 10.9.4-MariaDB-1:10.9.4+maria~ubu2204
-- PHP Version: 8.0.26

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

CREATE TABLE `artists_applications` (
  `application_Id` int(11) NOT NULL,
  `applicant_name` varchar(25) NOT NULL,
  `applicant_stagename` varchar(25) DEFAULT NULL,
  `applicant_email` varchar(50) NOT NULL,
  `applicant_pronouns` varchar(15) NOT NULL,
  `applicant_gender` varchar(15) NOT NULL,
  `applicant_location` varchar(25) NOT NULL,
  `applicant_discipline` varchar(50) NOT NULL,
  `applicant_message` varchar(111) NOT NULL,
  `applicant_socialmedia` varchar(50) NOT NULL,
  `application_submissiondate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists_applications`
--

INSERT INTO `artists_applications` (`application_Id`, `applicant_name`, `applicant_stagename`, `applicant_email`, `applicant_pronouns`, `applicant_gender`, `applicant_location`, `applicant_discipline`, `applicant_message`, `applicant_socialmedia`, `application_submissiondate`) VALUES
(4, 'Carmen Macuace', 'lana', 'carmen@hotmail.com', 'she/her', 'woman', 'Cali, COL', 'singer', 'this is a trial for editing the application after trying to do it on the user side', '@carmen', '2024-01-17'),
(5, 'Stephanie Germanotta', 'Lady Gaga', 'gaga@hotmail.com', 'she/her', 'woman', 'New York, USA', 'multidiciplinary', 'this the submission on consequential download of applications for the website.', '@ladygaga', '2024-01-17'),
(6, 'beyonce knowless', 'beyoncé', 'beyonce@ivypark.com', 'she/her', 'woman', 'Houston, USA', 'vocalist', 'this the submission on consequential download of applications for the website.', '@beyonce', '2024-01-17'),
(10, 'this is a trial', 'for', 'sjbj@hotmail.com', 'the ', 'creation', 'of ', 'bjbjh', 'bjkbbjbjb', 'kskbn', '2024-01-19'),
(12, 'trial from', 'it girl', 'ndiknd@email.com', 'she/her', 'nb', 'amsterdam', 'multidisciplinary', 'nknjrlknintirphyrnipnhrvc oit oc o cih ceidhgeoi cic igjeop ciepj cojpoj ejg iji ioj', '@me', '2024-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pronouns` varchar(25) NOT NULL,
  `user_picture` int(11) NOT NULL DEFAULT 1,
  `user_type` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL DEFAULT 'password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `user_firstname`, `user_lastname`, `user_email`, `user_pronouns`, `user_picture`, `user_type`, `user_password`) VALUES
(1001, 'Andy', 'Rodriguez', 'andrhiguez@outlook.com', 'they/them', 89, 1, '$2y$12$Pa7B0PTKmNJysl.3D9dTwuz6x18IgwaGBjJ/Tu2g9FaOWwUWotkJi'),
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

CREATE TABLE `users_usertypes` (
  `usertype_Id` int(11) NOT NULL,
  `usertype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_usertypes`
--

INSERT INTO `users_usertypes` (`usertype_Id`, `usertype_name`) VALUES
(1, 'developer'),
(2, 'admin'),
(3, 'artist'),
(4, 'collaborator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists_applications`
--
ALTER TABLE `artists_applications`
  ADD PRIMARY KEY (`application_Id`),
  ADD UNIQUE KEY `applicant_email` (`applicant_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`) USING BTREE,
  ADD UNIQUE KEY `user_email` (`user_email`) USING BTREE,
  ADD KEY `usertype_FK` (`user_type`);

--
-- Indexes for table `users_usertypes`
--
ALTER TABLE `users_usertypes`
  ADD PRIMARY KEY (`usertype_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists_applications`
--
ALTER TABLE `artists_applications`
  MODIFY `application_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_usertypes`
--
ALTER TABLE `users_usertypes`
  MODIFY `usertype_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;



--
-- Database: `losangles_feed`
--
CREATE DATABASE IF NOT EXISTS `losangles_feed` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `losangles_feed`;

-- --------------------------------------------------------

--
-- Table structure for table `feed_comments`
--

CREATE TABLE `feed_comments` (
  `comment_Id` int(11) NOT NULL,
  `comment_user` int(11) NOT NULL,
  `comment_parentpost` int(11) NOT NULL,
  `comment_text_content` varchar(125) NOT NULL,
  `comment_posted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feed_comments`
--

INSERT INTO `feed_comments` (`comment_Id`, `comment_user`, `comment_parentpost`, `comment_text_content`, `comment_posted_at`) VALUES
(4, 1001, 6, 'now a comment for this post', '2024-01-15 23:17:56'),
(5, 1001, 3, 'one last comment for the posts', '2024-01-15 23:17:56'),
(6, 1001, 3, 'please start working', '2024-01-15 23:17:56'),
(13, 1001, 5, 'trial comment display', '2024-01-15 23:17:56'),
(14, 1001, 3, 'I want to go to sleeeeppppppp', '2024-01-15 23:17:56'),
(15, 1001, 3, 'pleaseeee', '2024-01-15 23:17:56'),
(18, 1001, 6, 'new comment', '2024-01-16 00:28:52'),
(19, 1001, 6, 'from within', '2024-01-16 00:42:29'),
(20, 1001, 5, 'from within the comment section', '2024-01-16 00:42:53'),
(21, 1001, 5, 'from outside the comment section', '2024-01-16 00:43:12'),
(22, 2617, 12, 'adding dummy comments to other people&#039;s posts', '2024-01-21 11:31:04'),
(23, 2617, 11, 'adding dummy comments to different posts', '2024-01-21 11:32:07'),
(24, 2617, 7, 'adding comments here toooo!', '2024-01-21 11:32:28'),
(25, 2617, 9, 'this isn&#039;t the latest post anymore', '2024-01-21 11:32:51'),
(26, 1001, 11, 'that&#039;s right', '2024-01-21 12:14:11'),
(27, 1357, 12, 'totally agree with what your saying queen', '2024-01-21 21:32:48'),
(28, 1357, 11, 'this is an admin post and i&#039;m posting comments from an artist account', '2024-01-21 21:33:23'),
(29, 1357, 13, 'making a post from the mainpage', '2024-01-21 21:39:08'),
(30, 1357, 8, 'now it works correctly', '2024-01-21 21:39:24'),
(31, 5173, 16, 'trying out the comments with multiple users', '2024-01-21 23:36:45'),
(32, 5173, 14, 'trying to comment everywhere', '2024-01-21 23:36:57'),
(33, 5173, 15, 'making more and more comments', '2024-01-21 23:37:13'),
(34, 5173, 15, 'the comment functionality does work', '2024-01-21 23:37:21'),
(35, 5173, 13, 'say it girll', '2024-01-21 23:37:44'),
(36, 5173, 12, 'putting dummy comments', '2024-01-21 23:37:58'),
(37, 5173, 12, 'exactly', '2024-01-21 23:38:05'),
(38, 5173, 12, 'exactly', '2024-01-21 23:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `feed_posts`
--

CREATE TABLE `feed_posts` (
  `post_Id` int(11) NOT NULL,
  `post_user` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_picture` int(11) DEFAULT NULL,
  `post_text_content` varchar(500) NOT NULL,
  `post_topic` int(11) DEFAULT NULL,
  `post_posted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feed_posts`
--

INSERT INTO `feed_posts` (`post_Id`, `post_user`, `post_title`, `post_picture`, `post_text_content`, `post_topic`, `post_posted_at`) VALUES
(3, 1001, 'this is a trial for the time', NULL, 'check the time bitch', 3, '2024-01-15 01:18:55'),
(5, 1001, 'this is a yet  another test', NULL, 'I am testing the functionality of the post, to send and also display them in the feed.', 1, '2024-01-15 21:16:27'),
(6, 1001, 'once more', NULL, 'once more', 1, '2024-01-15 21:17:57'),
(7, 1001, 'pagination, next page!', NULL, 'next page for the paginatin thingggg', 1, '2024-01-16 10:26:18'),
(8, 1001, 'yet another post', NULL, 'another post to make the pagination', 1, '2024-01-16 10:31:07'),
(9, 1001, 'latest post in the first page!', NULL, 'let&#039;s see if it works', 1, '2024-01-16 10:31:32'),
(11, 1002, 'posting from the perspective of Admin', NULL, 'this is a post i am making on an admin account to see how the lay out works when different user types post', 1, '2024-01-21 11:16:39'),
(12, 2617, 'checking styles', NULL, 'this is a dummie post to see how much an admin post stands out in the feed', 1, '2024-01-21 11:18:23'),
(13, 1357, 'another post from another user', NULL, 'everything seems to be working correctly. just hoping for the database not to crash when creating them', 1, '2024-01-21 21:31:50'),
(14, 1357, 'let me try another topic', NULL, 'I wanted to try making posts in different topics, also to fill up the gigs section because it looks very empty', 3, '2024-01-21 21:32:31'),
(15, 1002, 'this is a trial post from the admin account', NULL, 'filling up the postss in the database so the feed loos more pleasing with multiple posts', 1, '2024-01-21 23:32:12'),
(16, 1002, 'admin post', NULL, 'this is a trial for the admin post in aa different topic, trying to fill data in here', 3, '2024-01-21 23:32:39'),
(17, 5173, 'regular post', NULL, 'making some more posts in the feed to fill it up with different users', 1, '2024-01-21 23:35:19'),
(18, 5173, 'almost done with these posts', NULL, 'about to finish the project apparently :)', 1, '2024-01-21 23:35:50'),
(19, 5173, 'making a post in a different topic', NULL, 'a regular user making a different post', 3, '2024-01-21 23:36:29'),
(20, 1001, 'Welcome to the feed', NULL, 'you can make posts through the button on the right corner that has the letters Aa and you can check the comments on the existing post by clicking the underlined text that says the number of comments, of course, you can also comment from the main page or from the comment section', 1, '2024-01-21 23:40:01'),
(21, 1001, 'welcome to the feed', NULL, 'you can make posts through the button on the right corner that has the letters Aa and you can check the comments on the existing post by clicking the underlined text that says the number of comments, of course, you can also comment from the main page or from the comment section', 3, '2024-01-21 23:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `feed_topics`
--

CREATE TABLE `feed_topics` (
  `topic_Id` int(11) NOT NULL,
  `topic_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feed_topics`
--

INSERT INTO `feed_topics` (`topic_Id`, `topic_name`) VALUES
(1, 'general'),
(3, 'gigs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed_comments`
--
ALTER TABLE `feed_comments`
  ADD PRIMARY KEY (`comment_Id`),
  ADD KEY `post_FK` (`comment_parentpost`),
  ADD KEY `comment_userId_FK` (`comment_user`);

--
-- Indexes for table `feed_posts`
--
ALTER TABLE `feed_posts`
  ADD PRIMARY KEY (`post_Id`),
  ADD KEY `topic_FK` (`post_topic`),
  ADD KEY `post_userId_FK` (`post_user`);

--
-- Indexes for table `feed_topics`
--
ALTER TABLE `feed_topics`
  ADD PRIMARY KEY (`topic_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed_comments`
--
ALTER TABLE `feed_comments`
  MODIFY `comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `feed_posts`
--
ALTER TABLE `feed_posts`
  MODIFY `post_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feed_topics`
--
ALTER TABLE `feed_topics`
  MODIFY `topic_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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



--
-- Database: `losangles_content`
--
CREATE DATABASE IF NOT EXISTS `losangles_content` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `losangles_content`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_content`
--

CREATE TABLE `admin_content` (
  `admin_Id` int(11) NOT NULL,
  `admin_name_link` varchar(150) NOT NULL,
  `admin_titles` varchar(50) NOT NULL,
  `admin_description` varchar(500) NOT NULL,
  `admin_picture` int(11) DEFAULT NULL
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

CREATE TABLE `artist_content` (
  `artist_Id` int(11) NOT NULL,
  `artist_description` varchar(500) NOT NULL,
  `artist_extralink` varchar(100) DEFAULT NULL,
  `artist_discipline` int(11) NOT NULL,
  `artist_email` varchar(50) NOT NULL,
  `artist_soundcloud_url` mediumtext DEFAULT NULL,
  `artist_socialmedia` varchar(50) DEFAULT NULL,
  `artist_stagename` varchar(25) DEFAULT NULL,
  `artist_picture` int(11) DEFAULT NULL,
  `artist_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist_content`
--

INSERT INTO `artist_content` (`artist_Id`, `artist_description`, `artist_extralink`, `artist_discipline`, `artist_email`, `artist_soundcloud_url`, `artist_socialmedia`, `artist_stagename`, `artist_picture`, `artist_location`) VALUES
(1357, 'Angelboy’s power lies in mixing diverse genres and rhythms - with a focus on uptempo and high energy - their signature sound aims to uplift and get the crowd moving. They have graced well-established queer parties and have a monthly radio show on the Amsterdam radiostation Echobox Radio. Besides dj&#039;ing, they are an educator in gender, sexuality, consent and speaking up against discrimination.', ' ', 9, 'zoah@momanager.nl', ' ', 'https://www.instagram.com/angelboy', 'Angelboy', 122, 'Amsterdam, NL'),
(2423, 'LYZZA is a Brazilian artist and DJ based in the Netherlands. As a teenager she enrolled in a DJ workshop class by Jarreau Vandal, who encouraged her to keep pursuing music. She started as a Ballroom DJ in Amsterdam and eventually started touring around the club scene in Europe. As an electronic pop artist, she released three EPs and a mixtape and has been associated with the avant-pop genre as well as &quot;post-PC Music&quot;.', '', 9, 'artist5@outlook.com', '', '#', 'LYZZA', 123, 'Amsterdam/Berlin'),
(2433, 'Ada is an artist and writer based between Barbados, London, Amsterdam and Rotterdam. She works with masquerade, music, performance, poetry, textiles and video, looking at how storytelling can make identity formation both possible and impossible. Her recent work considers the connections between transformation, crisis, grief, rage, disappearance, discretion, self-defence and survival.', '', 29, 'info@adampatterson.co.uk', '', '#', 'AdaPatterson', 124, 'Amsterdam'),
(2617, 'DIORA, a Cape Townian gem, who currently resides in Amsterdam, is a multi-disciplinary artist. She blends techno, hardcore, drum and industrial sounds with strings of vocals to amplify the vibrancy in the air. Captivating is a word that could be used to describe her presence on the decks. Get ready to grind and flip your hair!', 'none', 9, 'daniidiorbookings@gmail.com', '', 'https://www.instagram.com/daniiidiora', 'diora', 125, 'Amsterdam, NL'),
(4894, 'Trans Non-binary performance artist and Drag-esque creature. Drowning in substances until we reach the place of the in-between. Living and performing in alternative spaces in Amsterdam, ReX&#039;s research is an exploration of the idea of disruption. An action that holds a political and critical activism in the queer body/community towards this capitalistic heteronormative society.', '', 28, 'rexcollins@gmail.com', '', '#', 'Rex', 126, 'Amsterdam'),
(5173, 'ZOBAYDA is an Egyptian transdisciplinary artist &amp; DJ living between Rotterdam &amp; Amsterdam. They are known for their live experimentation and eclectic mixing style, drawing influences from Tabla, Gqom, Bass and Ballroom.', '', 9, 'zobayda.elbatanoni@gmail.com', '', 'https://www.instagram.com/zobayda__', 'zobayda', 127, 'Rotterdam, nl'),
(6887, 'Through scripting different voices and scenarios, Anto lip-syncs to their own pieces, for the self to be understood as an ever changing subject on set. “I see on lip-syncing to my own and other peoples’ voices a possible embodiment of a multiple consciousness. Performing my work allows me to simultaneously locate myself both in the future and in the past, in the so called ‘real’ and in a dream. ', '', 28, 'anto@gmail.com', '', '#', 'AntoLopez', 128, 'Amsterdam, NL');

-- --------------------------------------------------------

--
-- Table structure for table `artist_disciplines`
--

CREATE TABLE `artist_disciplines` (
  `artist_discipline_Id` int(11) NOT NULL,
  `artist_discipline_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `content_types` (
  `content_type_Id` int(11) NOT NULL,
  `content_type_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `events` (
  `event_Id` int(11) NOT NULL,
  `event_name` varchar(25) NOT NULL,
  `event_datetime` datetime NOT NULL,
  `event_location` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_poster` int(11) DEFAULT NULL,
  `event_description` varchar(500) NOT NULL,
  `event_ticketbtn_text` varchar(20) NOT NULL,
  `event_ticketbtn_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `event_lineups` (
  `lineup_Id` int(11) NOT NULL,
  `lineup_event` int(11) NOT NULL,
  `lineup_category` varchar(20) NOT NULL,
  `lineup_artists` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `event_locations` (
  `location_Id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `location_address` varchar(50) NOT NULL,
  `location_city` varchar(25) NOT NULL,
  `location_country` varchar(25) NOT NULL,
  `location_map_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `event_types` (
  `event_type_Id` int(11) NOT NULL,
  `event_type_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `file_directory` (
  `path_Id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `directory_name` varchar(25) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `media` (
  `media_Id` int(11) NOT NULL,
  `media_filename` varchar(100) NOT NULL,
  `media_type` varchar(50) NOT NULL,
  `media_path` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(111, '65ad3a9554bc4.png', 'homepagePicture', 76),
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
(131, '65ad9beb307f8.jpg', 'userpicture', 91);

-- --------------------------------------------------------

--
-- Table structure for table `navbar_content`
--

CREATE TABLE `navbar_content` (
  `navbar_content_Id` int(11) NOT NULL,
  `navbar_content_type` int(11) NOT NULL,
  `navbar_content_media` int(11) DEFAULT NULL,
  `navbar_content_page` int(11) DEFAULT NULL,
  `navbar_content_text` varchar(25) DEFAULT NULL,
  `navbar_content_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_Id` int(11) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_displayname` varchar(100) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_directory` int(11) NOT NULL,
  `page_inNavbar` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `page_content` (
  `page_content_Id` int(11) NOT NULL,
  `element_Id` varchar(50) NOT NULL,
  `page_content_text` varchar(750) DEFAULT NULL,
  `page_content_type` int(11) NOT NULL,
  `page_content_media` int(11) DEFAULT NULL,
  `parent_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`page_content_Id`, `element_Id`, `page_content_text`, `page_content_type`, `page_content_media`, `parent_page`) VALUES
(1, 'title-text', 'Meet Los Angles', 3, NULL, 1),
(2, 'title-link', 'https://www.instagram.com/losanglescollective', 4, NULL, 1),
(3, 'about-description', 'Out of frustration with the status quo and hope for a better future, the LOS ANGLES collective\nwas founded in December 2022 by 3 trans women: Alma, Maria, and Val. Our collective aims to\ncontinuously showcase and nurture TRANS talent. Being active members of the community (organising fundraisers, curating exhibitions featuring\ntrans artists) and also frequent party girls, we have noticed that even though the “T” has its rightful\nplace within the queer community, our presence is often marginalised all over the cultural sector\nand nightlife. We’ve also noticed that often individual efforts usually lose momentum quite fast.', 3, NULL, 1),
(4, 'footer-link', 'mailto:val@losanglescollective.com', 4, NULL, 1),
(5, 'footer-text', 'mail us', 3, NULL, 1),
(7, 'homepagePicture', 'none', 1, 111, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_content`
--
ALTER TABLE `admin_content`
  ADD PRIMARY KEY (`admin_Id`),
  ADD KEY `media_FK` (`admin_picture`);

--
-- Indexes for table `artist_content`
--
ALTER TABLE `artist_content`
  ADD PRIMARY KEY (`artist_Id`),
  ADD KEY `artist_Id_FK` (`artist_Id`),
  ADD KEY `artist_discipline_detailpageFK` (`artist_discipline`),
  ADD KEY `artist_picture_detailpageFK` (`artist_picture`);

--
-- Indexes for table `artist_disciplines`
--
ALTER TABLE `artist_disciplines`
  ADD PRIMARY KEY (`artist_discipline_Id`);

--
-- Indexes for table `content_types`
--
ALTER TABLE `content_types`
  ADD PRIMARY KEY (`content_type_Id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_Id`),
  ADD KEY `event_poster_FK` (`event_poster`),
  ADD KEY `event_location_FK` (`event_location`),
  ADD KEY `event_type_FK` (`event_type`);

--
-- Indexes for table `event_lineups`
--
ALTER TABLE `event_lineups`
  ADD PRIMARY KEY (`lineup_Id`),
  ADD UNIQUE KEY `lineup_category` (`lineup_category`),
  ADD KEY `event_FK` (`lineup_event`);

--
-- Indexes for table `event_locations`
--
ALTER TABLE `event_locations`
  ADD PRIMARY KEY (`location_Id`),
  ADD UNIQUE KEY `location_name` (`location_name`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`event_type_Id`);

--
-- Indexes for table `file_directory`
--
ALTER TABLE `file_directory`
  ADD PRIMARY KEY (`path_Id`),
  ADD UNIQUE KEY `unique_type_path` (`type`,`path`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_Id`),
  ADD KEY `media_path_FK` (`media_path`);

--
-- Indexes for table `navbar_content`
--
ALTER TABLE `navbar_content`
  ADD PRIMARY KEY (`navbar_content_Id`),
  ADD KEY `navbar_content_media_FK` (`navbar_content_media`),
  ADD KEY `navbar_content_page_FK` (`navbar_content_page`),
  ADD KEY `navbar_content_type_FK` (`navbar_content_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_Id`),
  ADD KEY `page_directory_FK` (`page_directory`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`page_content_Id`),
  ADD KEY `page_content_type_FK` (`page_content_type`),
  ADD KEY `page_content_media_FK` (`page_content_media`),
  ADD KEY `page_content_parent_page_FK` (`parent_page`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist_disciplines`
--
ALTER TABLE `artist_disciplines`
  MODIFY `artist_discipline_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `content_types`
--
ALTER TABLE `content_types`
  MODIFY `content_type_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_lineups`
--
ALTER TABLE `event_lineups`
  MODIFY `lineup_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event_locations`
--
ALTER TABLE `event_locations`
  MODIFY `location_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `event_type_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `file_directory`
--
ALTER TABLE `file_directory`
  MODIFY `path_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `navbar_content`
--
ALTER TABLE `navbar_content`
  MODIFY `navbar_content_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `page_content_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
