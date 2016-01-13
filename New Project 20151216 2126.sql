-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.27


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema moraspirit
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ moraspirit;
USE moraspirit;

--
-- Table structure for table `moraspirit`.`achievement`
--

DROP TABLE IF EXISTS `achievement`;
CREATE TABLE `achievement` (
  `sport_id` varchar(10) NOT NULL DEFAULT '',
  `achivement_id` varchar(10) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL,
  `achievedDate` date DEFAULT NULL,
  PRIMARY KEY (`sport_id`,`achivement_id`),
  CONSTRAINT `achievement_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`achievement`
--

/*!40000 ALTER TABLE `achievement` DISABLE KEYS */;
/*!40000 ALTER TABLE `achievement` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE `coach` (
  `sport_id` varchar(10) NOT NULL,
  `coach_id` varchar(10) NOT NULL DEFAULT '',
  `coachName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`coach_id`),
  KEY `f1` (`sport_id`),
  CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`coach`
--

/*!40000 ALTER TABLE `coach` DISABLE KEYS */;
/*!40000 ALTER TABLE `coach` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`damage`
--

DROP TABLE IF EXISTS `damage`;
CREATE TABLE `damage` (
  `damageId` varchar(10) NOT NULL DEFAULT '',
  `resource_id` varchar(10) DEFAULT NULL,
  `description` varchar(70) NOT NULL,
  `damageDate` date DEFAULT NULL,
  PRIMARY KEY (`damageId`),
  KEY `f1` (`resource_id`),
  CONSTRAINT `damage_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`damage`
--

/*!40000 ALTER TABLE `damage` DISABLE KEYS */;
/*!40000 ALTER TABLE `damage` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `resource_id` varchar(10) NOT NULL DEFAULT '',
  `equipmentName` varchar(20) NOT NULL,
  `qty` int(11) DEFAULT '0',
  `boughtDate` date DEFAULT NULL,
  PRIMARY KEY (`resource_id`),
  UNIQUE KEY `equipmentName` (`equipmentName`),
  CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`equipment`
--

/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` (`resource_id`,`equipmentName`,`qty`,`boughtDate`) VALUES 
 ('Eq0001','racket',2,'2012-01-01'),
 ('R-0009','football',4,'0000-00-00');
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`equipmenttype`
--

DROP TABLE IF EXISTS `equipmenttype`;
CREATE TABLE `equipmenttype` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentName` varchar(20) NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `equipmentName` (`equipmentName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`equipmenttype`
--

/*!40000 ALTER TABLE `equipmenttype` DISABLE KEYS */;
INSERT INTO `equipmenttype` (`type_id`,`equipmentName`) VALUES 
 (1,'racket');
/*!40000 ALTER TABLE `equipmenttype` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `resource_id` varchar(10) NOT NULL DEFAULT '',
  `locationName` varchar(15) NOT NULL,
  `sessionLimit` int(11) DEFAULT NULL,
  `locationType` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`resource_id`),
  CONSTRAINT `location_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`location`
--

/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`resource_id`,`locationName`,`sessionLimit`,`locationType`) VALUES 
 ('Eq0001','sumanadaasa',3,'gim');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`practiceschedule`
--

DROP TABLE IF EXISTS `practiceschedule`;
CREATE TABLE `practiceschedule` (
  `sport_id` varchar(10) NOT NULL DEFAULT '',
  `resource_id` varchar(10) NOT NULL DEFAULT '',
  `practiceDate` date NOT NULL DEFAULT '0000-00-00',
  `practiceTime` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`sport_id`,`resource_id`,`practiceDate`,`practiceTime`),
  KEY `f1` (`resource_id`),
  CONSTRAINT `practiceschedule_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  CONSTRAINT `practiceschedule_ibfk_2` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`practiceschedule`
--

/*!40000 ALTER TABLE `practiceschedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `practiceschedule` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `request_id` varchar(10) NOT NULL DEFAULT '',
  `student_id` varchar(10) DEFAULT NULL,
  `requestDate` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`request_id`),
  KEY `f1` (`student_id`),
  CONSTRAINT `request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`request`
--

/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` (`request_id`,`student_id`,`requestDate`,`status`) VALUES 
 ('R-0001','S-0001','2015-12-16','pending'),
 ('R-0002','S-0001','2015-12-16','pending'),
 ('R-0003','S-0001','2015-12-16','pending'),
 ('R-0004','S-0001','2015-12-16','pending'),
 ('R-0005','S-0001','2015-12-16','pending'),
 ('R-0008','S-0001','2015-12-16','pending'),
 ('R-0009','S-0001','2015-12-16','pending');
/*!40000 ALTER TABLE `request` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`requestresource`
--

DROP TABLE IF EXISTS `requestresource`;
CREATE TABLE `requestresource` (
  `request_id` varchar(10) NOT NULL DEFAULT '',
  `resource_id` varchar(10) NOT NULL DEFAULT '',
  `itemBorrowingDate` date NOT NULL DEFAULT '0000-00-00',
  `issueDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`request_id`,`resource_id`,`itemBorrowingDate`),
  KEY `f1` (`resource_id`),
  CONSTRAINT `requestresource_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  CONSTRAINT `requestresource_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`requestresource`
--

/*!40000 ALTER TABLE `requestresource` DISABLE KEYS */;
INSERT INTO `requestresource` (`request_id`,`resource_id`,`itemBorrowingDate`,`issueDate`,`returnDate`,`status`) VALUES 
 ('R-0005','Eq0001','2012-01-01','2015-12-16','2012-02-01',1),
 ('R-0008','Eq0001','2012-01-01','2015-12-16','2012-02-01',1),
 ('R-0008','R-0009','2012-01-01','2015-12-16','2012-02-01',1),
 ('R-0009','Eq0001','2012-01-01','2015-12-16','2012-02-01',1),
 ('R-0009','R-0009','2012-01-01','2015-12-16','2012-02-01',1);
