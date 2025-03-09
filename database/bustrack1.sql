-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 05:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bustrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` bigint(21) NOT NULL,
  `Log_Id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cntno` varchar(200) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `addrs` text NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `OLog_Id` varchar(200) NOT NULL,
  `lno` varchar(200) NOT NULL,
  `ldate` date NOT NULL,
  `vno` varchar(200) NOT NULL,
  `ulocation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `Log_Id`, `name`, `cntno`, `email`, `password`, `photo`, `addrs`, `age`, `sex`, `date`, `user_type`, `OLog_Id`, `lno`, `ldate`, `vno`, `ulocation`) VALUES
(1, 'DRV8889793297896', 'RTO Palakkad', '7894653216', 'admin@gmail.com', 'admin', 'Penguins.jpg', 'PALAKKAD', '20', 'Male', '2023-01-23', 'Admin', '', '', '0000-00-00', '', 'Palakkad');

-- --------------------------------------------------------

--
-- Table structure for table `btimereg`
--

CREATE TABLE `btimereg` (
  `bus_tid` int(11) NOT NULL,
  `OLog_Id` varchar(200) NOT NULL,
  `vno` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `frm` varchar(200) NOT NULL,
  `retrun` varchar(200) NOT NULL,
  `rtrn` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `btimereg`
--

INSERT INTO `btimereg` (`bus_tid`, `OLog_Id`, `vno`, `bname`, `location`, `frm`, `retrun`, `rtrn`, `photo`) VALUES
(1, 'BDRV184128722267', 'kl012345', 'Jesus', 'Palakkad', '8;00 am', 'Kottayi', '8:45 am', 'ANEENA JESUS.jpg'),
(2, 'BDRV184128722267', 'kl012345', 'Jesus', 'kottayi', '8:45 am', 'perungotakurussi', '9:00 am', 'ANEENA JESUS.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `cond_id` bigint(21) NOT NULL,
  `OLog_Id` varchar(200) NOT NULL,
  `Log_Id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `ulocation` text DEFAULT NULL,
  `addrs` text DEFAULT NULL,
  `cntno` text NOT NULL,
  `lno` varchar(200) NOT NULL,
  `ldate` date NOT NULL,
  `vno` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `bassign` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` (`cond_id`, `OLog_Id`, `Log_Id`, `name`, `age`, `sex`, `ulocation`, `addrs`, `cntno`, `lno`, `ldate`, `vno`, `user_type`, `email`, `password`, `photo`, `date`, `status`, `bassign`) VALUES
(1, 'BDRV184128722267', 'BDRV266994887965', 'Rejimon', '35', 'Male', 'Palakkad', 'Palakkad', '9874561237', '123456456', '2020-10-14', 'kl012345', 'Conductor', 'reji@gmail.com', 'reji', 'sonu.jpg', '2025-02-17', 'allow', '');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `wlt_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `cntno` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `waltid` varchar(200) NOT NULL,
  `amt` double NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `OLog_Id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`wlt_id`, `Log_Id`, `cntno`, `name`, `age`, `sex`, `addr`, `email`, `waltid`, `amt`, `date`, `status`, `OLog_Id`) VALUES
(1, 'BDRV269775008101', '9037413573', 'Grace', '19', 'Female', 'chowannur,thrissur', 'grace@gmail.com', '510502', 5000, '2025-02-17', 'Deposit', 'BDRV184128722267');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `drv_id` bigint(21) NOT NULL,
  `OLog_Id` varchar(200) NOT NULL,
  `Log_Id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `ulocation` text DEFAULT NULL,
  `addrs` text DEFAULT NULL,
  `cntno` text NOT NULL,
  `lno` varchar(200) NOT NULL,
  `ldate` date NOT NULL,
  `vno` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `bassign` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`drv_id`, `OLog_Id`, `Log_Id`, `name`, `age`, `sex`, `ulocation`, `addrs`, `cntno`, `lno`, `ldate`, `vno`, `user_type`, `email`, `password`, `photo`, `date`, `status`, `bassign`) VALUES
(1, 'BDRV184128722267', 'BDRV206895089861', 'Mathew', '40', 'Male', 'Palakkad', 'Palakkad', '9635211024', 'dl0123456', '2022-02-09', 'kl012345', 'Driver', 'mathew@gmail.com', 'mathew', 'mathaijesus.jpeg', '2025-02-17', 'allow', ''),
(2, 'BDRV184128722267', 'BDRV479594340199', 'Richard', '50', 'Male', 'Palakkad', 'Palakkad', '9037413573', 'dl098456', '2021-06-09', 'kl012345', 'Driver', 'richard@gmail.com', 'richard', 'mathaijesus.jpeg', '2025-02-19', 'allow', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` bigint(21) NOT NULL,
  `Log_Id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subj` varchar(15) DEFAULT NULL,
  `descp` text DEFAULT NULL,
  `cdate` text DEFAULT NULL,
  `data` date NOT NULL,
  `reply` text DEFAULT NULL,
  `reply_date` date DEFAULT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `subj` text NOT NULL,
  `dscp` text NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `own_id` bigint(21) NOT NULL,
  `Log_Id` varchar(255) DEFAULT NULL,
  `aadharno` varchar(255) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL,
  `cntno` text DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `addrs` text NOT NULL,
  `ulocation` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`own_id`, `Log_Id`, `aadharno`, `name`, `age`, `cntno`, `sex`, `addrs`, `ulocation`, `email`, `password`, `user_type`, `photo`, `date`) VALUES
