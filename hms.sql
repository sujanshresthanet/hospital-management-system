-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2022 at 08:40 PM
-- Server version: 5.7.38-0ubuntu0.18.04.1
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 06:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 'Demo test', 7, 6, 600, '2019-06-29', '9:15 AM', '2019-06-23 18:31:28', 1, 0, '0000-00-00 00:00:00'),
(4, 'Ayurveda', 5, 5, 8050, '2019-11-08', '1:00 PM', '2019-11-05 10:28:54', 1, 1, '0000-00-00 00:00:00'),
(5, 'Dermatologist', 9, 7, 500, '2019-11-30', '5:30 PM', '2019-11-10 18:41:34', 1, 0, '2019-11-10 18:48:30'),
(6, 'Ayurveda', 5, 2, 8050, '123231', '12323', '2022-06-12 04:29:23', 0, 1, '2022-06-12 16:28:01'),
(7, 'Dermatologist', 9, 2, 500, '2022-06-15', '23:11', '2022-06-12 16:26:06', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Dentist', 'Test Doctor', 'New York', '500', 8285703354, 'test@doctor.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:31:38'),
(2, 'Homeopath', 'Test Doctor1', 'New York', '600', 2147483647, 'test@test.com2', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 01:08:09'),
(3, 'General Physician', 'Test Doctor2', 'New York', '1200', 8523699999, 'test@test.com3', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 01:08:09'),
(4, 'Homeopath', 'Test Doctor3', 'New York', '700', 25668888, 'test@test.com4', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:30:07'),
(5, 'Ayurveda', 'Test Doctor4', 'New York', '8050', 442166644646, 'test@test.com5', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:30:13'),
(6, 'General Physician', 'Test Doctor5', 'New York', '2500', 45497964, 'test@test.com6', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:30:15'),
(7, 'Demo test', 'Test Doctor6', 'New York', '200', 852888888, 'test@test.com7', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:30:17'),
(8, 'Ayurveda', 'Test Doctor7', 'New York', '600', 1234567890, 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:30:19'),
(9, 'Dermatologist', 'Test Doctor8', 'New York', '500', 1234567890, 'test@test.com8', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(20, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-09 06:00:27', '09-06-2022 11:30:46 AM', 1),
(21, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-12 02:03:44', NULL, 0),
(22, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-12 02:04:13', NULL, 1),
(23, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-12 02:14:21', '12-06-2022 08:35:44 AM', 1),
(24, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-12 03:06:06', '12-06-2022 09:31:42 AM', 1),
(25, NULL, '', 0x3a3a3100000000000000000000000000, '2022-06-12 04:05:16', NULL, 0),
(26, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-12 04:07:59', NULL, 0),
(27, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-12 04:08:09', '12-06-2022 09:38:39 AM', 1),
(28, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-12 14:33:16', '12-06-2022 08:03:43 PM', 1),
(29, NULL, 'test@dmo.com', 0x3a3a3100000000000000000000000000, '2022-06-12 17:21:14', NULL, 0),
(30, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 17:21:28', NULL, 0),
(31, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-12 17:21:40', NULL, 0),
(32, NULL, 'test@test.com', 0x3a3a3100000000000000000000000000, '2022-06-12 17:22:36', NULL, 0),
(33, 1, 'test@test.com1', 0x3a3a3100000000000000000000000000, '2022-06-12 17:22:50', NULL, 1),
(34, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:26:19', NULL, 0),
(35, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:26:31', NULL, 0),
(36, 1, 'test@test.com1', 0x3a3a3100000000000000000000000000, '2022-06-13 13:26:55', '13-06-2022 07:15:24 PM', 1),
(37, 1, 'test@doctor.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:45:51', '13-06-2022 07:15:57 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 06:37:25', '0000-00-00 00:00:00'),
(2, 'General Physician', '2016-12-28 06:38:12', '0000-00-00 00:00:00'),
(3, 'Dermatologist', '2016-12-28 06:38:48', '0000-00-00 00:00:00'),
(4, 'Homeopath', '2016-12-28 06:39:26', '0000-00-00 00:00:00'),
(5, 'Ayurveda', '2016-12-28 06:39:51', '0000-00-00 00:00:00'),
(6, 'Dentist', '2016-12-28 06:40:08', '0000-00-00 00:00:00'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 06:41:18', '0000-00-00 00:00:00'),
(9, 'Demo test', '2016-12-28 07:37:39', '0000-00-00 00:00:00'),
(10, 'Bones Specialist demo', '2017-01-07 08:07:53', '0000-00-00 00:00:00'),
(11, 'Test', '2019-06-23 17:51:06', '2019-06-23 17:55:06'),
(12, 'Dermatologist', '2019-11-10 18:36:36', '2019-11-10 18:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'test user', 'test@gmail.com', 2523523522523523, ' This is sample text for the test.', '2022-06-13 01:08:09', 'Test Admin Remark', '2022-06-13 01:08:09', 1),
(2, 'Test user 1', 'test@testing.com', 1111111111111111, ' This is sample text for testing.  This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing.', '2022-06-13 01:08:09', NULL, '2022-06-13 01:08:09', NULL),
(3, 'Test user2', 'test1@testing.com', 3264826346, 'sample text   sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  ', '2022-06-13 01:08:09', 'vfdsfgfd', '2022-06-13 01:08:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(2, 3, '120/185', '80/120', '85 Kg', '101 degree', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '2019-11-06 04:20:07'),
(3, 2, '90/120', '92/190', '86 kg', '99 deg', '#Sugar High\r\n1.Petz 30', '2019-11-06 04:31:24'),
(4, 1, '125/200', '86/120', '56 kg', '98 deg', '# blood pressure is high\r\n1.koil cipla', '2019-11-06 04:52:42'),
(5, 1, '96/120', '98/120', '57 kg', '102 deg', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '2019-11-06 04:56:55'),
(6, 4, '90/120', '120', '56', '98 F', '#blood sugar high\r\n#Asthma problem', '2019-11-06 14:38:33'),
(7, 5, '80/120', '120', '85', '98.6', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '2019-11-10 18:50:23'),
(8, 3, 'Aut ullam nesciunt ', 'Et irure nisi nulla ', 'Velit quia fuga Qui', 'Esse facere velit sa', 'Tempore esse qui di', '2022-06-12 03:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Test Patient', 4558968789, 'test@gmail.com', 'Female', 'New York', 26, 'She is diabetic patient', '2022-06-13 01:08:09', '2022-06-13 13:30:51'),
(2, 5, 'Test Patient1', 9797977979, 'test1@gmail.com', 'Male', 'New York', 39, 'No', '2022-06-13 01:08:09', '2022-06-13 13:30:54'),
(3, 7, 'Test Patient2', 9878978798, 'test2@gmail.com', 'Female', 'New York', 46, 'No', '2022-06-13 01:08:09', '2022-06-13 13:30:56'),
(4, 7, 'Test Patient3', 9888988989, 'test3@gmail.com', 'Male', 'New York', 45, 'He is long suffered by asthma', '2022-06-13 01:08:09', '2022-06-13 13:30:58'),
(5, 9, 'Test Patient4', 1234567890, 'test4@gmail.com', 'male', 'Test ', 25, 'THis is sample text for testing.', '2022-06-13 01:08:09', '2022-06-13 13:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:12:49', '13-06-2022 06:43:08 PM', 1),
(2, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:13:15', NULL, 0),
(3, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:13:27', NULL, 0),
(4, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:13:36', NULL, 0),
(5, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:14:54', '13-06-2022 06:54:23 PM', 1),
(6, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:25:24', '13-06-2022 06:55:52 PM', 1),
(7, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:26:02', '13-06-2022 06:56:06 PM', 1),
(8, 2, 'test@user.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:45:34', '13-06-2022 07:15:39 PM', 1),
(9, 6, 'bofileqe@mailinator.com', 0x3a3a3100000000000000000000000000, '2022-06-13 13:47:57', '13-06-2022 07:18:02 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(2, 'Test User', 'US', 'New york', 'female', 'test@user.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:31:23'),
(3, 'Test User1', 'US', 'New york', 'male', 'test1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:29:31'),
(4, 'Test User1', 'US', 'New york', 'male', 'test2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:29:32'),
(5, 'Test User2', 'US', 'New york', 'male', 'test2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-06-13 01:08:09', '2022-06-13 13:29:34'),
(6, 'Hoyt Drake', 'Dolore aute mollit e', 'Voluptas quas natus ', 'female', 'bofileqe@mailinator.com', 'b916810cd9a5e9689ce64de6223d3da3', '2022-06-13 13:47:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
