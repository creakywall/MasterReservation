-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2012 at 04:24 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ureserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
CREATE TABLE IF NOT EXISTS `buildings` (
  `building_ID` int(11) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(50) NOT NULL,
  `building_active` bit(1) NOT NULL DEFAULT b'1',
  `startOpenTime` time NOT NULL,
  `endOpenTime` time NOT NULL,
  PRIMARY KEY (`building_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`building_ID`, `building_name`, `building_active`, `startOpenTime`, `endOpenTime`) VALUES
(1, 'CRCC', b'1', '07:30:00', '22:00:00'),
(2, 'FESSB', b'1', '07:30:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `res_ID` int(11) NOT NULL AUTO_INCREMENT,
  `room_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `res_Start` datetime NOT NULL,
  `res_End` datetime NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`res_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reservations`
--


-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_ID` int(11) NOT NULL AUTO_INCREMENT,
  `building_ID` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_active` bit(1) NOT NULL,
  `startOpenTime` time NOT NULL,
  `endOpenTime` time NOT NULL,
  PRIMARY KEY (`room_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_ID`, `building_ID`, `room_name`, `room_active`, `startOpenTime`, `endOpenTime`) VALUES
(1, 1, 'B 1 Room 1', b'1', '07:00:00', '22:00:00'),
(2, 1, 'B 1 Room 2', b'1', '07:00:00', '22:00:00'),
(3, 2, 'B 2 Room 1', b'1', '07:00:00', '22:00:00'),
(4, 2, 'B 2 Room 2', b'1', '07:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roomblacklist`
--

DROP TABLE IF EXISTS `roomblacklist`;
CREATE TABLE IF NOT EXISTS `roomblacklist` (
  `blackList_ID` int(11) NOT NULL AUTO_INCREMENT,
  `room_ID` int(11) NOT NULL,
  `start_DateTime` datetime NOT NULL,
  `end_DateTime` datetime NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`blackList_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `roomblacklist`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) NOT NULL,
  `name` varchar(70) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `usertype_ID` int(11) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `usertype_ID` int(11) NOT NULL AUTO_INCREMENT,
  `userDescription` varchar(50) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`usertype_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `usertype`
--

