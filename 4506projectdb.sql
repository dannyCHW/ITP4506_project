-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--  `4506projectdb`
--

-- --------------------------------------------------------

--
--  `admin`
--

CREATE TABLE `admin` (
  `adminID` int(50) NOT NULL,
  `adminUsername` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminActivation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--  `admin`
--

INSERT INTO `admin` (`adminID`, `adminUsername`, `adminPassword`, `adminName`, `adminActivation`) VALUES
(1, 'admin0', 'admin0', 'admin0', 0),
(2, 'admin1', 'admin1', 'adminNo1', 1);

-- --------------------------------------------------------

--
--  `allocation`
--

CREATE TABLE `allocation` (
  `classID` int(50) NOT NULL,
  `studentID` int(50) NOT NULL,
  `allocationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--  `allocationrecord`
--

CREATE TABLE `allocationrecord` (
  `rClassID` int(50) NOT NULL,
  `rStudentID` int(50) NOT NULL,
  `rAllocationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--  `attanence`
--

CREATE TABLE `attanence` (
  `attanenceID` int(50) NOT NULL,
  `attanence_status` varchar(50) NOT NULL,
  `attanence_date` date NOT NULL,
  `updateTime` datetime(6) NOT NULL,
  `classID` int(50) NOT NULL,
  `studentID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--  `attanencerecord`
--

CREATE TABLE `attanencerecord` (
  `rAttanenceID` int(50) NOT NULL,
  `rAttanence_status` varchar(50) NOT NULL,
  `rAttanence_date` date NOT NULL,
  `rUpdateTime` datetime NOT NULL,
  `rClassID` int(50) NOT NULL,
  `rStudentID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--  `class`
--

CREATE TABLE `class` (
  `classID` int(11) NOT NULL,
  `classInfo` varchar(100) DEFAULT NULL,
  `classCode` varchar(50) NOT NULL,
  `schoolYear` varchar(50) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `classDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--  `class`
--

INSERT INTO `class` (`classID`, `classInfo`, `classCode`, `schoolYear`, `teacherID`, `classDate`) VALUES
(3, 'go to Archive', '1A', '2019', 1, '2019-09-01');

-- --------------------------------------------------------

--
--  `classrecord`
--

CREATE TABLE `classrecord` (
  `rClassID` int(50) NOT NULL,
  `rClassInfo` varchar(100) DEFAULT NULL,
  `rClassCode` varchar(50) NOT NULL,
  `rSchoolYear` varchar(50) NOT NULL,
  `rTeacherID` int(50) NOT NULL,
  `rClassDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--  `student`
--

CREATE TABLE `student` (
  `studentID` int(50) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `studentUsername` varchar(50) NOT NULL,
  `studentPassword` varchar(50) NOT NULL,
  `studentInfo` varchar(100) DEFAULT NULL,
  `studentActivation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--  `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `studentUsername`, `studentPassword`, `studentInfo`, `studentActivation`) VALUES
(1, 'student0', 'student0', 'student0', 'i am good student', 0);

-- --------------------------------------------------------

--
--  `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(50) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `teacherPassword` varchar(50) NOT NULL,
  `teacherInfo` varchar(100) NOT NULL,
  `teacherUsername` varchar(50) NOT NULL,
  `teacherActivation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--  `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `teacherPassword`, `teacherInfo`, `teacherUsername`, `teacherActivation`) VALUES
(1, 'teacher0', 'teacher0', 'i am a good teacher', 'teacher0', 0),
(2, 'Mr teacher yo', 'teacheryo', '', 'teacheryo', 0);

--
-- 
--

--
--  `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
--  `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`classID`,`studentID`),
  ADD KEY `FK_studentID_studentID` (`studentID`);

--
--  `allocationrecord`
--
ALTER TABLE `allocationrecord`
  ADD PRIMARY KEY (`rClassID`,`rStudentID`),
  ADD KEY `rStudentID` (`rStudentID`);

--
--  `attanence`
--
ALTER TABLE `attanence`
  ADD PRIMARY KEY (`attanenceID`),
  ADD KEY `FK_studentID_student.studentID` (`studentID`),
  ADD KEY `FK_classID_class.classID` (`classID`);

--
--  `attanencerecord`
--
ALTER TABLE `attanencerecord`
  ADD PRIMARY KEY (`rAttanenceID`),
  ADD KEY `FK_rclassID` (`rClassID`),
  ADD KEY `FK_rStudentID` (`rStudentID`);

--
--  `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`);

--
--  `classrecord`
--
ALTER TABLE `classrecord`
  ADD PRIMARY KEY (`rClassID`);

--
--  `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
--  `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- (AUTO_INCREMENT)
--

--
-- (AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- (AUTO_INCREMENT) `attanence`
--
ALTER TABLE `attanence`
  MODIFY `attanenceID` int(50) NOT NULL AUTO_INCREMENT;

--
-- (AUTO_INCREMENT) `class`
--
ALTER TABLE `class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- (AUTO_INCREMENT) `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- (AUTO_INCREMENT) `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 
--

--
--  `allocation`
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `FK_classID_classID` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`),
  ADD CONSTRAINT `FK_studentID_studentID` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
--  `allocationrecord`
--
ALTER TABLE `allocationrecord`
  ADD CONSTRAINT `allocationrecord_ibfk_1` FOREIGN KEY (`rClassID`) REFERENCES `classrecord` (`rClassID`),
  ADD CONSTRAINT `allocationrecord_ibfk_2` FOREIGN KEY (`rStudentID`) REFERENCES `student` (`studentID`);

--
--  `attanence`
--
ALTER TABLE `attanence`
  ADD CONSTRAINT `FK_classID_class.classID` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`),
  ADD CONSTRAINT `FK_studentID_student.studentID` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
--  `attanencerecord`
--
ALTER TABLE `attanencerecord`
  ADD CONSTRAINT `FK_rStudentID` FOREIGN KEY (`rStudentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `FK_rclassID` FOREIGN KEY (`rClassID`) REFERENCES `classrecord` (`rClassID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
