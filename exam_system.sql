-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 03:13 PM
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
-- Database: `exam_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `ae_uploaded_files`
--

CREATE TABLE `ae_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ce_uploaded_files`
--

CREATE TABLE `ce_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cm_uploaded_files`
--

CREATE TABLE `cm_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ddgm_uploaded_files`
--

CREATE TABLE `ddgm_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disapprove`
--

CREATE TABLE `disapprove` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disapprove`
--

INSERT INTO `disapprove` (`id`, `file_name`, `file_path`, `faculty_name`, `status1`, `hod_notes`, `coursename`, `coursecode`, `exam`, `acyear`) VALUES
(1, '25temp-2.pdf', 'uploads/25temp-2.pdf', 'If Faculty', 'Dispproved', 'fgdfg', 'LOS', '6544', 'pt1', '2022-23'),
(2, '25temp-3.pdf', 'uploads/25temp-3.pdf', 'If Faculty', 'Dispproved', 'kjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdfkjsdfjksdf', 'LOS', '6544', 'pt2', '2022-23'),
(3, '25temp-4.pdf', 'uploads/25temp-4.pdf', 'If Faculty', 'Dispproved', 'Add a subsequent questions to the question paper and also arrange it as a chatper wise properly, and reupload till 8 pm today.', 'LOS', '6544', 'pt2', '2022-23'),
(4, '25temp-1.pdf', 'uploads/25temp-1.pdf', 'If Faculty', 'Dispproved', 'neW AOOOPROVED ALL FACULTY LOGICALLY BEEN OK AND DIDI IS YEDI MURKH BAVLAT jadhi mhais ahe khup', 'LOS', '6544', 'pt1', '2022-23'),
(5, '6.png', 'uploads/6.png', 'If Faculty', 'Dispproved', 'no question properly arranged', 'LOS', '6544', 'pt2', '2022-23'),
(6, '4.png', 'uploads/4.png', 'If Faculty', 'Dispproved', '123123', 'LOS', '6544', 'pt2', '8888-88'),
(7, '3.png', 'uploads/3.png', 'If Faculty', 'Dispproved', 'new', 'LOS', '6544', 'pt2', '1111-11'),
(8, '1.png', 'uploads/1.png', 'If Faculty', 'Dispproved', '23123123123123123123123123', 'LOS', '6544', 'pt1', '2222-22'),
(9, '25temp-2.pdf', 'uploads/25temp-2.pdf', 'If Faculty', 'Dispproved', 'fgdfg', 'LOS', '6544', 'pt1', '2022-23'),
(10, '5_6082654365313664023.pdf', 'uploads/5_6082654365313664023.pdf', 'If Faculty', 'Dispproved', '123123123', 'LOS', '6544', 'pt1', '2022-23');

-- --------------------------------------------------------

--
-- Table structure for table `ee_uploaded_files`
--

CREATE TABLE `ee_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entc_uploaded_files`
--

CREATE TABLE `entc_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `file_name`, `file_path`, `faculty_name`, `branch`, `status1`, `hod_notes`, `coursename`, `coursecode`, `acyear`, `exam`) VALUES
(4, '4.png', 'uploads/4.png', 'If Faculty', 'Information Technology', 'Approved', '123123', 'LOS', '6544', '8888-88', 'pt2'),
(5, '3.png', 'uploads/3.png', 'If Faculty', 'Information Technology', 'Approved', 'new', 'LOS', '6544', '1111-11', 'pt2'),
(6, '1.png', 'uploads/1.png', 'If Faculty', 'Information Technology', 'Approved', '23123123123123123123123123', 'LOS', '6544', '2222-22', 'pt1'),
(7, '2.png', 'uploads/2.png', 'If Faculty', 'Information Technology', 'Approved', '-', 'LOS', '6544', '2022-23', 'pt1');

-- --------------------------------------------------------

--
-- Table structure for table `idd_uploaded_files`
--

CREATE TABLE `idd_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `if_uploaded_files`
--

CREATE TABLE `if_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `if_uploaded_files`
--

INSERT INTO `if_uploaded_files` (`id`, `file_name`, `file_path`, `faculty_name`, `status1`, `hod_notes`, `coursename`, `coursecode`, `acyear`, `exam`) VALUES
(5, '2.png', 'uploads/2.png', 'If Faculty', 'Approved', '-', 'LOS', '6544', '2022-23', 'pt1'),
(6, '4.png', 'uploads/4.png', 'If Faculty', 'Approved', '123123', 'LOS', '6544', '8888-88', 'pt2'),
(7, '3.png', 'uploads/3.png', 'If Faculty', 'Approved', 'new', 'LOS', '6544', '1111-11', 'pt2'),
(8, '1.png', 'uploads/1.png', 'If Faculty', 'Approved', '-', 'LOS', '6544', '2222-22', 'pt1'),
(9, '4.png', 'uploads/4.png', 'If Faculty', '-', '-', 'LOS', '6544', '2022-23', 'pt1'),
(10, '6.png', 'uploads/6.png', 'If Faculty', '-', '-', 'LOS', '6544', '2022-23', 'pt2'),
(11, '1.png', 'uploads/1.png', 'If Faculty', '-', '-', 'LOS', '6544', '2022-23', 'pt1');

-- --------------------------------------------------------

--
-- Table structure for table `me_uploaded_files`
--

CREATE TABLE `me_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mk_uploaded_files`
--

CREATE TABLE `mk_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pe_uploaded_files`
--

CREATE TABLE `pe_uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `hod_notes` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `acyear` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `fcname` varchar(255) NOT NULL,
  `coname` varchar(255) NOT NULL,
  `cocode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `role`, `branch`, `fcname`, `coname`, `cocode`) VALUES
('exam@gmail.com', '123', 'Examination Cell', NULL, '', '', ''),
('iffac@gmail.com', '123', 'Faculty', 'if', 'If Faculty', 'LOS', '6544'),
('ifhod@gmail.com', '123', 'HOD', 'if', 'asd', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ae_uploaded_files`
--
ALTER TABLE `ae_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ce_uploaded_files`
--
ALTER TABLE `ce_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_uploaded_files`
--
ALTER TABLE `cm_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ddgm_uploaded_files`
--
ALTER TABLE `ddgm_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disapprove`
--
ALTER TABLE `disapprove`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ee_uploaded_files`
--
ALTER TABLE `ee_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entc_uploaded_files`
--
ALTER TABLE `entc_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idd_uploaded_files`
--
ALTER TABLE `idd_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `if_uploaded_files`
--
ALTER TABLE `if_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `me_uploaded_files`
--
ALTER TABLE `me_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_uploaded_files`
--
ALTER TABLE `mk_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pe_uploaded_files`
--
ALTER TABLE `pe_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ae_uploaded_files`
--
ALTER TABLE `ae_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ce_uploaded_files`
--
ALTER TABLE `ce_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cm_uploaded_files`
--
ALTER TABLE `cm_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ddgm_uploaded_files`
--
ALTER TABLE `ddgm_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disapprove`
--
ALTER TABLE `disapprove`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ee_uploaded_files`
--
ALTER TABLE `ee_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entc_uploaded_files`
--
ALTER TABLE `entc_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `idd_uploaded_files`
--
ALTER TABLE `idd_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `if_uploaded_files`
--
ALTER TABLE `if_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `me_uploaded_files`
--
ALTER TABLE `me_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mk_uploaded_files`
--
ALTER TABLE `mk_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pe_uploaded_files`
--
ALTER TABLE `pe_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
