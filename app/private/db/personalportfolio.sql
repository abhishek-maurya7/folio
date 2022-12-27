-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 07:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `folio`
--

-- --------------------------------------------------------

--
-- Table structure for table `personalportfolio`
--

CREATE TABLE `personalportfolio` (
  `username` varchar(14) NOT NULL,
  `firstName` varchar(12) NOT NULL,
  `lastName` varchar(12) NOT NULL,
  `email` varchar(35) NOT NULL,
  `profileImg` mediumblob NOT NULL,
  `aboutMe` varchar(250) NOT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `yt` varchar(50) DEFAULT NULL,
  `github` varchar(60) DEFAULT NULL,
  `twitter` varchar(20) DEFAULT NULL,
  `facebook` varchar(20) DEFAULT NULL,
  `LinkedIn` varchar(50) DEFAULT NULL,
  `projectTitle` varchar(20) DEFAULT NULL,
  `projectLink` varchar(100) DEFAULT NULL,
  `projectDescription` varchar(250) DEFAULT NULL,
  `projectTitle2` varchar(20) DEFAULT NULL,
  `projectLink2` varchar(100) DEFAULT NULL,
  `projectDescription2` varchar(250) DEFAULT NULL,
  `projectTitle3` varchar(20) DEFAULT NULL,
  `projectLink3` varchar(100) DEFAULT NULL,
  `projectDescription3` varchar(250) DEFAULT NULL,
  `certificateName` varchar(20) DEFAULT NULL,
  `certificateClaimDate` date DEFAULT NULL,
  `certificateLink` varchar(100) DEFAULT NULL,
  `certificateName2` varchar(20) DEFAULT NULL,
  `certificateClaimDate2` date DEFAULT NULL,
  `certificateLink2` varchar(100) DEFAULT NULL,
  `certificateName3` varchar(20) DEFAULT NULL,
  `certificateClaimDate3` date DEFAULT NULL,
  `certificateLink3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalportfolio`
--

INSERT INTO `personalportfolio` (`username`, `firstName`, `lastName`, `email`, `profileImg`, `aboutMe`, `instagram`, `yt`, `github`, `twitter`, `facebook`, `LinkedIn`, `projectTitle`, `projectLink`, `projectDescription`, `projectTitle2`, `projectLink2`, `projectDescription2`, `projectTitle3`, `projectLink3`, `projectDescription3`, `certificateName`, `certificateClaimDate`, `certificateLink`, `certificateName2`, `certificateClaimDate2`, `certificateLink2`, `certificateName3`, `certificateClaimDate3`, `certificateLink3`) VALUES
('newbie2555', 'Abhishek', 'Maurya', 'xorel50450@akapple.com', 0x646f776e6c6f61642e706e67, 'I am a 20-year-old programmer and student based in India. Currently, I am focusing on front-end web development (specifically working with HTML, CSS, JavaScript, and much more) and going for Full stack web development. I am also greatly interested in', 'https://www.instagram.com/me_abhishekmaurya/', 'https://www.youtube.com/channel/UC0wLeSyVLDd1TWLB_', 'https://github.com/abhishek-maurya7', 'https://twitter.com/', 'https://www.facebook', 'https://www.linkedin.com/in/abhishek-maurya1/', 'Portfolio Generator', 'https://github.com/abhishek-maurya7/folio', 'A web application to create and host personal as well as business portfolios built with PHP and MySql.', 'Project 2', 'https://github.com/abhishek-maurya7/folio2', 'Project 2 is built with ABC and XYZ. ', 'Project 3', 'https://github.com/abhishek-maurya7/folio3', 'Project 3 is dead', 'JavaScript Algorithm', '2022-09-07', 'https://www.freecodecamp.org/certification/Abhishek-Maurya/javascript-algorithms-and-data-structures', 'Introduction to soft', '2022-08-31', 'https://drive.google.com/file/d/1BKfFW4PhEp39NCsFGltNoUT8Qh5QFE5A/view', 'Programming with Pyh', '2022-09-11', 'https://drive.google.com/file/u/1/d/1jOW2Ic6RFTxcSg4rxn3_FUgDSByB4a8i/view?usp=sharing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personalportfolio`
--
ALTER TABLE `personalportfolio`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personalportfolio`
--
ALTER TABLE `personalportfolio`
  ADD CONSTRAINT `personalportfolio_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
