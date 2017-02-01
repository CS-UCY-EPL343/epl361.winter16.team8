-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2017 at 10:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `la_gallerie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `EMAIL` varchar(30) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(15) COLLATE utf8_bin NOT NULL,
  `SURNAME` varchar(15) COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(20) COLLATE utf8_bin NOT NULL,
  `DOB` date NOT NULL,
  `SEX` char(1) COLLATE utf8_bin NOT NULL,
  `ADDRESS` varchar(40) COLLATE utf8_bin NOT NULL,
  `CITY` varchar(15) COLLATE utf8_bin NOT NULL,
  `POSTAL_CODE` int(11) NOT NULL,
  `MOBILE` bigint(20) NOT NULL,
  `ISVIP` tinyint(1) NOT NULL,
  `DATE_OF_PROFILE_CREATION` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`EMAIL`, `NAME`, `SURNAME`, `PASSWORD`, `DOB`, `SEX`, `ADDRESS`, `CITY`, `POSTAL_CODE`, `MOBILE`, `ISVIP`, `DATE_OF_PROFILE_CREATION`) VALUES
('MetallicA@cs.ucy.ac.cy.com', 'Agios', 'Vasilis', 'PREPInaFERWdora33', '1881-05-30', 'M', 'Reindeer 16 Loxagou Rudolph', 'Laponia', 51221, 432199111111, 1, '2017-02-01 13:14:45.399919'),
('aggourakiA@cs.ucwhy.ac.cy.com', 'rafaeel', 'jackson', 'en1MISTIKO!', '1822-03-25', 'M', 'En Ikserw 18, eeee', 'Kapou Magika', 11892, 999999998, 1, '2017-02-01 13:35:06.336928'),
('skyria12@cs.ucy.ac.cy', 'Bananios', 'Kyriakidis', 'iLikeKID$123', '1995-10-10', 'M', 'essw sou 13 anathema', 'Nicosia', 5621, 99111111, 1, '2017-02-01 11:10:49.546982');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
