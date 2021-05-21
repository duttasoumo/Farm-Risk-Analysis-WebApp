-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2018 at 03:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manuringIt`
--

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `cropId` tinyint(4) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crop`
--

INSERT INTO `crop` (`cropId`, `name`) VALUES
(0, '-'),
(1, 'Rice'),
(2, 'Wheat');

-- --------------------------------------------------------

--
-- Table structure for table `cropsKharif`
--

CREATE TABLE `cropsKharif` (
  `cid` int(10) UNSIGNED NOT NULL,
  `sowing` date DEFAULT NULL,
  `harvesting` date DEFAULT NULL,
  `crop1` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot1` float DEFAULT '0',
  `crop2` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot2` float DEFAULT '0',
  `crop3` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot3` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cropsKharif`
--

INSERT INTO `cropsKharif` (`cid`, `sowing`, `harvesting`, `crop1`, `cropPlot1`, `crop2`, `cropPlot2`, `crop3`, `cropPlot3`) VALUES
(10001, '2018-10-01', '2019-03-01', 2, 0, 1, 0, 0, 0),
(10002, '2018-10-01', '2019-03-01', 2, 0, 1, 0, 0, 0),
(10018, '2018-00-01', '2018-00-01', 2, 0, 0, 0, 0, 0),
(10019, '2018-11-01', '2019-02-01', 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cropsRabi`
--

CREATE TABLE `cropsRabi` (
  `cid` int(10) UNSIGNED NOT NULL,
  `sowing` date DEFAULT NULL,
  `harvesting` date DEFAULT NULL,
  `crop1` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot1` float DEFAULT '0',
  `crop2` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot2` float DEFAULT '0',
  `crop3` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot3` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cropsRabi`
--

INSERT INTO `cropsRabi` (`cid`, `sowing`, `harvesting`, `crop1`, `cropPlot1`, `crop2`, `cropPlot2`, `crop3`, `cropPlot3`) VALUES
(10001, '2018-04-01', '2018-10-01', 2, 0, 1, 0, 0, 0),
(10002, '2018-04-01', '2018-10-01', 2, 0, 1, 0, 0, 0),
(10016, '2000-04-03', '2000-10-09', 1, 0, 0, 0, 0, 0),
(10017, '2018-04-01', '2018-10-01', 1, 0, 0, 0, 0, 0),
(10018, '2018-04-01', '2018-10-01', 1, 0, 0, 0, 0, 0),
(10019, '2018-04-01', '2018-10-01', 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cropsSummer`
--

CREATE TABLE `cropsSummer` (
  `cid` int(10) UNSIGNED NOT NULL,
  `sowing` date DEFAULT NULL,
  `harvesting` date DEFAULT NULL,
  `crop1` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot1` float DEFAULT '0',
  `crop2` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot2` float DEFAULT '0',
  `crop3` tinyint(3) UNSIGNED DEFAULT '0',
  `cropPlot3` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `farmerinfo`
--

CREATE TABLE `farmerinfo` (
  `cid` int(11) UNSIGNED NOT NULL,
  `aadhar` bigint(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `sex` varchar(1) DEFAULT 'M',
  `village` varchar(30) DEFAULT '""',
  `block` varchar(30) DEFAULT '""',
  `district` varchar(30) DEFAULT '""',
  `state` varchar(30) DEFAULT '""',
  `size` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farmerinfo`
--

INSERT INTO `farmerinfo` (`cid`, `aadhar`, `name`, `phone`, `sex`, `village`, `block`, `district`, `state`, `size`) VALUES
(10001, 456123789852, 'Soumo', '9865328754', 'M', 'some', '4568', 'Varanasi', 'Uttar Pradesh', 5.5),
(10002, 456123852052, 'Deep', '9852328754', 'M', 'some', '4554', 'Varanasi', 'Uttar Pradesh', 3.5),
(10003, 123456789876, 'Aman Joshi', '9876543210', 'm', 'Kolman', '1234', 'Varanasi', 'Uttar Pradesh', 0.5),
(10005, 123454321765, 'Parle G', '9876543210', 'm', 'Knark', '1234', 'Dahod', 'Gujarat', 0.5),
(10016, 741258963587, 'amit', '7412589663', 'm', 'some', '8523', 'Kadapa', 'Andhra Pradesh', 1.3),
(10017, 765898742465, 'Twinkle', '7044538883', 'f', 'Twinkleland', '1545', 'Kadapa', 'Andhra Pradesh', 0.5),
(10018, 321456987523, 'dutta', '8529637415', 'm', 'Random', '74125', 'Kadapa', 'Andhra Pradesh', 1.3),
(10019, 951357648245, 'upk', '8521479635', 'm', 'homefm', '9635', 'Kadapa', 'Andhra Pradesh', 1.3),
(10020, 0, '', '', 'm', '', '', 'South Andaman', 'Andaman and Nicobar', 0.3),
(10021, 0, 'soumo', '', 'm', '', '', 'South Andaman', 'Andaman and Nicobar', 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `resourceInvestment`
--

CREATE TABLE `resourceInvestment` (
  `cid` int(11) NOT NULL,
  `resourceId` int(11) NOT NULL,
  `investment` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resourceInvestment`
--

INSERT INTO `resourceInvestment` (`cid`, `resourceId`, `investment`) VALUES
(10016, 1, 1523),
(10016, 2, 1409),
(10017, 1, 1300),
(10017, 2, 1200),
(10018, 1, 1223),
(10018, 2, 1300),
(10019, 1, 1115.38),
(10019, 2, 1192.31);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resourceId` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourceId`, `name`) VALUES
(1, 'Seed'),
(2, 'Fertilizer'),
(3, 'Manure'),
(4, 'Pesticide'),
(5, 'Weedicide');

-- --------------------------------------------------------

--
-- Table structure for table `risks`
--

CREATE TABLE `risks` (
  `cid` int(11) NOT NULL,
  `productRisk` float DEFAULT '0',
  `resourceRisk` float DEFAULT '0',
  `demographicRisk` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risks`
--

INSERT INTO `risks` (`cid`, `productRisk`, `resourceRisk`, `demographicRisk`) VALUES
(10016, 0.914392, 0, 0.522133),
(10018, 0.238983, 0, 0.727177),
(10019, 0.252542, 0.419666, 0.345862);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `cid` int(11) NOT NULL,
  `amountPayable` float DEFAULT NULL,
  `dateCleared` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `standerds`
--

CREATE TABLE `standerds` (
  `resourceId` tinyint(4) NOT NULL,
  `district` varchar(45) NOT NULL,
  `avgPrice` float DEFAULT '0',
  `govtPrice` float DEFAULT '0',
  `leadPrice` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standerds`
--

INSERT INTO `standerds` (`resourceId`, `district`, `avgPrice`, `govtPrice`, `leadPrice`) VALUES
(1, 'Kadapa', 1290.35, 1000, 1000),
(2, 'Kadapa', 1275.33, 1000, 1000),
(3, 'Kadapa', 1000, 1000, 1000),
(4, 'Kadapa', 1000, 1000, 1000),
(5, 'Kadapa', 1000, 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `techInfo`
--

CREATE TABLE `techInfo` (
  `tid` varchar(11) NOT NULL,
  `password` binary(32) DEFAULT NULL,
  `login` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logout` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `techInfo`
--

INSERT INTO `techInfo` (`tid`, `password`, `login`, `logout`) VALUES
('admin', 0x3632336630623535383465623836643966393035653532363739613963653362, '2018-04-06 09:01:45', NULL),
('soumo', 0x6530346262386435383837396637383538633339663361363632653737393633, '2018-04-06 08:58:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toolRentalInvestment`
--

CREATE TABLE `toolRentalInvestment` (
  `cid` int(11) NOT NULL,
  `toolId` int(11) NOT NULL,
  `month` date DEFAULT NULL,
  `hours` float DEFAULT '0',
  `rent` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toolRentalInvestment`
--

INSERT INTO `toolRentalInvestment` (`cid`, `toolId`, `month`, `hours`, `rent`) VALUES
(10001, 1, '2018-11-01', 6, 6000),
(10001, 2, '2019-03-01', 4, 4000),
(10016, 1, '2018-05-01', 3.25, 4075.5),
(10018, 2, '2018-05-01', 3.25, 822.25);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `toolId` tinyint(4) NOT NULL,
  `name` varchar(45) NOT NULL,
  `efficiency` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`toolId`, `name`, `efficiency`) VALUES
(1, 'Seed Planter', 0.2),
(2, 'Harvestor', 0.4),
(3, 'Drum Planter', 0.5),
(4, 'Paddy Planter', 0.2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`cropId`);

--
-- Indexes for table `cropsKharif`
--
ALTER TABLE `cropsKharif`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cropsRabi`
--
ALTER TABLE `cropsRabi`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cropsSummer`
--
ALTER TABLE `cropsSummer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `farmerinfo`
--
ALTER TABLE `farmerinfo`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `resourceInvestment`
--
ALTER TABLE `resourceInvestment`
  ADD PRIMARY KEY (`cid`,`resourceId`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resourceId`);

--
-- Indexes for table `risks`
--
ALTER TABLE `risks`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `standerds`
--
ALTER TABLE `standerds`
  ADD PRIMARY KEY (`resourceId`,`district`);

--
-- Indexes for table `techInfo`
--
ALTER TABLE `techInfo`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `toolRentalInvestment`
--
ALTER TABLE `toolRentalInvestment`
  ADD PRIMARY KEY (`cid`,`toolId`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`toolId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `cropId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmerinfo`
--
ALTER TABLE `farmerinfo`
  MODIFY `cid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10022;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resourceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `toolId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
