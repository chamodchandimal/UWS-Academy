-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 03:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `sid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `timing` varchar(20) NOT NULL,
  `eid` varchar(14) NOT NULL,
  `batch` varchar(30) NOT NULL,
  `status` varchar(5) NOT NULL,
  `center` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `sid`, `date`, `timing`, `eid`, `batch`, `status`, `center`, `course`, `subject`) VALUES
(1, 'ST1000', '2022-07-20', '08.a.m-12.p.m', 'E10007', '2022 Combine Maths', 'p', 'Maths', 'Maths', 'Combined Maths'),
(2, 'ST1003', '2022-07-21', '08.a.m-12.p.m', 'E10009', '2022 Technology', 'p', '', 'Technology', 'Engineering Technology');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `batch` varchar(30) NOT NULL,
  `mentor` varchar(10) NOT NULL,
  `timings` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL DEFAULT '2022',
  `course` varchar(10) NOT NULL,
  `center` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch`, `mentor`, `timings`, `year`, `course`, `center`) VALUES
(1, '2022 Combine Maths', 'E10001', '8.a.m.-10a.m', '2022', 'Maths', 'Maths'),
(6, '2022 Bio', 'E10002', '10.a.m-12.p.m.', '2022', 'Biology', 'Bio'),
(7, '2022 O/L', '', '9.a.m-11.a.m', '2022', 'English', ''),
(8, '2022 A/L', '', '9.a.m-12.p.m', '2022', 'English', ''),
(9, '2022 Technology', '', '08.a.m-12.p.m', '2022', 'Technology', '');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

DROP TABLE IF EXISTS `centers`;
CREATE TABLE `centers` (
  `id` int(11) NOT NULL,
  `center` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `dateofbuild` date NOT NULL,
  `admin` varchar(20) NOT NULL,
  `coures` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `center`, `location`, `dateofbuild`, `admin`, `coures`) VALUES
