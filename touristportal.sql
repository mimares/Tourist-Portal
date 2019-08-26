-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 05:12 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `touristportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `id_location` int(11) NOT NULL,
  `title_e` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_e` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_e` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_location` (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_location`, `title_e`, `description_e`, `pic_e`) VALUES
(1, 1, 'Neman', 'craft pivo', 'assets/images/pivo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `title_l` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_l` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_l` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `title_l`, `description_l`, `pic_l`) VALUES
(1, 'Proba', 'Probna lokacija', 'assets/images/proba.jpg'),
(2, 'bla', 'kalsdk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qr_code`
--

CREATE TABLE IF NOT EXISTS `qr_code` (
  `id_qr` int(11) NOT NULL AUTO_INCREMENT,
  `id_location` int(11) DEFAULT NULL,
  `scan_time` datetime DEFAULT NULL,
  `pic_qr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_qr`),
  KEY `id_location` (`id_location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
  `id_tour` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `title_t` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_t` datetime NOT NULL,
  PRIMARY KEY (`id_tour`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id_tour`, `id_user`, `title_t`, `date_t`) VALUES
(1, 1, 'bla', '2019-06-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tour_location`
--

CREATE TABLE IF NOT EXISTS `tour_location` (
  `id_tour_location` int(11) NOT NULL AUTO_INCREMENT,
  `id_tour` int(11) DEFAULT NULL,
  `id_location` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tour_location`),
  KEY `id_tour` (`id_tour`,`id_location`),
  KEY `id_location` (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tour_location`
--

INSERT INTO `tour_location` (`id_tour_location`, `id_tour`, `id_location`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_location` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp` int(11) NOT NULL DEFAULT '0',
  `is_guide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_location` (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_location`, `email`, `username`, `password`, `exp`, `is_guide`) VALUES
(1, NULL, 'proba@email.com', 'proba', '$2y$10$3kjPjsYuAKasB/7xn3mtVuGpu6DO5LRcejpanAPWd4vN9a8bbRTuG', 0, 0),
(3, NULL, 'novimail@mail.com', 'milos', 'milos', 0, 0),
(4, NULL, 'gaspa@mojmail.com', 'gaspa', '$2y$10$Yg99FOjxJkfH0tLN2.jIPudKBLRstu2cSUUjTqU4KNiTkaVaptPxK', 0, 1),
(5, NULL, 'tatjana@gmail.com', 'tatjana', '$2y$10$b6RsTB53/YILmQCNp.zbNe.MwLczG/jkXAhacduujQn2ls9ZKN9WC', 0, 1),
(6, NULL, 'DUBRO@GMAIL.COM', 'dubro', '$2y$10$U4zEcuj77ThXOvLS..HVue2LgE1tTD4Q6XrNDFqerR7LlxAAYzmY6', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `qr_code`
--
ALTER TABLE `qr_code`
  ADD CONSTRAINT `FK_id_location` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `FK_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tour_location`
--
ALTER TABLE `tour_location`
  ADD CONSTRAINT `FK_id_location3` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_id_tour` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id_tour`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_id_locationn` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
