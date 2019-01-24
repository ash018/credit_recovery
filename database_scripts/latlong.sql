-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 11:00 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

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
-- Table structure for table `latlong`
--

CREATE TABLE `latlong` (
  `LatLongID` int(11) NOT NULL,
  `TerrityName` varchar(100) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Longitude` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latlong`
--

INSERT INTO `latlong` (`LatLongID`, `TerrityName`, `Latitude`, `Longitude`) VALUES
(1, 'Panchagarh1', '26.4958476', '88.33261'),
(2, 'Panchagarh2', '26.3309012', '88.5388182'),
(3, 'Panchagarh3', '26.1990721', '88.5374663'),
(4, 'Thakurgaon-1', '26.0270521', '88.44846'),
(5, 'Thakurgaon-2', '26.0834165', '88.2609414'),
(6, 'Pirgonj', '25.8548961', '88.3413218'),
(7, 'Setabgonj', '25.6040655', '87.1185053'),
(8, 'Dinajpur', '25.6202824', '88.6074113'),
(9, 'Birampur', '25.6216516', '88.6332362'),
(10, 'Rangpur-1', '25.7498341', '89.2277376'),
(11, 'Gaibandha', '25.330741', '89.5309674'),
(12, 'Rangpur-2', '25.7898363', '88.8607256'),
(13, 'Kurigram', '25.8108809', '89.6293184'),
(14, 'lalmonirhat-1', '25.9217045', '89.4146876'),
(15, 'lalmonirhat-2', '27.297177', '83.1015087'),
(16, 'Nilphamari', '25.9395332', '88.8139908'),
(17, 'Bogra', '24.8415209', '89.3001659'),
(18, 'Natore', '24.412376', '88.9616862'),
(19, 'Joypurhat', '25.102524', '88.9868324'),
(20, 'Rajshahi', '24.3803151', '88.5709505'),
(21, 'Chapainawabgonj', '24.587088', '88.2540749'),
(22, 'Pabna', '24.0130624', '89.2149489'),
(23, 'Naogaon-1', '24.917692', '88.7361859'),
(24, 'Naogaon-2', '25.0484937', '88.7467002'),
(25, 'Naogaon-3', '24.6147536', '88.9637659'),
(26, 'Feni', '23.0135455', '91.388148'),
(27, 'Noakhali', '22.9453848', '91.0993741'),
(28, 'Laxmipur', '22.9424018', '90.8005421'),
(29, 'Chittagong-1', '22.3283645', '91.7526042'),
(30, 'Chittagong-2', '22.3785507', '91.9109773'),
(31, 'Sylhet-1', '25.2559617', '90.7397526'),
(32, 'Sylhet-2', '24.7095072', '92.182846'),
(33, 'Hobiganj', '24.5926476', '90.3043125'),
(34, 'Mowlovibazar', '24.4832018', '91.7533921'),
(35, 'B Baria', '23.9808924', '91.0417242'),
(36, 'Munshigonj', '23.5424262', '90.5098985'),
(37, 'Gazipur', '23.9947076', '90.400157'),
(38, 'Manikgonj', '23.8655739', '89.9867312'),
(39, 'Comilla-1', '23.45362', '91.1850021'),
(40, 'Comilla-2', '23.4591716', '91.2110334'),
(41, 'Comilla-3', '23.4267281', '91.1797428'),
(42, 'Chandpur', '23.2260115', '90.6432363'),
(43, 'Sherpur', '25.028378', '89.9774258'),
(44, 'Mymensingh', '24.7485569', '90.361604'),
(45, 'Tangail', '24.2427889', '89.887731'),
(46, 'Jamalpur', '24.9269155', '89.9310349'),
(47, 'Kishorganj', '24.4408784', '90.7832479'),
(48, 'Narshingdi', '23.9196005', '90.6997346'),
(49, 'Jessore', '23.1693068', '89.1644021'),
(50, 'Magura', '23.4881429', '89.4117164'),
(51, 'Satkhira', '22.7145589', '89.0527129'),
(52, 'Chuadanga', '23.6507741', '88.81707'),
(53, 'Meherpur', '23.7736006', '88.6098324'),
(54, 'Jhenaidah', '23.5512332', '89.1340535'),
(55, 'kushtia', '23.8969748', '89.0818469'),
(56, 'Faridpur', '23.6011723', '89.8217295'),
(57, 'Madaripur', '23.1684099', '90.1582281'),
(58, 'Barisal', '22.6954732', '90.3180417'),
(59, 'Barguna', '22.1590093', '90.1078033'),
(60, 'Charfashion', '22.3383705', '90.7244574'),
(61, 'Bhola', '22.4969105', '90.7064069');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `latlong`
--
ALTER TABLE `latlong`
  ADD PRIMARY KEY (`LatLongID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `latlong`
--
ALTER TABLE `latlong`
  MODIFY `LatLongID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
