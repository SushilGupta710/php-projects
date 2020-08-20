-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 07:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalmanagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(255) NOT NULL,
  `blocation` varchar(255) NOT NULL,
  `bspecial` varchar(255) NOT NULL,
  `bdoctor` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `bemail` varchar(255) NOT NULL,
  `bcontact` varchar(255) NOT NULL,
  `bgender` varchar(255) NOT NULL,
  `bage` varchar(255) NOT NULL,
  `bdescription` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `btime` varchar(255) NOT NULL,
  `bstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `blocation`, `bspecial`, `bdoctor`, `bname`, `bemail`, `bcontact`, `bgender`, `bage`, `bdescription`, `bdate`, `btime`, `bstatus`) VALUES
(13, 'Bangalore', 'Nephrology', 'sushil', 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', '6565656565', 'Male', '54', 'ghfghfghfgh', '2020-07-23', '2pm-3pm', '1'),
(14, 'Bangalore', 'Gastroenterology', 'ashok', 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', '5454545454', 'Male', '43', 'gfdgdfgd', '2020-08-02', '12am-1pm', ''),
(15, 'Bangalore', 'Nephrology', 'ramesh', 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', '5454545454', 'Female', '68', 'fdsfsdfsdfsdf', '2020-07-17', '12am-1pm', ''),
(16, 'Bangalore', 'Nephrology', 'ramesh', 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', '5454545454', 'Male', '54', 'dfgdfgfdgdfg', '2020-07-24', '12am-1pm', ''),
(18, 'Ahmedabad', 'Nephrology', 'sushil', 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', '9878767765', 'Male', '54', 'bvbgfdgdfgfdgdfgd', '2020-07-30', '3pm-4pm', ''),
(19, 'Bangalore', 'Gastroenterology', 'sushil', 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', '5546546546', 'Male', '32', 'fdfgfgffbfdbg', '2020-07-23', '4pm-5pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `cousid` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`cousid`, `fullname`, `email`, `message`) VALUES
(1, 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', 'hello'),
(3, 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', 'hello'),
(4, 'Sushil Ashok Gupta', 'sushilvikgupta@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `dregistration`
--

CREATE TABLE `dregistration` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `usname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dregistration`
--

INSERT INTO `dregistration` (`id`, `fname`, `usname`, `email`, `mobile`, `gender`, `address`, `speciality`, `password`, `cpassword`) VALUES
(26, 'Visahl Gupta', 'vishal123', 'vishalgupta@gmail.com', '9167584881', '', '', 'Psyhciatry', '$2y$10$wp4cxsrbT0Wm9Sk59A1EXu8bcofCaRZmt8h7FffEqVpTshhQAlsQe', '$2y$10$CizMQXIMcTdUYrvUiZAij.CS5SgU1rReCGHpdt4.5Hq.Ukt0tTzmO');

-- --------------------------------------------------------

--
-- Table structure for table `hospitallogin`
--

CREATE TABLE `hospitallogin` (
  `hid` int(255) NOT NULL,
  `husername` varchar(255) NOT NULL,
  `hpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitallogin`
--

INSERT INTO `hospitallogin` (`hid`, `husername`, `hpassword`) VALUES
(1, 'hospital1', '123'),
(3, 'hospital2', '123'),
(5, 'hospital3', '123'),
(6, 'hospital4', '123');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `usname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `cpasswd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `usname`, `email`, `mob`, `passwd`, `cpasswd`) VALUES
(54, 'Sushil Ashok Gupta', 'sushil123', 'sushilvikgupta@gmail.com', '8080977269', '$2y$10$TPv..ta2AyTYXV.h.tlkhO.2Qe1ie7YEVxNjsDkcY3rL.ObSJLOVC', '$2y$10$wioRjw7iG1GNAdRlM7tzzeST7YBdBxXx5Dumt0yFEkhm5PkV5XaWe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`cousid`);

--
-- Indexes for table `dregistration`
--
ALTER TABLE `dregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitallogin`
--
ALTER TABLE `hospitallogin`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `cousid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dregistration`
--
ALTER TABLE `dregistration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hospitallogin`
--
ALTER TABLE `hospitallogin`
  MODIFY `hid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
