-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 04:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `username` varchar(20) NOT NULL,
  `Today` date NOT NULL,
  `Day` text NOT NULL,
  `MemoryVerse` text DEFAULT NULL,
  `Gratitude` text DEFAULT NULL,
  `Prayer` text DEFAULT NULL,
  `Intent` text DEFAULT NULL,
  `Kairos` text NOT NULL,
  `Reflection` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`username`, `Today`, `Day`, `MemoryVerse`, `Gratitude`, `Prayer`, `Intent`, `Kairos`, `Reflection`) VALUES
('Chriserino', '2021-07-07', 'Wednesday', NULL, NULL, NULL, NULL, 'Psalm 18:30\r\nGalatians 4-5 ->5:24-25 \"Live by the Spirit, follow the Spirit\"', NULL),
('Chriserino', '2021-07-08', 'Thursday', NULL, NULL, NULL, NULL, 'Psalm 149\r\nGalatians 6\r\nEphesians 1-3', NULL),
('Chriserino', '2021-07-12', 'Monday', 'Test 3:16', 'Stuff<br />\r\nPlaces<br />\r\nThings', 'Test', 'Test', 'Stuff was read', 'Things happened'),
('Chriserino', '2021-08-08', 'Sunday', '', '', '', '', 'Philippians 3-4<br />\r\n&quot;Don&rsquo;t worry about anything; instead, pray about everything. Tell God what you need, and thank him for all he has done. Then you will experience God&rsquo;s peace, which exceeds anything we can understand. His peace will guard your hearts and minds as you live in Christ Jesus.&quot; Phil 4:6-7', ''),
('Chriserino', '2021-11-10', 'Wednesday', ' None ', ' None ', ' None ', ' None ', 'Psalms 25, 27', 'Yes'),
('Chriserino', '2021-11-16', 'Tuesday', ' None ', ' None ', ' None ', ' None ', '7AM:\r\nPsalms 25; Psalms 119:105-112\r\nMatthew 1:18-2:23 - Jesus\' Birth', ' None ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Chriserino', '$2y$10$yRBVL8/3ZjwwRvbj3hA6ee.jiSnby5d5IdlVKRgntqt5eR.tH1bEy', '2021-11-09 09:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `username` varchar(20) NOT NULL,
  `WeekDate` date NOT NULL,
  `WeekNumber` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`username`, `WeekDate`, `WeekNumber`) VALUES
('Chriserino', '2021-07-04', 1),
('Chriserino', '2021-07-11', 1),
('Chriserino', '2021-08-08', 1),
('', '2021-11-07', 1),
('Chriserino', '0000-00-00', 1),
('Chriserino', '2021-11-14', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`Today`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`WeekDate`,`WeekNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `WeekNumber` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
