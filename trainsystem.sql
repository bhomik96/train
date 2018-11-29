-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 08:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`user_name`, `password`) VALUES
('Bhomik', 'BhomikKankaria'),
('vishal', '2223');

-- --------------------------------------------------------

--
-- Table structure for table `train_days`
--

CREATE TABLE `train_days` (
  `train_no` varchar(100) DEFAULT NULL,
  `days` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_days`
--

INSERT INTO `train_days` (`train_no`, `days`) VALUES
('1234', 'Sunday'),
('2345', 'Monday'),
('2345', 'Tuesday'),
('2345', 'Wednesday'),
('2345', 'Thursday'),
('6969', 'Monday'),
('6969', 'Wednesday'),
('6969', 'Friday'),
('6969', 'Sunday'),
('696969', 'Monday'),
('696969', 'Tuesday'),
('696969', 'Thursday'),
('696969', 'Friday'),
('696969', 'Saturday'),
('2345', 'Friday'),
('32434', 'Monday'),
('32434', 'Tuesday'),
('32434', 'Wednesday'),
('2345', 'Saturday'),
('2345', 'Sunday'),
('3243', 'Monday'),
('3243', 'Tuesday'),
('3243', 'Wednesday'),
('3243', 'Thursday'),
('3243', 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `train_details`
--

CREATE TABLE `train_details` (
  `train_name` varchar(100) NOT NULL,
  `train_no` varchar(100) NOT NULL,
  `train_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_details`
--

INSERT INTO `train_details` (`train_name`, `train_no`, `train_status`) VALUES
('trainA', '1234', 'Cancel'),
('trainB', '2345', 'Running'),
('trainw', '3243', 'Running'),
('trainC', '32434', 'Running'),
('trainD', '6969', 'Cancel'),
('trainE', '696969', 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `train_stations`
--

CREATE TABLE `train_stations` (
  `train_no` varchar(100) DEFAULT NULL,
  `stations` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_stations`
--

INSERT INTO `train_stations` (`train_no`, `stations`) VALUES
('1234', 'Delhi'),
('1234', 'Tirupati'),
('1234', 'Goa'),
('1234', 'Chennai'),
('2345', 'Delhi'),
('2345', 'Chennaii'),
('2345', 'Goa'),
('2345', 'Hyd'),
('3243', 'tirupati'),
('3243', 'hyd'),
('32434', 'jammu'),
('32434', 'pondicheery'),
('6969', 'Delhi'),
('6969', 'Tirupati'),
('6969', 'Hyd'),
('6969', 'Kanyakumari'),
('696969', 'Delhi'),
('696969', 'Tirupati'),
('696969', 'Kanyakumari'),
('696969', 'Hyd');

-- --------------------------------------------------------

--
-- Table structure for table `user_booking`
--

CREATE TABLE `user_booking` (
  `t_num` int(11) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `passenger_Age` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `train_name` varchar(100) NOT NULL,
  `train_no` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `train_status` varchar(100) NOT NULL,
  `day` varchar(10) NOT NULL,
  `berth` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_booking`
--

INSERT INTO `user_booking` (`t_num`, `passenger_name`, `passenger_Age`, `user_name`, `train_name`, `train_no`, `date`, `train_status`, `day`, `berth`) VALUES
(16, 'vishal', '1212', 'Vishal', 'trainA', '1234', '2018-11-15', 'Cancel', 'Thursday', 'q4'),
(17, '2343', '23', 'Vishal', 'trainA', '1234', '2018-11-15', 'Cancel', 'Thursday', 'q3'),
(18, 'erwe', '23', 'Vishal', 'trainA', '1234', '2018-11-15', 'Cancel', 'Thursday', 'q1'),
(19, 'weww', '23', 'Vishal', 'trainA', '1234', '2018-11-15', 'Cancel', 'Thursday', 'q2'),
(20, 'sfds', 'sdf', 'Vishal', 'trainA', '1234', '2018-11-15', 'Cancel', 'Thursday', 'q5');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aadhar_details` varchar(100) NOT NULL,
  `acc_number` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_name`, `password`, `aadhar_details`, `acc_number`, `amount`) VALUES
('krupa', '123', '12', '34', '2935'),
('Vishal', 'vishal', '1234', '4321', '9112');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `train_days`
--
ALTER TABLE `train_days`
  ADD KEY `train_no` (`train_no`);

--
-- Indexes for table `train_details`
--
ALTER TABLE `train_details`
  ADD PRIMARY KEY (`train_no`);

--
-- Indexes for table `train_stations`
--
ALTER TABLE `train_stations`
  ADD KEY `train_no` (`train_no`);

--
-- Indexes for table `user_booking`
--
ALTER TABLE `user_booking`
  ADD PRIMARY KEY (`t_num`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`aadhar_details`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `acc_number` (`acc_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_booking`
--
ALTER TABLE `user_booking`
  MODIFY `t_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `train_days`
--
ALTER TABLE `train_days`
  ADD CONSTRAINT `train_days_ibfk_1` FOREIGN KEY (`train_no`) REFERENCES `train_details` (`train_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train_stations`
--
ALTER TABLE `train_stations`
  ADD CONSTRAINT `train_stations_ibfk_1` FOREIGN KEY (`train_no`) REFERENCES `train_details` (`train_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_booking`
--
ALTER TABLE `user_booking`
  ADD CONSTRAINT `user_booking_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_details` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
