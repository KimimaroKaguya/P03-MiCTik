-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2017 at 06:45 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api3`
--

-- --------------------------------------------------------

--
-- Table structure for table `am`
--

CREATE TABLE `am` (
  `am_id` int(11) NOT NULL,
  `am_user` varchar(250) NOT NULL,
  `am_pass` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `am`
--

INSERT INTO `am` (`am_id`, `am_user`, `am_pass`) VALUES
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `em`
--

CREATE TABLE `em` (
  `em_id` int(11) NOT NULL,
  `em_name` varchar(100) NOT NULL,
  `em_user` varchar(50) NOT NULL,
  `em_pass` varchar(50) NOT NULL,
  `mt_id` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `em`
--

INSERT INTO `em` (`em_id`, `em_name`, `em_user`, `em_pass`, `mt_id`) VALUES
(8, 'korn', 'korn', '9d04dfc787c33f6729c28cb27d275c74', '7'),
(9, 'korn2', 'korn2', 'e10adc3949ba59abbe56e057f20f883e', '7');

-- --------------------------------------------------------

--
-- Table structure for table `mt_config`
--

CREATE TABLE `mt_config` (
  `mt_id` int(11) NOT NULL,
  `mt_user` varchar(250) NOT NULL,
  `mt_pass` varchar(250) NOT NULL,
  `mt_ip` varchar(250) NOT NULL,
  `mt_name` varchar(100) NOT NULL,
  `mt_location` varchar(255) NOT NULL,
  `mt_mail` varchar(100) NOT NULL,
  `mt_tel` varchar(20) NOT NULL,
  `mt_gps` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mt_gen`
--

CREATE TABLE `mt_gen` (
  `user` varchar(11) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `qrcode` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `mt_id` int(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt_gen`
--

INSERT INTO `mt_gen` (`user`, `pass`, `profile`, `qrcode`, `date`, `mt_id`, `status`) VALUES
('kk81770', '54776', '3day', 'kk81770.png', '2017-05-30 13:26:02', 7, 'dfsdf'),
('kk46855', '12369', '3day', 'kk46855.png', '2017-05-30 13:26:02', 7, 'dfsdf'),
('kk68471', '30817', '3day', 'kk68471.png', '2017-05-30 13:26:01', 7, 'dfsdf'),
('kk65430', '12744', '3day', 'kk65430.png', '2017-05-30 13:26:01', 7, 'dfsdf'),
('kk64485', '88388', '3day', 'kk64485.png', '2017-05-30 13:26:01', 7, 'dfsdf'),
('korn', '123456', '3day', 'korn.png', '2017-05-30 13:25:31', 7, 'sdfsdf'),
('kk34649', '71293', '3day', 'kk34649.png', '2017-05-30 13:26:02', 7, 'dfsdf'),
('kk80637', '36522', '3day', 'kk80637.png', '2017-05-30 13:26:02', 7, 'dfsdf'),
('kk81660', '78238', '3day', 'kk81660.png', '2017-05-30 13:26:02', 7, 'dfsdf'),
('kk83875', '20827', '3day', 'kk83875.png', '2017-05-30 13:26:02', 7, 'dfsdf'),
('kk74932', '34656', '3day', 'kk74932.png', '2017-05-30 13:26:02', 7, 'dfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `mt_gen_pppoe`
--

CREATE TABLE `mt_gen_pppoe` (
  `user` varchar(11) NOT NULL,
  `pass` varchar(11) NOT NULL,
  `profile` varchar(11) NOT NULL,
  `file` varchar(11) NOT NULL,
  `date` datetime NOT NULL,
  `mt_id` int(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `service` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt_gen_pppoe`
--

INSERT INTO `mt_gen_pppoe` (`user`, `pass`, `profile`, `file`, `date`, `mt_id`, `status`, `service`) VALUES
('korn', '123456', 'vpn', 'korn.png', '2017-05-30 13:30:40', 7, '123456', ''),
('kornvpn', '123456', 'vpn', 'kornvpn.png', '2017-05-30 13:31:31', 7, 'sdfsdfs', 'pptp');

-- --------------------------------------------------------

--
-- Table structure for table `mt_profile`
--

CREATE TABLE `mt_profile` (
  `pro_name` varchar(50) NOT NULL,
  `pro_session` varchar(20) NOT NULL,
  `pro_idle` varchar(20) NOT NULL,
  `pro_keepalive` varchar(20) NOT NULL,
  `pro_autorefresh` varchar(20) NOT NULL,
  `pro_uptime` varchar(20) NOT NULL,
  `pro_users` varchar(5) NOT NULL,
  `pro_limit` varchar(20) NOT NULL,
  `pro_addlist` varchar(20) NOT NULL,
  `pro_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt_profile`
--

INSERT INTO `mt_profile` (`pro_name`, `pro_session`, `pro_idle`, `pro_keepalive`, `pro_autorefresh`, `pro_uptime`, `pro_users`, `pro_limit`, `pro_addlist`, `pro_date`) VALUES
('3day', '', '0', '00:10:00', '00:01:00', '', '2', '10m/5m', '', '2017-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `am`
--
ALTER TABLE `am`
  ADD PRIMARY KEY (`am_id`);

--
-- Indexes for table `em`
--
ALTER TABLE `em`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `mt_config`
--
ALTER TABLE `mt_config`
  ADD PRIMARY KEY (`mt_id`);

--
-- Indexes for table `mt_gen`
--
ALTER TABLE `mt_gen`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `mt_profile`
--
ALTER TABLE `mt_profile`
  ADD PRIMARY KEY (`pro_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `am`
--
ALTER TABLE `am`
  MODIFY `am_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `em`
--
ALTER TABLE `em`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mt_config`
--
ALTER TABLE `mt_config`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
