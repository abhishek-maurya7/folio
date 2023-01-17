-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 06:56 PM
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
  `twitter` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
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
('newbie2555', 'Abhishek', 'Maurya', 'newbie2555@gmail.com', 0x646f776e6c6f61642e706e67, 'I am a 20-year-old programmer and student based in India. Currently, I am focusing on front-end web development (specifically working with HTML, CSS, JavaScript, and much more) and going for Full stack web development. I am also greatly interested in', 'https://www.instagram.com/me_abhishekmaurya/', 'https://www.youtube.com/channel/UC0wLeSyVLDd1TWLB_', 'https://github.com/abhishek-maurya7', 'https://twitter.com/_Newbie_10', 'https://www.facebook.com/abhishekmaurya0/', 'https://www.linkedin.com/in/abhishek-maurya1/', 'Portfolio Generator', 'https://github.com/abhishek-maurya7/folio', 'A portfolio generator website helps users create a portfolio by providing them with different templates and tools that they can use to create their portfolio. Portfolio generator web application also allow users to add text and other materials to the', 'Project 2', 'https://github.com/abhishek-maurya7/folio2', 'A portfolio generator website helps users create a portfolio by providing them with different templates and tools that they can use to create their portfolio. Portfolio generator web application also allow users to add text and other materials to the', 'Project 3', 'https://github.com/abhishek-maurya7/folio3', 'A portfolio generator website helps users create a portfolio by providing them with different templates and tools that they can use to create their portfolio. Portfolio generator web application also allow users to add text and other materials to the', 'JavaScript Algorithm', '2022-12-03', 'https://www.freecodecamp.org/certification/Abhishek-Maurya/javascript-algorithms-and-data-structures', 'Introduction to soft', '2022-12-20', 'https://drive.google.com/file/d/1BKfFW4PhEp39NCsFGltNoUT8Qh5QFE5A/view', 'Programming with Pyh', '2022-12-03', 'https://drive.google.com/file/u/1/d/1jOW2Ic6RFTxcSg4rxn3_FUgDSByB4a8i/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(50) NOT NULL,
  `username` varchar(14) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `username`, `email`, `password`, `date`) VALUES
(12, 'newbie2555', 'newbie2555@gmail.com', '$2y$10$IwzAe3AU9o9nSHdRr8y0h.wThqvWmaO3.HmgxB5B9DNIo0Esa.z0.', '2022-12-28 23:00:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personalportfolio`
--
ALTER TABLE `personalportfolio`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`,`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`username`) REFERENCES `personalportfolio` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
