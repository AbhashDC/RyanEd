-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 10:20 AM
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
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `address` int(11) NOT NULL,
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
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `manufacturer`, `description`, `category`, `status`, `featured`, `img_name`, `img_ext`, `date`) VALUES
(1, 'PenDrive', 2000, 'Dell', 'lajflafdla9', 'storage', 1, 1, NULL, NULL, '2019-01-09'),
(2, 'PenDrive', 2000, 'Dell', 'lajflafdla8', 'storage', 1, 1, NULL, NULL, '2019-01-08'),
(3, 'PenDrive', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, NULL),
(4, 'PenDrive', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, NULL),
(5, 'PenDrive', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, NULL),
(6, 'PenDrive', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, NULL),
(7, 'PenDrive', 2000, 'Dell', 'lajflafdla', 'storage', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
