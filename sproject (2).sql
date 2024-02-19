-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 04:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `a_user` varchar(50) DEFAULT NULL,
  `a_pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `a_user`, `a_pass`) VALUES
(14, 'admin1', '81dc9bdb52d04dc20036dbd8313ed055'),
(17, 'admin2', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `freezone`
--

CREATE TABLE `freezone` (
  `std_id` bigint(13) NOT NULL,
  `srt_day` text NOT NULL,
  `std_num` int(20) NOT NULL,
  `srt_time` text NOT NULL,
  `end_time` text NOT NULL,
  `id` int(11) NOT NULL,
  `number` int(8) NOT NULL,
  `status` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `freezone`
--

INSERT INTO `freezone` (`std_id`, `srt_day`, `std_num`, `srt_time`, `end_time`, `id`, `number`, `status`) VALUES
(6310122113094, '27-1-2024', 1, '11:17', '00:17', 40, 35589560, '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `std_id` bigint(13) NOT NULL,
  `std_name` varchar(50) DEFAULT NULL,
  `srt_day` text NOT NULL,
  `std_num` int(20) NOT NULL,
  `srt_time` text NOT NULL,
  `end_time` text NOT NULL,
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `room` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`std_id`, `std_name`, `srt_day`, `std_num`, `srt_time`, `end_time`, `id`, `number`, `room`) VALUES
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '20:14', '21:14', 43, 36867959, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '20:31', '21:31', 44, 55764664, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '20:47', '21:47', 45, 96912411, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '21:14', '22:14', 46, 86195730, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '27-1-2024', 5, '22:16', '23:16', 47, 89009253, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '26-1-2024', 5, '21:25', '22:25', 48, 86251671, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '26-1-2024', 5, '21:39', '22:39', 49, 89057125, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '30-1-2024', 5, '22:39', '23:39', 50, 59626501, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '30-1-2024', 1, '22:37', '23:37', 51, 16497834, 'freezone'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '12:31', '13:31', 52, 16813115, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '23:34', '13:34', 53, 19124586, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '23:42', '12:42', 54, 67700866, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '23:45', '12:45', 55, 88977881, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '23:49', '12:49', 56, 94514905, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '23:50', '12:50', 57, 53851253, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '10:30', '23:30', 58, 18807167, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '26-1-2024', 5, '10:30', '11:30', 59, 87583196, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '26-1-2024', 5, '22:55', '12:55', 60, 56912997, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '27-1-2024', 5, '01:03', '02:03', 61, 82906592, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '27-1-2024', 5, '03:24', '04:24', 62, 60280555, 'LS1'),
(6310122113094, 'brazzer Jack', '27-1-2024', 5, '05:06', '06:06', 63, 73150147, 'LS1'),
(6310122113094, 'brazzer Jack', '27-1-2024', 1, '02:09', '03:09', 64, 13143804, 'freezone'),
(6310122113018, 'Weerawich Pitichaisupawat', '29-1-2024', 1, '02:13', '04:13', 65, 48806300, 'freezone'),
(6310122113018, 'Weerawich Pitichaisupawat', '27-1-2024', 5, '10:01', '11:01', 66, 42784131, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '27-1-2024', 1, '10:17', '11:17', 67, 53529620, 'freezone'),
(6310122113094, 'brazzer Jack', '27-1-2024', 1, '11:17', '00:17', 68, 35589560, 'freezone'),
(6310122113095, 'อานุสร ยุพินลา', '27-1-2024', 5, '13:01', '13:01', 69, 28598179, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '30-1-2024', 5, '19:39', '20:39', 70, 16833078, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '3-2-2024', 5, '12:01', '13:01', 71, 92778254, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '5-2-2024', 5, '20:41', '21:41', 72, 15780641, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '5-2-2024', 5, '22:06', '23:06', 73, 67732426, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '5-2-2024', 5, '22:11', '23:11', 74, 16744966, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '5-2-2024', 5, '22:12', '23:12', 75, 68086071, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '5-2-2024', 5, '22:14', '23:14', 76, 30618442, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '9-2-2024', 5, '22:29', '23:29', 77, 69515902, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '9-2-2024', 5, '22:29', '23:29', 78, 70277699, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '9-2-2024', 5, '22:32', '23:32', 79, 44719701, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '9-2-2024', 5, '22:45', '23:45', 80, 88563076, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '9-2-2024', 5, '18:56', '19:56', 81, 32760201, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '10-2-2024', 5, '22:56', '23:56', 82, 64588588, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '10-2-2024', 5, '23:56', '12:56', 83, 90470470, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '10-2-2024', 5, '21:58', '22:58', 84, 17104655, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '10-2-2024', 5, '14:58', '12:58', 85, 59918422, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '10-2-2024', 5, '20:59', '21:59', 86, 22926461, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '22-2-2024', 5, '22:59', '13:59', 87, 87453713, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '22-2-2024', 5, '12:00', '14:00', 88, 67955027, 'LS1'),
(6310122113018, 'Weerawich Pitichaisupawat', '17-2-2024', 5, '20:26', '21:26', 89, 80873757, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '20-2-2024', 5, '21:49', '22:49', 91, 21753767, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '15-2-2024', 5, '20:50', '21:50', 92, 33596021, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '17-2-2024', 5, '13:36', '14:36', 102, 41843504, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '17-2-2024', 5, '13:39', '14:39', 105, 86213682, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '22-2-2024', 5, '12:42', '13:42', 106, 36995477, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '22-2-2024', 5, '14:43', '15:43', 107, 26665959, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '17-2-2024', 5, '13:47', '14:47', 109, 67410681, 'LS1'),
(6310122113095, 'อานุสร ยุพินลา', '21-2-2024', 5, '12:47', '13:47', 110, 50617478, 'LS1');

-- --------------------------------------------------------

--
-- Table structure for table `ls1`
--

CREATE TABLE `ls1` (
  `std_id` bigint(13) NOT NULL,
  `srt_day` text NOT NULL,
  `std_num` int(20) NOT NULL,
  `srt_time` text NOT NULL,
  `end_time` text NOT NULL,
  `id` int(11) NOT NULL,
  `number` int(8) NOT NULL,
  `status` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ls1`
