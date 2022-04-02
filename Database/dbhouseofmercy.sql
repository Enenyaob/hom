-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 02:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhouseofmercy`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `event` varchar(225) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `event`, `event_date`) VALUES
(1, 'onyinye oooooo', '2022-03-30'),
(2, 'onyinye oooooo', '2022-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `first_timer`
--

CREATE TABLE `first_timer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_group` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_timer`
--

INSERT INTO `first_timer` (`id`, `first_name`, `last_name`, `middle_name`, `age_group`, `gender`, `home_address`, `email`, `phone_no`, `create_date`) VALUES
(16, 'Emeka', 'Junior', 'Smith', 'Youth', 'Male', 'Alright lets see', 'ttktktk@bb.com', '07023456789', '2020-12-04'),
(18, 'Enenya', 'weasley', 'Princess', 'Youth', 'Female', '14 obajana road Ekiti', '', '08013214564', '2020-12-10'),
(19, 'Onyinye', 'Enenya', '', 'Youth', 'Female', '27 bode sodiya str ejigbo lagos', 'onyinyeenenya@gmail.com', '08165192487', '2020-12-11'),
(22, 'Rex', 'Obunuwa', 'Richard', 'Youth', 'Male', 'dsadvvvvvvvvvvvvvvvvv', 'rexo@yahoo.com', '07031234675', '2021-02-10'),
(26, 'NGOZI', 'ENENYA', 'VICTORIA', 'ADULT', 'FEMALE', '27 BODE SODIYA STR. EJIGBO', 'ngozienenya@gmail.com', '07039118995', '2021-02-15'),
(27, 'ABIKE', 'CORDILIA', '', 'TENAGER', 'FEMALE', '15 AILEGUN ROAD BESIDE RONIK COMPREHENSIVE COLLEGE', 'Abike@gmail.com', '08012345678', '2021-02-15'),
(29, 'LEKAN', 'ADIGUN', 'SAMUEL', 'ADULT', 'MALE', '15 ADEWALE BELLO STREET EJIGBO', 'lekan@gmail.com', '08012346751', '2021-02-15'),
(30, 'FRANK', 'POTTER', 'DSSSSSSSSSS', 'ADULT', 'MALE', 'JLHJKL', 'ronweasly@example.com', '07031234675', '2021-02-19'),
(31, 'TUNDE', 'EDNUT', 'BOBO', 'YOUTH', 'MALE', '15 BROOKLYN STREET EJIGBO', 'tundednut@gmail.com', '08012345671', '2021-04-08'),
(32, 'CHIAMAKA', 'AMECHINA', 'JOY', 'YOUTH', 'FEMALE', '12 AJOKE STREET LAGOS', 'ame3@hotmail.com', '08012345678', '2022-04-01'),
(33, 'CHRIS', 'OBIOMA', 'OKEYCHUKWU', 'ELDER', 'MALE', 'NEW ERA IYANA IPAJA', 'chrisob@gmail.com', '08010000000', '2022-04-01'),
(34, 'CHRIS', 'OBIOMA', 'OKEYCHUKWU', 'ELDER', 'MALE', 'NEW ERA IYANA IPAJA', 'chri@gmail.com', '08010000000', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `givings_details`
--

CREATE TABLE `givings_details` (
  `id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `givings_details`
--

INSERT INTO `givings_details` (`id`, `status`, `reference`, `amount`, `fullname`, `channel`, `date_time`, `email`) VALUES
(1, '0', '0', 0, '1', '', '0', '0'),
(2, 'success', 'SW468150157', 0, ' ', '', '03/08/2021 07:55:52 ', 'enenyaobinna@gmail.com'),
(3, 'success', 'SW958351217', 0, 'Enenya obinna', '', '03/08/2021 08:16:44 ', 'enenyaobinna@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prayer_request`
--

CREATE TABLE `prayer_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` varchar(1028) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `email`, `first_name`, `last_name`, `middle_name`, `gender`, `dob`, `department`, `phone_no`, `home_address`) VALUES
(1, 'enenyaonyinye@gmail.com', 'Onyinye', 'ENENYA', 'Princess', 'Female', '1996-12-26', 'Choir', '08165192487', '27 BODE SODIYA STR EJIGBO LAGOS'),
(2, 'enenyaobinna@gmail.com', 'Obinna', 'Enenya', '', 'Male', '2021-02-01', 'Choir', '07037208799', '27 bode sodiya street'),
(3, 'lamilao@gmail.com', 'Emeka', 'ENENYA', 'Chris', 'Male', '2021-02-01', 'Choir', '08059341949', '15 BODE ORILE STR. SURULERE LAGOS');

-- --------------------------------------------------------

--
-- Table structure for table `user_pass`
--

CREATE TABLE `user_pass` (
  `user_id` int(11) NOT NULL,
  `details_id` int(11) NOT NULL,
  `role` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secure_pass` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_pass`
--

INSERT INTO `user_pass` (`user_id`, `details_id`, `role`, `user_name`, `secure_pass`) VALUES
(1, 1, 'Counselor', 'swinginge', '$2y$10$Vdy0tGNyBxL/OKO.lMX7nuithzEQKrVoERbMrHOVdz2vakobwjUGC'),
(2, 2, 'Pastorate', 'Swordcat', '$2y$10$Vdy0tGNyBxL/OKO.lMX7nuithzEQKrVoERbMrHOVdz2vakobwjUGC'),
(3, 3, 'Admin', 'lamilao', '$2y$10$3Zi6YR0CwbgdZt8l4vNLQOEtGGL82cfA5YwA0bITuQywVgpXq08m2');

-- --------------------------------------------------------

--
-- Table structure for table `worker_details`
--

CREATE TABLE `worker_details` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_details`
--

INSERT INTO `worker_details` (`id`, `email`, `first_name`, `last_name`, `middle_name`, `gender`, `dob`, `department`, `phone_no`, `home_address`) VALUES
(1, 'enenyaonyinye@gmail.com', 'Onyinye', 'ENENYA', 'Princess', 'Female', '1996-12-26', 'Choir', '08165192487', '27 BODE SODIYA STR EJIGBO LAGOS'),
(2, 'enenyaobinna@gmail.com', 'Obinna', 'Enenya', '', 'Male', '2021-02-01', 'Choir', '07037208799', '27 bode sodiya street'),
(3, 'lamilao@gmail.com', 'Emeka', 'ENENYA', 'Chris', 'Male', '2021-02-01', 'Choir', '08059341949', '15 BODE ORILE STR. SURULERE LAGOS'),
(4, 'chi@yahoo.com', 'CHIAMAKA', 'AMECHINA', 'JOY', 'FEMALE', '1995-04-16', 'CHOIR', '08011111111', '15 ST. THOMAS STREET KETU LAGOS'),
(5, 'junior@hotmail.com', 'JUNIOR', 'NWOKOCHA', 'OKEYCHUKWU', 'MALE', '2022-03-31', 'MEDIA', '08033123456', 'IBUSA OF ASABA'),
(6, 'junior@hotmail.com', 'JUNIOR', 'NWOKOCHA', 'OKEYCHUKWU', 'MALE', '2022-03-19', 'USHERING', '08012345678', 'KDKKDOW OWOOWO WOWOWOWO'),
(7, 'llllllllllll@jjj.com', 'LLLLLLLLLL', 'LLLLLLLLLLLLLLLLLLLLLL', 'LLLLLLLLLLLLLLLLLLLLLLLLLLLLLO', 'MALE', '2022-03-08', 'CHOIR', '07037208799', 'OOW           SSSSSSSSSSSSSSSSSSSS'),
(8, 'uuu@jjj.com', 'LLLLLLLLLL', 'AMECHINA', 'OKEYCHUKWU', 'FEMALE', '2022-03-31', 'CHOIR', '08033123456', 'NNNNNNNNNNNNNNNNNNNNNNNNNNN'),
(9, 'uuu@jjj.com', 'LLLLLLLLLL', 'AMECHINA', 'OKEYCHUKWU', 'FEMALE', '2022-03-31', 'CHOIR', '08033123456', 'NNNNNNNNNNNNNNNNNNNNNNNNNNN'),
(10, 'uuu@jjj.com', 'LLLLLLLLLL', 'AMECHINA', 'OKEYCHUKWU', 'MALE', '2022-03-31', 'CHOIR', '08033123456', 'LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL'),
(11, 'chi@yahoo.com', 'LLLLLLLLLL', 'NWOKOCHA', 'OKEYCHUKWU', 'MALE', '2022-03-31', 'USHERING', '08033123456', 'EEEEEEEEEEEEEEEEEEEEEEEEEE'),
(12, 'chi@yahoo.com', 'LLLLLLLLLL', 'NWOKOCHA', 'OKEYCHUKWU', 'MALE', '2022-03-07', 'CHOIR', '08033123456', 'BODE SURULERE'),
(13, 'chi@yahoo.com', 'LLLLLLLLLL', 'NWOKOCHA', 'OKEYCHUKWU', 'MALE', '2022-03-15', 'CHOIR', '08033123456', 'HHHHHHHHHHHHHHHHHHHHH'),
(14, 'chi@yahoo.com', 'LLLLLLLLLL', 'NWOKOCHA', 'OKEYCHUKWU', 'MALE', '2022-03-27', 'CHOIR', '08033123456', 'JJJJJJJJJJJJJJJJJJJJJJJ'),
(15, 'chi@yahoo.com', 'LLLLLLLLLL', 'NWOKOCHA', 'OKEYCHUKWU', 'MALE', '2022-03-02', 'CHOIR', '08033123456', 'MMMMMMMMMMMMMMMMMMM'),
(16, 'chi@yahoo.com', 'LLLLLLLLLL', 'NWOKOCHA', 'OKEYCHUKWU', 'MALE', '2022-03-01', 'CHOIR', '08033123456', 'EEEEEEEEEEEEEE'),
(17, 'uuu@jjj.com', 'TOBI', 'PELUMI', '', 'FEMALE', '2022-04-11', 'MEDIA', '08035905626', 'ABAYOMI ALABI OYO LAGOS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_timer`
--
ALTER TABLE `first_timer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `givings_details`
--
ALTER TABLE `givings_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prayer_request`
--
ALTER TABLE `prayer_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pass`
--
ALTER TABLE `user_pass`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `details_id` (`details_id`);

--
-- Indexes for table `worker_details`
--
ALTER TABLE `worker_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `first_timer`
--
ALTER TABLE `first_timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `givings_details`
--
ALTER TABLE `givings_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prayer_request`
--
ALTER TABLE `prayer_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_pass`
--
ALTER TABLE `user_pass`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `worker_details`
--
ALTER TABLE `worker_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_pass`
--
ALTER TABLE `user_pass`
  ADD CONSTRAINT `user_pass_ibfk_1` FOREIGN KEY (`details_id`) REFERENCES `user_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
