-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 07:39 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginid` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `role` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`loginid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `pass`, `role`) VALUES
('admin', 'jgt', 'admin'),
('nirmal', 'badass', 'admin'),
('sahitya', 'espn', 'admin'),
('jgt', 'jgt', 'student'),
('1SI13CS100', 'jgt', 'student'),
('1SI13CV100', 'SITSIT', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `marks_table`
--

CREATE TABLE IF NOT EXISTS `marks_table` (
  `ExamYr` year(4) NOT NULL,
  `USN` varchar(10) NOT NULL,
  `SubCode` varchar(10) NOT NULL,
  `Semester` int(1) NOT NULL,
  `MarkObtain` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks_table`
--

INSERT INTO `marks_table` (`ExamYr`, `USN`, `SubCode`, `Semester`, `MarkObtain`) VALUES
(2015, '1SI13CS078', '5CCI03', 5, 75),
(2014, '1SI12CS100', '7CSP02', 7, 77),
(2013, '1SI13CS078', '1CHE', 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `rfidtag`
--

CREATE TABLE IF NOT EXISTS `rfidtag` (
  `Tag_id` int(11) DEFAULT NULL,
  `USN` varchar(10) NOT NULL,
  `subcode` varchar(10) NOT NULL,
  `Marks` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfidtag`
--

INSERT INTO `rfidtag` (`Tag_id`, `USN`, `subcode`, `Marks`) VALUES
(0, '1SI13CS127', 'CCI005', NULL),
(NULL, '1SI13CS078', 'CCI005', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE IF NOT EXISTS `student_detail` (
  `USN` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Branch` varchar(3) NOT NULL,
  `Semester` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`USN`, `Name`, `Branch`, `Semester`) VALUES
('1SI13CS127', 'Ujjen Man Bania', 'CSE', 8),
('1SI13CS078', 'Nirmal', 'CSE', 8),
('1SI13CS100', 'Jamesbond J', 'CSE', 7),
('1SI13CV100', 'Tartam Khanal', 'CIV', 8);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Subject` varchar(100) NOT NULL,
  `Subcode` varchar(10) NOT NULL,
  `Semester` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject`, `Subcode`, `Semester`) VALUES
('Database Management System', 'CCI005', 0),
('', '', 0),
('Engineering Chemistry', '1CHE', 0),
('Fifth Sem Back Log', '5CCI03', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
