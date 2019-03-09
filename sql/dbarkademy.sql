-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 12:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarkademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `region_id` int(11) NOT NULL,
  `address` text,
  `income` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `region_id`, `address`, `income`, `created_at`, `created_by`) VALUES
(101, 'Panji Hanum', 102, 'JL. KP. RAWA BADUNG  RT 04 / RW 13, KEC. CAKUNG KEL. JATINEGARA', 21110000, '2019-03-09', 1001),
(1001, 'Panji Hanum', 103, 'Kp. Rawa Badung', 6000200, '2019-03-09', 1001),
(1002, 'Aprilia Pratiwi', 102, 'Kp.Rawa Badung', 2100000, '2019-03-09', 1001),
(1003, 'Azis', 102, 'Walikota', 5400000, '2019-03-09', 1001),
(10001, 'Azis', 102, 'JL. KP. RAWA BADUNG  RT 04 / RW 13, KEC. CAKUNG KEL. JATINEGARA', 2000000, '2019-03-09', 1001),
(10004, 'Panji Hanum', 105, 'Walikota', 5400000, '2019-03-09', 1001),
(10005, 'Putri', 108, 'Walikota', 2000000, '2019-03-09', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `created_by`) VALUES
(102, 'Jakarta', '2019-03-09', 1001),
(103, 'Jawa Timur', '2019-03-09', 1001),
(104, 'Jawa Barat', '2019-03-09', 1001),
(105, 'Sulawesi Selatan', '2019-03-09', 1001),
(106, 'Sulawesi Tenggara', '2019-03-09', 1001),
(107, 'Kalimantan Timur', '2019-03-09', 1001),
(108, 'Kalimantan Barat', '2019-03-09', 1001),
(109, 'DI Yogyakarta', '2019-03-09', 1001),
(110, 'Kepulauan Seribu', '2019-03-09', 1001),
(111, 'Jakarta Timur', '2019-03-09', 1001),
(112, 'Jakarta Pusat', '2019-03-09', 1001),
(113, 'Jakarta Barat', '2019-03-09', 1001),
(114, 'Jakarta Raya', '2019-03-09', 1001),
(1000001, 'Jaktim', '2019-03-09', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1001, 'panjihanum@gmail.com', 'panji555', '2019-03-02');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_person`
-- (See below for the actual view)
--
CREATE TABLE `view_person` (
`id` int(11)
,`name` varchar(30)
,`income` int(11)
,`nama_daerah` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `view_person`
--
DROP TABLE IF EXISTS `view_person`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_person`  AS  select `p`.`id` AS `id`,`p`.`name` AS `name`,`p`.`income` AS `income`,`r`.`name` AS `nama_daerah` from (`person` `p` join `regions` `r` on((`p`.`region_id` = `r`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_person_region_id` (`region_id`),
  ADD KEY `fk_person_created_at` (`created_by`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_regions_created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_person_created_at` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_person_region_id` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `fk_regions_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