--

INSERT INTO `ls1` (`std_id`, `srt_day`, `std_num`, `srt_time`, `end_time`, `id`, `number`, `status`) VALUES
(6310122113095, '21-2-2024', 5, '12:47', '13:47', 164, 50617478, '');

-- --------------------------------------------------------

--
-- Table structure for table `ls2`
--

CREATE TABLE `ls2` (
  `std_id` bigint(13) NOT NULL,
  `srt_day` text NOT NULL,
  `std_num` int(20) NOT NULL,
  `srt_time` text NOT NULL,
  `end_time` text NOT NULL,
  `id` int(11) NOT NULL,
  `number` int(8) NOT NULL,
  `status` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls3`
--

CREATE TABLE `ls3` (
  `std_id` bigint(13) NOT NULL,
  `srt_day` text NOT NULL,
  `std_num` int(20) NOT NULL,
  `srt_time` text NOT NULL,
  `end_time` text NOT NULL,
  `id` int(11) NOT NULL,
  `number` int(8) NOT NULL,
  `status` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_tbl`
--

CREATE TABLE `member_tbl` (
  `std_id` bigint(13) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `std_fac` varchar(50) NOT NULL,
  `std_bch` varchar(50) NOT NULL,
  `std_tel` int(11) NOT NULL,
  `std_pass` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member_tbl`
--

INSERT INTO `member_tbl` (`std_id`, `std_name`, `std_fac`, `std_bch`, `std_tel`, `std_pass`, `id`) VALUES
(6310122113018, 'Weerawich Pitichaisupawat', '', '', 0, '25d55ad283aa400af464c76d713c07ad', 6),
(6310122113095, 'อานุสร ยุพินลา', 'asdfgdasg', 'asdgasfdgdfg', 635394532, '25d55ad283aa400af464c76d713c07ad', 7),
(6310122113094, 'brazzer Jack', 'asdfgdasg', 'asdgasfdgdfg', 635394532, '25d55ad283aa400af464c76d713c07ad', 8),
(1234567890123, 'loindie tear', 'มนุษศาตร์', 'ดนตรีสากล', 944859199, '25d55ad283aa400af464c76d713c07ad', 9),
(6310122113008, 'นันท์ชญาน์ ธนโชคชัยธนัตถ์', 'วิทยาศาสตร์และเทคโนโลยี', 'เทคโนโลยีสารสนเทศ', 9641564, '02bf2381ce199b22f3ba13277fda7df3', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `std_id` bigint(13) DEFAULT NULL,
  `room` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `std_id`, `room`) VALUES
(33, 6310122113094, 'freezone'),
(54, 6310122113018, 'LS1'),
(75, 6310122113095, 'LS1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freezone`
--
ALTER TABLE `freezone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ls1`
--
ALTER TABLE `ls1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ls2`
--
ALTER TABLE `ls2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ls3`
--
ALTER TABLE `ls3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_tbl`
--
ALTER TABLE `member_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `freezone`
--
ALTER TABLE `freezone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `ls1`
--
ALTER TABLE `ls1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `ls2`
--
ALTER TABLE `ls2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ls3`
--
ALTER TABLE `ls3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `member_tbl`
--
ALTER TABLE `member_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
