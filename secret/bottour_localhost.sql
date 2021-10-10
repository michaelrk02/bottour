-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tour_places`;
CREATE TABLE `tour_places` (
  `place_id` int(11) NOT NULL,
  `center_x` double NOT NULL,
  `center_y` double NOT NULL,
  `title` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `tour_places`;
INSERT INTO `tour_places` (`place_id`, `center_x`, `center_y`, `title`, `location`, `description`) VALUES
(1,	49.89,	19.79,	'Fortune Cookie',	'https://pingfest.com/',	'Simplicity is prerequisite for reliability -E.W. Dijkstra'),
(2,	34.36,	42.71,	'Fortune Cookie',	'https://pingfest.com/',	'Simplicity is prerequisite for reliability -E.W. Dijkstra'),
(3,	49.82,	62.89,	'Fortune Cookie',	'https://pingfest.com/',	'Simplicity is prerequisite for reliability -E.W. Dijkstra'),
(4,	65.71,	43.75,	'Fortune Cookie',	'https://pingfest.com/',	'Simplicity is prerequisite for reliability -E.W. Dijkstra'),
(5,	25.79,	72.79,	'Fortune Cookie',	'https://pingfest.com/',	'Simplicity is prerequisite for reliability -E.W. Dijkstra'),
(6,	74.36,	71.22,	'Fortune Cookie',	'https://pingfest.com/',	'Simplicity is prerequisite for reliability -E.W. Dijkstra');

-- 2021-10-10 11:55:04
