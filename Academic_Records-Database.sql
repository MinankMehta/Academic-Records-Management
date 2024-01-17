-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 09:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academic_records`
--
CREATE DATABASE IF NOT EXISTS `academic_records` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `academic_records`;

-- --------------------------------------------------------

--
-- Table structure for table `linksdata`
--

CREATE TABLE `linksdata` (
  `id` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Branch` varchar(255) DEFAULT NULL,
  `Type` varchar(255) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `faculty_name` varchar(255) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linksdata`
--

INSERT INTO `linksdata` (`id`, `Year`, `Branch`, `Type`, `Link`, `title`, `date`, `faculty_name`, `semester`, `subject`) VALUES
(1, 2023, 'COMPS', 'ISE_papers\r\n', 'https://workspace.google.com/intl/en_in/lp/drive/?utm_source=bing&utm_medium=cpc&utm_campaign=1605214-Workspace-APAC-IN-en-BKWS-EXA-LV&utm_content=text-ad-none-none-DEV_c-CRE_-ADGP_Hybrid%20%7C%20BKWS%20-%20EXA%20%7C%20Txt_Drive-KWID_43700072096398946-kwd', NULL, '2023-07-04', 'Latha', 2, 'Workshop'),
(2, 2023, 'COMPS', 'ISE_papers', 'https://drive.google.com/file/d/13cPN7QTNXCINzPbtopfUkECW48vLFC24/view?usp=drive_link', NULL, '2023-07-04', 'Umang', 4, 'Analysis of Algorithms'),
(50, 2023, 'COMPS', 'LAB_Writeups', 'Academic_Records/linksdata/64b0f72a1afb0_8100e1-evaluation-resource-first-speech.pdf', '8100e1-evaluation-resource-first-speech.pdf', '2023-07-14', 'Latha', 4, 'Mini Project'),
(51, 2023, 'COMPS', 'LAB_Writeups', 'Academic_Records/linksdata/64b0f73048766_joshi22b_interspeech (1).pdf', 'joshi22b_interspeech (1).pdf', '2023-07-14', 'Latha', 4, 'Mini Project'),
(52, 2023, 'COMPS', 'LAB_Writeups', 'Academic_Records/linksdata/64b0f73792a37_classify detect adversial.pdf', 'classify detect adversial.pdf', '2023-07-14', 'Umang', 4, 'Mini Project'),
(53, 2023, 'COMPS', 'LAB_Writeups', 'Academic_Records/linksdata/64b0f73d1c136_2107.04448v1.pdf', '2107.04448v1.pdf', '2023-07-14', 'Latha', 4, 'Mini Project'),
(54, 2023, 'COMPS', 'LAB_Writeups', 'Academic_Records/linksdata/64b0f742a4ac7_1507.00677v9.pdf', '1507.00677v9.pdf', '2023-07-14', 'Latha', 4, 'Mini Project'),
(55, 2023, 'COMPS', 'LAB_Writeups', 'Academic_Records/linksdata/64b0f7494e691_vat.docx', 'vat.docx', '2023-07-14', 'Priya', 4, 'Mini Project'),
(56, 2023, 'COMPS', 'LAB_Writeups', 'Academic_Records/linksdata/64b0f7514434d_finalish-vat.pdf', 'finalish-vat.pdf', '2023-07-14', 'Varrshinie', 4, 'Mini Project'),
(57, 2023, 'COMPS', 'LAB_Writeups', 'Academic_Records/linksdata/64b0f758021ac_vat-colloqial.pdf', 'vat-colloqial.pdf', '2023-07-14', 'Latha', 4, 'Mini Project');

-- --------------------------------------------------------

--
-- Table structure for table `subjectdata`
--

CREATE TABLE `subjectdata` (
  `Semester` int(11) DEFAULT NULL,
  `Branch` varchar(50) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjectdata`
--

