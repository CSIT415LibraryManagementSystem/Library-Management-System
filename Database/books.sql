-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2025 at 07:03 PM
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
-- Database: `bookDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `published` int(11) DEFAULT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `published`, `genre`) VALUES
(1, 'And Then There Were None', 'Agatha Christie', 1939, 'Mystery'),
(2, 'The Alchemist', 'Paulo Coelho', 1988, 'Fantasy'),
(3, 'The Hobbit', 'J.R.R Tolkien', 1937, 'Fantasy'),
(4, 'A Tale of Two Cities', 'Charles Dickens', 1859, 'Fiction'),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 1925, 'Tragedy'),
(6, 'The Hunger Games', 'Suzanne Collins', 2008, 'Fiction'),
(7, 'The Godfather', 'Mario Puzo', 1969, 'Crime'),
(8, 'The Giver', 'Lois Lowry', 1993, 'Fiction'),
(9, 'Harry Porter and the Philosopher\'s Stone', 'J.K. Rowling', 1997, 'Fantasy'),
(10, 'The Da Vinci Code', 'Dan Brown', 2003, 'Mystery'),
(11, 'The Catcher in the Rye', 'J.D. Salinger', 1951, 'Coming-of-age'),
(12, 'Charlotte\'s Web', 'E. B. White', 1952, 'Fiction'),
(13, 'Gone with the Wind', 'Margaret Mitchell', 1936, 'Fiction'),
(14, 'Harry Porter and the Chamber of Secrets', 'J.K. Rowling', 1998, 'Fantasy'),
(15, 'The Exorcist', 'William Peter Blatty', 1971, 'Horror'),
(16, 'Jaws', 'Peter Benchley', 1974, 'Thriller'),
(17, 'Charlie and the Chocolate Factory', 'Roald Dahl', 1964, 'Fantasy'),
(18, 'The Bridges of Madison Country', 'Robert James Waller', 1992, 'Romance'),
(19, 'The Little Prince', 'Antoine de Saint Exupery', 1943, 'Fantasy'),
(20, 'Alice\'s Adventure in Wonderland', 'Lewis Carroll', 1865, 'Fantasy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
