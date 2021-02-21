-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2021 at 04:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_flip`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_flip`
--

CREATE TABLE `bank_flip` (
  `id` int(11) NOT NULL,
  `bank_code` varchar(7) NOT NULL,
  `account_number` varchar(25) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_flip`
--

INSERT INTO `bank_flip` (`id`, `bank_code`, `account_number`, `bank_name`) VALUES
(1, 'bca', '5465327020', 'FLIPTECH LENTERA IP PT'),
(2, 'bri', '087636718924232543', 'FLIPTECH LENTERA IP PT');

-- --------------------------------------------------------

--
-- Table structure for table `bank_users`
--

CREATE TABLE `bank_users` (
  `id` int(11) NOT NULL,
  `bank_code` varchar(7) NOT NULL,
  `account_number` varchar(25) NOT NULL,
  `account_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_users`
--

INSERT INTO `bank_users` (`id`, `bank_code`, `account_number`, `account_name`) VALUES
(1, 'mandiri', '089992412323', 'Aziz Sudrajat');

-- --------------------------------------------------------

--
-- Table structure for table `disbursements`
--

CREATE TABLE `disbursements` (
  `id` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `bank_code` varchar(7) NOT NULL,
  `account_number` varchar(25) NOT NULL,
  `recipient_name` varchar(50) NOT NULL,
  `sender_bank` varchar(6) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `time_served` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disbursements`
--

INSERT INTO `disbursements` (`id`, `amount`, `status`, `timestamp`, `bank_code`, `account_number`, `recipient_name`, `sender_bank`, `remark`, `receipt`, `time_served`) VALUES
(3, 10000, 'DONE', '2021-02-19 16:11:28', 'mandiri', '089992412323', 'Aziz Sudrajat', 'bca', 'Aziz Sudrajat', 'http://localhost/flip/public/receipt/TRX973548.jpg', '2021-02-20 12:30:12'),
(4, 10000, 'DONE', '2021-02-19 16:19:53', 'mandiri', '089992412323', 'Aziz Sudrajat', 'bca', 'Aziz Sudrajat', 'http://localhost/flip/public/receipt/TRX127964.jpg', '2021-02-20 12:32:46'),
(5, 10000, 'PENDING', '2021-02-19 16:19:55', 'mandiri', '089992412323', 'Aziz Sudrajat', 'bca', 'Aziz Sudrajat', '', '2021-02-19 16:19:55'),
(6, 10000, 'PENDING', '2021-02-19 16:19:56', 'mandiri', '089992412323', 'Aziz Sudrajat', 'bca', 'Aziz Sudrajat', '', '2021-02-19 16:19:56'),
(7, 10000, 'PENDING', '2021-02-19 16:25:10', 'mandiri', '089992412323', 'Aziz Sudrajat', 'bca', 'Aziz Sudrajat', '', '2021-02-19 16:25:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_users`
--
ALTER TABLE `bank_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disbursements`
--
ALTER TABLE `disbursements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_users`
--
ALTER TABLE `bank_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disbursements`
--
ALTER TABLE `disbursements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
