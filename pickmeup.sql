-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickmeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `pmu_event`
--

CREATE TABLE `pmu_event` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `description` varchar(320) NOT NULL,
  `capacity` int(11) NOT NULL,
  `url` varchar(320) DEFAULT NULL,
  `image` longblob,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `pmu_event`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pmu_master`
--

CREATE TABLE `pmu_master` (
  `id` varchar(10) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `sub_desc` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `pmu_master`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pmu_ride`
--

CREATE TABLE `pmu_ride` (
  `id` varchar(10) NOT NULL,
  `event_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `pmu_ride`:
--   `event_id`
--       `pmu_event` -> `id`
--   `user_id`
--       `pmu_user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `pmu_ride_x_user`
--

CREATE TABLE `pmu_ride_x_user` (
  `id` varchar(10) NOT NULL,
  `ride_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `pmu_ride_x_user`:
--   `ride_id`
--       `pmu_ride` -> `id`
--   `user_id`
--       `pmu_user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `pmu_user`
--

CREATE TABLE `pmu_user` (
  `id` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `profile_pic` longblob,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `pmu_user`:
--   `role`
--       `pmu_master` -> `id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pmu_event`
--
ALTER TABLE `pmu_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmu_master`
--
ALTER TABLE `pmu_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmu_ride`
--
ALTER TABLE `pmu_ride`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmu_ride_x_user`
--
ALTER TABLE `pmu_ride_x_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmu_user`
--
ALTER TABLE `pmu_user`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