INSERT INTO `subjectdata` (`Semester`, `Branch`, `Subject`, `Year`) VALUES
(1, 'COMPS', 'Applied Mathematics 1', 2023),
(1, 'COMPS', 'Engineering Chemistry', 2023),
(1, 'COMPS', 'Engineering Drawing', 2023),
(1, 'COMPS', 'Elements of Electrical and Electronics Engineering', 2023),
(1, 'COMPS', 'Programming in C', 2023),
(1, 'COMPS', 'Workshop-1', 2023),
(2, 'COMPS', 'Applied Mathematics 2', 2023),
(2, 'COMPS', 'Engineering Physics', 2023),
(2, 'COMPS', 'Engineering Mechanics', 2023),
(2, 'COMPS', 'Programming in Python', 2023),
(2, 'COMPS', 'Workshop-2', 2023),
(3, 'COMPS', 'Integral Transfer and Vector Calculus', 2023),
(3, 'COMPS', 'Data Structures', 2023),
(3, 'COMPS', 'Computer Organization and Architecture', 2023),
(3, 'COMPS', 'Object Oriented Programming Methodology', 2023),
(3, 'COMPS', 'Discrete Mathematics', 2023),
(3, 'COMPS', 'Digital Design', 2023),
(4, 'COMPS', 'Probability, Statistics and Optimizations Techniques', 2023),
(4, 'COMPS', 'Analysis of Algorithms', 2023),
(4, 'COMPS', 'Relational Database Management Systems', 2023),
(4, 'COMPS', 'Theory of Automata and Compiler Design', 2023),
(4, 'COMPS', 'Web Programming', 2023),
(4, 'COMPS', 'Mini Project', 2023),
(5, 'COMPS', 'Software Engineering', 2023),
(5, 'COMPS', 'Computer Networks', 2023),
(5, 'COMPS', 'Operating System', 2023),
(5, 'COMPS', 'Departmental Elective-I', 2023),
(5, 'COMPS', 'OET', 2023),
(5, 'COMPS', 'OEHM', 2023),
(5, 'COMPS', 'Full Stack Development Lab', 2023),
(6, 'COMPS', 'Digital Signal & Image Processing', 2023),
(6, 'COMPS', 'Information Security', 2023),
(6, 'COMPS', 'Artificial Intelligence', 2023),
(6, 'COMPS', 'Departmental Elective', 2023),
(6, 'COMPS', 'OET', 2023),
(6, 'COMPS', 'OEHM', 2023),
(1, 'IT', 'Applied Mathematics 1', 2023),
(1, 'IT', 'Engineering Chemistry', 2023),
(1, 'IT', 'Engineering Drawing', 2023),
(1, 'IT', 'Elements of Electrical and Electronics Engineering', 2023),
(1, 'IT', 'Programming in C', 2023),
(1, 'IT', 'Workshop-1', 2023),
(2, 'IT', 'Applied Mathematics 2', 2023),
(2, 'IT', 'Engineering Physics', 2023),
(2, 'IT', 'Engineering Mechanics', 2023),
(2, 'IT', 'Programming in Python', 2023),
(2, 'IT', 'Workshop-2', 2023),
(3, 'IT', 'Applied Mathematics 3', 2023),
(3, 'IT', 'Data Structures', 2023),
(3, 'IT', 'Data Communication and Network', 2023),
(3, 'IT', 'Database Management System', 2023),
(3, 'IT', 'Programming Language', 2023),
(4, 'IT', 'Applied Mathematics 4', 2023),
(4, 'IT', 'Information Theory and Coding', 2023),
(4, 'IT', 'Advanced Databases', 2023),
(4, 'IT', 'Web Programming-I', 2023),
(4, 'IT', 'Competitive Programming Language', 2023),
(5, 'IT', 'Theory Of Computation', 2023),
(5, 'IT', 'Operation System', 2023),
(5, 'IT', 'Information and Network Security', 2023),
(5, 'IT', 'Department Elective-I', 2023),
(5, 'IT', 'Web Programming-II Lab', 2023),
(5, 'IT', 'OET', 2023),
(5, 'IT', 'OEHM', 2023),
(6, 'IT', 'Object Oriented Software Engineering', 2023),
(6, 'IT', 'Modeling and Simulation', 2023),
(6, 'IT', 'Cloud Computing', 2023),
(6, 'IT', 'Departmental Elective', 2023),
(6, 'IT', 'OET', 2023),
(6, 'IT', 'OEHM', 2023),
(1, 'ETRX', 'Applied Mathematics 2', 2023),
(1, 'ETRX', 'Engineering Physics', 2023),
(1, 'ETRX', 'Engineering Mechanics', 2023),
(1, 'ETRX', 'Programming in Python', 2023),
(1, 'ETRX', 'Workshop-2', 2023),
(2, 'ETRX', 'Applied Mathematics 1', 2023),
(2, 'ETRX', 'Engineering Chemistry', 2023),
(2, 'ETRX', 'Engineering Drawing', 2023),
(2, 'ETRX', 'Elements of Electrical and Electronics Engineering', 2023),
(2, 'ETRX', 'Programming in C', 2023),
(2, 'ETRX', 'Workshop-1', 2023),
(3, 'ETRX', 'Mathematics for Electronics Engineering-I', 2023),
(3, 'ETRX', 'Electrical Networks', 2023),
(3, 'ETRX', 'Basic of Electronics Circuit', 2023),
(3, 'ETRX', 'Digital Electronics', 2023),
(3, 'ETRX', 'Signals and Systems', 2023),
(3, 'ETRX', 'Programming Laboratory', 2023),
(4, 'ETRX', 'Mathematics for Electronics Engineering-II', 2023),
(4, 'ETRX', 'Analog Electronics Circuits', 2023),
(4, 'ETRX', 'Control System Engineering', 2023),
(4, 'ETRX', 'Analog and Digital Communication', 2023),
(4, 'ETRX', 'Microcontroller and Applications', 2023),
(4, 'ETRX', 'Designing with Programmable Logic Lab Course', 2023),
(5, 'ETRX', 'Electromagnetic Engineering', 2023),
(5, 'ETRX', 'Digital Signal Processing', 2023),
(5, 'ETRX', 'Power Electronics', 2023),
(5, 'ETRX', 'Department Elective-I', 2023),
(5, 'ETRX', 'OET', 2023),
(5, 'ETRX', 'OEHM', 2023),
(5, 'ETRX', 'Virtual Instrumentation and Industrial Automation Lab Course', 2023),
(6, 'ETRX', 'Basics of VLSI', 2023),
(6, 'ETRX', 'Analog Integrated Circuits and Applications', 2023),
(6, 'ETRX', 'Introduction to Automation and Mechatronics', 2023),
(6, 'ETRX', 'Department Elective-II', 2023),
(6, 'ETRX', 'OET', 2023),
(6, 'ETRX', 'OEHM', 2023),
(1, 'EXTC', 'Applied Mathematics 2', 2023),
(1, 'EXTC', 'Engineering Physics', 2023),
(1, 'EXTC', 'Engineering Mechanics', 2023),
(1, 'EXTC', 'Programming in Python', 2023),
(1, 'EXTC', 'Workshop-2', 2023),
(2, 'EXTC', 'Applied Mathematics 1', 2023),
(2, 'EXTC', 'Engineering Chemistry', 2023),
(2, 'EXTC', 'Engineering Drawing', 2023),
(2, 'EXTC', 'Elements of Electrical and Electronics Engineering', 2023),
(2, 'EXTC', 'Programming in C', 2023),
(2, 'EXTC', 'Workshop-1', 2023),
(3, 'EXTC', 'Mathematics for Communication Engineering I', 2023),
(3, 'EXTC', 'Basic Electronic Circuits', 2023),
(3, 'EXTC', 'Digital Logic Design', 2023),
(3, 'EXTC', 'Microprocessor and Microcontroller', 2023),
(3, 'EXTC', 'Electrical Network Theory', 2023),
(3, 'EXTC', 'Data Structures and Analysis of Algorithms Laboratory', 2023),
(4, 'EXTC', 'Mathematics for Communication Engineering II', 2023),
(4, 'EXTC', 'Analog Electronics', 2023),
(4, 'EXTC', 'Communication Systems', 2023),
(4, 'EXTC', 'Signals and Systems', 2023),
(4, 'EXTC', 'Electromagnetic Field Theory', 2023),
(4, 'EXTC', 'Hardware Description Language Laboratory', 2023),
(5, 'EXTC', 'Digital Communication', 2023),
(5, 'EXTC', 'RF Filters and Antennas', 2023),
(5, 'EXTC', 'Digital Signal Processing', 2023),
(5, 'EXTC', 'Departmental Elective-I', 2023),
(5, 'EXTC', 'OET', 2023),
(5, 'EXTC', 'OEHM', 2023),
(5, 'EXTC', 'Advanced Microcontroller Laboratory', 2023),
(6, 'EXTC', 'Wireless Communication', 2023),
(6, 'EXTC', 'Computer Communication Networks', 2023),
(6, 'EXTC', 'Optical fibre Communication', 2023),
(6, 'EXTC', 'Departmental Elective-II', 2023),
(6, 'EXTC', 'OET', 2023),
(6, 'EXTC', 'OEHM', 2023),
(1, 'MECH', 'Applied Mathematics 2', 2023),
(1, 'MECH', 'Engineering Physics', 2023),
(1, 'MECH', 'Engineering Mechanics', 2023),
(1, 'MECH', 'Programming in Python', 2023),
(1, 'MECH', 'Workshop-2', 2023),
(2, 'MECH', 'Applied Mathematics 1', 2023),
(2, 'MECH', 'Engineering Chemistry', 2023),
(2, 'MECH', 'Engineering Drawing', 2023),
(2, 'MECH', 'Elements of Electrical and Electronics Engineering', 2023),
(2, 'MECH', 'Programming in C', 2023),
(2, 'MECH', 'Workshop-1', 2023),
(3, 'MECH', 'Mathematics for Mechanical Engineering-I', 2023),
(3, 'MECH', 'Strength of Materials', 2023),
(3, 'MECH', 'Material science and metallurgy', 2023),
(3, 'MECH', 'Thermodynamics', 2023),
(3, 'MECH', 'Production Engineering-I', 2023),
(3, 'MECH', 'Computer Aided Machine Drawing Laboratory', 2023),
(3, 'MECH', 'Machine Shop Practice-I', 2023),
(4, 'MECH', 'Mathematics for Mechanical Engineering-II', 2023),
(4, 'MECH', 'Theory of Machines-I', 2023),
(4, 'MECH', 'Fluid Mechanics', 2023),
(4, 'MECH', 'Production Engineering-II', 2023),
(4, 'MECH', 'Heat and Mass Transfer', 2023),
(4, 'MECH', 'Machine Shop practice-II', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `sno` int(11) NOT NULL,
  `Emailid` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Type` text NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`sno`, `Emailid`, `Password`, `Type`, `name`) VALUES
(1, 'admin@somaiya.edu', 'admin123', 'admin', 'admin'),
(2, 'teacher@somaiya.edu', 'teacher123', 'teacher', 'Latha'),
(3, 'student@somaiya.edu', 'student123', 'student', 'Bhavya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `linksdata`
--
ALTER TABLE `linksdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `linksdata`
--
ALTER TABLE `linksdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `userdata` ADD COLUMN `sno` int AUTO_INCREMENT PRIMARY KEY;