-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2022 at 03:18 PM
-- Server version: 8.0.21
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kake_c`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_d_c_users_phinxlog`
--

DROP TABLE IF EXISTS `cake_d_c_users_phinxlog`;
CREATE TABLE IF NOT EXISTS `cake_d_c_users_phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cake_d_c_users_phinxlog`
--

INSERT INTO `cake_d_c_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150513201111, 'Initial', '2022-02-05 20:39:39', '2022-02-05 20:39:44', 0),
(20161031101316, 'AddSecretToUsers', '2022-02-05 20:39:44', '2022-02-05 20:39:45', 0),
(20190208174112, 'AddAdditionalDataToUsers', '2022-02-05 20:39:45', '2022-02-05 20:39:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `token_secret` varchar(500) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `data` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `additional_data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`, `additional_data`) VALUES
('f17bf279-8248-410a-b025-9d8629668bbf', 'dejan', 'test@test.com', '$2y$10$SD.cgSbET8tfZPirE2.SSO88FWILCoZwBqwlEtrCBWVe.IZnrdxKi', 'Dejan', 'Simic', 'a1647620dd2b4a3653ac92999a2ae1a4', '2022-02-05 22:40:56', NULL, NULL, NULL, NULL, '2022-02-05 21:40:56', 1, 1, 'user', '2022-02-05 21:40:56', '2022-02-05 21:40:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `short_desc` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `videoId` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(10) NOT NULL,
  `quality` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `thumbnail` varchar(850) NOT NULL,
  `channelId` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='video sa YT';

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `short_desc`, `url`, `videoId`, `type`, `quality`, `thumbnail`, `channelId`) VALUES
(1, 'Django Reinhardt - I\'se a Muggin\'', 'Django Reinhardt - I\'se a Muggin\'. May 4, 1936.', 'https:', 'zb5mC-MToAI', 'mp4', '720p', 'https://i.ytimg.com/vi/zb5mC-MToAI/hqdefault.jpg?sqp=-oaymwEjCNACELwBSFryq4qpAxUIARUAAAAAGAElAADIQj0AgKJDeAE=&rs=AOn4CLBEDvBcGvGn0e0oMaq2_3xaSnZHIw', '123456'),
(2, 'Gypsy Jazz - \"Minor Swing\" - Rhythm Future Quartet', 'Jason Anick (violin) - http://www.jasonanick.com\nOlli Soikkeli (guitar) - https://www.facebook.com/ollisoikkeliguitarist/\nVinny Raniolo (guitar) - https://vinnyraniolo.com/\nGreg Loughman (bass) - http://gregloughman.com/\n\nThe Rhythm Future Quartet - \"Minor Swing\" by Django Reinhardt\nFilmed at Redstar Studio in Cambridge \n\nhttp://jasonanick.bandcamp.com/album/the-rhythm-future-quartet\nwww.jasonanick.com', 'https:', 'do1encCa5TU', 'mp4', '720p', 'https://i.ytimg.com/vi/do1encCa5TU/maxresdefault.jpg', '123456'),
(3, 'Bésame Mucho (in FRENCH) – Tatiana Eva-Marie & Avalon Jazz Band', '\"Bésame Mucho\" is a song written in 1940 by Mexican songwriter Consuelo Velázquez. It was also Tatiana\'s grandmother\'s favorite song!\n\nvocals - Tatiana Eva-Marie\nviolin - Gabe Terracciano\nguitar - Vinny Raniolo\nbass - Wallace Stelzer\n\nShot at the Keep in Brooklyn by Gérome Barry and Sergio Carrasco, sound recorded by Amos Rose and mixed by Adrien Chevalier. Many thanks to Diego Castillo.\n\nPlease like and subscribe to our channel! Follow us on Spotify, Instagram and Facebook!\nwww.avalonjazzband.com / www.tatianaevamarie.com\n\nClick below to support live music by buying/ streaming our latest releases:\nPARIS https://lnkfi.re/yM53ms0R\nJE SUIS SWING https://lnkfi.re/bAmksZ2k', 'https:', '-uYVnqOdr9s', 'mp4', '720p', 'https://i.ytimg.com/vi/-uYVnqOdr9s/maxresdefault.jpg', '123456'),
(4, 'I.S.A.K. Program za Advokate - Vodič I-Deo', 'I.S.A.K. Program za Advokate - Vodič za korišćenje I-Deo.\nwww.beodata.rs', 'https:', '3yXquI4Y1wk', 'mp4', '720p', 'https://i.ytimg.com/vi/3yXquI4Y1wk/maxresdefault.jpg?v=6120b206', '123456');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
