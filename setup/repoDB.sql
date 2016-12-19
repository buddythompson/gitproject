-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2016 at 03:35 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `repos`
--
CREATE DATABASE IF NOT EXISTS `repos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `repos`;

-- --------------------------------------------------------

--
-- Table structure for table `repodata`
--

CREATE TABLE IF NOT EXISTS `repodata` (
  `primaryid` int(11) NOT NULL AUTO_INCREMENT,
  `repositoryid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(500) NOT NULL,
  `createdate` datetime NOT NULL,
  `pushdate` datetime NOT NULL,
  `description` varchar(2000) NOT NULL,
  `stars` int(11) NOT NULL,
  `insertiondate` datetime NOT NULL,
  `lastmoddate` datetime NOT NULL,
  PRIMARY KEY (`primaryid`),
  UNIQUE KEY `primaryid` (`primaryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=905 ;

-- --------------------------------------------------------

--
-- Table structure for table `reporefreshlog`
--

CREATE TABLE IF NOT EXISTS `reporefreshlog` (
  `refreshid` int(11) NOT NULL AUTO_INCREMENT,
  `refreshdate` datetime NOT NULL,
  `refreshnotes` varchar(100) NOT NULL,
  PRIMARY KEY (`refreshid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