(2, 'Maths', '2nd Floor 1st Room', '2022-07-20', 'E10001', 'Maths'),
(4, 'Bio', '', '2022-07-22', 'E10002', 'Bio');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `class` varchar(30) NOT NULL,
  `center` varchar(10) NOT NULL,
  `mentor` varchar(10) NOT NULL,
  `timing` varchar(20) NOT NULL,
  `dateofreg` date NOT NULL,
  `dateofleft` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sid`, `fname`, `lname`, `email`, `phone`, `address`, `fee`, `status`, `course`, `batch`, `class`, `center`, `mentor`, `timing`, `dateofreg`, `dateofleft`) VALUES
(1, 'ST1000', 'Nimesha', 'Kalhari', 'nimesha@gmail.com', '0784318255', 'Galpalama, Anuradhapura', '1000', 'yes', 'Maths', '2022 Combine Maths', 'Combined M', 'Maths', 'E10001', '8.am.-12.p.m', '2022-07-20', '0000-00-00'),
(13, 'ST1001', 'Manula', 'Prabath', 'manula@gmail.com', '0769753128', 'Anuradhapura', '1000', 'yes', 'Maths', '2022 Combine Maths', 'Combined Maths', 'Maths', 'E10001', '8.a.m.-10a.m', '2022-07-20', '0000-00-00'),
(14, 'ST1002', 'Ranudi', 'Sadamini', 'ranudi@gmail.com', '0789547853', 'Nelumkulama,Anuradhapura', '1000', 'yes', 'Maths', '2022 Combine Maths', 'Combined Maths', 'Maths', 'E10001', '8.a.m.-10a.m', '2022-07-20', '0000-00-00'),
(15, 'ST1003', 'Eranda', 'Dissanayake', 'eranda@gmail.com', '0749578315', 'Thisawewa, Anuradhapura', '1000', 'yes', 'Technology', '2022 Technology', '', '', '', '08.a.m-12.p.m', '2022-07-21', '0000-00-00'),
(16, 'ST1004', 'Buddhini', 'Nayanadarshi', 'buddhini@gmail.com', '0769574986', 'Anuradhapura', '1000', 'yes', 'Biology', '2022 Bio', 'Bio', 'Bio', 'E10002', '10.a.m-12.p.m.', '2022-07-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `position` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `course` varchar(20) NOT NULL,
  `center` varchar(20) NOT NULL,
  `dateofjoining` date NOT NULL,
  `batchmentor` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `eid`, `fname`, `lname`, `email`, `mobile`, `address`, `position`, `subject`, `course`, `center`, `dateofjoining`, `batchmentor`, `status`) VALUES
(1, 'E10000', 'Chamod ', 'Chandimal', 'chamod@uwsacademy.com', '0766666666', 'Thisawewa,Anuradhapura', 'sadmin', '', '', '', '2022-07-20', '', 'yes'),
(3, 'E10001', 'Sajith ', 'Malinda', 'sajith@uwsacademy.com', '0711234567', 'Madawachchiya, Anuradhapura', 'mentor', '', 'Maths', 'Maths', '2022-07-20', '2022', 'yes'),
(4, 'E10002', 'Nadula', 'Upeksha', 'nadula@uwsacademy.com', '0781234567', 'Mihinthayala, Anuradhapura', 'mentor', '', 'Biology', 'Bio', '2022-07-20', '2022 Bio', 'yes'),
(5, 'E10003', 'Daham ', 'Nethsara', 'daham@uwsacademy.com', '0717954268', 'New bus stand, Anuradhapura', 'admin', '', 'Technology', '', '2022-07-20', '', 'yes'),
(6, 'E10004', 'Nethun', 'Pehesara', 'nethun@uwsadademy.com', '0769741355', 'Dahaiyagama handiya, Anuradhapura', 'admin', '', 'English', '', '2022-07-20', '', 'yes'),
(7, 'E10005', 'Gayan ', 'Chandrasekara', 'gayan@uwsacademy.com', '0714479390', 'Anuradhapura', 'teacher', 'Combined Maths', 'Maths', 'Maths', '2022-07-20', '', 'yes'),
(8, 'E10006', 'Sunil', 'Dharmasiri', 'sunil@uwsacademy.com', '0717996958', 'Anuradhapura', 'teacher', 'Physics', 'Maths', 'Maths', '2022-07-20', '', 'yes'),
(9, 'E10007', 'Kaveendra', 'Dissanayake', 'kaveendra@uwsacademy.com', '0717301844', 'Mihinthala handiya,Anuradhapura', 'teacher', 'Chemistry', 'Maths', 'Maths', '2022-07-20', '', 'yes'),
(10, 'E10008', 'Viraj', 'Senarathna', 'sunil@uwsacademy.com', '0710598672', 'Anuradhapura', 'teacher', 'Biology', 'Biology', '', '2022-07-20', '', 'yes'),
(11, 'E10009', 'Venuri', 'Rathnasuriya', 'venuri@uwsacademy.com', '0713537390', 'Anuradhapura', 'teacher', 'Engineering Technology', 'Technology', '', '2022-07-20', '', 'yes'),
(12, 'E10010', 'Indrachapa', 'Bandara', 'indrachapa@uwsacademy.com', '0710109440', 'Anuradhapura', 'teacher', 'Science For Technology', 'Technology', '', '2022-07-20', '', 'yes'),
(13, 'E10011', 'Thashmi', 'Rathnayake', 'thashmi@uwsacademy.com', '0718308686', 'Anuradhapura', 'teacher', 'ICT', 'Technology', '', '2022-07-20', '', 'yes'),
(14, 'E10012', 'Sanduni', 'Ranasinghe', 'sanduni@uwsacademy.com', '076202239', 'Anuradhapura', 'teacher', 'English', 'English', '', '2022-07-20', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tea_attendance`
--

