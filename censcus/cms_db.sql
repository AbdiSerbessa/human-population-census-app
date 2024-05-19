-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 03:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'admin',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--
 
INSERT INTO `admins` (`admin_id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `avatar`) VALUES
('2', 'Gideon', 'Chukwuoma', 'admin@gmail.com', '07039502751', '$2y$10$k/48IUOXEUtjggGrhJ/iQuS2oawM/GKugDA26RSqc51NxGJS7w5kO', 'admin', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `enumerators`
--

CREATE TABLE `enumerators` (
  `no` int(11) NOT NULL,
  `enumerator_id` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `kebele` varchar(3) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'enumerator',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `status` bit(1) NOT NULL DEFAULT b'1',
  `address` varchar(30) NOT NULL,
  `supervisor_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enumerators`
--

INSERT INTO `enumerators` (`no`, `enumerator_id`, `fname`, `lname`, `email`, `phone`, `kebele`, `password`, `role`, `avatar`, `status`, `address`, `supervisor_id`) VALUES
(1, 'enum_1', 'Gideon', 'Chukwuoma', 'gideon@gmail.com', '07039502751', '34', '$2y$10$Fd/31D/uOAUIaoYPIc9AteZuDPdX95qJcvJq28/lNSdSv4TSdZrFm', 'enumerator', 'avatar.png', b'1', 'Enugu', 'super333');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `guest_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `reason` varchar(40) NOT NULL,
  `isnew` bit(1) NOT NULL DEFAULT b'0',
  `status` bit(1) NOT NULL DEFAULT b'0',
  `avatar` varchar(30) NOT NULL DEFAULT 'avatar.png',
  `hobby` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guest_id`, `fname`, `lname`, `email`, `phone`, `password`, `role`, `reason`, `isnew`, `status`, `avatar`, `hobby`) VALUES
(1, 'Adane', 'Girma', 'guest@gmail.com', '09022467581', '$2y$10$sDJyOl69m4zKtwRvoB3uWOS7pDcjS4sl81bOIlC310T3mMCGpe8a6', 'guest', 'photo_2022-07-26_10-24-11.pdf', b'0', b'1', 'avatar.png', 'reading');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `house_doc` varchar(40) NOT NULL,
  `subcity` varchar(30) NOT NULL,
  `kebele_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `house_id`, `house_doc`, `subcity`, `kebele_id`) VALUES
(1, 398, 'vlanStructure.docx', 'Enugu', '02'),
(2, 367, 'Intel 8086.docx', 'Agbani', '01');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `sender`, `receiver`, `message`, `date`) VALUES
(3, 'kebe@gmail.com', '', 'i think it works', '2024-07-22 08:19:30'),
(11, 'user@user.com', '', 'test for the contact page', '2010-08-22 03:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` varchar(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `gfname` varchar(40) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `age` date NOT NULL,
  `house_id` varchar(5) NOT NULL,
  `married` varchar(15) NOT NULL,
  `disability` varchar(5) NOT NULL,
  `birth_place` varchar(30) NOT NULL,
  `religion` varchar(15) NOT NULL,
  `education` varchar(15) NOT NULL,
  `job` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pphone` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_cert` varchar(40) NOT NULL,
  `educ_cert` varchar(40) NOT NULL,
  `isapproved` bit(1) NOT NULL DEFAULT b'0',
  `enum_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `name`, `fname`, `gfname`, `sex`, `age`, `house_id`, `married`, `disability`, `birth_place`, `religion`, `education`, `job`, `photo`, `pname`, `pphone`, `phone`, `email`, `birth_cert`, `educ_cert`, `isapproved`, `enum_id`) VALUES
('10', 'Hailu', 'Habte', 'Dagnu', 'm', '1960-08-09', '398', 'single', 'yes', 'Udi', 'orthodox', 'masters', 'unemployed', 'avatar.png', 'selemon hailu', '0987546231', '0987542658', 'tame@gmail.com', 'phsychoGroup.docx', 'google.txt', b'0', 'enum_04');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `no` int(11) NOT NULL,
  `supervisor_id` varchar(30) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `subcity` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'supervisor',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `status` bit(1) NOT NULL DEFAULT b'1',
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`no`, `supervisor_id`, `fname`, `lname`, `email`, `phone`, `subcity`, `password`, `role`, `avatar`, `status`, `address`) VALUES
(5, 'super_03', 'Tade', 'Meko', 'tade@gmail.com', '0985236541', 'Enugu', '$2y$10$EXYNDOnKmgcUp3YOg2GsaOOISWxAJSNdm3Swa7dpG42BhFjJTpOmy', 'supervisor', 'avatar.png', b'1', 'Enugu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `enumerators`
--
ALTER TABLE `enumerators`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enumerators`
--
ALTER TABLE `enumerators`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
