-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2023 at 04:52 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 7898799798, 'tester1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-07-05 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `VehicleCat` (`VehicleCat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `VehicleCat`, `price`, `CreationDate`) VALUES
(1, 'Four Wheeler Vehicle', 20, '2022-05-01 11:06:50'),
(2, 'Two Wheeler Vehicle', 10, '2022-03-02 11:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblparking`
--

DROP TABLE IF EXISTS `tblparking`;
CREATE TABLE IF NOT EXISTS `tblparking` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) DEFAULT NULL,
  `vehicle_id` int(10) DEFAULT NULL,
  `p_name` varchar(50) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `v_category` int(10) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblparking`
--

INSERT INTO `tblparking` (`id`, `u_id`, `vehicle_id`, `p_name`, `price`, `v_category`, `status`) VALUES
(1, NULL, NULL, 'PF1', NULL, 4, 0),
(2, NULL, NULL, 'PF2', 20, 4, 0),
(3, NULL, NULL, 'PF3', 20, 4, 0),
(4, NULL, NULL, 'PF4', 20, 4, 0),
(5, NULL, NULL, 'PF5', 20, 4, 0),
(6, NULL, NULL, 'PF6', 20, 4, 0),
(7, NULL, NULL, 'PF7', 20, 4, 0),
(8, NULL, NULL, 'PF8', 20, 4, 0),
(9, NULL, NULL, 'PF9', 20, 4, 0),
(10, 1, 0, 'PF10', 10, 4, 1),
(11, NULL, NULL, 'PF11', 20, 4, 0),
(12, 1, 2, 'PF12', 10, 4, 1),
(13, NULL, NULL, 'PF13', 20, 4, 0),
(14, NULL, NULL, 'PF14', 20, 4, 0),
(15, NULL, NULL, 'PF15', 20, 4, 0),
(16, 1, 1, 'PF16', 20, 4, 1),
(17, NULL, NULL, 'PF17', 20, 4, 0),
(18, NULL, NULL, 'PF18', 20, 4, 0),
(19, NULL, NULL, 'PF19', 20, 4, 0),
(20, NULL, NULL, 'PF20', 20, 4, 0),
(21, NULL, NULL, 'PF21', 20, 4, 0),
(22, NULL, NULL, 'PF22', 20, 4, 0),
(23, NULL, NULL, 'PF23', 20, 4, 0),
(24, NULL, NULL, 'PF24', 20, 4, 0),
(25, NULL, NULL, 'PF25', 20, 4, 0),
(26, NULL, NULL, 'PT26', 10, 2, 0),
(27, NULL, NULL, 'PT27', 10, 2, 0),
(28, NULL, NULL, 'PT28', 10, 2, 0),
(29, NULL, NULL, 'PT29', 10, 2, 0),
(30, NULL, NULL, 'PT30', 10, 2, 0),
(31, NULL, NULL, 'PT31', 10, 2, 0),
(32, NULL, NULL, 'PT32', 10, 2, 0),
(33, NULL, NULL, 'PT33', 10, 2, 0),
(34, NULL, NULL, 'PT34', 10, 2, 0),
(35, NULL, NULL, 'PT35', 10, 2, 0),
(36, NULL, NULL, 'PT36', 10, 2, 0),
(37, NULL, NULL, 'PT37', 10, 2, 0),
(38, NULL, NULL, 'PT38', 10, 2, 0),
(39, NULL, NULL, 'PT39', 10, 2, 0),
(40, NULL, NULL, 'PT40', 10, 2, 0),
(41, NULL, NULL, 'PT41', 10, 2, 0),
(42, NULL, NULL, 'PT42', 10, 2, 0),
(43, NULL, NULL, 'PT43', 10, 2, 0),
(44, NULL, NULL, 'PT44', 10, 2, 0),
(45, NULL, NULL, 'PT45', 10, 2, 0),
(46, NULL, NULL, 'PT46', 10, 2, 0),
(47, NULL, NULL, 'PT47', 10, 2, 0),
(48, 1, 0, 'PT48', 20, 2, 1),
(49, 1, 0, 'PT49', 10, 2, 1),
(50, 1, 0, 'PT50', 10, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblregusers`
--

DROP TABLE IF EXISTS `tblregusers`;
CREATE TABLE IF NOT EXISTS `tblregusers` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `MobileNumber` (`MobileNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblregusers`
--

INSERT INTO `tblregusers` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'rohit', 'testing', 9876548789, 'suryavanshir20@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-08-24 15:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

DROP TABLE IF EXISTS `tblvehicle`;
CREATE TABLE IF NOT EXISTS `tblvehicle` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `UserId` int(10) DEFAULT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` datetime DEFAULT NULL,
  `OutTime` datetime DEFAULT NULL,
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext,
  `Status` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`ID`, `UserId`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(1, 1, 'PF16', 'Four Wheeler Vehicle', 'efsef', '2587', 'dfsdf', 6858888555, '2023-08-31 21:52:00', '2023-09-02 21:53:00', '20', NULL, ''),
(2, 1, 'PF12', 'Two Wheeler Vehicle', 'fgdf', '3658', 'fbffd', 9685888888, '2023-08-25 22:10:00', '2023-08-26 22:10:00', '10', NULL, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
