--   Rename table to brommoapp

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE `realestate` (
  `objid` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `street` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `zip` int(10) DEFAULT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `country` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `purchaseprice` float DEFAULT NULL,
  `purchasepricenet` float NOT NULL,
  `size` float DEFAULT NULL,
  `outdoorspace` float DEFAULT NULL,
  `renovationprice` float DEFAULT NULL,
  `equityratio` float DEFAULT NULL,
  `freerent` tinyint(1) DEFAULT NULL,
  `goodlocation` tinyint(1) DEFAULT NULL,
  `attic` tinyint(1) DEFAULT NULL,
  `patio` tinyint(1) DEFAULT NULL,
  `publictransport` tinyint(1) DEFAULT NULL,
  `garage` float DEFAULT NULL,
  `rentgross` float DEFAULT NULL,
  `overheads` float DEFAULT NULL,
  `reserve` float DEFAULT NULL,
  `vatreduction` tinyint(1) DEFAULT NULL,
  `link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `createdate` date DEFAULT NULL,
  `modification` date DEFAULT NULL,
  `agent` float NOT NULL,
  `kitchen` tinyint(4) NOT NULL,
  `mainimage` text COLLATE utf8_bin NOT NULL,
  `cashflow` float NOT NULL,
  `earnings` float NOT NULL,
  `yield` float NOT NULL,
  `rating` int(11) NOT NULL,
  `taxpercent` float NOT NULL,
  `depreciationpercent` float NOT NULL,
  `loanregistrypercent` float NOT NULL,
  `purchasetax` float NOT NULL,
  `lawyerpercent` float NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `realestate` (`objid`, `title`, `description`, `street`, `zip`, `city`, `country`, `purchaseprice`, `purchasepricenet`, `size`, `outdoorspace`, `renovationprice`, `equityratio`, `freerent`, `goodlocation`, `attic`, `patio`, `publictransport`, `garage`, `rentgross`, `overheads`, `reserve`, `vatreduction`, `link`, `createdate`, `modification`, `agent`, `kitchen`, `mainimage`, `cashflow`, `earnings`, `yield`, `rating`, `taxpercent`, `depreciationpercent`, `loanregistrypercent`, `purchasetax`, `lawyerpercent`, `owner_id`) VALUES
(null, 'Test', '', '', 1070, '', 'Austria', 100000, 110000, 100, 10, 0, 0.3, NULL, NULL, NULL, NULL, NULL, 0, 1000, 100, 10, NULL, '', '2016-12-19', '2016-12-20', 0, 0, '', 4565.61, 6191.85, 8.9156, 3, 9, 7, 5, 10, 20, 0);

CREATE TABLE `users` (
  `objid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COLLATE=utf8_bin;


CREATE TABLE `realestate_owners` (
  `owner_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `realestate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE news;

ALTER TABLE `users` ADD `activated` BOOLEAN NOT NULL AFTER `newsletter`;

ALTER TABLE `users` ADD `language` TEXT NOT NULL AFTER `activated`;

