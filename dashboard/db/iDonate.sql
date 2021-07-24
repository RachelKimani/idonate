-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 08:26 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
 
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
 
--
-- Database: `idonate`
--
 
-- --------------------------------------------------------
 
--
-- Table structure for table `tbl_auth`
--
 
CREATE TABLE `tbl_auth` (
  `UUID` int(11) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `privateKey` text NOT NULL,
  `password` text NOT NULL,
  `status` enum('active','disabled','deleted','') NOT NULL DEFAULT 'disabled',
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Dumping data for table `tbl_auth`
--
 
INSERT INTO `tbl_auth` (`UUID`, `userID`, `privateKey`, `password`, `status`, `dateCreated`) VALUES
(1, '60f988b449ad2', '034f58d3-0b38-4cbf-aa4c-476303764d53', '$2y$10$mdvKu/zpoUq487HwOL.6re6KM9yR2n0LnRs10JuDgj4ssbW8D0YVO', 'active', '2021-07-22 06:03:16');
 
-- --------------------------------------------------------
 
--
-- Table structure for table `tbl_instance`
--
 
CREATE TABLE `tbl_instance` (
  `sessionID` int(11) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `userIP` text NOT NULL,
  `loginTime` datetime NOT NULL,
  `logoutTime` datetime NOT NULL,
  `sessionLocality` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Dumping data for table `tbl_instance`
--
-- --------------------------------------------------------
 
--
-- Table structure for table `tbl_medicinfo`
--
 
CREATE TABLE `tbl_medicinfo` (
  `UUID` int(11) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `bloodType` text NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `specialNotes` text NOT NULL,
  `status` text NOT NULL DEFAULT 'unverified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
-- --------------------------------------------------------
 
--
-- Table structure for table `tbl_reset`
--
 
CREATE TABLE `tbl_reset` (
  `id` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `code` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
-- --------------------------------------------------------
 
--
-- Table structure for table `tbl_roles`
--
 
CREATE TABLE `tbl_roles` (
  `UUID` int(11) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `userType` enum('user','bankagent','hospitalagent','admin') NOT NULL DEFAULT 'user',
  `userRole` enum('default','managestock','requisition','createreports','updatebloodgroup') NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Dumping data for table `tbl_roles`
--
 
INSERT INTO `tbl_roles` (`UUID`, `userID`, `userType`, `userRole`) VALUES
(1, '60f988b449ad2', 'user', 'default');
 
-- --------------------------------------------------------
 
--
-- Table structure for table `tbl_users`
--
 
CREATE TABLE `tbl_users` (
  `userID` varchar(200) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `username` text NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Dumping data for table `tbl_users`
--
 
INSERT INTO `tbl_users` (`userID`, `firstName`, `lastName`, `username`, `gender`, `address`, `email`, `phone`, `dob`) VALUES
('60f988b449ad2', 'Rees', 'Alumasa', 'reesalumasa', 'male', 'Castan C, Nairobi, Kenya', 'reesalumasa@gmail.com', '0792756002', '0000-00-00');
 
--
-- Indexes for dumped tables
--
 
--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`UUID`),
  ADD KEY `userID` (`userID`);
 
--
-- Indexes for table `tbl_instance`
--
ALTER TABLE `tbl_instance`
  ADD PRIMARY KEY (`sessionID`),
  ADD KEY `userID` (`userID`);
 
--
-- Indexes for table `tbl_medicinfo`
--
ALTER TABLE `tbl_medicinfo`
  ADD PRIMARY KEY (`UUID`),
  ADD KEY `userID` (`userID`);
 
--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`UUID`),
  ADD KEY `userID` (`userID`);
 
--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`) USING HASH,
  ADD UNIQUE KEY `email` (`email`) USING HASH;
 
--
-- AUTO_INCREMENT for dumped tables
--
 
--
-- AUTO_INCREMENT for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  MODIFY `UUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
 
--
-- AUTO_INCREMENT for table `tbl_instance`
--
ALTER TABLE `tbl_instance`
  MODIFY `sessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
 
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `UUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 
 



 
