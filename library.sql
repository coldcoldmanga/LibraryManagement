-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2025 at 07:11 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `superAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `password`, `superAdmin`) VALUES
('admin', 'Admin', '$2y$10$gAnuEVYofkeEWif2JczWcefBlz4yFs.EmPZnIOhqezyYC9tWGmVRK', 1),
('admin1', 'Admin1', '$2y$10$QBr4AR8EzuU5UHsAXN5msOhMjNmImrI2nx1.1694HtpvmgGmBHdA6', 1),
('cq2003', 'Tee Cheng Qi', '$2y$10$H0.XekaKlF17A7SkBhll.O5gry0kiFNSZLOl.Wk3sXEHExifJ0p7m', 0),
('mk2000', 'Test1234', '$2y$10$Su.zGNYwbfQpoTTCNcMIb.Pn5Ij2gV31vcBmBZ5l9a1bQ97XvGJIK', 0),
('mk2003', 'Melvin', '$2y$10$yvci0P4QqEtdKTPb7luEGOzH/IQpddqq/jJFcytiIkGtbN5Xpg8nW', 1),
('mk2004', 'Test', '$2y$10$lK4SMqKpmg11F14QitHxs.J77ohNQsEUbZI.jLnuTNDbYBRmGaCpS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` varchar(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  `stats` varchar(20) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `title`, `author`, `publisher`, `type`, `price`, `ISBN`, `datetime`, `stats`) VALUES
('F000001', 'Happiness', 'Oshimi Syuzo', 'Pelangi', 'Fiction', 25.00, '4521452362', '2022-09-01 17:23:48', 'Borrowed'),
('F000102', 'The Fable', 'Hanazawa Kengo', 'Tongli', 'Fiction', 25.00, '44444444', '2022-02-10 12:46:25', 'Borrowed'),
('F000103', 'Under Ninja', 'Hanazawa Kengo', 'Tongli', 'Fiction', 25.00, '4525452362', '2022-09-01 17:23:00', 'Available'),
('F000104', 'Sunny', 'Matsumoto Taiyo', 'Tongli', 'Fiction', 25.00, '963852741', '2022-02-23 14:18:11', 'Borrowed'),
('F000105', 'Homunculus', 'Yamamoto Hideo', 'Tongli', 'Fiction', 25.00, '741258963', '2022-02-23 14:24:54', 'Available'),
('F000106', 'Dragon Ball', 'Toriyama Akira', 'Tongli', 'Fiction', 20.00, '45454545', '2022-08-14 16:06:25', 'Available'),
('F000108', 'Rent A Girlfriend', 'Miyajima Reiji', 'Tongli', 'Fiction', 25.00, '52147852369', '2022-09-01 17:15:31', 'Available'),
('F000109', 'Chainsawman', 'Fujimoto Tatsuki', 'Tongli', 'Fiction', 25.00, '54632987654', '2022-09-01 17:17:39', 'Available'),
('F000110', 'Firepunch', 'Fujimoto Tatsuki', 'Tongli', 'Fiction', 25.00, '52636354152', '2022-09-01 17:19:24', 'Available'),
('F000111', 'Aku No Hana', 'Oshimi Syuzo', 'Tongli', 'Fiction', 25.00, '54233632155', '2022-09-01 17:22:30', 'Available'),
('F000112', 'Gyaru Gohan', 'Taiyo Marii', 'Tongli', 'Fiction', 25.00, '456321456', '2022-09-01 17:33:32', 'Borrowed'),
('F000113', 'Dragon Ball 2', 'Toriyama Akira', 'Tongli', 'Fiction', 20.00, '12365225523', '2022-09-20 12:05:08', 'Available'),
('F000114', 'Chainsawman', 'Fujimoto Tatsuki', 'Tongli', 'Fiction', 23.00, '1234', '2024-07-03 01:09:00', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowID` int(10) NOT NULL,
  `bookID` varchar(15) DEFAULT NULL,
  `memberID` varchar(10) DEFAULT NULL,
  `Bdate` varchar(20) NOT NULL,
  `Rdate` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Borrowing',
  `penalty` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowID`, `bookID`, `memberID`, `Bdate`, `Rdate`, `status`, `penalty`) VALUES
