-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2018 at 02:36 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Account_Name` varchar(200) DEFAULT NULL,
  `Cerdit_Number` varchar(200) DEFAULT NULL,
  `Credit_Type` varchar(50) DEFAULT NULL,
  `Expirydate` date DEFAULT NULL,
  `Customer_ID` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_Name`, `Cerdit_Number`, `Credit_Type`, `Expirydate`, `Customer_ID`) VALUES
('Islam Mohamed Aboutabl', '55', '55', '2018-06-15', '967212'),
('iso', '55', '55', '2018-06-22', '2752');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` varchar(50) NOT NULL,
  `Password` varbinary(100) DEFAULT NULL,
  `Customer_Name` varchar(200) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `Level_of_Exercise` varchar(100) DEFAULT NULL,
  `Weight` int(3) DEFAULT NULL,
  `Height` int(3) DEFAULT NULL,
  `Date_joined` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Password`, `Customer_Name`, `Age`, `Gender`, `email`, `Level_of_Exercise`, `Weight`, `Height`, `Date_joined`) VALUES
('2752', 0xb76ff605255e77152d238544c6e636cc, 'iso', 25, 'Male', 'aboutabl6@gmail.com', 'Beginner', 80, 175, '2018-06-27'),
('967212', 0x1f7080b75d6952fc77104457d48400b3, 'Islam Mohamed Aboutabl', 25, 'Male', 'tot13_p@hotmail.com', 'Novice', 80, 175, '2018-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EID` varchar(200) NOT NULL,
  `EName` varchar(200) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `Photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EID`, `EName`, `specialization`, `Photo`) VALUES
('1', 'Mohamed', 'Fitness', ''),
('13', 'Ahmed', 'accountant', ''),
('2', 'John', 'Zumba Instructor', '\"\"'),
('4', 'Samy', 'Zumba Instructor', '\"\"');

-- --------------------------------------------------------

--
-- Table structure for table `Goods`
--

CREATE TABLE `Goods` (
  `GoodName` varchar(200) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `PricePerItem` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Goods`
--

INSERT INTO `Goods` (`GoodName`, `category`, `PricePerItem`, `amount`, `img`) VALUES
('Carrion Clothing', 'T-Shirt', 500, 6, 'adv2.png'),
('Metal Warz', 'T-Shirt', 1000, 12, 'adv3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `EID` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`EID`) VALUES
('1'),
('2'),
('4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `Goods`
--
ALTER TABLE `Goods`
  ADD PRIMARY KEY (`GoodName`);
ALTER TABLE `Goods` ADD FULLTEXT KEY `GoodName` (`GoodName`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD KEY `EID` (`EID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `trainer_ibfk_1` FOREIGN KEY (`EID`) REFERENCES `employee` (`EID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
