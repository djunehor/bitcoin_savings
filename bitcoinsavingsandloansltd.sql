-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 09:20 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esusu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `aid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `last_login` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`aid`, `username`, `password`, `last_login`) VALUES
(1, 'SuperMod', '66d5147673def7f7db4a2a5e8f033d7b', 1512571442);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `cid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`cid`, `title`, `content`, `slug`) VALUES
(1, 'HomePage', '<div class=\"col-md-7 about_grid-right\">\r\n	        	  		<h3><a href=\"#\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy </a></h3>\r\n	        	  		<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil.</p>\r\n	        	  	</div>', 'home'),
(2, 'Terms and Conditions', ' <div class=\"col-lg-7 col-md-5 col-sm-12\">\r\n            <div class=\"heading\">About Host Lab</div>\r\n            <div class=\"subheading\">\r\n              Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?<br><br>\r\n              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>\r\n            </div>\r\n          </div>', 'terms'),
(3, 'About Us', '<div class=\"col-md-7 about_grid-right\">\r\n	        	  		<h3><a href=\"#\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy </a></h3>\r\n	        	  		<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil.</p>\r\n	        	  	</div>', 'about-us'),
(4, 'Frequently Asked Questions', ' <div class=\"col-lg-7 col-md-5 col-sm-12\">\r\n            <div class=\"heading\">About Host Lab</div>\r\n            <div class=\"subheading\">\r\n              Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?<br><br>\r\n              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>\r\n            </div>\r\n          </div>', 'faq'),
(5, 'Support', '<div class=\"col-md-3 contact_left\">\r\n	      			<div class=\"contact_grid contact_address\">\r\n						<h3>Address 1</h3>	\r\n						<p>Telephone : 1-22-5555</p>\r\n						<p>Fax : 1-22-5555</p>\r\n						<p>Email : <a href=\"malito:mail@demolink.org\">mail(at)digitalhosting.com</a></p>\r\n					</div>\r\n					<div class=\"contact_grid\">\r\n						<h3>Address 2</h3>	\r\n						<p>Telephone : 1-22-5555</p>\r\n						<p>Fax : 1-22-5555</p>\r\n						<p>Email : <a href=\"malito:mail@demolink.org\">mail(at)digitalhosting.com</a></p>\r\n					</div>\r\n	      		</div>', 'support');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `did` int(11) NOT NULL,
  `amount` decimal(11,8) NOT NULL,
  `add_time` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `expiry` int(25) NOT NULL,
  `toget` decimal(11,8) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`did`, `amount`, `add_time`, `user_id`, `expiry`, `toget`, `status`) VALUES
(1, '0.00122873', 1512649663, 2, 1517315263, '0.00000000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fanswer`
--

CREATE TABLE `fanswer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fquestions`
--

CREATE TABLE `fquestions` (
  `id` int(4) NOT NULL,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  `screenshot` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `lid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(11,8) NOT NULL,
  `add_time` int(25) NOT NULL,
  `topay` decimal(11,8) NOT NULL,
  `proof` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `admin_wallet` varchar(200) NOT NULL,
  `website_notice` text NOT NULL,
  `loan_processing_fee` decimal(11,8) NOT NULL,
  `minimum_loan` decimal(11,8) NOT NULL,
  `maximum_loan` decimal(11,8) NOT NULL,
  `rate1` int(2) NOT NULL,
  `rate2` int(2) NOT NULL,
  `rate3` int(2) NOT NULL,
  `rate4` int(2) NOT NULL,
  `rate5` int(2) NOT NULL,
  `rate6` int(2) NOT NULL,
  `website_name` varchar(200) NOT NULL,
  `website_tagline` varchar(200) NOT NULL,
  `update_time` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`admin_wallet`, `website_notice`, `loan_processing_fee`, `minimum_loan`, `maximum_loan`, `rate1`, `rate2`, `rate3`, `rate4`, `rate5`, `rate6`, `website_name`, `website_tagline`, `update_time`) VALUES
('1NNjhKHJ6757hgHGHFre48u', 'dsvsdvvdvdvdd ?&amp;gt; ?&amp;gt; ?&amp;gt;', '0.00200000', '0.10000000', '0.50000000', 12, 20, 26, 6, 10, 16, 'BITCOIN SAVINGS AND LOANS LTD', '', 1512572108);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `balance` decimal(11,8) NOT NULL,
  `debt` decimal(11,8) NOT NULL,
  `wallet` varchar(200) NOT NULL,
  `reg_time` int(25) NOT NULL,
  `last_login` int(25) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `idcard` varchar(200) NOT NULL,
  `email_code` varchar(200) DEFAULT NULL,
  `oaddress` varchar(200) NOT NULL,
  `raddress` varchar(200) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `dob` int(25) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `balance`, `debt`, `wallet`, `reg_time`, `last_login`, `full_name`, `photo`, `idcard`, `email_code`, `oaddress`, `raddress`, `phone`, `dob`, `occupation`, `reset_code`, `status`) VALUES
(2, 'adeademi2@gmail.com', '0d5d405a475747aff93eaea39ae3e9eb', '0.00000000', '0.62508508', '1NNJhi787878YUT7687667', 1512423891, 1517396813, 'BOLAJI ZACCHAEUS', '../uploads/IMG-20170501-WA0005.jpg', '../uploads/IMG-20170502-WA0001.jpg', NULL, 'Isolu, Abeokuta', 'Ilepa Ifo, Ogun state', '08135087966', 280537200, 'Scammer', '', 1),
(3, 'adeademi3@gmail.com', '0d5d405a475747aff93eaea39ae3e9eb', '0.00000000', '0.00000000', '', 1522262203, 1522262257, '', '', '', NULL, '', '', '', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `wid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(11,8) NOT NULL,
  `add_time` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `fanswer`
--
ALTER TABLE `fanswer`
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `fquestions`
--
ALTER TABLE `fquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`website_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fquestions`
--
ALTER TABLE `fquestions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
