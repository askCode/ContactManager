-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2013 at 02:16 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comp333assn1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `first_name` varchar(25) NOT NULL,
  `contact_id` int(5) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `group_id` int(5) NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `group_id_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='meta data regarding contacts' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`first_name`, `contact_id`, `last_name`, `email`, `phone`, `address`, `group_id`) VALUES
('Ricky', 1, 'Bobby', 'rickybobby@myspace.com', 123456789, '16th Street, Sundance Hill Top', 1),
('Ricky''s', 2, 'Friend', 'friendofricky@myspace.com', 123456798, '17th Street, Sundance Hill Top', 2),
('Ricky''s', 3, 'Sister', 'sisterofricky@myspace.com', 123456978, '18th St, Sundance Hill View', 1),
('Ricky''s', 4, 'Colleague', 'colleagueofricky@myspace.com', 123459678, '19th Street, Sundance Hill Top Gardens', 3),
('Joe', 5, 'Dirt', 'joedirt@golddigger.com', 123495678, '20th Street, Broke back Mt.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `group_type` varchar(25) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_type`) VALUES
(1, 'family'),
(2, 'friends'),
(3, 'colleagues'),
(4, 'ungrouped');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
