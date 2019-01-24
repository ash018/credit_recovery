-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2016 at 02:05 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `usersinformation`
--

INSERT INTO `usersinformation` (`UserID`, `UserName`, `Password`, `UserType`, `IsActive`, `Notes`) VALUES
(4, 'Panch', '8690', 2, 1, 'Md. Rafiqul Islam'),
(5, 'Boda', '5135', 2, 1, 'Md. Masud Alam'),
(6, 'Thak1', '9814', 2, 1, 'Md. Abdul Alim '),
(7, 'Thak2', '5921', 2, 1, 'Md. Muraduzzaman'),
(8, 'Pirga', '7090', 2, 1, 'Md. Ershad Hossain'),
(9, 'Setab', '4866', 2, 1, 'Md. Dulal Hossain'),
(10, 'Biram', '4837', 2, 1, 'Md. Azad Ali'),
(11, 'Dinaj', '2573', 2, 1, 'Md. Hamidur Rahman '),
(12, 'Nilph', '5905', 2, 1, 'Md. Asraful Islam '),
(13, 'Lalmo', '7140', 2, 1, 'Md. Rabiul Islam '),
(14, 'Rangp', '5724', 2, 1, 'Md. Badrul Alam khan'),
(15, 'Kurig', '6843', 2, 1, 'Md. Shamim Reza'),
(16, 'Gaiba', '5788', 2, 1, 'Md. Shahabur Rahman'),
(17, 'Naog1', '6229', 2, 1, 'Md. Tangirul Islam'),
(18, 'Naog2', '7750', 2, 1, 'Md. Monowar Hossain'),
(19, 'Naog3', '3384', 2, 1, 'Md. Monowar Hossain'),
(20, 'Bogra', '4483', 2, 1, 'Mohammad Abdul Karim '),
(21, 'Joypu', '9513', 2, 1, 'Md. Nahid Hassan'),
(22, 'Nator', '1758', 2, 1, 'Mohammad Abdul Karim '),
(23, 'Pabna', '1700', 2, 1, 'Md. Rafiqul Islam. B'),
(24, 'Chapa', '5104', 2, 1, 'Md. Rezaul Khan'),
(25, 'Rajsh', '7970', 2, 1, 'Md. Rafiqul Islam'),
(26, 'Kusht', '9046', 2, 1, 'Vacant'),
(27, 'Meher', '3557', 2, 1, 'Proshanto Kumar Roy '),
(28, 'Jhena', '8031', 2, 1, 'Vacant'),
(29, 'Chuad', '8418', 2, 1, 'Md. Safikul Alam'),
(30, 'Gazip', '6876', 2, 1, 'Md. Arju Mia'),
(31, 'Manik', '5327', 2, 1, 'Abdur Rahim'),
(32, 'Narsi', '4538', 2, 1, 'Mir Mosarraf Hossan'),
(33, 'Kisho', '2374', 2, 1, 'Mir Mosarraf Hossan'),
(34, 'Mymen', '1506', 2, 1, 'Md. Mahmudul Ehsan'),
(35, 'Jamal', '5762', 2, 1, 'Md. Halim Mia'),
(36, 'Tanga', '7657', 2, 1, 'Md. Mahmudul Ehsan'),
(37, 'Sylhe', '1925', 2, 1, 'Md. Masud Rana '),
(38, 'Habig', '2204', 2, 1, 'Vacant'),
(39, 'Madha', '2899', 2, 1, 'Vacant'),
(40, 'Brahm', '1958', 2, 1, 'Vacant'),
(41, 'Comil', '4773', 2, 1, 'Md. Gias uddin'),
(42, 'Laksh', '6745', 2, 1, 'Md. Gias uddin'),
(43, 'Laksa', '6821', 2, 1, 'Md. Mahbub Alam'),
(44, 'Chand', '1765', 2, 1, 'Mahabubur Rahman '),
(45, 'Chitt', '3293', 2, 1, 'Md. Mahfuzur Rahman'),
(46, 'Feni', '4468', 2, 1, 'Md. Aklas Uddin '),
(47, 'Noakh', '6561', 2, 1, 'Md. Aklas Uddin '),
(48, 'Bargu', '9923', 2, 1, 'Md.Zilkadur Rahman'),
(49, 'Charf', '6729', 2, 1, 'Md. Mojibul Mawla '),
(50, 'Bhola', '7034', 2, 1, 'Md. Mojibul Mawla '),
(51, 'Farid', '8709', 2, 1, 'Md. Abdul Alim '),
(52, 'Madar', '4979', 2, 1, 'Md. Abdul Alim '),
(53, 'Satkh', '7511', 2, 1, 'A.K.M. Abdul Kuddus '),
(54, 'Jesso', '2799', 2, 1, 'A.K.M. Abdul Kuddus '),
(55, 'admin', '123456', 1, 1, 'admin');
