-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 04:47 PM
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
-- Database: folio
--

-- --------------------------------------------------------

--
-- Table structure for table personalportfolio
--

CREATE TABLE personalportfolio (
  username varchar(14) NOT NULL,
  firstName varchar(12) NOT NULL,
  lastName varchar(12) NOT NULL,
  email varchar(35) NOT NULL,
  profileImg mediumblob NOT NULL,
  aboutMe varchar(250) NOT NULL,
  instagram varchar(50) DEFAULT NULL,
  yt varchar(50) DEFAULT NULL,
  github varchar(60) DEFAULT NULL,
  twitter varchar(20) DEFAULT NULL,
  facebook varchar(20) DEFAULT NULL,
  LinkedIn varchar(50) DEFAULT NULL,
  projectTitle varchar(20) DEFAULT NULL,
  projectLink varchar(20) DEFAULT NULL,
  projectDescription varchar(250) DEFAULT NULL,
  projectTitle2 varchar(20) DEFAULT NULL,
  projectLink2 varchar(20) DEFAULT NULL,
  projectDescription2 varchar(250) DEFAULT NULL,
  projectTitle3 varchar(20) DEFAULT NULL,
  projectLink3 varchar(20) DEFAULT NULL,
  projectDescription3 varchar(250) DEFAULT NULL,
  certificateName varchar(20) DEFAULT NULL,
  certificateClaimDate date DEFAULT NULL,
  certificateLink varchar(20) DEFAULT NULL,
  certificateName2 int(20) DEFAULT NULL,
  certificateClaimDate2 int(11) DEFAULT NULL,
  certificateLink2 int(20) DEFAULT NULL,
  certificateName3 int(20) DEFAULT NULL,
  certificateClaimDate3 int(11) DEFAULT NULL,
  certificateLink3 int(20) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table personalportfolio
--
ALTER TABLE personalportfolio
  ADD KEY username (username);

--
-- Constraints for dumped tables
--

--
-- Constraints for table personalportfolio
--
ALTER TABLE personalportfolio
  ADD CONSTRAINT personalportfolio_ibfk_1 FOREIGN KEY (username) REFERENCES users (username);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
