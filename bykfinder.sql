-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2015 at 08:01 PM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bykfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `bike`
--

CREATE TABLE IF NOT EXISTS `bike` (
  `BikeID` int(11) NOT NULL AUTO_INCREMENT,
  `genericName` varchar(25) NOT NULL,
  `bikeName` varchar(25) NOT NULL,
  `bikePrice` text NOT NULL,
  `userID` int(11) NOT NULL,
  `DateAndTime` datetime NOT NULL,
  `bikeVisibility` int(11) NOT NULL,
  `bikeSold` int(1) NOT NULL,
  `ItemRemaining` int(11) NOT NULL,
  PRIMARY KEY (`BikeID`),
  KEY `UserID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bike`
--

INSERT INTO `bike` (`BikeID`, `genericName`, `bikeName`, `bikePrice`, `userID`, `DateAndTime`, `bikeVisibility`, `bikeSold`, `ItemRemaining`) VALUES
(1, 'Hero Honda', 'Super Splendor', '195000', 2, '2015-11-18 05:56:03', 0, 1, 1),
(2, 'Honda', 'XL', '387500', 2, '2015-11-18 06:15:17', 1, 0, 2),
(3, 'Bajaj', 'Discover', '175000', 4, '2015-11-18 06:20:45', 1, 0, 3),
(4, 'Ducati', 'Monster', '500000', 5, '2015-11-18 06:28:28', 1, 0, 36),
(5, 'Royal Enfield', 'Bullet', '450000', 7, '2015-11-18 06:38:37', 1, 0, 1),
(6, 'TVS', 'Apache 160', '215000', 7, '2015-11-18 06:41:19', 1, 1, 1),
(7, 'Yamaha', 'FZ', '265000', 7, '2015-11-18 06:42:07', 1, 1, 5),
(8, 'Yamahas', 'R15', '268500', 7, '2015-11-18 06:44:24', 1, 1, 6),
(9, 'Yamaha', 'R15', '245000', 8, '2015-11-18 06:47:42', 1, 1, 7),
(10, 'Honda', 'Shine', '176000', 8, '2015-11-18 06:51:04', 1, 0, 6),
(11, 'Cbz', 'Xtereme', '210000', 6, '2015-11-18 06:53:04', 1, 1, 21),
(12, 'Cbz', 'Xtereme', '185000', 8, '2015-11-18 06:55:13', 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `bikeorder`
--

CREATE TABLE IF NOT EXISTS `bikeorder` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderedBike` int(11) NOT NULL,
  `OrderedBy` int(11) NOT NULL,
  `OrderedDate` datetime NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `OrderedBike` (`OrderedBike`),
  KEY `orderedByUser` (`OrderedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bikerate`
--

CREATE TABLE IF NOT EXISTS `bikerate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `bikeID` int(11) NOT NULL,
  `ratedBY` int(11) NOT NULL,
  `ratedAs` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `bikerate`
--

INSERT INTO `bikerate` (`ID`, `bikeID`, `ratedBY`, `ratedAs`) VALUES
(37, 3, 7, 4),
(38, 4, 7, 5),
(39, 9, 7, 2),
(40, 5, 7, 5),
(41, 12, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SentBy` int(11) NOT NULL,
  `SentTo` int(11) NOT NULL,
  `ChatBody` varchar(30) NOT NULL,
  `DateAndTime` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `sender` (`SentBy`),
  KEY `receiver` (`SentTo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `mailID` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `body` longtext NOT NULL,
  `email` varchar(35) NOT NULL,
  `mailRead` varchar(1) NOT NULL,
  `DateAndTime` datetime NOT NULL,
  PRIMARY KEY (`mailID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`mailID`, `subject`, `body`, `email`, `mailRead`, `DateAndTime`) VALUES
(10, 'hi', 'hi ', 'haku@mail.com,', 'f', '2015-12-06 07:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `ordertransaction`
--

CREATE TABLE IF NOT EXISTS `ordertransaction` (
  `TransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderedBike` int(11) NOT NULL,
  `OrderedBy` int(11) NOT NULL,
  `OrderedDate` datetime NOT NULL,
  PRIMARY KEY (`TransactionID`),
  KEY `BikeTransaction` (`OrderedBike`),
  KEY `UserTransaction` (`OrderedBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ordertransaction`
--

INSERT INTO `ordertransaction` (`TransactionID`, `OrderedBike`, `OrderedBy`, `OrderedDate`) VALUES
(1, 7, 11, '2015-11-30 08:15:00'),
(2, 11, 11, '2015-11-20 11:02:48'),
(3, 9, 3, '2015-11-20 02:01:01'),
(4, 5, 3, '2015-11-20 02:44:23'),
(5, 12, 11, '2015-11-21 07:52:15'),
(6, 11, 11, '2015-11-23 12:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `recoverq`
--

CREATE TABLE IF NOT EXISTS `recoverq` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Question` varchar(35) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `recoverq`
--

INSERT INTO `recoverq` (`ID`, `Question`) VALUES
(1, 'Your Favourite song?'),
(2, 'Your school crush?'),
(3, 'Your favourite band?'),
(4, 'Moms birth place?'),
(5, 'Special name you cannot forget?');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE IF NOT EXISTS `recovery` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` text NOT NULL,
  `QuestionNo` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `question_list` (`QuestionNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`ID`, `Answer`, `QuestionNo`, `UserID`) VALUES
(1, 'abc', 2, 1),
(2, '123', 4, 11),
(3, 'hi', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SubscriberEmail` varchar(35) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `SubscriberEmail` (`SubscriberEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`ID`, `SubscriberEmail`) VALUES
(10, 'adh.ranjan@gmail.com'),
(3, 'adhsubin@gmail.com'),
(1, 'admin@bikefinder.com'),
(6, 'akon_prabhat@gmail.com'),
(7, 'amit@mail.com'),
(65, 'pawan@wmail.com'),
(2, 'prajwal.bhandari@mail.com'),
(11, 'rajan_jamakatel@yahoo.com'),
(13, 'ram_adhikari@mail.com'),
(8, 'sagun@yahoo.com'),
(12, 'sharma@zenith.com'),
(9, 'shekhar@hotmail.com'),
(4, 'stntmaniac@gamil.com'),
(5, 'sushil@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `password` text NOT NULL,
  `Address` varchar(25) NOT NULL,
  `userType` int(1) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `DateAndTime` datetime NOT NULL,
  `AdminCreatedBY` int(11) DEFAULT NULL,
  `visibility` int(11) DEFAULT NULL,
  `adminType` int(1) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `email` (`email`),
  KEY `AdminCreatedBY` (`AdminCreatedBY`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `email`, `fname`, `lname`, `password`, `Address`, `userType`, `phone`, `DateAndTime`, `AdminCreatedBY`, `visibility`, `adminType`) VALUES
(1, 'admin@bikefinder.com', 'Admin', 'Admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 'Office', 0, 9860097769, '2015-11-18 10:50:21', NULL, 1, 1),
(2, 'prajwal.bhandari@mail.com', 'Prajwal', 'Bhandari', '+g+z4iuy3UmAnSCBPmhQftupolg775Gj+JiuGESZUQo=', 'Chabahil', 1, 9841074745, '2015-11-18 05:55:37', NULL, 1, NULL),
(3, 'adhsubin@gmail.com', 'Subin', 'Adhiari', 'bNt7h1oUDEKNqlxgJaOULBsUAtm6qGhlBNPMyn+ugeg=', 'Kapan', 2, 9860275399, '2015-11-18 06:16:08', NULL, 1, NULL),
(4, 'stntmaniac@gamil.com', 'Manoj', 'Acharya', 'BbNcVARr+mhtNq1mxjatIoWq2ve0jKgJMXVd1pSGZ5s=', 'Mulpani', 1, 9841157859, '2015-11-18 06:18:17', NULL, 1, NULL),
(5, 'sushil@mail.com', 'Sushil', 'Dani', 'vt7X0n8jfoe4w32aazPzeGWXuf8ZjefVbAuvtBVrnHI=', 'Dang', 1, 9856387232, '2015-11-18 06:25:05', NULL, 1, NULL),
(6, 'akon_prabhat@gmail.com', 'Prabhat', 'Adhikari', 'J6JpWBizTeBFmcskTopXC2Fa1kTnqGP4UftIL9hlDiE=', 'Kapan', 2, 9849181176, '2015-11-18 06:32:19', NULL, 1, NULL),
(7, 'amit@mail.com', 'Amit', 'Agrahari', 'AFkkWEaJeYf/qnDGRkmN66meYvxlEvNNWq44cbOcqwU=', 'Terai', 1, 9812486739, '2015-11-18 06:36:27', NULL, 1, NULL),
(8, 'sagun@yahoo.com', 'Sagun', 'Palanchowke', '5w6lAjS6vgY5JvhoYZlkUEG9UwoHSmB9lAJiuF3leWs=', 'Banepa', 1, 9841675938, '2015-11-18 06:45:31', NULL, 1, NULL),
(9, 'shekhar@hotmail.com', 'Shekhar', 'Sharma', 'gMbY7QzbYB5FY5hWNzNeKGsa98PqJvFETB4WHUXZjQI=', 'Kalopul', 1, 9849651773, '2015-11-18 07:00:25', NULL, 1, NULL),
(10, 'adh.ranjan@gmail.com', 'Ranjan', 'Adhikari', 'ne58VoeFq5l6d+bksgEM50tRt6PFx4OfCe9hIBaXMOs=', 'Kapan', 2, 9849320202, '2015-11-18 07:01:31', NULL, 1, NULL),
(11, 'rajan_jamakatel@yahoo.com', 'Rajan', 'Jamakatel', 'r40tXLqSv9m/peVnAhDM+o7JSqE0qbz7S04PNk3qTi4=', 'Balaju', 2, 9808676872, '2015-11-18 07:05:26', NULL, 1, NULL),
(12, 'sharma@zenith.com', 'Zenith', 'Sharma', 'j2uwRiTIrK+wptGdq6oEgGHA3k6drb24o/EGYjZXi+c=', 'Kupandol', 2, 9841288658, '2015-11-19 05:08:35', NULL, 0, NULL),
(13, 'ram_adhikari@mail.com', 'Ram', 'Prasad', 'FaSLBg9LjT1oRFqs2aYPYOHen0Q4tWyzboBminPDaBg=', 'Kapan', 1, 9843226387, '2015-11-27 02:16:30', NULL, 0, NULL),
(24, 'pawan@wmail.com', 'Pawan', 'Adhikari', 'AFkkWEaJeYf/qnDGRkmN66meYvxlEvNNWq44cbOcqwU=', 'Kapan', 1, 9845838292, '2015-12-09 01:48:20', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendorrate`
--

CREATE TABLE IF NOT EXISTS `vendorrate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `vendorID` int(11) NOT NULL,
  `ratedBY` int(11) NOT NULL,
  `ratedAs` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bike`
--
ALTER TABLE `bike`
  ADD CONSTRAINT `user_bike` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `bikeorder`
--
ALTER TABLE `bikeorder`
  ADD CONSTRAINT `OrderedBike` FOREIGN KEY (`OrderedBike`) REFERENCES `bike` (`BikeID`),
  ADD CONSTRAINT `orderedByUser` FOREIGN KEY (`OrderedBy`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `receiver` FOREIGN KEY (`SentTo`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `sender` FOREIGN KEY (`SentBy`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `ordertransaction`
--
ALTER TABLE `ordertransaction`
  ADD CONSTRAINT `BikeTransaction` FOREIGN KEY (`OrderedBike`) REFERENCES `bike` (`BikeID`),
  ADD CONSTRAINT `UserTransaction` FOREIGN KEY (`OrderedBy`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `recovery`
--
ALTER TABLE `recovery`
  ADD CONSTRAINT `question_list` FOREIGN KEY (`QuestionNo`) REFERENCES `recoverq` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`AdminCreatedBY`) REFERENCES `user` (`UserID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
