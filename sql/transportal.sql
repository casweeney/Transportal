-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 02:28 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `reg_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `phone`, `password`, `reg_date`) VALUES
(2, 'Casweeney Chisom', 'casweeno2000@gmail.com', '07036798652', '08fa5ce5f1ebfbfa3b2de005fd239504c28fc094', '30/May/2019');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` text,
  `state_of_origin` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `next_of_kin` varchar(50) DEFAULT NULL,
  `valid_id_type` varchar(50) DEFAULT NULL,
  `id_number` varchar(100) DEFAULT NULL,
  `guarantor_name` varchar(100) DEFAULT NULL,
  `guarantor_id_type` varchar(50) DEFAULT NULL,
  `guarantor_id_number` varchar(100) DEFAULT NULL,
  `guarantor_photo` varchar(100) DEFAULT NULL,
  `reg_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `user_id`, `vehicle_id`, `firstname`, `lastname`, `address`, `state_of_origin`, `phone`, `gender`, `next_of_kin`, `valid_id_type`, `id_number`, `guarantor_name`, `guarantor_id_type`, `guarantor_id_number`, `guarantor_photo`, `reg_date`) VALUES
(14, 5, 1, 'Lewy', 'Ukaude', 'Gishiri', 'Abia', '08022288165', 'Male', 'Chinedu Ojukwu', 'National ID', 'NIN28480209', 'Ojukwu Chisom', 'Voters Card', 'VN634082662', 'image/chris_ani.png', '08-06-2019');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `state_of_origin` varchar(20) DEFAULT NULL,
  `address` text,
  `next_of_kin` varchar(100) DEFAULT NULL,
  `mode_of_id` varchar(20) DEFAULT NULL,
  `id_number` varchar(100) DEFAULT NULL,
  `reg_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `gender`, `state_of_origin`, `address`, `next_of_kin`, `mode_of_id`, `id_number`, `reg_date`) VALUES
(5, 'Casweeney', 'Ojukwu', 'casweeno2000@gmail.com', '08fa5ce5f1ebfbfa3b2de005fd239504c28fc094', '07036798652', 'Male', 'Anambra', 'Gishiri', 'Chinedu Ojukwu', 'National ID', 'NIN28480209', '06-06-2019');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `vehicle_make` varchar(50) DEFAULT NULL,
  `vehicle_model` varchar(50) DEFAULT NULL,
  `vehicle_colour` varchar(20) DEFAULT NULL,
  `vehicle_age` varchar(20) DEFAULT NULL,
  `vehicle_reg_number` varchar(100) DEFAULT NULL,
  `chasis_number` varchar(100) DEFAULT NULL,
  `state_trans_number` varchar(100) DEFAULT NULL,
  `route_plied` varchar(100) DEFAULT NULL,
  `reg_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `user_id`, `vehicle_type`, `vehicle_make`, `vehicle_model`, `vehicle_colour`, `vehicle_age`, `vehicle_reg_number`, `chasis_number`, `state_trans_number`, `route_plied`, `reg_date`) VALUES
(1, 5, 'Trailer', 'DAF', 'CRu974', 'Red', '2years', '74930847494', '54363993', 'AN534782', 'Enugu-Onitsha', '06-06-2019'),
(2, 5, 'Lorry', 'Benford', '6472', 'Yellow', '5Years', '864604756', '65839', '786', 'Cross River-Lagos', '07-06-2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