(1, 'BDRV184128722267', '790215634823', 'Jacob', '50', '9037413573', 'Male', 'Palakkad', 'Palakkad', 'jacob@gmail.com', 'jacob', 'Owner', 'rajumon jesus.jpg', '2025-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `user_id` bigint(21) NOT NULL,
  `Log_Id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL,
  `sex` varchar(200) DEFAULT NULL,
  `addr` text DEFAULT NULL,
  `cntno` varchar(200) DEFAULT NULL,
  `photo` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `ulocation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`user_id`, `Log_Id`, `name`, `age`, `sex`, `addr`, `cntno`, `photo`, `email`, `password`, `date`, `user_type`, `ulocation`) VALUES
(1, 'BDRV269775008101', 'Grace', '19', 'Female', 'chowannur,thrissur', '9037413573', 'grace dupli.jpeg', 'grace@gmail.com', 'grace', '2025-02-16', 'Passenger', 'Palakkad'),
(2, 'BDRV689656212565', 'Christy', '24', 'Male', 'Kottayil', '8281227923', 'cf_header_1701859513836_avatar.png', 'christy@gmail.com', 'password', '2025-03-01', 'Passenger', 'Palakkad');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `wlt_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `ccntno` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `frm` varchar(200) NOT NULL,
  `retrun` varchar(200) NOT NULL,
  `amt` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `tme` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`wlt_id`, `Log_Id`, `cname`, `ccntno`, `bname`, `frm`, `retrun`, `amt`, `date`, `tme`, `status`) VALUES
(1, 'BDRV269775008101', 'Grace', '9037413573', 'Jesus', 'Palakkad', 'Kottayi', '566', '2025-02-23', '07:53:18 PM', 'Pending'),
(2, 'BDRV269775008101', 'Grace', '9037413573', 'Jesus', 'Palakkad', 'Kottayi', '36', '2025-02-25', '09:59:27 AM', 'Pending'),
(3, 'BDRV269775008101', 'Grace', '9037413573', 'Jesus', 'Palakkad', 'Kottayi', '26', '2025-02-25', '10:46:20 AM', 'Pending'),
(4, 'BDRV269775008101', 'Grace', '9037413573', 'Jesus', 'Palakkad', 'Kottayi', '29', '2025-02-25', '11:20:34 AM', 'Pending'),
(5, 'BDRV689656212565', 'Christy', '8281227923', 'Jesus', 'Palakkad', 'Kottayi', '31', '2025-03-01', '01:31:19 PM', 'Pending'),
(6, 'BDRV689656212565', 'Christy', '8281227923', 'Jesus', 'Palakkad', 'Kottayi', '34', '2025-03-01', '01:34:17 PM', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `bus_tid` int(11) NOT NULL,
  `OLog_Id` varchar(200) NOT NULL,
  `vno` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `stop` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `distance` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`bus_tid`, `OLog_Id`, `vno`, `bname`, `stop`, `time`, `distance`) VALUES
(1, 'BDRV184128722267', 'KL77C5577', 'Christ', 'Palakkad', '8;00 am', 0),
(2, 'BDRV184128722267', 'KL77C5577', 'Christ', 'kottayi', '8:45 am', 10),
(3, 'BDRV184128722267', 'KL77C5577', 'Christ', 'Thrissur', '10:00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `trnsf_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `tname` varchar(200) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `amt` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `tme` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vh_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `vno` varchar(200) NOT NULL,
  `vtype` varchar(200) NOT NULL,
  `engno` varchar(200) NOT NULL,
  `vmdl` varchar(200) NOT NULL,
  `vcolor` varchar(200) NOT NULL,
  `cmpny` varchar(200) NOT NULL,
  `tdate` date NOT NULL,
  `oname` varchar(200) NOT NULL,
  `osex` varchar(200) NOT NULL,
  `oage` varchar(200) NOT NULL,
  `oaddrs` text NOT NULL,
  `ocntno` varchar(200) NOT NULL,
  `rdate` date NOT NULL,
  `photo` text NOT NULL,
  `ulocation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vh_id`, `Log_Id`, `bname`, `vno`, `vtype`, `engno`, `vmdl`, `vcolor`, `cmpny`, `tdate`, `oname`, `osex`, `oage`, `oaddrs`, `ocntno`, `rdate`, `photo`, `ulocation`) VALUES
