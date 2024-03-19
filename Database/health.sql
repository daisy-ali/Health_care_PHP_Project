-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 08:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aname` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aname`, `apassword`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `patientname`, `doctorname`, `schedule_id`) VALUES
(15, 'ali', 'doctorhassan', 6),
(17, 'ali', 'doctorali', 5),
(18, 'ali', 'doctorali', 5),
(19, 'ali', 'doctorhassan', 6),
(20, 'zainali', 'doctorhassan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Lahore'),
(3, 'Karachi'),
(4, 'Faisalabad'),
(5, 'Rawalpindi'),
(10, 'larkan'),
(11, 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doid` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `dnumber` varchar(255) NOT NULL,
  `demail` varchar(255) NOT NULL,
  `dpassword` varchar(255) NOT NULL,
  `NIC` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `specialties` varchar(255) NOT NULL,
  `availability` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doid`, `dname`, `dnumber`, `demail`, `dpassword`, `NIC`, `city`, `specialties`, `availability`) VALUES
(4, 'doctorhassan ', '123456789011', 'doctorhassan@gmail.com', '123', '3245654545354', 'larkan', 'Clinical', '2024-03-08'),
(5, 'doctorali', '123456789011', 'email', '123', '3245654545354', 'Rawalpindi', 'Biological', '2024-03-21'),
(6, 'doctorkaka', '123456789011', 'doctorkaka@gmail.com', '123', '3245654545354', 'Karachi', 'Endocrinology', '2024-03-20'),
(7, 'doctormubeen', '03094483014', 'doctormubeen123@gmail.com', '1234', '76526277', 'Faisalabad', 'Internal', '2024-03-02'),
(10, 'doctordaisy', '123456789011', 'daisy@gmail.com', '123', '3245654545354', 'Lahore', 'Allergology', '2024-03-22'),
(11, 'doctoralihassan', '123456789011', 'alihassansei@gmail.com', '123', '3245654545354', 'larkan', 'Clinical', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `heading`, `description`) VALUES
(1, 'Welcome to Your Health Center.', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `mnumber` int(11) NOT NULL,
  `memail` varchar(255) NOT NULL,
  `mpassword` varchar(255) NOT NULL,
  `mnic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `mname`, `mnumber`, `memail`, `mpassword`, `mnic`) VALUES
(2, 'admin2', 2147483647, 'admin3@gmail.com', '123', 76526277);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `pemail` varchar(255) NOT NULL,
  `ppassword` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pnic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `pnumber`, `pemail`, `ppassword`, `city`, `pnic`) VALUES
(1, 'ali', '03094483015', 'ali@gamil.com', '123', 'Lahore', '34252353'),
(2, 'hassan', '03094483014', 'hassan@gmail.com', '123', 'Lahore', '52456134652'),
(4, 'mubeen', '83649736492', 'mubeen@gmail.com', '123', 'Rawalpindi', '3245654545354'),
(5, 'zain', '030911167', 'zain@gmail.com', '123', 'Faisalabad', '621576517'),
(6, 'mad', '03094483014', 'mad@gmail.com', '123', 'larkan', '3245654545354'),
(7, 'zainali', '123456789011', 'mubeen@gmail.com', '123', 'larkan', '3245654545354');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `stime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `sdate`, `stime`, `nop`) VALUES
(3, 'doctormubeen', 'ali hassan session', '2024-03-27', '00:00:00', 2),
(5, 'doctorali', 'ali', '2024-12-11', '23:11:00', 1),
(6, 'doctorhassan', 'hassan', '2222-02-22', '02:22:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `sname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Anaesthetics'),
(2, 'Accident and emergency medicine'),
(3, 'Allergology'),
(4, 'Biological hematology'),
(5, 'Child psychiatry'),
(6, 'Clinical neurophysiology'),
(7, 'Clinical radiology'),
(8, 'Dermatology'),
(9, 'Dermato-venerology'),
(10, 'Endocrinology'),
(11, 'General surgery'),
(12, 'Internal medicine'),
(13, 'Laboratory medicine'),
(14, 'Maxillo-facial surgery');

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `name` varchar(255) NOT NULL,
  `usertype` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`name`, `usertype`) VALUES
('ali', 'p'),
('admin', 'a'),
('daisy', 'p'),
('hassan', 'p'),
('cedar', 'p'),
('kaka', 'p'),
('afzaal', 'p'),
('jutt', 'p'),
('zain', 'p'),
('doctorhassan ', 'd'),
('doctorali', 'd'),
('doctorkaka', 'd'),
('doctormubeen', 'd'),
('mad', 'p'),
('admin2', 'm'),
('doctordaisy', 'd'),
('doctoralihassan', 'd'),
('zainali', 'p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doid`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
