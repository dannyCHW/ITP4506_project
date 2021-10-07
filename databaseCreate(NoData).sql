
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- : `4506peojectdb`
--

-- --------------------------------------------------------

--
--  `admin`
--

CREATE TABLE `admin` (
  `adminID` int(50) NOT NULL,
  `adminUsername` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
--  `class`
--

CREATE TABLE `class` (
  `classID` int(11) NOT NULL,
  `classInfo` varchar(100) DEFAULT NULL,
  `classCode` varchar(50) NOT NULL,
  `schoolYear` varchar(50) NOT NULL,
  `studentID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL
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
  `studentInfo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
--  `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(50) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `teacherPassword` varchar(50) NOT NULL,
  `teacherInfo` varchar(100) NOT NULL,
  `teacherUsername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--
--

--
--  `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`classID`,`studentID`),
  ADD KEY `FK_studentID_studentID` (`studentID`);

--
--  `attanence`
--
ALTER TABLE `attanence`
  ADD PRIMARY KEY (`attanenceID`),
  ADD KEY `FK_studentID_student.studentID` (`studentID`),
  ADD KEY `FK_classID_class.classID` (`classID`);

--
--  `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`);

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
--
--

--
--
--
ALTER TABLE `admin`
  MODIFY `adminID` int(50) NOT NULL AUTO_INCREMENT;

--
--
--
ALTER TABLE `attanence`
  MODIFY `attanenceID` int(50) NOT NULL AUTO_INCREMENT;

--
--  `class`
--
ALTER TABLE `class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT;

--
--  `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(50) NOT NULL AUTO_INCREMENT;

--
--  `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(50) NOT NULL AUTO_INCREMENT;

--
--
--

--
--
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `FK_classID_classID` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`),
  ADD CONSTRAINT `FK_studentID_studentID` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
--
--
ALTER TABLE `attanence`
  ADD CONSTRAINT `FK_classID_class.classID` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`),
  ADD CONSTRAINT `FK_studentID_student.studentID` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
