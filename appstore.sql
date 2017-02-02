-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2014 at 02:38 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `appstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `app_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_name` varchar(32) NOT NULL,
  `image` varchar(32) NOT NULL,
  `rating` float NOT NULL,
  `upload_date` datetime NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `total_downloads` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `Approved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`app_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`app_id`, `app_name`, `image`, `rating`, `upload_date`, `userid`, `total_downloads`, `description`, `file`, `Approved`) VALUES
(1, 'Fruit Ninja', 'fruitn.jpg', 4.1, '2013-11-02 00:10:30', 2, 7, 'Test your slicing skills..', 'fruit ninja.apk', 1),
(2, 'Temple Run', 'tampler.jpg', 4.8, '2013-01-22 00:00:00', 2, 5, '', '', 0),
(3, 'Deadly Transformer', 'transform.jpg', 3, '2013-11-14 00:05:00', 1, 0, '', '', 1),
(4, 'Town Race', 'race.jpg', 3.8, '2014-01-01 00:00:00', 1, 0, '', '', 1),
(12, ';kgsmks;d', '1393304859_death.jpg', 0, '2014-02-25 11:07:39', 4, 0, 'gfdkg', '1393304859_plantvszombie.apk', 1),
(11, 'Plant vs Zombie', '1393252890_plant vs zombie.jpg', 0, '2014-02-24 20:41:30', 4, 1, 'Kill the Zombies', '1393252890_plantvszombie.apk', 1),
(5, 'Black Fag', 'Black Fag.jpg', 5, '2014-02-06 20:01:39', 6, 859, 'Play As an assassin', 'Black Fag.apk', 1),
(6, 'Diablo', 'Diablo.jpg', 4.7, '2014-02-04 20:09:31', 7, 0, 'A journey has been started', 'diablo.apk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `userpic` varchar(128) DEFAULT NULL,
  `join_date` datetime NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `userpic`, `join_date`) VALUES
(1, 'rahi', '7b52009b64fd0a2a49e6d8a939753077792b0554', '', '1392207018_quad.jpg', '2014-02-12 18:10:18'),
(2, 'shib', '7b52009b64fd0a2a49e6d8a939753077792b0554', '', '1392207458_class routine.jpg', '2014-02-12 18:17:38'),
(3, 'a', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', '', '1392208522_', '2014-02-12 18:35:22'),
(4, '1', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', '', '1392209031_', '2014-02-12 18:43:51'),
(5, '3', '1b6453892473a467d07372d45eb05abc2031647a', '', '1393243699_', '2014-02-24 18:08:19'),
(6, 'Gameloft', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'gameloft@ymail.com', 'gameloft.jpg', '2014-02-03 20:04:44'),
(7, 'tanvir', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'tanvir@gmail.com', 'tanvir.jpg', '2013-12-26 20:07:09');
