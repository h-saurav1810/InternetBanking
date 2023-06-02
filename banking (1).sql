-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 03:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountno` varchar(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `balance` int(11) NOT NULL,
  `blocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountno`, `pin`, `balance`, `blocked`) VALUES
('111122223333', '123', 2520, 0),
('123456789012', '123', 2000, 0),
('134498217782', '899', 1139, 0),
('155109106077', '619', 2500, 0),
('219877624811', '777', 928, 1),
('242019723659', '487', 2960, 0),
('282996547210', '911', 11787, 1),
('287959451010', '987', 20485, 0),
('333333333333', '333', 910, 0),
('365018924885', '181', 6890, 1),
('399223461710', '515', 14650, 1),
('444455556666', '456', 2115, 0),
('473222154321', '100', 8500, 0),
('555555555555', '555', 3525, 0),
('599264890235', '365', 12650, 0),
('652733775618', '404', 4642, 0),
('672118563304', '333', 17680, 0),
('777777777777', '777', 11080, 0),
('777788889999', '789', 26546, 0),
('791944253187', '180', 9120, 0),
('833217145962', '999', 18740, 0),
('888888888888', '888', 12285, 0),
('893725501689', '654', 5350, 1),
('923719885226', '696', 3880, 1),
('987654321098', '987', 4500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin1', 'admin1'),
('admin2', 'admin2'),
('admin3', 'admin3');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `securityquestion` varchar(100) DEFAULT NULL,
  `securityanswer` varchar(50) DEFAULT NULL,
  `accountno` varchar(50) NOT NULL,
  `emailverified` int(11) NOT NULL DEFAULT 1,
  `otp` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`firstname`, `lastname`, `dob`, `phonenum`, `email`, `username`, `password`, `securityquestion`, `securityanswer`, `accountno`, `emailverified`, `otp`) VALUES
('Alec', 'Vince', '2001-03-06', '0109177593', 'i21019956@student.newinti.edu.my', 'arreku21', 'Alec_1810', 'What was the name of your first pet?', 'Poodles', '219877624811', 1, 0),
('Bara\'', 'Yaish', '2003-04-03', '01128202081', 'i200189682@student.newinti.edu.my', 'bara_yaish', 'B@ra_123', 'What was the name of your favorite high school teacher?', 'Mum', '652733775618', 1, 0),
('Fahad', 'Mustafa', '2002-10-19', '0127774932', 'fahad.mustafa@gmail.com', 'fahady', 'F@had1810', 'What was the name of your favorite high school teacher?</', 'Javeria', '923719885226', 1, 0),
('Francesca', 'Aira', '2002-10-26', '01259963471', 'francescsa18@gmail.com', 'fran_aira', 'Fr@ncesca1810', 'What was the name of your first pet?', 'Fluffy', '134498217782', 1, 0),
('Dane', 'Francis', '2002-04-09', '0148268291', 'danefrance@gmail.com', 'lemon', 'D@ne1810', 'What was the first name of your best friend in high school?', 'Alec', '893725501689', 1, 0),
('Moza', 'Sajidah', '2002-05-27', '0173421681', 'mozapam@gmail.com', 'mozarella', 'Moz@1810', 'What was the name of your first pet?', 'Bam', '242019723659', 1, 0),
('Sarah', 'Sharif', '2003-03-22', '0128674428', 'sarah.sharif@gmail.com', 'pickls', 'S@rah1810', 'What was the first name of your best friend in high school?', 'Zainab', '444455556666', 1, 0),
('Ahmad', 'Fyqrie', '1999-10-02', '0172198903', 'i21020133@student.newinti.edu.my', 'pnjg', 'Ahm@d1810', 'What was the name of your first pet?', 'Luffy', '365018924885', 1, 0),
('Saurav', 'Hazra', '2001-10-16', '0102453097', 'sauravhazra1810@gmail.com', 'saurav_hzra', 'baraihab1', 'What was the first name of your best friend in high school?', 'Rafae', '111122223333', 1, 0),
('Dilon', 'Fernando', '2002-06-07', '0164281789', 'dilon.fernando@gmail.com', 'xdm7', 'Dilon_1810', 'What was the first name of your best friend in high school?', 'Himansi', '399223461710', 1, 0),
('Zainab', 'Syed', '1997-06-23', '01376856899', 'zainabsyed@gmail.com', 'zeexsyed', 'Z@inab1810', 'What was the name of your favorite high school teacher?', 'John', '282996547210', 1, 0),
('Adrian', 'Reyes', '2002-04-17', '0194231557', 'zrain@gmail.com', 'z_rain', 'Adri@n1810', 'What was the name of your favorite high school teacher?', 'Rose', '473222154321', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `useraccount` varchar(50) NOT NULL,
  `favoritedaccount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`useraccount`, `favoritedaccount`) VALUES
('111122223333', '444455556666'),
('111122223333', '444455556666'),
('111122223333', '833217145962'),
('111122223333', '833217145962');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `institution` varchar(50) NOT NULL,
  `accountno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`institution`, `accountno`) VALUES
('Maxis', '155109106077'),
('Etiqa Insurance Bhd', '287959451010'),
('Gas Malaysia', '599264890235'),
('Telekom Malaysia', '672118563304'),
('INTI International University', '777788889999'),
('Tenaga Nasional', '791944253187'),
('Celcom', '833217145962');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionid` int(11) NOT NULL,
  `date` date NOT NULL,
  `reference` varchar(50) NOT NULL,
  `accountno` varchar(50) NOT NULL,
  `deposit` int(11) DEFAULT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionid`, `date`, `reference`, `accountno`, `deposit`, `withdraw`, `balance`) VALUES
(49, '2023-04-11', 'ref', '111122223333', 0, 20, 2610),
(50, '2023-04-11', 'ref', '777788889999', 20, 0, 26526),
(51, '2023-04-11', 'ref', '111122223333', 0, 20, 2590),
(52, '2023-04-11', 'ref', '444455556666', 20, 0, 2065),
(53, '2023-04-11', 'ref', '111122223333', 0, 20, 2570),
(54, '2023-04-11', 'ref', '444455556666', 20, 0, 2085),
(55, '2023-04-11', 'ref', '111122223333', 0, 10, 2550),
(56, '2023-04-11', 'ref', '444455556666', 10, 0, 2105),
(57, '2023-04-11', 'ref', '111122223333', 0, 10, 2540),
(58, '2023-04-11', 'ref', '833217145962', 10, 0, 18720),
(59, '2023-04-11', 'ref', '111122223333', 0, 10, 2530),
(60, '2023-04-11', 'ref', '833217145962', 10, 0, 18730);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountno`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD KEY `accountno` (`accountno`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`institution`),
  ADD KEY `accountno` (`accountno`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionid`),
  ADD KEY `accountno` (`accountno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`accountno`) REFERENCES `account` (`accountno`);

--
-- Constraints for table `institution`
--
ALTER TABLE `institution`
  ADD CONSTRAINT `institution_ibfk_1` FOREIGN KEY (`accountno`) REFERENCES `account` (`accountno`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`accountno`) REFERENCES `account` (`accountno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
