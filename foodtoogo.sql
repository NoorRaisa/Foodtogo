-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 10:55 AM
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
-- Database: `foodtoogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `date`) VALUES
(9, 'admin3', '1234', 'admin3@gmail.com', '2024-01-27 06:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(19, 54, 'cheese burger', 'loaded with cheese', 300.00, '65b4a6a04afbc.png'),
(20, 55, 'Cheese Pizza', 'Loaded with cheese', 700.00, '65bd08b2ba93e.png'),
(21, 56, 'Chicken Grill', 'Quarter piece of chicken', 170.00, '65bde4740323e.png'),
(24, 58, 'Sausage Pizza', 'loaded with sausages', 200.00, '66f2dea481cbe.jpeg'),
(25, 58, 'beef pizza', 'loaded with beefs', 300.00, '66f2e63e365f3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`, `location`) VALUES
(54, 7, 'Burger King', 'burger@gmail.com', '0193928483', 'burger.com', '10am', '8pm', 'mon-sat', '  dhaka  ', '66ce01b314763.jpeg', '2024-08-27 16:41:23', 'motijhil'),
(55, 0, 'Pizza Paradise', 'pizza@gmail.com', '023949239239', 'pizzu.com', '--Select your Hours--', '--Select your Hours--', '--Select your Days--', ' dhaka ', '66f3977260efa.jpeg', '2024-09-25 04:54:10', 'motijhil'),
(56, 5, 'Kebab House', 'kebab@yahoo.com', '019392848344', 'kebabhouse.com', '1pm', '10pm', 'sun-thu', 'wari,dhaka', '65bde3c86c238.png', '2024-06-15 16:47:39', 'tongi'),
(58, 6, 'Pizza plaza', 'pizzaplaza@gmail.com', '01392848344', 'pizzaplaza.com', '11am', '8pm', 'sun-sat', 'dhaka', '66a15256b9c49.jpg', '2024-07-24 19:13:26', 'dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(5, 'Grill', '2024-02-02 14:45:52'),
(6, 'Pizza', '2024-02-02 14:45:35'),
(7, 'burger', '2024-01-27 06:51:02'),
(8, 'thai food', '2024-01-28 07:53:59'),
(9, 'Fish', '2024-02-02 14:48:19'),
(11, 'Chineese', '2024-02-03 06:58:51'),
(13, 'Japaneese', '2024-09-24 15:46:09'),
(14, 'korean', '2024-09-25 04:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`, `location`) VALUES
(35, 'lamisa', 'lamisa', 'lamisa', 'lamisanoor@gmail.com', '0193928483', 'e10adc3949ba59abbe56e057f20f883e', 'fddfv efvvvvvvvr', 1, '2024-06-15 16:45:13', 'tongi'),
(36, 'srejon', 'srejon', 'ferdous', 'srejuto@gmail.com', '019392848344', 'e10adc3949ba59abbe56e057f20f883e', 'tongi', 1, '2024-06-15 16:45:05', 'tongi'),
(38, 'lima12', 'Lima', 'Akhter', 'lima@gmail.com', '0193928483', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', 1, '2024-06-15 16:45:36', 'motijhil'),
(39, 'asdf', 'john', 'sdf', 'burger@gmail.com', '923328329932', '0052069db1a0017f6a27f27e6dcbb919', 'rampura', 1, '2024-06-15 16:45:48', 'motijhil'),
(40, 'asdf', 'john', 'sdf', 'burger@gmail.com', '923328329932', '0052069db1a0017f6a27f27e6dcbb919', 'rampura', 1, '2024-06-15 16:45:57', 'motijhil'),
(43, 'shima', 'shima', 'akter', 'shima@gmail.com', '01935928483', 'e10adc3949ba59abbe56e057f20f883e', 'rampura', 1, '2024-07-06 19:24:19', 'rampura'),
(44, 'rima', 'rima', 'akter', 'rima@gmail.com', 'aaawqetqwww', 'e10adc3949ba59abbe56e057f20f883e', 'rampura', 1, '2024-07-10 04:59:47', 'rampura'),
(45, 'abcds', 'abcds', 'abcds', 'abcds@gmail.com', '01939284834', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', 1, '2024-07-24 19:05:00', 'dhaka'),
(46, 'taslima12', 'taslima', 'akter', 'taslima@gmail.com', '01713061828', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka, bangladesh', 1, '2024-09-24 15:28:13', 'dhaka'),
(47, 'lamia', 'lamia', 'khan', 'lamia@gmail.com', '01939284832', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', 1, '2024-09-24 16:51:33', 'dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(62, 35, 'Chicken Grill', 1, 170.00, 'closed', '2024-07-15 13:59:39'),
(63, 35, 'Chicken Grill', 3, 170.00, NULL, '2024-07-15 14:06:32'),
(66, 35, 'Chicken Grill', 1, 170.00, NULL, '2024-09-25 05:25:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
