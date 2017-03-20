-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2017 at 10:27 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`) VALUES
(9, 'nice', 'gagaga', '$2y$10$tGt.Eo2H7tgBhTnjoavZx.yvQJnp0UMePMMH4/RMp0.Ub5VGKMisy', ''),
(10, 'test', 'test@yahoo.com', '$2y$10$AWO.puCqxlKOHiXfOh2BfOSsqeCEaOFVXgbxkmibQauXg1Lvbz/6e', ''),
(11, 'newuser', 'newuser@yahoo.com', '$2y$10$F7FD4mPW9eOsl.ABAFya.umASSeL8dZ19hotENj/T6vP0lvPLJjUi', ''),
(12, 'briza_pogi', 'briza_pogi@yahoo.com', '$2y$10$JBYgZcoIC7EAFBtzjiahRehnl3iVUUT7qPK2.nP./VgMhoLnIqpH6', 'idle'),
(13, 'nice', 'nice@yahoo.com', '$2y$10$XtRAxbPsauaJLXevCXkUOuyyxHnczvX8d3smXCUm2pg5kdlZFSFmO', ''),
(14, 'yow', 'yow@yahoo.com', '$2y$10$iVnjnlObVreZCjXVivcEx.nLBa3GhUImQ7Zi/sgdsZktXGf2rmyrK', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
