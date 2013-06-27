-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2013 at 04:29 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(15) NOT NULL,
  `user_id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `my_user`
--

CREATE TABLE IF NOT EXISTS `my_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `file_id` int(15) NOT NULL,
  `date_buy` date NOT NULL,
  `price` int(7) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(3) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `menu_name`, `position`, `visible`, `content`, `subject_id`) VALUES
(0, '', 1, 0, '', 3),
(1, 'kharid file', 1, 1, 'behtarin gheymat o ba takhfif o download kon dge zer nazan...\nthat''s alll\n<html>\n<body>\n<br></br>\n<hr/>\n<script src="http://remote.digitalgoodsstore.com/embed.js" type="text/javascript"></script>\n			<a href="http://www.digitalgoodsstore.com/c/QnIHif" class="dgs dgs-button dgs-button-blue">Buy Now</a>\n</body>\n</html>', 1),
(2, 'foroosh file', 2, 1, 'har file e dari bezar inja link bede ma mifrooshim...\r\n\r\n<html>\r\n<body>\r\n<br></br>\r\n<hr/>\r\n<script src="http://remote.digitalgoodsstore.com/embed.js" type="text/javascript"></script>\r\n			<a href="http://www.digitalgoodsstore.com/c/QnIHif" class="dgs dgs-button dgs-button-blue">Sell now</a>\r\n</body>\r\n</html>', 1),
(3, 'bank', 1, 1, 'safhe baray vared shodan be tarakonesh bank...\n<html><body>\n<br></br>\n<hr/>\n<script src="http://remote.digitalgoodsstore.com/embed.js" type="text/javascript"></script>\n			<a href="http://www.digitalgoodsstore.com/c/QnIHif" class="dgs dgs-button dgs-button-blue">Bank mellat</a>\n</body>\n</html>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'main store', 1, 1),
(2, 'bank ha', 2, 1),
(3, 'files', 3, 1),
(4, 'salar.jpg', 4, 1),
(5, 'salar2.jpg', 5, 1),
(7, '', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `card` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hashed_password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(12) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `firsname` (`fname`,`lname`,`email`,`card`,`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `card`, `phone`, `hashed_password`, `id`) VALUES
('salar', 'moghimi', 'aaa@gmail.com', '627412113123', '09124389487', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
('salar', 'moghimi', 'moghimi.salar@gmail.com', '6274121131236127', '09124389487', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2),
('salar', 'mo', 'salar@gmail.com', '123456789', '123456789', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4),
('shahin', 'danesh', 'AAA@gmail.com', '123456', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5),
('', 'danesh', 'AAA@gmail.com', '123456', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 6),
('123', '123456', '123@gmail.com', '123456', '123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
