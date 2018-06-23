-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 07:28 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `report`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE IF NOT EXISTS `dashboard` (
  `r_no` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `project_name` varchar(500) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `billing_status` varchar(100) NOT NULL,
  `service_line` varchar(20) NOT NULL,
  `time_taken` varchar(6) NOT NULL,
  `comments` varchar(100) NOT NULL,
  PRIMARY KEY (`r_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`r_no`, `date`, `user_name`, `project_name`, `client_name`, `billing_status`, `service_line`, `time_taken`, `comments`) VALUES
(1, '0000-00-00', '', 'testing', 'Pfizer', 'Billing', '', '2', 'nill'),
(2, '0000-00-00', '', 'Test - 2', 'Cisco', 'Billing', '', '4', 'Nill'),
(3, '0000-00-00', '', 'sasa', 'sdsa', 'sdfsdf', '', '4', 'adad'),
(4, '0000-00-00', '', 'asdsad', 'sdfsdaf', 'sdfsdf', '', '2', 'adsad'),
(5, '2018-01-22', '', 'sadfadfgasdg', 'sdagadg', 'new-implementation', '', '1', 'dfgfdghd'),
(6, '2018-01-19', '', 'asfasf', 'sdfsadf', 'training', '', '1', '123456789'),
(7, '2018-01-19', '', 'asfasf', 'sdfsadf', 'training', '', '1', '123456789'),
(8, '2018-01-22', '', 'dsgadg', 'asdgadg', 'new-implementation', '', '1', 'sadasf'),
(9, '2018-01-22', '', 'sadfasdfg', 'sadgdsg', 'new-implementation', '', '3', 'sdfgdg'),
(10, '2018-01-22', '', 'dgdfg', 'fdhgfdh', 'non-Billing', '', '1', '1234'),
(11, '2018-01-22', '', 'dgdfg', 'fdhgfdh', 'non-Billing', '', '1', '1234'),
(12, '2018-01-22', '', 'dfhfdh', 'sfdhfdh', 'new-implementation', '', '0', 'dfhfdh'),
(13, '2018-01-22', '', 'sdfasdf', 'sdfsadf', 'new-implementation', '', '4', 'jghj'),
(14, '2018-01-22', '', 'sadgasdg', 'dagdg', 'non-Billing', '', '8', 'hkhjfkhk'),
(15, '2018-01-22', '', 'dgdag', 'dgadg', 'non-Billing', '', '9', 'dgdffd'),
(16, '2018-01-22', '', 'adgasgd', 'dgdsg', 'non-Billing', '', '9', '1234'),
(17, '2018-01-22', '', 'adgasgd', 'dgdsg', 'non-Billing', '', '9', '1234'),
(18, '2018-01-22', '', 'dfhsdfh', 'dfhsh', 'non-Billing', '', '2', '14879'),
(19, '2018-01-22', '', 'asdgsdg', 'asdgsdg', 'billing', '', '4', 'asdfsf'),
(20, '2018-01-22', '', 'asdgsdg', 'dsag', 'new-implementation', '', '4', 'fgfgj'),
(21, '2018-01-26', '', 'dfdsf', 'sdagsdg', 'non-Billing', '', '1', 'asdfghjk'),
(22, '2018-04-03', '', 'try', 'cisco', 'billing', '', '2', 'fsdfsd'),
(23, '0000-00-00', '', 'adsfasdf', 'sdfsdf', 'non-Billing', '', '0', 'sdada'),
(24, '2018-04-22', '', 'sdafsdaf', 'sdfsdf', 'new-implementation', '', '1', 'fdhfg'),
(25, '2018-04-23', '', 'sadsad', 'sadfasdf', 'non-Billing', '', '1', 'dsadd'),
(26, '2018-04-11', '', 'Jai lava kusa', 'tolly', 'billing', '', '3', '12545'),
(27, '0000-00-00', '', '', '', 'billing', '', '0', ''),
(28, '2018-04-04', '', 'asdasd', 'dasd', 'billing', '', '1', '12'),
(29, '2018-04-17', '', 'asfdasd', 'sdafsda', 'new-implementation', '', '1', 'dsad'),
(30, '2018-04-23', '', 'fsdaf', 'sdfsadf', 'non-Billing', '', '1', '123'),
(31, '2018-05-15', '', 'asdsad', 'afas', 'non-Billing', '', '1', 'fhfdh'),
(32, '2018-05-28', 'Yogesh Raj', 'SalesHub', 'Cisco', 'training', '', '2', 'summa'),
(33, '2018-05-28', 'Deepakpandi', 'dctgdhk', 'gjuhg', 'new-implementation', '', '1', '123'),
(34, '2018-05-25', 'Ponnuchammy', 'test', 'test', 'billing', '', '2', 'test'),
(35, '2018-05-28', 'Yogesh Raj', 'sdf', 'asdfs', 'billing', '', '2', 'asda'),
(36, '2018-05-28', 'Yogesh Raj', 'sdf', 'sadf', 'billing', '', '2', 'sdfsadf'),
(37, '2018-05-28', 'Yogesh Raj', 'asdfsd', 'sadfasd', 'billing', '', '02:22', 'sdf'),
(38, '2018-05-28', 'Yogesh Raj', 'sadfasdf', 'sadfsadf', 'new-implementation', '', '12:12', 'sadfasdf'),
(39, '2018-05-28', 'Deepakpandi', 'sdfgsdaf', 'asdgasdfg', 'non-Billing', '', '06:30', 'sadgsdg'),
(40, '2018-06-01', 'Yogesh Raj', 'SalesHub', 'Cisco', 'non-Billing', '', '02:20', 'Nil'),
(41, '2018-06-01', 'Yogesh Raj', 'sdfgd', 'dfgdfg', 'non-Billing', '', '02:22', 'dfgdfg'),
(42, '2018-06-01', 'Yogesh Raj', 'sadfasd', 'asdfasdf', 'new-implementation', '', '02:22', 'asdgdg'),
(43, '2018-06-17', 'Deepakpandi', 'test', '123', 'non-Billing', '', '03:12', 'dsads'),
(44, '2018-06-18', 'Yogesh Raj', 'test', 'test', 'billing', '', '12:12', 'test'),
(45, '2018-06-19', 'Yogesh Raj', 'sdfsaf', 'sfsadf', 'non-Billing', '', '02:02', 'adsdsd'),
(46, '2018-06-19', 'Yogesh Raj', 'safsadf', 'gsdgsdg', 'new-implementation', '', '05:05', 'dgdffs'),
(47, '2018-06-06', 'Yogesh Raj', 'sfasdf', 'sdfsdaf', 'non-Billing', '', '02:02', 'hfgdfgh'),
(48, '2018-06-20', 'Yogesh Raj', 'Web Banner', 'First Data', 'billing', 'design', '04:00', 'Deliverd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(500) NOT NULL,
  `rr_id` varchar(10) NOT NULL,
  `u_emailid` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `u_name`, `rr_id`, `u_emailid`, `u_password`, `role`) VALUES
(1, 'Yogesh Raj', 'rr189177', 'yo@test.com', '123', 'user'),
(2, 'Rajganapathi', 'rr123456', 'raj@test.com', '123', 'user'),
(3, 'Ponnuchammy', 'rr987456', 'ponnu@test.com', '123', 'user'),
(4, 'Deepakpandi', 'rr147963', 'deepak@test.com', '123', 'user'),
(5, 'Admin', 'rr100100', 'admin@test.com', '123', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
