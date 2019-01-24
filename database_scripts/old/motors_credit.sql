-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2016 at 07:24 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `motor_recovery`
--

-- --------------------------------------------------------

--
-- Table structure for table `creditrecovery`
--

CREATE TABLE IF NOT EXISTS `creditrecovery` (
  `creditrecoveryid` int(11) NOT NULL AUTO_INCREMENT,
  `visitdate` date NOT NULL,
  `customercode` varchar(20) NOT NULL,
  `customername` varchar(150) NOT NULL,
  `TTYCode` varchar(25) NOT NULL,
  `territoryname` varchar(150) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `projectionamount` varchar(10) NOT NULL,
  `installmentsize` varchar(10) NOT NULL,
  `overdueamount` varchar(10) NOT NULL,
  `nextvisitdate` date NOT NULL,
  `comittedamount` varchar(10) DEFAULT NULL,
  `actualpaidamount` varchar(10) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `supports` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`creditrecoveryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `creditrecovery`
--

INSERT INTO `creditrecovery` (`creditrecoveryid`, `visitdate`, `customercode`, `customername`, `TTYCode`, `territoryname`, `mobileno`, `projectionamount`, `installmentsize`, `overdueamount`, `nextvisitdate`, `comittedamount`, `actualpaidamount`, `remarks`, `supports`) VALUES
(1, '2016-06-02', 'B00936', 'Md.Saidul Haq', 'B006', 'Laxmipur', '01846117510', '20000', '43197.00', '252379.00', '0000-00-00', '0', '0', '2', '4'),
(2, '2016-06-02', 'B00936', 'Md.Saidul Haq', 'B006', 'Laxmipur', '01846117510', '20000', '43197.00', '252379.00', '2016-06-15', '15500', '0', '1', '0'),
(3, '2016-06-02', 'B00936', 'Md.Saidul Haq', 'B006', 'Laxmipur', '01846117510', '20000', '43197.00', '252379.00', '2016-06-20', '15500', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `remarkscomments`
--

CREATE TABLE IF NOT EXISTS `remarkscomments` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  `rem_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `remarkscomments`
--

INSERT INTO `remarkscomments` (`id`, `name`, `rem_order`) VALUES
(1, 'Sale Commitments', 10),
(2, 'Invoice Before Delivery', 20),
(3, 'Could be defaulter', 30),
(4, 'Good Customer', 40),
(5, 'Need To capture', 50);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  `sup_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `name`, `sup_order`) VALUES
(1, 'Service Support', 0),
(2, 'Spare parts support', 0),
(3, 'Group visit support', 0),
(4, 'Head Office person visit support', 0),
(5, 'Field manager visit', 0),
(6, 'Police support', 0),
(7, 'Legal Support', 0),
(8, 'Internal adjustment', 0),
(9, 'Head Office support', 0),
(10, 'Others', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userpermission`
--

CREATE TABLE IF NOT EXISTS `userpermission` (
  `userpermissionid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `ttycode` varchar(25) NOT NULL,
  `notes` text,
  PRIMARY KEY (`userpermissionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `userpermission`
--


-- --------------------------------------------------------

--
-- Table structure for table `usersinformation`
--

CREATE TABLE IF NOT EXISTS `usersinformation` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserType` tinyint(4) NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `Notes` text NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usersinformation`
--

INSERT INTO `usersinformation` (`UserID`, `UserName`, `Password`, `UserType`, `IsActive`, `Notes`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '1=Admin, Credit Recovery'),
(2, 'DHK', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, ''),
(3, 'CHT', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '');
