-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 04:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uid` varchar(11) NOT NULL,
  `cred` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `cred`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `client_account`
--

CREATE TABLE `client_account` (
  `accountNumber` varchar(12) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `IFSC_CODE` varchar(15) DEFAULT NULL,
  `Available_Balance` int(11) NOT NULL,
  `UserID` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_account`
--

INSERT INTO `client_account` (`accountNumber`, `LastName`, `FirstName`, `IFSC_CODE`, `Available_Balance`, `UserID`, `Password`) VALUES
('123', 'abcd', 'efgh', '123', 1500, 'abcd', 'abcd123'),
('987', 'maurya', 'mithlesh', '987', 1750, 'mith12', 'mith12');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `MaritalStatus` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `purpose` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`FirstName`, `LastName`, `email`, `mobile`, `address`, `place`, `state`, `MaritalStatus`, `amount`, `term`, `purpose`) VALUES
('Hello', 'World', 'helloworld@gmail.com', '9876543210', 'It Lab, Sahyog college, Management Building', 'Thane , 400601', 'Maharashtra', 'Single', 30000, 3, 'Education Loan'),
('RIDDHI', 'PEDNEKAR', 'arjunambre889@gmail.com', '9167346424', 'bAXIJHASDX', 'SADDCAE', 'Meghalaya', 'Single', 244444, 3, 'Personal Loan');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `snoo` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(23) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`snoo`, `username`, `password`, `dt`) VALUES
(3, 'abcd', 'abcd123', '2023-09-15 19:39:49'),
(1, 'bandi', 'mith12', '2023-09-11 20:36:40'),
(2, 'mith12', 'mith12', '2023-09-15 19:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `fname` varchar(11) NOT NULL,
  `mname` varchar(11) NOT NULL,
  `lname` varchar(11) NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(15) NOT NULL,
  `DOB` varchar(11) NOT NULL,
  `marriage` varchar(11) NOT NULL,
  `address` varchar(25) NOT NULL,
  `city` varchar(11) NOT NULL,
  `state` varchar(11) NOT NULL,
  `citizen` varchar(11) NOT NULL,
  `occupation` varchar(10) NOT NULL,
  `AccountType` varchar(12) NOT NULL,
  `IFSCcode` varchar(22) NOT NULL,
  `AccountNo` varchar(22) NOT NULL,
  `UserId` varchar(12) NOT NULL,
  `Password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`fname`, `mname`, `lname`, `phone`, `email`, `DOB`, `marriage`, `address`, `city`, `state`, `citizen`, `occupation`, `AccountType`, `IFSCcode`, `AccountNo`, `UserId`, `Password`) VALUES
('goru', 'moru', 'poru', 2147483647, 'arjunambre889@g', '2023-08-28', 'Single', '10/A kalpana niwas nehru ', 'mumbai', 'Assam', 'indian', 'student', 'savings acco', '10LMCF1006', '123456789013', '', ''),
('arjun', 'gorakhnath', 'ambre', 2147483647, 'arjunambre889@g', '2023-08-30', 'Single', '10/A kalpana niwas nehru ', 'mumbai', 'Andhra Prad', 'indian', 'student', 'savings acco', '10LMCF1005', '123456789012', 'ram', '07');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `accountNumber` varchar(25) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `reported_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `accountNumber`, `reason`, `reported_at`) VALUES
(1, '123', 'i want return', '2023-09-11 18:09:37'),
(3, '123', 'Account Number: 123, Amount: 701, Date & Time: 2023-09-11 23:05:00', '2023-09-11 19:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `tranction`
--

CREATE TABLE `tranction` (
  `accountNumber` varchar(25) NOT NULL,
  `S_accountNumber` varchar(25) DEFAULT NULL,
  `S_IFSC` varchar(25) DEFAULT NULL,
  `Narration` varchar(50) DEFAULT NULL,
  `Debit` int(11) DEFAULT NULL,
  `Credit` int(11) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_account`
--
ALTER TABLE `client_account`
  ADD PRIMARY KEY (`accountNumber`),
  ADD UNIQUE KEY `.UserID` (`UserID`),
  ADD UNIQUE KEY `IFSC_CODE` (`IFSC_CODE`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `snoo` (`snoo`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `snoo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
