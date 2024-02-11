-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 02:44 PM
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
-- Database: `completion_form`
--
CREATE DATABASE IF NOT EXISTS `completion_form` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `completion_form`;

-- --------------------------------------------------------

--
-- Table structure for table `campuses`
--

CREATE TABLE `campuses` (
  `campus_id` int(11) NOT NULL,
  `campus_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campuses`
--

INSERT INTO `campuses` (`campus_id`, `campus_name`) VALUES
(1, 'A. Mabini Campus'),
(2, 'NDC Compound Campus'),
(3, 'M.H. Del Pilar Campus');

-- --------------------------------------------------------

--
-- Table structure for table `completion_requests`
--

CREATE TABLE `completion_requests` (
  `id` int(11) NOT NULL,
  `control_number` char(11) DEFAULT NULL,
  `final_grade` char(4) DEFAULT NULL,
  `units` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `correction_requests`
--

CREATE TABLE `correction_requests` (
  `id` int(11) NOT NULL,
  `control_number` char(11) DEFAULT NULL,
  `modified_fname` varchar(30) DEFAULT NULL,
  `modified_mname` varchar(30) DEFAULT NULL,
  `modified_lname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `correction_requests`
--

INSERT INTO `correction_requests` (`id`, `control_number`, `modified_fname`, `modified_mname`, `modified_lname`) VALUES
(2, '20240211768', 'Angela Marie', 'Catacutan', 'Dela Peña');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` char(6) NOT NULL,
  `course_title` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_title`) VALUES
('AB-PHI', 'Bachelor of Arts in Philosophy'),
('ABCLS', 'Bachelor of Arts in Literature and Cultural Studies'),
('ABELS', 'Bachelor of Arts in English Language Studies'),
('ABF', 'Batsilyer ng Artes sa Filipinolohiya'),
('BAB', 'Bachelor of Arts in Broadcasting'),
('BAC', 'Bachelor of Arts in Communication'),
('BAEcon', 'Bachelor of Arts in Economics'),
('BAHist', 'Bachelor of Arts in History'),
('BAJ', 'Bachelor of Arts in Journalism'),
('BAPR', 'Bachelor of Arts in Public Relations'),
('BAPS', 'Bachelor of Arts in Political Science'),
('BAPsy', 'Bachelor of Arts in Psychology'),
('BASoc', 'Bachelor of Arts in Sociology'),
('BEEd', 'Bachelor of Elementary Education'),
('BPA', 'Bachelor of Public Administration'),
('BPE', 'Bachelor of Physical Education'),
('BPEA', 'Bachelor of Performing Arts Major in Theater Arts'),
('BSA', 'Bachelor of Science in Accountancy'),
('BSAr', 'Bachelor of Science in Architechture'),
('BSBA', 'Bachelor of Science in Business Administration'),
('BSBA-F', 'BSBA-Financial Management'),
('BSBA-H', 'BSBA-Human Resourse Development Management'),
('BSBA-M', 'BSBA-Marketing Management'),
('BSBA-O', 'BSBA-Operations Management'),
('BSBio', 'Bachelor of Science in Biology'),
('BSCE', ' Bachelor of Science in Civil Engineering'),
('BSChE', 'Bachelor of Science in Chemical Engineering'),
('BSChem', 'Bachelor of Science in Chemistry'),
('BSCpE', 'Bachelor of Science in Computer Engineering'),
('BSCS', 'Bachelor of Science in Computer Science'),
('BSECE', 'Bachelor of Science in Electronics Engineering'),
('BSEd', 'Bachelor of Secondary Education'),
('BSEE', 'Bachelor of Science in Electrical Engineering'),
('BSEPM', 'Bachelor of Science in Enviromental Planning and Management'),
('BSHM', 'Bachelor of Science in Hospitality Management'),
('BSID', 'Bachelor of Science in Interior Design'),
('BSIE', 'Bachelor of Science in Industrial Engineering'),
('BSIS', 'Bachelor of Science in Information Systems'),
('BSIT', 'Bachelor of Science in Information Technology'),
('BSLA', 'Bachelor of Science in Landscape Architecture'),
('BSMA', 'Bachelor of Science in Management Accounting'),
('BSMath', 'Bachelor of Science in Mathematics'),
('BSME', 'Bachelor of Science in Mechanical Engineering'),
('BSMinE', 'Bachelor of Science in Mining Engineering'),
('BSP', 'Bachelor of Science in Physics'),
('BSS', 'Bachelor of Sports Science'),
('BSTM', 'Bachelor of Science in Tourism Management'),
('BSTrM', 'Bachelor of Science in Travel Management');

-- --------------------------------------------------------

--
-- Table structure for table `late_reporting_requests`
--

CREATE TABLE `late_reporting_requests` (
  `id` int(11) NOT NULL,
  `control_number` char(11) DEFAULT NULL,
  `final_grade` char(4) DEFAULT NULL,
  `units` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `control_number` char(11) NOT NULL,
  `student_number` char(15) DEFAULT NULL,
  `subject_code` char(10) DEFAULT NULL,
  `subject_title` varchar(50) DEFAULT NULL,
  `session_code` char(5) DEFAULT NULL,
  `term_code` char(6) DEFAULT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `reported_as` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `requested_by` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`control_number`, `student_number`, `subject_code`, `subject_title`, `session_code`, `term_code`, `campus_id`, `reported_as`, `reason`, `creation_date`, `requested_by`) VALUES
('20240211514', 'fsdf', 'COMP20163', 'WebDev', 'D', '2nd', 2, 'hatdog', 'wala lang', '2024-02-11', 'Angela'),
('20240211768', '2021-08204-MN-0', 'COMP20163', 'WebDev', 'N', '1st', 1, 'Cret', 'Secret', '2024-02-11', ''),
('20240211978', '2021-08204-MN-0', 'COMP20163', 'WebDev', 'D', '1st', 1, 'ganito lang', 'kasi ganito', '2024-02-11', 'dasdas');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_code` char(5) NOT NULL,
  `session_desc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_code`, `session_desc`) VALUES
('D', 'Day Session'),
('N', 'Night Session');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_number` char(15) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `course_code` char(6) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `section` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_number`, `first_name`, `middle_name`, `last_name`, `course_code`, `year`, `section`) VALUES
('2021-08204-MN-0', 'Aron Nick', 'Catacutan', 'Santos', 'AB-PHI', 2, '2'),
('fsdf', 'f', 'fsdf', 'fsdfd', 'ABCLS', 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_code` char(6) NOT NULL,
  `term_desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_code`, `term_desc`) VALUES
('1st', 'First Semester'),
('2nd', 'Second Semester'),
('Summer', 'Summer Semester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campuses`
--
ALTER TABLE `campuses`
  ADD PRIMARY KEY (`campus_id`) USING BTREE;

--
-- Indexes for table `completion_requests`
--
ALTER TABLE `completion_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `completion reqs` (`control_number`);

--
-- Indexes for table `correction_requests`
--
ALTER TABLE `correction_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `correction reqs` (`control_number`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `late_reporting_requests`
--
ALTER TABLE `late_reporting_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `late_request_info` (`control_number`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`control_number`),
  ADD KEY `student` (`student_number`),
  ADD KEY `session` (`session_code`),
  ADD KEY `term` (`term_code`),
  ADD KEY `campus` (`campus_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_number`),
  ADD KEY `course` (`course_code`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campuses`
--
ALTER TABLE `campuses`
  MODIFY `campus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `completion_requests`
--
ALTER TABLE `completion_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `correction_requests`
--
ALTER TABLE `correction_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `late_reporting_requests`
--
ALTER TABLE `late_reporting_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `completion_requests`
--
ALTER TABLE `completion_requests`
  ADD CONSTRAINT `completion reqs` FOREIGN KEY (`control_number`) REFERENCES `requests` (`control_number`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `correction_requests`
--
ALTER TABLE `correction_requests`
  ADD CONSTRAINT `correction reqs` FOREIGN KEY (`control_number`) REFERENCES `requests` (`control_number`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `late_reporting_requests`
--
ALTER TABLE `late_reporting_requests`
  ADD CONSTRAINT `late_request_info` FOREIGN KEY (`control_number`) REFERENCES `requests` (`control_number`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`campus_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `session` FOREIGN KEY (`session_code`) REFERENCES `sessions` (`session_code`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `student` FOREIGN KEY (`student_number`) REFERENCES `students` (`student_number`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `term` FOREIGN KEY (`term_code`) REFERENCES `terms` (`term_code`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
