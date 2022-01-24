-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2022 at 08:27 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_pay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `regtime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `username`, `password`, `regtime`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-01-11 13:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

DROP TABLE IF EXISTS `mytable`;
CREATE TABLE IF NOT EXISTS `mytable` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `regid` varchar(500) NOT NULL,
  `course` varchar(500) NOT NULL,
  `course_amount` varchar(500) DEFAULT NULL,
  `total_paid` varchar(200) DEFAULT NULL,
  `regtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `name`, `username`, `phone`, `email`, `address`, `image`, `regid`, `course`, `course_amount`, `total_paid`, `regtime`) VALUES
(1, 'Devanandan', 'devanandan11', '+91 9446052045', 'dave38892@gmail.com', 'valiyakulangara H,Kumaramangalam P.O,Thodupuzha', '../image/ZiClJf-1920w.jpg', 'DEV-21012022-051545-339', 'Graphic Design', '150000', '1', '2022-01-21 08:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cource` varchar(500) NOT NULL,
  `amount_total` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `cource`, `amount_total`) VALUES
(1, 'Graphic Design', '150000'),
(2, 'Web Technology', '155000'),
(3, 'Animation', '140000');

-- --------------------------------------------------------

--
-- Table structure for table `pay_tabe`
--

DROP TABLE IF EXISTS `pay_tabe`;
CREATE TABLE IF NOT EXISTS `pay_tabe` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `userid` int(20) NOT NULL,
  `total_amount` varchar(500) NOT NULL,
  `paid_amount` varchar(500) NOT NULL,
  `balance_amount` varchar(200) NOT NULL,
  `r_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_tabe`
--

INSERT INTO `pay_tabe` (`id`, `userid`, `total_amount`, `paid_amount`, `balance_amount`, `r_time`) VALUES
(1, 1, '150000', '1', '149999', '2022-01-21 08:10:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
