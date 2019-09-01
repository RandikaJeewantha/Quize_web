-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 08:16 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `question_web_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `q_id` int(3) NOT NULL,
  `answers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`q_id`, `answers`) VALUES
(9, 'Arrow'),
(9, 'Function'),
(9, 'Control'),
(9, 'Spacebar'),
(12, 'Desktop computers'),
(12, 'Super computers'),
(12, 'Laptop computers'),
(12, 'All of these'),
(8, 'Assembly language'),
(8, 'Spaghetti code'),
(8, 'Machine language'),
(8, 'Source code'),
(7, 'CPU and Main Memory'),
(7, 'Control Unit and ALU'),
(7, 'Hard Disk and Floppy Drive'),
(7, 'Operating System and Application'),
(11, 'Motherboard'),
(11, 'RAM'),
(11, 'Peripheral'),
(11, 'System Unit'),
(2, 'An operating system'),
(2, 'Application software'),
(2, 'A processing device'),
(2, 'An input device'),
(5, 'Closed source software'),
(5, 'Open source software'),
(5, 'vertical market software'),
(5, 'Horizontal market software'),
(4, 'Spam'),
(4, 'Sniffer script'),
(4, 'Spoof'),
(4, 'Spool'),
(10, 'Code'),
(10, 'Character'),
(10, 'Colour'),
(10, 'Computer'),
(13, 'mailbox'),
(13, 'hyperlink'),
(13, 'IP address'),
(13, 'None of these'),
(3, 'Compiler'),
(3, 'Operating system'),
(3, 'Loader'),
(3, 'Assembler');

-- --------------------------------------------------------

--
-- Table structure for table `q_and_a`
--

CREATE TABLE IF NOT EXISTS `q_and_a` (
`question_id` int(3) NOT NULL,
  `question` varchar(400) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_and_a`
--

INSERT INTO `q_and_a` (`question_id`, `question`, `answer`) VALUES
(2, 'MS-Word is an example of', 'Application software'),
(3, 'A computer cannot boot if it does not have the', 'Operating system'),
(4, 'Junk e-mail is also called', 'Spam'),
(5, 'Microsoft Office is an example of a', 'Horizontal market software'),
(7, 'The computer processor consists of the following parts', 'Control Unit and ALU'),
(8, 'The first computer was programmed using', 'Machine language'),
(9, 'Which key is used in combination with another key to perform a specific task?', 'Control'),
(10, 'In MICR, C stands for', 'Character'),
(11, 'The box that contains the central electronic components of the computer is the ', 'System Unit'),
(12, 'The operating system called UNIX is typically used for', 'All of these'),
(13, 'An email account includes a storage area, often called', 'mailbox');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(9, 'randikaherath0@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(10, 'admin@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `q_and_a`
--
ALTER TABLE `q_and_a`
 ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `q_and_a`
--
ALTER TABLE `q_and_a`
MODIFY `question_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
