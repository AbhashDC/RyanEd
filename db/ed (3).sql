-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 05:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ed`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'TVs'),
(2, 'Computers'),
(3, 'Phones'),
(4, 'Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `manufacturer` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(250) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `featured` int(11) NOT NULL,
  `img_name` varchar(250) DEFAULT NULL,
  `img_ext` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `admin_id` int(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `manufacturer`, `description`, `category`, `status`, `featured`, `img_name`, `img_ext`, `date`, `admin_id`, `admin_name`) VALUES
(1, 'PenDrive', 2000, 'Dell', 'lajflafdla9', 'computer', 1, 1, NULL, NULL, '2019-01-09', 0, ''),
(2, 'PenDrive', 2000, 'Dell', 'lajflafdla8', 'phones', 1, 1, NULL, NULL, '2019-01-08', 0, ''),
(3, 'zlatan', 2000, 'Dell', 'lajflafdla', 'storage', 1, 0, NULL, NULL, '2019-01-02', 0, ''),
(4, 'Drive', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, '2019-01-22', 0, ''),
(5, 'kenDrive', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, '2019-01-10', 0, ''),
(6, 'henDrive', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, '2019-01-11', 0, ''),
(7, 'P', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, '2019-01-14', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `review` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `user_name`, `user_id`, `review`, `date`, `status`) VALUES
(1, 1, 'Abhash', 1, 'THis is very nice yes i likes', '2019-01-17', 0),
(2, 1, 'Abhash DC', 2, '    this is bad really bad', '2019-01-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`) VALUES
(1, 'Abhash', 'abhash_dc99@outlook.com', 'apple', '1'),
(2, 'Abhash DC', 'dcabhash@gmail.com', '1f3870be274f6c49b3e31a0c6728957f', 'adfsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
