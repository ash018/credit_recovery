-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2016 at 01:39 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motor_recovery`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersinformation`
--

DROP TABLE IF EXISTS `usersinformation`;
CREATE TABLE IF NOT EXISTS `usersinformation` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserType` tinyint(4) NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `Notes` text NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersinformation`
--

INSERT INTO `usersinformation` (`UserID`, `UserName`, `Password`, `UserType`, `IsActive`, `Notes`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '1=Admin, Credit Recovery'),
(4, 'Panch', 'ff8c1a3bd0c441439a0a081e560c85fc', 2, 1, 'user'),
(5, 'Boda', '3ec27c2cff04bc5fd2586ca36c62044e', 2, 1, 'user'),
(6, 'Thak1', '74d66337fbdf4781f030008356a86771', 2, 1, 'user'),
(7, 'Thak2', 'b59442085644532ef03417a3e5a76437', 2, 1, 'user'),
(8, 'Pirga', '7cc980b0f894bd0cf05c37c246f215f3', 2, 1, 'user'),
(9, 'Setab', 'd403137434343677b98efc88cbd5493d', 2, 1, 'user'),
(10, 'Biram', '274a10ffa06e434f2a94df765cac6bf4', 2, 1, 'user'),
(11, 'Dinaj', '60519c3dd22587d6de04d5f1e28bd41d', 2, 1, 'user'),
(12, 'Nilph', '148148d62be67e0916a833931bd32b26', 2, 1, 'user'),
(13, 'Lalmo', '348a38cd25abeab0e440f37510e9b1fa', 2, 1, 'user'),
(14, 'Rangp', 'e49eb6523da9e1c347bc148ea8ac55d3', 2, 1, 'user'),
(15, 'Kurig', '287e041302f34b11ddfb57afc8048cd8', 2, 1, 'user'),
(16, 'Gaiba', '967edfdcdfbcc3b2d253fac24326e5b5', 2, 1, 'user'),
(17, 'Naog1', 'bce9abf229ffd7e570818476ee5d7dde', 2, 1, 'user'),
(18, 'Naog2', '918f5cd5a5c0d48671d4d4fc54bab2e9', 2, 1, 'user'),
(19, 'Naog3', '2517756c5a9be6ac007fe9bb7fb92611', 2, 1, 'user'),
(20, 'Bogra', '4607f7fff0dce694258e1c637512aa9d', 2, 1, 'user'),
(21, 'Joypu', '0373773367d222af429a7e5ab573a42d', 2, 1, 'user'),
(22, 'Nator', '2612aa892d962d6f8056b195ca6e550d', 2, 1, 'user'),
(23, 'Pabna', '01e00f2f4bfcbb7505cb641066f2859b', 2, 1, 'user'),
(24, 'Chapa', '6a6610feab86a1f294dbbf5855c74af9', 2, 1, 'user'),
(25, 'Rajsh', 'ec1093fe1626f25b1845d04dd6f55dd2', 2, 1, 'user'),
(26, 'Kusht', '71c1806ca28b555c76650f52bb0d2810', 2, 1, 'user'),
(27, 'Meher', '51da85a3c3dfa1f360b48852b64218b2', 2, 1, 'user'),
(28, 'Jhena', '67038aaa05ffac51830cffb04441f8c3', 2, 1, 'user'),
(29, 'Chuad', '9965b21b3968b6abc41143236b035c8c', 2, 1, 'user'),
(30, 'Gazip', 'd339a8932df05de23ae3d9e29df4b25f', 2, 1, 'user'),
(31, 'Manik', 'd693d554e0ede0d75f7d2873b015f228', 2, 1, 'user'),
(32, 'Narsi', '79fde5402cbc75ae0615c9ae4c335b46', 2, 1, 'user'),
(33, 'Kisho', '8cbd005a556ccd4211ce43f309bc0eac', 2, 1, 'user'),
(34, 'Mymen', 'b5488aeff42889188d03c9895255cecc', 2, 1, 'user'),
(35, 'Jamal', 'd384dec9f5f7a64a36b5c8f03b8a6d92', 2, 1, 'user'),
(36, 'Tanga', '82674fc29bc0d9895cee346548c2cb5c', 2, 1, 'user'),
(37, 'Sylhe', '0950ca92a4dcf426067cfd2246bb5ff3', 2, 1, 'user'),
(38, 'Habig', '4b4edc2630fe75800ddc29a7b4070add', 2, 1, 'user'),
(39, 'Madha', '332647f433a1c10fa2e2ae04abfdf83e', 2, 1, 'user'),
(40, 'Brahm', 'd77f00766fd3be3f2189c843a6af3fb2', 2, 1, 'user'),
(41, 'Comil', '3eae62bba9ddf64f69d49dc48e2dd214', 2, 1, 'user'),
(42, 'Laksh', 'a4ed074907dc9bc3c86cc52904d763e3', 2, 1, 'user'),
(43, 'Laksa', 'ba0a4d6ecea3e9e126dd3b6d77291c97', 2, 1, 'user'),
(44, 'Chand', '8698ff92115213ab187d31d4ee5da8ea', 2, 1, 'user'),
(45, 'Chitt', 'ca3ec598002d2e7662e2ef4bdd58278b', 2, 1, 'user'),
(46, 'Feni', '88c040adb393832c87914347cc2afc3f', 2, 1, 'user'),
(47, 'Noakh', '118bd558033a1016fcc82560c65cca5f', 2, 1, 'user'),
(48, 'Bargu', 'd9812f756d0df06c7381945d2e2c7d4b', 2, 1, 'user'),
(49, 'Charf', '8e19a39c36b8e5e3afd2a3b2692aea96', 2, 1, 'user'),
(50, 'Bhola', '1f50d0737a738a9ba3206543d1102cbc', 2, 1, 'user'),
(51, 'Farid', '2342d8a616837cd6d79017fe68172b28', 2, 1, 'user'),
(52, 'Madar', '9f96f36b7aae3b1ff847c26ac94c604e', 2, 1, 'user'),
(53, 'Satkh', '1e44fdf9c44d7328fecc02d677ed704d', 2, 1, 'user'),
(54, 'Jesso', '0d9095b0d6bbe98ea0c9c02b11b59ee3', 2, 1, 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