/*!40000 ALTER TABLE `requestresource` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`requestresourcedamage`
--

DROP TABLE IF EXISTS `requestresourcedamage`;
CREATE TABLE `requestresourcedamage` (
  `request_id` varchar(10) NOT NULL DEFAULT '',
  `resource_id` varchar(10) NOT NULL DEFAULT '',
  `itemBorrowingDate` date NOT NULL DEFAULT '0000-00-00',
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`request_id`,`resource_id`,`itemBorrowingDate`),
  CONSTRAINT `requestresourcedamage_ibfk_1` FOREIGN KEY (`request_id`, `resource_id`, `itemBorrowingDate`) REFERENCES `requestresource` (`request_id`, `resource_id`, `itemBorrowingDate`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`requestresourcedamage`
--

/*!40000 ALTER TABLE `requestresourcedamage` DISABLE KEYS */;
/*!40000 ALTER TABLE `requestresourcedamage` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`resource`
--

DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `resource_id` varchar(10) NOT NULL DEFAULT '',
  `supplierId` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`resource_id`),
  KEY `f1` (`supplierId`),
  CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`supplierId`) REFERENCES `supplier` (`supplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`resource`
--

/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
INSERT INTO `resource` (`resource_id`,`supplierId`) VALUES 
 ('Eq0001','s0001'),
 ('R-0009','S0001');
/*!40000 ALTER TABLE `resource` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE `sport` (
  `sport_id` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`sport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`sport`
--

/*!40000 ALTER TABLE `sport` DISABLE KEYS */;
INSERT INTO `sport` (`sport_id`,`name`) VALUES 
 ('sp-0001','cricket'),
 ('sp-0002','football'),
 ('sp-0003','badminton');
/*!40000 ALTER TABLE `sport` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`sportinvolve`
--

DROP TABLE IF EXISTS `sportinvolve`;
CREATE TABLE `sportinvolve` (
  `student_id` varchar(10) NOT NULL DEFAULT '',
  `sport_id` varchar(10) NOT NULL DEFAULT '',
  `isActive` tinyint(1) DEFAULT '1',
  `role` enum('Captain','V-Captain','Player','Other') NOT NULL,
  PRIMARY KEY (`sport_id`,`student_id`),
  KEY `f2` (`student_id`),
  CONSTRAINT `sportinvolve_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`),
  CONSTRAINT `sportinvolve_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`sportinvolve`
--

/*!40000 ALTER TABLE `sportinvolve` DISABLE KEYS */;
/*!40000 ALTER TABLE `sportinvolve` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL,
  `batch` varchar(10) DEFAULT NULL,
  `faculty` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `NIC` char(10) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `NIC` (`NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`student`
--

/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`student_id`,`name`,`batch`,`faculty`,`address`,`NIC`) VALUES 
 ('8','8','8','8','8','9'),
 ('8c','8','8','8','8','3'),
 ('d','','','','',''),
 ('S-0001','789','133','jk','jk','99'),
 ('S-0003','kn','45','45','45','55'),
 ('S-0004','kn','45','45','45','1');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`studentachievement`
--

DROP TABLE IF EXISTS `studentachievement`;
CREATE TABLE `studentachievement` (
  `sport_id` varchar(10) NOT NULL DEFAULT '',
  `achivement_id` varchar(10) NOT NULL DEFAULT '',
  `student_id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`sport_id`,`achivement_id`,`student_id`),
  KEY `f2` (`student_id`),
  CONSTRAINT `studentachievement_ibfk_1` FOREIGN KEY (`sport_id`, `achivement_id`) REFERENCES `achievement` (`sport_id`, `achivement_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `studentachievement_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`studentachievement`
--

/*!40000 ALTER TABLE `studentachievement` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentachievement` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`studentcontact`
--

DROP TABLE IF EXISTS `studentcontact`;
CREATE TABLE `studentcontact` (
  `student_id` varchar(10) NOT NULL DEFAULT '',
  `contact_no` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`student_id`,`contact_no`),
  CONSTRAINT `studentcontact_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`studentcontact`
--

/*!40000 ALTER TABLE `studentcontact` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentcontact` ENABLE KEYS */;


--
-- Table structure for table `moraspirit`.`supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `supplierId` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL,
  `contact_no` char(10) DEFAULT NULL,
  `NIC` char(10) DEFAULT NULL,
  PRIMARY KEY (`supplierId`),
  UNIQUE KEY `NIC` (`NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moraspirit`.`supplier`
--

/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`supplierId`,`name`,`contact_no`,`NIC`) VALUES 
 ('s0001','heshan','23','333');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
