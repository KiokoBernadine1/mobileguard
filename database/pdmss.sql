-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2023 at 11:46 AM
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
-- Database: `MobileGuard`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `adminid` int(10) NOT NULL,
  `firstname` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `clientid` int(10) NOT NULL,
  `clientname` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`clientid`, `clientname`, `email`, `description`, `updated_at`) VALUES
(1, 'SARO LABS', 'info@sarolabs.io', 'Company provides software solutions using efficient tech stacks', '2023-07-04 20:08:13'),
(2, 'Kabarak_University', 'info@kabarak.ac.ke', 'Client provides services in higher education/research', '2023-07-05 04:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `CodeAnalysis`
--

CREATE TABLE `CodeAnalysis` (
  `analysisid` int(11) NOT NULL,
  `result` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CodeAnalysis`
--

INSERT INTO `CodeAnalysis` (`analysisid`, `result`, `updated_at`) VALUES
(1, 'Passed unit tests', '2023-07-30 07:10:55'),
(2, 'AB Testing passed', '2023-07-30 08:13:53'),
(3, 'Validation tests passed', '2023-07-30 08:16:15'),
(4, 'Project C Failed Quality Checks', '2023-07-30 09:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `commentid` int(10) NOT NULL,
  `comment_text` text DEFAULT NULL,
  `taskid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`commentid`, `comment_text`, `taskid`, `userid`, `updated_at`) VALUES
(1, 'The files should be sent', 1, 2, '2023-07-06 23:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `ComplianceRecords`
--

CREATE TABLE `ComplianceRecords` (
  `recordid` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `completiondate` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ComplianceRecords`
--

INSERT INTO `ComplianceRecords` (`recordid`, `description`, `completiondate`, `updated_at`) VALUES
(1, 'Project A needs to complete quality assurance checks', '2023-07-30', '2023-07-30 07:15:29'),
(2, 'Description of the compliance activity.', '2023-07-30', '2023-07-30 09:27:52'),
(3, 'Project A requires a level B Quality Assurance Officer', '2023-07-30', '2023-07-30 09:30:11'),
(4, 'Project B requires a redo on documentation', '2023-07-13', '2023-07-30 09:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `IncidentResponsePlan`
--

CREATE TABLE `IncidentResponsePlan` (
  `planid` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `IncidentResponsePlan`
--

INSERT INTO `IncidentResponsePlan` (`planid`, `description`, `updated_at`) VALUES
(1, 'Project A needs to complete unit tests to test database integrity ', '2023-07-30 07:14:12'),
(2, 'Project B needs analysis on MySQL Injection', '2023-07-30 09:06:45'),
(3, 'Project C requires AB Testing', '2023-07-30 09:09:27'),
(4, 'Project C has quality issues on core API', '2023-07-30 09:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `Permission`
--

CREATE TABLE `Permission` (
  `permissionid` int(10) NOT NULL,
  `permissionname` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Permission`
--

INSERT INTO `Permission` (`permissionid`, `permissionname`, `description`, `updated_at`) VALUES
(1, 'View Project', 'Read only of projects is allowed', '2023-07-06 22:00:28'),
(2, 'Edit Project', 'Edit permissions for the project', '2023-07-06 22:06:45'),
(3, 'Create Task', 'Create task permission', '2023-07-06 22:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
  `projectid` int(10) NOT NULL,
  `projectname` text DEFAULT NULL,
  `startdate` text DEFAULT NULL,
  `enddate` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `userid` int(10) NOT NULL,
  `clientid` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`projectid`, `projectname`, `startdate`, `enddate`, `description`, `status`, `userid`, `clientid`, `updated_at`) VALUES
(1, 'Project01', '05/07/2023', '06/07/2023', 'Description01', 'Complete', 1, 2, '2023-07-05 06:10:15'),
(2, 'Pesa Play', '2023-07-05', '2023-08-01', 'Algorithm for a gambling game', 'Pending', 2, 1, '2023-07-05 06:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `Releases`
--

CREATE TABLE `Releases` (
  `releaseid` int(11) NOT NULL,
  `version` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Releases`
--

INSERT INTO `Releases` (`releaseid`, `version`, `status`, `updated_at`) VALUES
(1, '1.0.3.5f', 'Deployed', '2023-07-30 07:11:29'),
(2, '1.4', 'Pending', '2023-07-30 08:40:40'),
(3, 'Project A Version 3.0.7bf', 'Deployed', '2023-07-30 08:43:24'),
(4, 'Project C Version 4.9.5.5hv', 'Pending', '2023-07-30 09:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `roleid` int(10) NOT NULL,
  `rolename` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`roleid`, `rolename`, `description`, `updated_at`) VALUES
(1, 'System_Tester', 'Testing the system components', '2023-07-04 20:17:34'),
(5, 'Quality Assuarance', 'Asses the quality of the project at different stages', '2023-07-03 21:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `Task`
--

CREATE TABLE `Task` (
  `taskid` int(10) NOT NULL,
  `taskname` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `startdate` text DEFAULT NULL,
  `enddate` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `projectid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Task`
--

INSERT INTO `Task` (`taskid`, `taskname`, `description`, `startdate`, `enddate`, `status`, `projectid`, `userid`, `updated_at`) VALUES
(1, 'Edit UI Frames', 'Edit the structure of the component manager', '07/07/2023', '07/07/2023', 'Complete', 2, 2, '2023-07-06 21:18:57'),
(2, 'Develop the payment gateway', 'Complete the API for receiving and sending payments', '2023-07-07', '2023-07-13', 'Pending', 2, 2, '2023-07-06 21:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userid` int(10) NOT NULL,
  `firstname` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `roleid` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userid`, `firstname`, `lastname`, `email`, `password`, `roleid`, `updated_at`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', 'qwerty123', 5, '2023-07-04 14:36:35'),
(2, 'Hillary', 'Chesaro', 'hillches@gmail.com', '$2y$10$ftDAAoOB06rmRkjeXLwslOpSDbggmQPyvsLSkDbM1GjlqV5p9Qjg2', 5, '2023-07-04 15:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `User_Project_Permission`
--

CREATE TABLE `User_Project_Permission` (
  `uppid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `projectid` int(10) NOT NULL,
  `permissionid` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User_Project_Permission`
--

INSERT INTO `User_Project_Permission` (`uppid`, `userid`, `projectid`, `permissionid`, `updated_at`) VALUES
(1, 2, 2, 2, '2023-07-06 23:41:48'),
(2, 2, 2, 2, '2023-07-06 23:44:37'),
(3, 2, 1, 1, '2023-07-06 23:45:20'),
(4, 2, 2, 3, '2023-07-07 00:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `User_Task_Permission`
--

CREATE TABLE `User_Task_Permission` (
  `utpid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `taskid` int(10) NOT NULL,
  `permissionid` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User_Task_Permission`
--

INSERT INTO `User_Task_Permission` (`utpid`, `userid`, `taskid`, `permissionid`, `updated_at`) VALUES
(1, 2, 2, 3, '2023-07-07 00:31:04'),
(2, 2, 1, 1, '2023-07-07 00:31:30'),
(3, 2, 1, 2, '2023-07-07 00:36:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `CodeAnalysis`
--
ALTER TABLE `CodeAnalysis`
  ADD PRIMARY KEY (`analysisid`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `FKComment907835` (`taskid`),
  ADD KEY `FKComment638951` (`userid`);

--
-- Indexes for table `ComplianceRecords`
--
ALTER TABLE `ComplianceRecords`
  ADD PRIMARY KEY (`recordid`);

--
-- Indexes for table `IncidentResponsePlan`
--
ALTER TABLE `IncidentResponsePlan`
  ADD PRIMARY KEY (`planid`);

--
-- Indexes for table `Permission`
--
ALTER TABLE `Permission`
  ADD PRIMARY KEY (`permissionid`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`projectid`),
  ADD KEY `project_user_relationship` (`userid`),
  ADD KEY `project_client_relationship` (`clientid`);

--
-- Indexes for table `Releases`
--
ALTER TABLE `Releases`
  ADD PRIMARY KEY (`releaseid`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `Task`
--
ALTER TABLE `Task`
  ADD PRIMARY KEY (`taskid`),
  ADD KEY `project_task_relationship` (`projectid`),
  ADD KEY `user_task_relationship` (`userid`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `user_role_relationship` (`roleid`);

--
-- Indexes for table `User_Project_Permission`
--
ALTER TABLE `User_Project_Permission`
  ADD PRIMARY KEY (`uppid`),
  ADD KEY `FKUser_Proje18186` (`userid`),
  ADD KEY `FKUser_Proje77235` (`projectid`),
  ADD KEY `FKUser_Proje466342` (`permissionid`);

--
-- Indexes for table `User_Task_Permission`
--
ALTER TABLE `User_Task_Permission`
  ADD PRIMARY KEY (`utpid`),
  ADD KEY `FKUser_Task_819923` (`userid`),
  ADD KEY `FKUser_Task_88808` (`taskid`),
  ADD KEY `FKUser_Task_304452` (`permissionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `clientid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CodeAnalysis`
--
ALTER TABLE `CodeAnalysis`
  MODIFY `analysisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `commentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ComplianceRecords`
--
ALTER TABLE `ComplianceRecords`
  MODIFY `recordid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `IncidentResponsePlan`
--
ALTER TABLE `IncidentResponsePlan`
  MODIFY `planid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Permission`
--
ALTER TABLE `Permission`
  MODIFY `permissionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Project`
--
ALTER TABLE `Project`
  MODIFY `projectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Releases`
--
ALTER TABLE `Releases`
  MODIFY `releaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `roleid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Task`
--
ALTER TABLE `Task`
  MODIFY `taskid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `User_Project_Permission`
--
ALTER TABLE `User_Project_Permission`
  MODIFY `uppid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `User_Task_Permission`
--
ALTER TABLE `User_Task_Permission`
  MODIFY `utpid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `FKComment638951` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`),
  ADD CONSTRAINT `FKComment907835` FOREIGN KEY (`taskid`) REFERENCES `Task` (`taskid`);

--
-- Constraints for table `Project`
--
ALTER TABLE `Project`
  ADD CONSTRAINT `project_client_relationship` FOREIGN KEY (`clientid`) REFERENCES `Client` (`clientid`),
  ADD CONSTRAINT `project_user_relationship` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`);

--
-- Constraints for table `Task`
--
ALTER TABLE `Task`
  ADD CONSTRAINT `project_task_relationship` FOREIGN KEY (`projectid`) REFERENCES `Project` (`projectid`),
  ADD CONSTRAINT `user_task_relationship` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_role_relationship` FOREIGN KEY (`roleid`) REFERENCES `Role` (`roleid`);

--
-- Constraints for table `User_Project_Permission`
--
ALTER TABLE `User_Project_Permission`
  ADD CONSTRAINT `FKUser_Proje18186` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`),
  ADD CONSTRAINT `FKUser_Proje466342` FOREIGN KEY (`permissionid`) REFERENCES `Permission` (`permissionid`),
  ADD CONSTRAINT `FKUser_Proje77235` FOREIGN KEY (`projectid`) REFERENCES `Project` (`projectid`);

--
-- Constraints for table `User_Task_Permission`
--
ALTER TABLE `User_Task_Permission`
  ADD CONSTRAINT `FKUser_Task_304452` FOREIGN KEY (`permissionid`) REFERENCES `Permission` (`permissionid`),
  ADD CONSTRAINT `FKUser_Task_819923` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`),
  ADD CONSTRAINT `FKUser_Task_88808` FOREIGN KEY (`taskid`) REFERENCES `Task` (`taskid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
