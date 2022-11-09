-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2020 at 06:26 PM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_db_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_master`
--

CREATE TABLE `list_master` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `send_time` datetime NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `under_user_id` int(11) NOT NULL DEFAULT '0',
  `list_id` int(11) NOT NULL DEFAULT '0',
  `user_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone_no` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `under_user_id`, `list_id`, `user_type`, `name`, `telephone_no`, `username`, `pass_word`, `create_date`, `status`) VALUES
(1, 0, 0, 'admin', 'wixpremium', '1425369874', 'wix', 'e10adc3949ba59abbe56e057f20f883e', '2020-07-12 00:00:00', 1),
(2, 0, 0, 'customer', 'jeremias', '972923192', 'jgordillo', 'f64dec1b208e5bd8d5855db70461ed45', '2020-07-20 08:22:38', 1),
(3, 0, 0, 'customer', 'lusifa', '999999999', '', 'e10adc3949ba59abbe56e057f20f883e', '2020-07-21 09:10:47', 1),
(4, 3, 1, 'subcustomer', 'Max Lee', '123456789', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 09:12:01', 1),
(5, 3, 1, 'subcustomer', 'John Hoe', '123456789', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 09:12:01', 1),
(6, 3, 1, 'subcustomer', 'Rohit Agarwal', '145236987', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 09:12:01', 1),
(7, 2, 2, 'subcustomer', '1', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(8, 2, 2, 'subcustomer', '2', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(9, 2, 2, 'subcustomer', '3', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(10, 2, 2, 'subcustomer', '4', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(11, 2, 2, 'subcustomer', '5', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(12, 2, 2, 'subcustomer', '6', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(13, 2, 2, 'subcustomer', '7', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(14, 2, 2, 'subcustomer', '8', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(15, 2, 2, 'subcustomer', '9', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(16, 2, 2, 'subcustomer', '10', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(17, 2, 2, 'subcustomer', '11', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(18, 2, 2, 'subcustomer', '12', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(19, 2, 2, 'subcustomer', '13', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(20, 2, 2, 'subcustomer', '14', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(21, 2, 2, 'subcustomer', '15', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(22, 2, 2, 'subcustomer', '16', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(23, 2, 2, 'subcustomer', '17', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(24, 2, 2, 'subcustomer', '18', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(25, 2, 2, 'subcustomer', '19', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(26, 2, 2, 'subcustomer', '20', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(27, 2, 2, 'subcustomer', '21', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(28, 2, 2, 'subcustomer', '22', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(29, 2, 2, 'subcustomer', '23', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(30, 2, 2, 'subcustomer', '24', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(31, 2, 2, 'subcustomer', '25', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(32, 2, 2, 'subcustomer', '26', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(33, 2, 2, 'subcustomer', '27', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(34, 2, 2, 'subcustomer', '28', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(35, 2, 2, 'subcustomer', '29', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(36, 2, 2, 'subcustomer', '30', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(37, 2, 2, 'subcustomer', '31', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(38, 2, 2, 'subcustomer', '32', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(39, 2, 2, 'subcustomer', '33', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(40, 2, 2, 'subcustomer', '34', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(41, 2, 2, 'subcustomer', '35', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(42, 2, 2, 'subcustomer', '36', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(43, 2, 2, 'subcustomer', '37', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(44, 2, 2, 'subcustomer', '38', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(45, 2, 2, 'subcustomer', '39', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(46, 2, 2, 'subcustomer', '40', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(47, 2, 2, 'subcustomer', '41', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(48, 2, 2, 'subcustomer', '42', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(49, 2, 2, 'subcustomer', '43', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(50, 2, 2, 'subcustomer', '44', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(51, 2, 2, 'subcustomer', '45', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(52, 2, 2, 'subcustomer', '46', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(53, 2, 2, 'subcustomer', '47', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(54, 2, 2, 'subcustomer', '48', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(55, 2, 2, 'subcustomer', '49', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(56, 2, 2, 'subcustomer', '50', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(57, 2, 2, 'subcustomer', '51', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(58, 2, 2, 'subcustomer', '52', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(59, 2, 2, 'subcustomer', '53', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(60, 2, 2, 'subcustomer', '54', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(61, 2, 2, 'subcustomer', '55', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(62, 2, 2, 'subcustomer', '56', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(63, 2, 2, 'subcustomer', '57', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(64, 2, 2, 'subcustomer', '58', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(65, 2, 2, 'subcustomer', '59', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(66, 2, 2, 'subcustomer', '60', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(67, 2, 2, 'subcustomer', '61', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(68, 2, 2, 'subcustomer', '62', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(69, 2, 2, 'subcustomer', '63', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(70, 2, 2, 'subcustomer', '64', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(71, 2, 2, 'subcustomer', '65', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(72, 2, 2, 'subcustomer', '66', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(73, 2, 2, 'subcustomer', '67', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(74, 2, 2, 'subcustomer', '68', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1),
(75, 2, 2, 'subcustomer', '69', '33242423', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-07-21 03:08:44', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_master`
--
ALTER TABLE `list_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_master`
--
ALTER TABLE `list_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
