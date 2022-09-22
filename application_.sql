-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2017 at 03:00 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `application_`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fnm` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lnm` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mnm` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eml` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAcive` tinyint(1) NOT NULL DEFAULT '1',
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`uid`, `link`, `fnm`, `lnm`, `mnm`, `eml`, `pass`, `isAcive`, `addedon`) VALUES
(1, '3Y4K', 'Muhammad', 'Begawala', 'Shabbir', 'muhammad.begawala@gmail.com', '3Y4K457', 1, '2016-12-28 13:56:14'),
(2, 'FFOB', 'h', 'sg', 'gs', 'sahebmhm@aol.com', 'FFOB136', 1, '2017-01-06 02:44:44'),
(3, 'jPszMyb', 'asd', 'ad', 'asd', 'asd@asd.com', 'jPszMyb', 1, '2017-04-22 17:13:53'),
(4, 'CIUO', 'ad', 'asd', 'asd', 'da@as.com', 'CIUO391', 1, '2017-04-22 17:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ulink` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alink` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atype` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adate` date NOT NULL,
  `atime` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `window` tinyint(1) NOT NULL,
  `melli` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bc` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` varchar(3500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAttended` tinyint(1) NOT NULL DEFAULT '0',
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`appid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appid`, `ulink`, `alink`, `atype`, `adate`, `atime`, `window`, `melli`, `bc`, `descr`, `isAttended`, `addedon`) VALUES
(1, '3Y4K', 'FU58', '1,2', '2016-12-31', '08.20 AM', 0, 'MEli-4568', 'BC-1234', '820asdadasd', 0, '2016-12-28 13:56:14'),
(2, '3Y4K', 'BDYJ', '4,5', '2016-12-31', '08.20 AM', 1, '12354', '123456', '820 B test ', 0, '2016-12-28 13:58:15'),
(3, 'FFOB', '5OHL', '1', '2017-01-06', '08.00 AM', 0, 'ad', 'd', 'dad', 0, '2017-01-06 02:44:44'),
(4, 'CIUO', 'CHYN', '1,3', '2017-04-12', '08.00 AM', 0, 'asd', 'asd', 'dads', 0, '2017-04-22 17:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `zz_admin`
--

CREATE TABLE IF NOT EXISTS `zz_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_mail` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin_pass` varchar(50) CHARACTER SET latin1 NOT NULL,
  `link` varchar(30) CHARACTER SET latin1 NOT NULL,
  `utype` tinyint(9) NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lname` varchar(12) CHARACTER SET latin1 NOT NULL,
  `fname` varchar(12) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `zz_admin`
--

INSERT INTO `zz_admin` (`id`, `admin_mail`, `admin_pass`, `link`, `utype`, `isActive`, `addedon`, `lname`, `fname`) VALUES
(1, 'admin@test.com', 'asd12D', '5d5as5w', 9, 1, '2016-09-10 12:45:29', 'muhammad', 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
