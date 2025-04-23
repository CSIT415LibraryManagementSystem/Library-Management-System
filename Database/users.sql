-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2025 at 03:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usersDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `ssn` varchar(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `m_init` varchar(1) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `super_ssn` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `ssn`, `fname`, `m_init`, `lname`, `role`, `salary`, `super_ssn`) VALUES
(6, '777-77-7777', 'Ron', 'B', 'Parker', 'Library Owner', 150000, NULL),
(7, '102-56-3972', 'Nick', 'M', 'Smith', 'Database Admin', 100000, '777-77-7777'),
(8, '135-79-2468', 'Michelle', 'S', 'Booker', 'Head Librarian', 90000, '777-77-7777'),
(9, '111-22-3333', 'Robert', 'A', 'Schmidt', 'Librarian', 60000, '135-79-2468'),
(10, '333-66-9999', 'Rita', NULL, 'Jackson', 'Librarian', 65000, '135-79-2468');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE profiles (
  id int(11) AUTO_INCREMENT PRIMARY KEY,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  email varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--- Added this ALTER statement to accomadate for Librarians and Members
ALTER TABLE profiles
ADD COLUMN account_type ENUM('Member', 'Librarian') NOT NULL DEFAULT 'Member';
