-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 10:32 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_deal_lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `cardNumber` int(11) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `pLname` varchar(20) NOT NULL,
  `pFname` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`cardNumber`, `state`, `city`, `zip`, `pLname`, `pFname`) VALUES
(1, 'MN', 'Blaine', 55449, 'Zech', 'Aaron'),
(21, 'MN', 'Blaine', 55449, 'Franco', 'James'),
(22, 'MN', 'Blaine', 55449, 'Zech', 'Fred'),
(23, 'MN', 'White Bear Lake', 55110, 'Joe', 'Bill'),
(24, 'MN', 'Maplewood', 554441, 'Cat', 'Tom'),
(25, 'MN', 'Maplewood', 55112, 'Jane', 'Mary'),
(26, 'MN', 'White Bear Lake', 55110, 'Toe', 'Frank'),
(27, 'MN', 'St. Paul', 55771, 'Rex', 'Luis'),
(28, 'MN', 'North St. Paul', 332423, 'Stein', 'Jill'),
(29, 'MN', 'White Bear Lake', 55110, 'Foo', 'Joe'),
(30, 'MN', 'Lino Lakes', 55014, 'Stephens', 'Riley'),
(NULL, 'MN', 'Roseville', 55110, 'Jimmy', 'Neutron'),
(NULL, 'MN', 'Minneapolis', 55130, 'Billy', 'Tester'),
(NULL, 'MN', 'Lino Lakes', 55014, 'Keller', 'Stephens'),
(NULL, 'MN', 'Maplewood', 55112, 'Sam', 'Testington'),
(NULL, 'MN', 'Lino Lakes', 55014, 'RILEY', 'STEPHENS'),
(36, 'MN', 'White Bear Lake', 55110, 'AaronTest', 'AaronTest'),
(37, 'MN', 'White Bear Lake', 55110, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorID` int(11) NOT NULL,
  `afname` varchar(20) NOT NULL,
  `alname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorID`, `afname`, `alname`) VALUES
(1, 'Aaron', 'Zech'),
(2, 'Lisa', 'Gardner'),
(3, 'Hannah', 'Kristin'),
(4, 'Moyes', 'Jojo'),
(5, 'Ross', 'Mia'),
(6, 'Mattern', 'Joanne'),
(7, 'Doering Tourville', 'Amanda'),
(8, ' Meister', 'Cari'),
(10, 'Jon', 'Maine'),
(11, 'Frank ', 'Moe'),
(12, 'Rex', 'Trab'),
(13, 'Moe', 'Loon'),
(14, 'Frank', 'Ree'),
(15, 'Cari', 'Meister'),
(16, 'Amanda', 'Doering Tourville'),
(17, '', ''),
(18, '', ''),
(19, 'Test', 'Tester'),
(20, 'Test', 'Tester'),
(21, 'Test', 'Testerz'),
(22, 'Test', 'Testerz'),
(23, 'Test', 'Testerz'),
(24, 'Test', 'Testerz'),
(25, 'Test', 'Testerz'),
(26, 'Test', 'Testerz'),
(27, 'Test', 'Testerz'),
(28, '', ''),
(29, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` bigint(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `authorID` int(99) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `title`, `authorID`, `quantity`, `bookID`) VALUES
(9781455563920, 'Pachinko', 1, 1, 1),
(9781536609509, 'Look for me', 2, 3, 2),
(9781536609509, 'Look for me', 2, 3, 3),
(9781536609509, 'Look for me', 2, 3, 4),
(9780312577230, 'The great alone', 3, 3, 5),
(9780312577230, 'The great alone', 3, 3, 6),
(9780312577230, 'The great alone', 3, 3, 7),
(9780399562457, 'Still me', 4, 3, 8),
(9780399562457, 'Still me', 4, 3, 9),
(9780399562457, 'Still me', 4, 3, 10),
(9780399562457, 'Still me', 4, 3, 11),
(9780373878734, 'Seaside romance', 5, 1, 12),
(9780531213735, 'Fire trucks', 6, 1, 13),
(23123123, 'Where the fox dies', 1, 1, 14),
(332423, 'Numbers', 5, 2, 15),
(332423, 'Numbers', 5, 2, 16),
(3432498, 'Foxes', 3, 3, 17),
(213123124, 'Red bird', 7, 4, 18),
(982364864, 'Coding', 6, 1, 19),
(987312873, 'Blue Birds', 8, 2, 20),
(798749841, 'Red Loons', 11, 2, 21),
(9781620311219, 'Cats', 15, 3, 22),
(9781620311219, 'Cats', 15, 3, 23),
(9781620311219, 'Cats', 15, 3, 24),
(9781602706248, 'Fire Trucks', 16, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE `borrowed` (
  `bookID` int(11) DEFAULT NULL,
  `cardNumber` int(11) DEFAULT NULL,
  `checkOutDate` date NOT NULL,
  `dueDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`bookID`, `cardNumber`, `checkOutDate`, `dueDate`) VALUES
(21, 28, '0000-00-00', '0000-00-00'),
(29, 1, '0000-00-00', '0000-00-00'),
(23, 1, '0000-00-00', '0000-00-00'),
(1, 0, '2018-04-20', '2018-05-04'),
(2, 36, '2018-04-20', '2018-05-04'),
(3, 37, '2018-04-20', '2018-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `creditcards`
--

CREATE TABLE `creditcards` (
  `cardNumber` int(11) DEFAULT NULL,
  `creditCard` bigint(11) DEFAULT NULL,
  `pFname` varchar(20) DEFAULT NULL,
  `pLname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditcards`
--

INSERT INTO `creditcards` (`cardNumber`, `creditCard`, `pFname`, `pLname`) VALUES
(NULL, 44566, 'Aaron', NULL),
(NULL, 5588, 'Aaron', NULL),
(NULL, 5588, 'Aaron', NULL),
(NULL, 2654165, 'Aaron', NULL),
(1, 2654165, 'Aaron', 'Zech'),
(1, 2312321, 'Aaron', 'Zech'),
(1, 2312321, 'Aaron', 'Zech'),
(22, 23123123, 'Fred', 'Zech'),
(23, 342345215, 'Bill', 'Joe'),
(24, 34238402980, 'Tom', 'Cat'),
(25, 564161564561, 'Mary', 'Jane'),
(26, 6516541651, 'Frank', 'Toe'),
(27, 56465118435, 'Luis', 'Rex'),
(28, 4651651361465, 'Jill', 'Stein'),
(29, 1651654561, 'Joe', 'Foo'),
(30, 1111222233334444, 'Riley', 'Stephens'),
(31, 9999888877776666, 'Jimmy', 'Neutron'),
(32, 6666555544443333, 'Billy', 'Tester'),
(33, 1234123412341234, 'Keller', 'Stephens'),
(34, 6543654365436543, 'Sam', 'Testington'),
(30, 6542845936987425, 'RILEY', 'STEPHENS'),
(36, 123456, 'AaronTest', 'AaronTest'),
(37, 156456, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `patron`
--

CREATE TABLE `patron` (
  `cardNumber` int(11) NOT NULL,
  `pFname` varchar(20) NOT NULL,
  `pLname` varchar(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patron`
--

INSERT INTO `patron` (`cardNumber`, `pFname`, `pLname`, `phone`, `email`, `password`, `isAdmin`) VALUES
(1, 'Aaron', 'Zech', 6517175421, NULL, NULL, 0),
(4, 'James', 'Jo', 2321312, NULL, NULL, 0),
(21, 'James', 'Franco', 561651, NULL, NULL, 0),
(22, 'Fred', 'Zech', 32131, NULL, NULL, 0),
(23, 'Bill', 'Joe', 5939291, NULL, NULL, 0),
(24, 'Tom', 'Cat', 34234324, NULL, NULL, 0),
(25, 'Mary', 'Jane', 583874297, NULL, NULL, 0),
(26, 'Frank', 'Toe', 3423488, NULL, NULL, 0),
(27, 'Luis', 'Rex', 56415645146, NULL, NULL, 0),
(28, 'Jill', 'Stein', 3493284032, NULL, NULL, 0),
(29, 'Joe', 'Foo', 694939291, NULL, NULL, 0),
(30, 'Riley', 'Stephens', 6127475986, NULL, NULL, 0),
(31, 'Jimmy', 'Neutron', 6514821132, 'jimbo123@gmail.com', '$2y$10$ae/VbEKpKAuBvB/fTf06j.XQ4zCTuoWGT1IVvrG1UWqOpMhM6xBDK', 0),
(32, 'Billy', 'Tester', 6514847981, 'billyboi@hotmail.com', '$2y$10$3u64NoKuxxJP.hnXTcuDPeSS4coyKdGmrGI7erfSuETRkN7PKadd6', 0),
(33, 'Keller', 'Stephens', 6517672893, 'laxboikel@yahoo.com', '$2y$10$OHmnLWqs39oNl93YspOo6uFkvQjkdTFf0zfkyVN8XF6p9jkaYXnea', 0),
(34, 'Sam', 'Testington', 65144423695, 'samiam@yahoo.com', '$2y$10$OjWQlixfXRtft.N0FkKpcu8TvG7loMMfwvHgbfqfFgDbvWxNvYasi', 0),
(35, 'RILEY', 'STEPHENS', 6127475986, 'rystephens228@gmail.com', '$2y$10$PoHrcagA0mfrGDBA5CymS.44NokX7/kuz/RFngC9laNd1AlmPt1qG', 1),
(36, 'AaronTest', 'AaronTest', 694939291, 'aaronzech@gmail.com', '$2y$10$Y8rIbkn2ACuBv5O3a04s1uyy/FWnwAGXPlEyFLnFyO6AULPmUrCke', 0),
(37, 'Admin', 'Admin', 694939291, 'admin@admin.com', '$2y$10$/wtQyjzI3wQ7API7V4vHgeWiwjo6NBceEyKlrHaxM1mGaCikYOLNy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE `returned` (
  `bookID` int(11) NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `checkOutDate` date NOT NULL,
  `dueDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `late` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returned`
--

INSERT INTO `returned` (`bookID`, `cardNumber`, `checkOutDate`, `dueDate`, `ReturnDate`, `late`) VALUES
(5, 1, '2018-04-06', '0000-00-00', '2018-04-20', 1),
(8, 1, '0000-00-00', '0000-00-00', '2018-04-06', 1),
(10, 26, '0000-00-00', '0000-00-00', '0000-00-00', NULL),
(13, 1, '0000-00-00', '0000-00-00', '0000-00-00', NULL),
(12, 22, '0000-00-00', '0000-00-00', '0000-00-00', NULL),
(18, 28, '0000-00-00', '0000-00-00', '0000-00-00', NULL),
(20, 28, '0000-00-00', '0000-00-00', '0000-00-00', NULL),
(24, 1, '2018-04-06', '0000-00-00', '2018-04-06', 1),
(1, 1, '2018-04-06', '0000-00-00', '2018-04-06', 1),
(1, 2, '2018-04-06', '0000-00-00', '2018-04-06', 1),
(1, 1, '2018-04-06', '2018-04-20', '2018-04-06', NULL),
(2, 2, '2018-04-06', '2018-04-20', '2018-04-06', NULL),
(1, 1, '2018-03-25', '2018-04-04', '2018-04-06', 1),
(1, 1, '2018-04-06', '1970-01-01', '2018-04-06', 1),
(1, 1, '2018-04-06', '2018-04-13', '2018-04-06', NULL),
(2, 2, '2018-04-06', '2018-04-13', '2018-04-06', NULL),
(3, 3, '2018-04-06', '1970-01-01', '2018-04-06', 1),
(5, 1, '1970-01-01', '0000-00-00', '2018-04-20', 1),
(6, 3, '2018-04-06', '2018-04-13', '2018-04-06', NULL),
(7, 7, '2018-04-06', '2018-04-06', '2018-04-06', NULL),
(1, 1, '2018-04-06', '2018-03-25', '2018-04-06', 1),
(5, 37, '2018-04-20', '2018-05-04', '2018-04-20', NULL),
(4, 37, '2018-04-20', '2018-05-04', '2018-04-20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `cardNumber` (`cardNumber`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `authorID` (`authorID`);

--
-- Indexes for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD UNIQUE KEY `bookid_unique` (`bookID`),
  ADD KEY `cardNumber` (`cardNumber`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD KEY `cardNumber` (`cardNumber`);

--
-- Indexes for table `patron`
--
ALTER TABLE `patron`
  ADD PRIMARY KEY (`cardNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `patron`
--
ALTER TABLE `patron`
  MODIFY `cardNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`authorID`) REFERENCES `author` (`authorID`);

--
-- Constraints for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD CONSTRAINT `creditcards_ibfk_1` FOREIGN KEY (`cardNumber`) REFERENCES `patron` (`cardNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
