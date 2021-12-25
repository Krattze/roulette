
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE DATABASE IF NOT EXISTS `roulette` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `roulette`;

-- --------------------------------------------------------


DROP TABLE IF EXISTS `rolls`;
CREATE TABLE IF NOT EXISTS `rolls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roll` int(11) NOT NULL,
  `color` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `rolls` (`id`, `roll`, `color`, `time`) VALUES
(1, 6, 'red', '2021-12-25 04:23:11'),
(2, 5, 'red', '2021-12-25 04:23:11'),
(3, 4, 'red', '2021-12-25 04:23:11'),
(4, 7, 'red', '2021-12-25 04:23:11'),
(5, 8, 'black', '2021-12-25 04:23:11'),
(6, 9, 'black', '2021-12-25 04:23:11'),
(7, 10, 'black', '2021-12-25 04:23:11'),
(8, 11, 'black', '2021-12-25 04:23:11'),
(9, 12, 'black', '2021-12-25 04:23:11'),
(10, 0, 'green', '2021-12-25 04:23:11'),
(11, 13, 'black', '2021-12-25 04:23:11');

-- --------------------------------------------------------


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(21) NOT NULL,
  `email` varchar(21) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
