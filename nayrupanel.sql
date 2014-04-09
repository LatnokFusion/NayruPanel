-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2014 at 05:49 PM
-- Server version: 5.1.70-log
-- PHP Version: 5.5.10-pl0-gentoo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `adminpanel`
--
CREATE DATABASE IF NOT EXISTS `adminpanel` DEFAULT 
CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `adminpanel`;

-- 
--------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `color` text NOT NULL,
  `textcolor` text NOT NULL,
  `navbg` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 
;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`ID`, `title`, `color`, 
`textcolor`, `navbg`) VALUES
(1, 'Default', 'rgba(0,102,255,0.5)', 'green', 
'url(wallpapers/sword.gif)'),
(2, 'Green', 'rgba(0,255,0,0.5)', 'white', ''),
(3, 'Red and Black', 'rgba(255, 0, 0, 0.5)', 'black', 
'url(wallpapers/redlink.gif)'),
(4, 'Black and Red', 'rgba(0,0,0,0.5)', 'red', 
'url(wallpapers/darklink.gif)');

-- 
--------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `color` text NOT NULL,
  `textcolor` text NOT NULL,
  `wallpaper` text NOT NULL,
  `theme` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 
;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, 
`color`, `textcolor`, `wallpaper`, `theme`) VALUES
(1, 'root@silverelitez.org', '', 
'', '', '', ''),
(2, 'Demo', '', '', '', '', ''),
(3, 'root', '', '', '', '', '');

-- 
--------------------------------------------------------

--
-- Table structure for table `wallpapers`
--

CREATE TABLE IF NOT EXISTS `wallpapers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 
AUTO_INCREMENT=23 ;

--
-- Dumping data for table `wallpapers`
--

INSERT INTO `wallpapers` (`ID`, `title`, `url`) VALUES
(3, 'Asus Rampage', 
'http://cdn.wallpapershd.at/wallpapers/1920x1200/1641941/asus-rampge-edited-by-razultull-at-pm.jpg'),
(2, 'Hyrule Crest', 
'http://wantmidnaback.com/images/gallery/Computer%20Created%20Images/Wallpaper-%20Hyrule%20Crest.jpg'),
(1, 'Default', 
'http://autoimagesize.com/wp-content/uploads/2014/03/wallpapers-programming-language-triforce-symbol-1920x1080-games-images-triforce-wallpaper.jpg'),
(14, 'Kinan''s Hylian Crest', 
'http://www.unboardgames.com/wp-content/uploads/2013/03/Hylian_Crest_Wallpaper_by_Kinan.png'),
(15, 'Hyrule Wallpaper', 
'http://fc00.deviantart.net/fs70/f/2011/227/2/c/hyrule_wallpaper_by_magicalymade-d46nok2.jpg'),
(16, 'Blue Hylian Crest', 
'http://lexic.silverelitez.org/userpanel/wallpapers/crest.jpg'),
(17, 'Royal Crest', 
'http://2.bp.blogspot.com/-k97r0fGcH4w/T8p7Z0GhruI/AAAAAAAAA54/21RjiETL9L8/s1600/zeldas%2Broyal%2Bcrest%2Btri%2Bforce%2Bthe%2Blegend%2Bof%2Bzelda%2Blink%2Bwallpaper%2Bbackground.jpg'),
(18, 'Red and Gold Crest', 
'http://fc05.deviantart.net/fs70/i/2013/258/1/6/golden_zelda_wallpaper__1080p__by_dynamicz34-d6mi58y.jpg'),
(19, 'Intense Triforce', 
'http://fc06.deviantart.net/fs71/i/2012/285/3/0/the_red_triforce_by_moasysdaydream-d5hla9j.jpg'),
(20, 'Red Crest', 
'http://www.surftin.com/images/awesome-red-triforce_796606.jpg'),
(21, 'Green Crest', 
'http://images6.fanpop.com/image/photos/33500000/Green-Triforce-the-legend-of-zelda-33548994-800-500.jpg'),
(22, 'Red HD Crest', 
'http://lexic.silverelitez.org/admin/wallpapers/redcrest.jpg');

-- 
--------------------------------------------------------

--
-- Table structure for table `windows`
--

CREATE TABLE IF NOT EXISTS `windows` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `title` text NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 
AUTO_INCREMENT=19 ;

--
-- Dumping data for table `windows`
--

INSERT INTO `windows` (`ID`, `name`, `title`) VALUES
(1, 'settings', 'Settings'),
(2, 'postfixadmin', 'PostfixAdmin'),
(3, 'poweradmin', 'PowerAdmin'),
(7, 'logout', 'Log Out'),
(6, 'phpmyadmin', 'PHPMyAdmin');