DROP TABLE IF EXISTS `tea_attendance`;
CREATE TABLE `tea_attendance` (
  `id` int(11) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `timetocome` varchar(20) NOT NULL,
  `timetogo` varchar(20) NOT NULL,
  `bywhom` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `center` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tea_attendance`
--

INSERT INTO `tea_attendance` (`id`, `eid`, `date`, `timetocome`, `timetogo`, `bywhom`, `status`, `center`, `course`) VALUES
(1, 'E10009', '2022-07-21', '8.00 a.m', '12.00 p.m', 'E10003', 'p', '', 'Technology'),
(2, 'E10014', '2022-07-21', '', '', 'E10013', 'p', 'ART', 'ART');

-- --------------------------------------------------------

--
-- Table structure for table `tea_batche`
--

DROP TABLE IF EXISTS `tea_batche`;
CREATE TABLE `tea_batche` (
  `id` int(11) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `center` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tea_batche`
--

INSERT INTO `tea_batche` (`id`, `batch`, `eid`, `subject`, `center`, `course`) VALUES
(1, '2022', 'E10005', 'Combined Maths', 'Maths', 'Maths'),
(2, '2022', 'E10006', 'Physics', 'Maths', 'Maths'),
(3, '2020 Com.m', 'E10006', 'Physics', 'Maths', 'Maths'),
(4, '2022 Combi', 'E10005', 'Combined Maths', 'Maths', 'Maths'),
(5, 'ART', 'E10014', 'ART', 'ART', 'ART'),
(6, '2022 Bio', 'E10008', '', '', 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `center` varchar(20) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `timing` varchar(20) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `center`, `batch`, `subject`, `timing`, `eid`, `day`, `course`) VALUES
(1, 'Maths', '2022 Combine Maths', 'Combined Maths', '08.am.-12.p.m', 'E10005', 'Monday', 'Maths'),
(2, 'Bio', '2022 Bio', 'Biology', '08.a.m-12.p.m', 'E10008', 'Monday', 'Biology'),
(3, 'Maths', '2022 Combine Maths', 'Physics', '08.a.m-12.p.m', 'E10006', 'Tuesday', 'Maths'),
(4, 'Maths', '2022 Combine Maths', 'Chemistry', '08.a.m-12.p.m', 'E10007', 'Wednesday', 'Maths'),
(5, '', '2022 Technology', 'Science For Technology', '08.a.m-12.p.m', 'E10010', 'Monday', 'Technology'),
(6, '', '2022 Technology', 'Engineering Technology', '08.a.m-12.p.m', 'E10009', 'Thursday', 'Technology'),
(7, '', '2022 Technology', 'ICT', '08.a.m-12.p.m', 'E10010', 'Saturday', 'Technology'),
(8, '', '2022 O/L', 'English O/L', '03.p.m.-06.p.m', 'E10012', 'Monday', 'English'),
(9, '', '2022 A/L', 'English A/L', '01.p.m.-5.00.p.m.', 'E10012', 'Tuesday', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'E10000', 'E10000', 'sadmin'),
(3, 'E10001', 'E10001', 'admin'),
(4, 'E10002', 'E10002', 'admin'),
(5, 'E10003', 'E10003', 'admin'),
(6, 'E10004', 'E10004', 'admin'),
(7, 'E10005', 'E10005', 'teacher'),
(8, 'E10006', 'E10006', 'teacher'),
(9, 'E10007', 'E10007', 'teacher'),
(10, 'ST1000', 'ST1000', 'student'),
(11, 'E10008', 'E10008', 'teacher'),
(12, 'E10009', 'E10009', 'teacher'),
(13, 'E10010', 'E10010', 'teacher'),
(14, 'E10011', 'E10011', 'teacher'),
(15, 'E10012', 'E10012', 'teacher'),
(16, 'ST1001', 'ST1001', 'student'),
(17, 'ST1002', 'ST1002', 'student'),
(18, 'ST1003', 'ST1003', 'student'),
(19, 'ST1004', 'ST1004', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `batch` (`batch`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eid` (`eid`);

--
-- Indexes for table `tea_attendance`
--
ALTER TABLE `tea_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tea_batche`
--
ALTER TABLE `tea_batche`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tea_attendance`
--
ALTER TABLE `tea_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tea_batche`
--
ALTER TABLE `tea_batche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