(1, 'F000112', NULL, '2024-07-02', '2024-07-16', 'Returned', 0.00),
(2, 'F000102', '1211102914', '2024-06-14', '2024-06-21', 'Returned', 1.10),
(3, 'F000103', '1211102914', '2024-06-14', '2024-06-21', 'Returned', 1.10),
(4, 'F000112', '1211104379', '2024-06-14', '2024-06-28', 'Borrowing', 0.00),
(5, 'F000001', '1211104379', '2024-07-03', '2024-07-17', 'Borrowing', 0.00),
(6, 'F000103', '1211104379', '2024-07-03', '2024-07-17', 'Returned', 0.00),
(8, 'F000104', '1211104379', '2024-07-03', '2024-07-17', 'Borrowing', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `penalty` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `name`, `class`, `level`, `telephone`, `email`, `password`, `penalty`) VALUES
('1191202117', 'Pon Yu Xuan', 'FIST', 'Student', '123456789', '1191202117@student.mmu.edu.my', '$2y$10$qf/izdvVG19Hsf1rTsfELe22.EtiQfUVRWQYYdPWaUuJ69IKbkB7e', 0.00),
('1211102302', 'Soong Hoe Mun', 'FIST', 'Student', '12345678', '1211102302@student.mmu.edu.my', '$2y$10$ukkAIwDjatAF1WdVemd1duj7IOixW/q5/PdiSzQBJMkzCilAdnoLy', 0.00),
('1211102914', 'Wang Yi Hong', 'FIST', 'Student', '121212121', '1211102914@student.mmu.edu.my', '$2y$10$23z/AqiQhvcoecOmbnGdbeVGXdC7e.sT3sut9UfXdkIGuh7VfEO9a', 0.00),
('1211103685', 'Thu Xin Yun', 'FIST', 'Student', '01151358262', '1211103685@student.mmu.edu.my', '$2y$10$TQoSTI9mgPeI7isYzxhfZ.5D8qaSb3veWN4EAsa59C0n7Ae3/RwV6', 0.00),
('1211104379', 'Melvin Kwan', 'FIST', 'Vip Student', '01151358262', '1211104379@student.mmu.edu.my', '$2y$10$CyL/IVJgOdJ56QbD4j8ByuxXxVjuzVi4vdo2QjN3eV/F0WLLoeceK', 0.00),
('1211305152', 'Tan Jin Yen', 'FIST', 'Student', '133043434', '1211305152@student.mmu.edu.my', '$2y$10$nCx15iWlgMvlJeZuzmebuOVwi0NLN/iYa0gGBdKQSJBHZJOWicgGy', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(11) NOT NULL,
  `memberID` varchar(25) DEFAULT NULL,
  `bookID` varchar(25) DEFAULT NULL,
  `requestDate` date NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `memberID`, `bookID`, `requestDate`, `status`) VALUES
(6, '1211104379', 'F000102', '2024-07-02', 'Approved'),
(7, '1211104379', 'F000110', '2024-07-02', 'Ignored'),
(8, '1211104379', 'F000102', '2024-07-02', 'Approved'),
(9, '1211104379', 'F000102', '2024-07-02', 'Approved'),
(10, '1211104379', 'F000102', '2024-07-02', 'Approved'),
(11, '1211104379', 'F000102', '2024-07-02', 'Approved'),
(12, '1211104379', 'F000102', '2024-07-02', 'Approved'),
(13, '1211104379', 'F000111', '2024-07-02', 'Pending'),
(14, '1211104379', 'F000102', '2024-07-02', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowID`),
  ADD KEY `studentID_fk` (`memberID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `bookFK` (`bookID`),
  ADD KEY `memberFK` (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `bookID` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `memberID` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `bookFK` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `memberFK` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