(1, 'BDRV184128722267', 'Jesus', 'kl012345', 'Private', '123456', 'Single Deck', 'Blue', 'TATA', '2025-02-26', 'Jacob', 'Male', '50', 'Palakkad', '9037413573', '2021-06-24', 'ANEENA JESUS.jpg', 'Palakkad'),
(2, 'BDRV184128722267', 'Christ', 'KL77C5577', 'Private', '435252452524', 'AM-8763', 'Blue', 'Tata', '2025-03-06', 'Jacob', 'Male', '50', 'Palakkad', '9037413573', '2025-02-27', 'cf_header_1701859513836_avatar.png', 'Palakkad');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wlt_id` int(11) NOT NULL,
  `Log_Id` varchar(200) NOT NULL,
  `cntno` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `waltid` varchar(200) NOT NULL,
  `amt` double NOT NULL,
  `date` date NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wlt_id`, `Log_Id`, `cntno`, `name`, `age`, `sex`, `addr`, `email`, `waltid`, `amt`, `date`, `photo`) VALUES
(1, 'BDRV269775008101', '9037413573', 'Grace', '19', 'Female', 'chowannur,thrissur', 'grace@gmail.com', '510502', 4379, '2025-02-17', 'grace dupli.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `btimereg`
--
ALTER TABLE `btimereg`
  ADD PRIMARY KEY (`bus_tid`);

--
-- Indexes for table `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`cond_id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`wlt_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`drv_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`own_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`wlt_id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`bus_tid`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`trnsf_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vh_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wlt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `btimereg`
--
ALTER TABLE `btimereg`
  MODIFY `bus_tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conductor`
--
ALTER TABLE `conductor`
  MODIFY `cond_id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `wlt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `drv_id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` bigint(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `own_id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `user_id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `wlt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `bus_tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `trnsf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wlt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
