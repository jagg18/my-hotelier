-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 06, 2009 at 02:43 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `myhotelier`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `GUEST`
-- 

CREATE TABLE `GUEST` (
  `GUEST_ID` int(10) NOT NULL,
  `GUEST_PHONE` varchar(20) collate latin1_general_ci NOT NULL,
  `GUEST_MOBILE` varchar(20) collate latin1_general_ci default NULL,
  `GUEST_CC` varchar(20) collate latin1_general_ci NOT NULL,
  `GUEST_EMAIL` varchar(50) collate latin1_general_ci NOT NULL,
  KEY `GUEST_ID` (`GUEST_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `guest`
-- 

INSERT INTO `GUEST` (`GUEST_ID`, `GUEST_PHONE`, `GUEST_MOBILE`, `GUEST_CC`, `GUEST_EMAIL`) VALUES 
(1, '4566296', '09053481960', '1234567890122132', 'jer_geronimo@yahoo.com'),
(3, '4566296', '09165709840', '4564566540', 'nikko_simara@yahoo.c'),
(11, '9293457', '0905090509051234567', '1234567891', 'josiefelrivera@yahoo'),
(13, '1234567', '09051234567', '1234567890', 'kewl_ivy@yahoo.com'),
(21, '1234567', '', '1234567891011333', 'jer_geronimo@yahoo.com'),
(15, '1234567', '09101234567', '1234567890', 'jer_geronimo@yahoo.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `reservation`
-- 

CREATE TABLE `RESERVATION` (
  `RESERVATION_ID` int(10) NOT NULL auto_increment,
  `ROOM_ASSIGNMENT_ID` int(10) default NULL,
  `GUEST_ID` int(10) NOT NULL,
  `R_OCCUPANCY` int(10) default '1',
  `R_NO_ROOM` int(10) default '1',
  `R_SPECS` varchar(50) collate latin1_general_ci default NULL,
  `R_ROOM_TYPE` int(10) NOT NULL,
  `R_CHECKIN` date NOT NULL,
  `R_CHECKOUT` date default NULL,
  `R_REQUEST` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`RESERVATION_ID`),
  KEY `GUEST_ID` (`GUEST_ID`),
  KEY `ROOM_ASSIGNMENT_ID` (`ROOM_ASSIGNMENT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=54 ;

-- 
-- Dumping data for table `reservation`
-- 

INSERT INTO `RESERVATION` (`RESERVATION_ID`, `ROOM_ASSIGNMENT_ID`, `GUEST_ID`, `R_OCCUPANCY`, `R_NO_ROOM`, `R_SPECS`, `R_ROOM_TYPE`, `R_CHECKIN`, `R_CHECKOUT`, `R_REQUEST`) VALUES 
(25, 7, 1, 5, 1, '', 11, '2012-01-01', '2012-01-06', '2009-04-06 00:30:25'),
(24, 15, 1, 12, 12, '12', 6, '2012-01-01', '2012-01-02', '2009-04-06 01:30:27'),
(27, 17, 1, 10, 5, '', 9, '2012-01-11', '2013-01-01', '2009-04-06 02:23:19'),
(28, 6, 1, 15, 12, '', 8, '2012-01-01', '2012-01-11', '2009-04-06 07:51:14'),
(29, 18, 1, 12, 12, '', 6, '2012-01-01', '2012-01-01', '2009-04-06 11:29:57'),
(30, 23, 1, 12, 12, '', 6, '2012-01-01', '2012-01-01', '2009-04-06 11:41:08'),
(31, 14, 1, 12, 12, '12', 6, '2012-01-01', '2012-01-01', '2009-04-06 06:07:16'),
(33, 27, 1, 12, 12, '12', 6, '2012-01-01', '2012-01-01', '2009-04-06 11:48:10'),
(34, 5, 1, 5, 2, 'djghwa;og', 8, '2012-01-01', '2012-01-01', '2009-04-05 05:07:11'),
(35, 28, 1, 10, 5, '', 8, '2012-01-06', '2012-01-06', '2009-04-06 11:56:23'),
(36, 4, 1, 12, 1, '', 6, '2009-04-06', '2009-04-07', '2009-04-05 05:05:39'),
(37, 16, 14, 1000, 500, 'aircon', 11, '2009-09-10', '2009-09-15', '2009-04-06 02:12:54'),
(38, 29, 1, 21, 12, '33', 6, '2012-01-01', '2012-01-01', '2009-04-06 11:58:05'),
(43, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:53:01'),
(40, 13, 1, 8, 1, 'submit', 8, '2012-01-05', '2012-01-05', '2009-04-06 01:17:08'),
(42, NULL, 21, 12, 12, '12', 6, '2012-01-01', '2012-01-01', '2009-04-06 11:28:38'),
(44, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:53:08'),
(45, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:53:14'),
(46, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:53:19'),
(47, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:53:24'),
(48, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:53:32'),
(49, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:53:37'),
(50, NULL, 1, 1, 1, '1', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:53:42'),
(51, NULL, 1, 1, 1, '', 6, '2012-01-01', '2012-01-01', '2009-04-06 21:55:55'),
(52, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:55:59'),
(53, NULL, 1, 1, 1, '', 6, '2013-01-01', '2013-01-01', '2009-04-06 21:56:04');

-- --------------------------------------------------------

-- 
-- Table structure for table `room`
-- 

CREATE TABLE `ROOM` (
  `ROOM_ID` int(10) NOT NULL auto_increment,
  `ROOM_TYPE` int(10) NOT NULL,
  `ROOM_NAME` varchar(20) collate latin1_general_ci NOT NULL,
  `ROOM_STATUS` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ROOM_ID`),
  KEY `ROOM_TYPE` (`ROOM_TYPE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=32 ;

-- 
-- Dumping data for table `room`
-- 

INSERT INTO `ROOM` (`ROOM_ID`, `ROOM_TYPE`, `ROOM_NAME`, `ROOM_STATUS`) VALUES 
(10, 6, '4321', 1),
(6, 6, '1100', 1),
(14, 8, '222', 0),
(13, 11, '175', 1),
(15, 6, '123', 1),
(16, 8, '565', 0),
(17, 6, '566', 1),
(18, 8, '567', 1),
(19, 6, '1', 1),
(20, 8, '2', 0),
(21, 6, '3', 1),
(22, 8, '4', 0),
(23, 6, '5', 1),
(24, 8, '6', 1),
(25, 11, '7', 1),
(26, 6, '8', 0),
(27, 6, '9', 0),
(28, 8, '10', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `room_assignment`
-- 

CREATE TABLE `ROOM_ASSIGNMENT` (
  `ROOM_ASSIGNMENT_ID` int(10) NOT NULL auto_increment,
  `CLERK_ID` int(10) NOT NULL,
  `GUEST_ID` int(10) NOT NULL,
  `ROOM_ID` int(10) NOT NULL,
  `ROOM_ASSIGNMENT_TOTAL_COST` float(10,2) NOT NULL,
  `ROOM_ASSIGNMENT_STATUS` int(10) NOT NULL default '0',
  `DATE_ASSIGN` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`ROOM_ASSIGNMENT_ID`),
  KEY `CLERK_ID` (`CLERK_ID`),
  KEY `GUEST_ID` (`GUEST_ID`),
  KEY `ROOM_ID` (`ROOM_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=30 ;

-- 
-- Dumping data for table `room_assignment`
-- 

INSERT INTO `ROOM_ASSIGNMENT` (`ROOM_ASSIGNMENT_ID`, `CLERK_ID`, `GUEST_ID`, `ROOM_ID`, `ROOM_ASSIGNMENT_TOTAL_COST`, `ROOM_ASSIGNMENT_STATUS`, `DATE_ASSIGN`) VALUES 
(4, 7, 1, 10, 2000.00, 1, '2009-04-06 09:50:13'),
(5, 7, 1, 24, 4400.00, 1, '2009-04-06 02:10:24'),
(6, 19, 14, 13, 125000.00, 1, '2009-04-06 00:26:33'),
(7, 7, 1, 21, 2500.00, 1, '2009-04-06 02:28:21'),
(18, 7, 1, 0, 0.00, 1, '2009-04-06 11:29:57'),
(11, 7, 1, 11, 2980.00, 1, '2009-04-06 01:12:19'),
(13, 7, 1, 18, 2980.00, 1, '2009-04-06 02:05:41'),
(14, 7, 1, 17, 30000.00, 1, '2009-04-06 01:21:44'),
(15, 7, 1, 23, 30000.00, 1, '2009-04-06 02:31:25'),
(16, 7, 14, 25, 125000.00, 1, '2009-04-06 02:13:21'),
(17, 7, 1, 19, 12500.00, 1, '2009-04-06 02:23:19'),
(19, 7, 1, 0, 0.00, 1, '2009-04-06 11:34:03'),
(20, 7, 1, 0, 0.00, 1, '2009-04-06 11:37:43'),
(21, 7, 1, 0, 0.00, 1, '2009-04-06 11:38:07'),
(22, 7, 1, 0, 0.00, 1, '2009-04-06 11:40:31'),
(23, 7, 1, 0, 0.00, 1, '2009-04-06 11:41:08'),
(24, 7, 1, 0, 0.00, 1, '2009-04-06 11:45:51'),
(25, 7, 1, 0, 0.00, 1, '2009-04-06 11:46:52'),
(26, 7, 1, 0, 0.00, 1, '2009-04-06 11:47:09'),
(27, 7, 1, 0, 0.00, 1, '2009-04-06 11:48:10'),
(28, 7, 1, 6, 12500.00, 1, '2009-04-06 11:56:23'),
(29, 7, 1, 15, 30000.00, 1, '2009-04-06 11:58:05');

-- --------------------------------------------------------

-- 
-- Table structure for table `room_designation`
-- 

CREATE TABLE `ROOM_DESIGNATION` (
  `STAFF_ID` int(10) NOT NULL,
  `ROOM_ID` int(10) NOT NULL,
  KEY `STAFF_ID` (`STAFF_ID`),
  KEY `ROOM_ID` (`ROOM_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `room_designation`
-- 

INSERT INTO `ROOM_DESIGNATION` (`STAFF_ID`, `ROOM_ID`) VALUES 
(7, 9),
(7, 6),
(8, 10),
(8, 9),
(17, 10),
(17, 6),
(17, 14),
(17, 11),
(17, 13),
(17, 15),
(23, 6),
(23, 10),
(18, 15),
(18, 11),
(18, 14),
(18, 10),
(23, 14),
(23, 13),
(23, 15),
(23, 16);

-- --------------------------------------------------------

-- 
-- Table structure for table `room_service`
-- 

CREATE TABLE `ROOM_SERVICE` (
  `ROOM_ID` int(10) NOT NULL,
  `ITEM_ID` int(10) NOT NULL,
  `STAFF_ID` int(10) NOT NULL,
  `DATE_REQUEST` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `QTY` int(10) NOT NULL,
  KEY `ITEM_ID` (`ITEM_ID`),
  KEY `STAFF_ID` (`STAFF_ID`),
  KEY `ROOM_ID` (`ROOM_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `room_service`
-- 

INSERT INTO `ROOM_SERVICE` (`ROOM_ID`, `ITEM_ID`, `STAFF_ID`, `DATE_REQUEST`, `QTY`) VALUES 
(10, 4, 9, '2009-04-06 09:11:24', 1),
(13, 4, 9, '2009-04-06 09:11:33', 2),
(10, 4, 9, '2009-04-06 09:11:44', 2),
(10, 3, 9, '2009-04-06 09:12:11', 1),
(10, 3, 9, '2009-04-06 09:12:18', 1),
(13, 3, 9, '2009-04-06 09:25:21', 4),
(13, 3, 9, '2009-04-06 09:25:53', 2),
(10, 4, 9, '2009-04-06 12:15:44', 1),
(10, 4, 9, '2009-04-06 12:15:57', 1),
(19, 3, 9, '2009-04-06 17:45:09', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `room_type`
-- 

CREATE TABLE `ROOM_TYPE` (
  `TYPE_ID` int(10) NOT NULL auto_increment,
  `TYPE_NAME` varchar(20) collate latin1_general_ci NOT NULL,
  `TYPE_RATE` float(10,2) NOT NULL,
  `TYPE_EXTRA` float(10,2) NOT NULL,
  `TYPE_CAPACITY` int(10) NOT NULL,
  PRIMARY KEY  (`TYPE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `room_type`
-- 

INSERT INTO `ROOM_TYPE` (`TYPE_ID`, `TYPE_NAME`, `TYPE_RATE`, `TYPE_EXTRA`, `TYPE_CAPACITY`) VALUES 
(6, 'Cabana', 2500.00, 260.00, 5),
(8, 'Hut', 2200.00, 260.00, 5),
(9, 'Cabana8', 2800.00, 280.00, 28),
(11, 'Jerimae', 250.00, 50.00, 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `service`
-- 

CREATE TABLE `SERVICE` (
  `SERVICE_ID` int(10) NOT NULL auto_increment,
  `SERVICE_NAME` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`SERVICE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `service`
-- 

INSERT INTO `SERVICE` (`SERVICE_ID`, `SERVICE_NAME`) VALUES 
(1, 'Chambermaid123'),
(2, 'Resto123'),
(3, 'ABC'),
(4, '12345'),
(5, 'Massage Parlors'),
(6, ''),
(7, '1'),
(8, '123'),
(9, '5'),
(10, '123123');

-- --------------------------------------------------------

-- 
-- Table structure for table `service_item`
-- 

CREATE TABLE `SERVICE_ITEM` (
  `ITEM_ID` int(10) NOT NULL auto_increment,
  `SERVICE_ID` int(10) NOT NULL,
  `ITEM_NAME` varchar(20) collate latin1_general_ci NOT NULL,
  `ITEM_PRICE` float(10,2) NOT NULL,
  `DATE_EFFECT` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`ITEM_ID`),
  KEY `SERVICE_ID` (`SERVICE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `service_item`
-- 

INSERT INTO `SERVICE_ITEM` (`ITEM_ID`, `SERVICE_ID`, `ITEM_NAME`, `ITEM_PRICE`, `DATE_EFFECT`) VALUES 
(1, 1, 'Pillow', 20.00, '2009-04-01 00:00:00'),
(2, 1, 'Blanket', 50.00, '2009-04-06 20:17:13'),
(3, 2, 'abcde', 140.00, '2009-04-02 00:00:00'),
(4, 2, 'abcdefghijk', 2000.00, '2009-04-02 00:00:00'),
(5, 3, '12', 120.00, '2009-04-02 00:00:00'),
(6, 3, '13', 140.00, '2009-04-02 00:00:00'),
(7, 4, '15', 521.00, '2009-04-02 00:00:00'),
(8, 4, '16', 631.00, '2009-04-02 00:00:00'),
(9, 5, 'full body massage', 2000.00, '2009-04-05 00:00:00'),
(10, 8, '231', 123.00, '2009-04-06 00:00:00'),
(11, 8, '321', 123.00, '2009-04-06 00:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `service_staff`
-- 

CREATE TABLE `SERVICE_STAFF` (
  `STAFF_ID` int(10) NOT NULL,
  `SERVICE_ID` int(10) NOT NULL,
  KEY `STAFF_ID` (`STAFF_ID`),
  KEY `SERVICE_ID` (`SERVICE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `service_staff`
-- 

INSERT INTO `SERVICE_STAFF` (`STAFF_ID`, `SERVICE_ID`) VALUES 
(9, 2),
(10, 1),
(18, 1),
(23, 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `USER` (
  `USER_ID` int(10) NOT NULL auto_increment,
  `USER_TYPE` int(10) NOT NULL,
  `USER_LNAME` varchar(20) collate latin1_general_ci NOT NULL,
  `USER_FNAME` varchar(20) collate latin1_general_ci NOT NULL,
  `USER_MNAME` varchar(20) collate latin1_general_ci default NULL,
  `USER_LOGIN` varchar(20) collate latin1_general_ci NOT NULL,
  `USER_PASS` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`USER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `USER` (`USER_ID`, `USER_TYPE`, `USER_LNAME`, `USER_FNAME`, `USER_MNAME`, `USER_LOGIN`, `USER_PASS`) VALUES 
(1, 1, 'Geronimo', 'Jerome Christopher', 'Agustin', 'jagg18', 'kamil018'),
(3, 1, 'Fojas', 'Marlon Nikko', 'Muyo', 'nikko_simara', 'mnmf'),
(4, 2, 'Gasmen', 'Perlita', 'Esmeres', 'perl_coolers', 'password'),
(21, 1, '1', 'a', 'a', '12345', '12345'),
(6, 2, '', 'a', 'a', 'anonimos', 'abc'),
(7, 3, 'Mijares', 'Francis Jose', 'R', 'francism171', 'password'),
(8, 3, 'Carinan', 'John', 'G', 'nincompoopbrof1', 'jhon'),
(9, 4, 'Ko', 'Eric', 'De Joya', 'eko', 'password'),
(13, 1, 'Amagsila', 'Ivy Lulette', 'O', 'kewl_ivy', 'password'),
(11, 1, 'Rivera', 'Josiefel', 'Sanchez', 'josiefelrivera', 'eko'),
(23, 4, 'abcde', 'abcde', 'abcde', 'abcde', 'abcde'),
(15, 1, 'Smith', 'John', '', 'maxxtreme18', 'kamil018'),
(16, 2, 'jerome', 'jerome', 'jerome', 'jerome', '2bb010060d682fee5ad19d973a9a4d2a'),
(18, 4, '123', '123', '123', '123', '202cb962ac59075b964b07152d234b70'),
(19, 3, '123', '123', '123', '123', '123');
