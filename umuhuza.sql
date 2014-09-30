-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2014 at 10:00 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nur`
--

-- --------------------------------------------------------

--
-- Table structure for table `consumption`
--

CREATE TABLE IF NOT EXISTS `consumption` (
  `consumptionId` int(11) NOT NULL AUTO_INCREMENT,
  `recordedOn` date DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `contractFrom` date DEFAULT NULL,
  `contractTo` date DEFAULT NULL,
  `partnerId` int(11) DEFAULT NULL,
  PRIMARY KEY (`consumptionId`),
  KEY `customerId` (`customerId`),
  KEY `partnerId` (`partnerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `consumption`
--

INSERT INTO `consumption` (`consumptionId`, `recordedOn`, `customerId`, `amount`, `contractFrom`, `contractTo`, `partnerId`) VALUES
(4, '2014-08-06', 2, 120000, '2014-08-12', '2014-08-08', 3),
(5, '2014-08-25', 2, 1000, '2014-08-25', '2014-08-25', 3),
(6, '2014-08-25', 9, 10000, '2014-08-25', '2014-08-25', 1),
(7, '2014-08-26', 9, 1000, '2014-08-14', '2014-08-22', 1),
(8, '2014-08-26', 9, 12356, '2014-08-05', '2014-08-21', 3),
(9, '2014-09-01', NULL, 1000, '2014-09-01', '2014-09-01', 1),
(10, '2014-09-01', 9, 1000, '2014-09-01', '2014-09-01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(45) DEFAULT NULL,
  `idNumber` varchar(45) DEFAULT NULL,
  `emailAddress` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `accountNumber` varchar(45) DEFAULT NULL,
  `bank` varchar(45) DEFAULT NULL,
  `contractFrom` date DEFAULT NULL,
  `contractTo` date DEFAULT NULL,
  `maxmumAmount` double DEFAULT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `names`, `idNumber`, `emailAddress`, `phoneNumber`, `accountNumber`, `bank`, `contractFrom`, `contractTo`, `maxmumAmount`) VALUES
(1, 'GISODA ND Albert', '19868753113', 'gisa@y.fr', '0788694559', '466-895687-06', 'Bank of Kigali', '2014-09-16', '2014-09-30', 200),
(2, 'hgh', '789', 'jhg', 'hjg', '466-895687-06', 'bk', '0000-00-00', '0000-00-00', 20),
(8, 'Umuhuza Test ', '119865000851', 'raimablegmail.com', '0788694559', '466-895687-06', 'Bank of Kigali', '0000-00-00', '0000-00-00', 4000000),
(9, 'Aimable Rukundo', '119865000851', 'raimablegmail.com', '0788694559', '466-895687-06', 'Bank of Kigali', '2014-09-08', '2014-09-25', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `partnerId` int(11) NOT NULL AUTO_INCREMENT,
  `partnerName` varchar(100) DEFAULT NULL,
  `bankAccount` varchar(45) DEFAULT NULL,
  `bankAcoountProvider` varchar(60) DEFAULT NULL,
  `serviceId` int(11) DEFAULT NULL,
  PRIMARY KEY (`partnerId`),
  KEY `serviceId` (`serviceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`partnerId`, `partnerName`, `bankAccount`, `bankAcoountProvider`, `serviceId`) VALUES
(1, 'Volcano Ltd', '1528-5422', 'Bank of Kigali', 4),
(2, 'Lemigo', '1528-5422', 'Bank of Kigali', 3),
(3, 'Virunga', '1528-5422', 'Bank of Kigali', 4),
(4, 'Serena', '1528-5422', 'KCB', 3),
(5, 'Kalisimbi', '1528-5422', 'KCB', 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(45) DEFAULT NULL,
  `roleDescription` text,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`, `roleDescription`) VALUES
(1, 'Test', 'Here is the role for just testing the system.'),
(2, 'Administrator', 'This is the role for the admin of the system:\r\n'),
(3, 'Normal User', 'Login but no edit of the content of the system.'),
(4, 'staff account', 'Here the staff can only manage customers'),
(5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceDescription` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceId`, `serviceDescription`) VALUES
(1, ''),
(2, ''),
(3, 'Shopping'),
(4, 'Transport');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `roleId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `names`, `username`, `password`, `roleId`) VALUES
(1, 'Aimable Rukundo', 'raimable', 'cc03e747a6afbbcbf8be7668acfebee5', 3),
(2, 'Albert Gisoda123', 'agisoda123', '793ad97332dc17c54439428db800f67a', 2),
(3, 'Albert Gisoda', 'agisoda', 'test123', 2),
(4, 'Gisa', 'gisa', 'b0d1677fb091d372393119dae8fb349d', 2),
(5, 'Uwimana Oliver', 'uwoliver', '3705922d757ff5c3add858a967c27056', 3),
(17, 'System Administrator', 'admin', 'cc03e747a6afbbcbf8be7668acfebee5', 2),
(18, 'System Administrator', 'admin2', 'cc03e747a6afbbcbf8be7668acfebee5', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consumption`
--
ALTER TABLE `consumption`
  ADD CONSTRAINT `customerId` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partnerId` FOREIGN KEY (`partnerId`) REFERENCES `partner` (`partnerId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `serviceId` FOREIGN KEY (`serviceId`) REFERENCES `service` (`serviceId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
